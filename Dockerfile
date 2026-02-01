# Production Quality Laravel 12 / PHP 8.2 Apache Dockerfile
FROM php:8.2-apache

# Install System Dependencies
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev zip unzip \
    libzip-dev libicu-dev libjpeg-dev libfreetype6-dev \
    default-mysql-client \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring bcmath gd zip intl \
    && a2enmod rewrite \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set Apache DocumentRoot to Laravel's public directory
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Set Working Directory
WORKDIR /var/www/html

# Create system user for permissions
RUN useradd -G www-data,root -u 1000 -d /home/onecare onecare
RUN mkdir -p /home/onecare/.composer && chown -R onecare:onecare /home/onecare

# Optimizing for Laravel
COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

USER root
