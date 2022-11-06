#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:clear
php artisan cache:clear

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force
