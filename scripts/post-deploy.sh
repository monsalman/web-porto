#!/usr/bin/env bash
set -euo pipefail

# Post-deploy script for Laravel when deploying with Dokploy
# This script is run on the server after code is updated.

cd "${DEPLOY_DIR:-/var/www/html}"

echo "Running post-deploy tasks..."

# Ensure vendor installed (Dokploy build may have already run composer)
composer install --no-interaction --prefer-dist --optimize-autoloader || true

php artisan migrate --force || true
php artisan storage:link || true
php artisan config:cache || true
php artisan route:cache || true

# Fix permissions for web user
chown -R www-data:www-data storage bootstrap/cache || true
chmod -R ug+rwx storage bootstrap/cache || true

echo "Post-deploy tasks finished."