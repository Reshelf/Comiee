FROM php:8.2-apache

# Install necessary packages and enable mod_rewrite
RUN apt-get update \
    && apt-get install -y zlib1g-dev libpng-dev libjpeg-dev libfreetype6-dev libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && a2enmod rewrite

# Set the document root
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

# Update the Apache configuration
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
    && sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Set the appropriate permissions
RUN chown -R www-data:www-data /var/www/html
