# Build stage
FROM php:8.2-fpm-alpine AS builder

RUN apk add --no-cache \
    git \
    unzip \
    curl \
    icu-dev \
    oniguruma-dev \
    libxml2-dev \
    nodejs npm \
    build-base \
    autoconf \
    g++ \
    make

RUN docker-php-ext-install pdo pdo_mysql intl xml mbstring

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy composer files first (for caching)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader

# Copy application
COPY . .

# Install NPM deps and build assets
RUN npm ci --silent && npm run build --silent

RUN composer dump-autoload --optimize

# Production stage
FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    nginx \
    git \
    unzip \
    curl \
    icu-dev \
    oniguruma-dev \
    libxml2-dev \
    supervisor \
    bash

RUN docker-php-ext-install pdo pdo_mysql intl xml mbstring

WORKDIR /var/www/html

# Copy from builder
COPY --from=builder --chown=www-data:www-data /var/www/html /var/www/html

# Copy nginx config
COPY docker/nginx/default.conf /etc/nginx/http.d/default.conf

# Create directories with proper permissions
RUN mkdir -p /var/www/html/storage/logs && \
    mkdir -p /var/www/html/bootstrap/cache && \
    mkdir -p /run/nginx && \
    chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copy supervisor config
RUN mkdir -p /etc/supervisor.d
COPY <<EOF /etc/supervisor.d/laravel.conf
[supervisord]
nodaemon=true
logfile=/var/log/supervisor/supervisord.log

[program:php-fpm]
command=/usr/sbin/php-fpm8.2 -F
autostart=true
autorestart=true
stderr_logfile=/var/log/supervisor/php-fpm.err.log
stdout_logfile=/var/log/supervisor/php-fpm.out.log

[program:nginx]
command=/usr/sbin/nginx -g 'daemon off;'
autostart=true
autorestart=true
stderr_logfile=/var/log/supervisor/nginx.err.log
stdout_logfile=/var/log/supervisor/nginx.out.log
EOF

EXPOSE 80

HEALTHCHECK --interval=30s --timeout=10s --start-period=40s --retries=3 \
    CMD curl -f http://localhost/health || exit 1

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor.d/laravel.conf"]
