#!/bin/bash

# Ensure storage and bootstrap/cache permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Wait for MySQL to be ready
echo "Waiting for MySQL..."
while ! mysqladmin ping -h"onecare_db" --silent; do
    sleep 1
done

if [ ! -f ".env" ]; then
    echo "Creating .env file..."
    cp .env.example .env
    php artisan key:generate
fi

# Run migrations
echo "Running migrations..."
php artisan migrate --force

# Activate BeautyCloud Theme
echo "Activating BeautyCloud theme..."
php artisan platform:theme:activate beautycloud

# Clear Cache
php artisan cache:clear
php artisan view:clear
php artisan config:clear

# Default Docker CMD
apache2-foreground
