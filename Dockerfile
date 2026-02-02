FROM php:8.2-fpm-alpine

RUN apk add --no-cache \
    git \
    unzip \
    curl \
    icu-dev \
    oniguruma-dev \
    libxml2-dev \
    nodejs npm \
    build-base

RUN docker-php-ext-install pdo pdo_mysql intl xml mbstring

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy composer files first (for caching)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader || true

# Copy application
COPY . .

# Install NPM deps and build assets (if present)
RUN if [ -f package.json ]; then npm ci --silent && npm run build --silent || true; fi

RUN composer dump-autoload --optimize

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache || true

EXPOSE 9000

CMD ["php-fpm"]
