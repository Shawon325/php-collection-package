FROM php:8.1-fpm
MAINTAINER Shawon

# Install Dependencies
RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip

# Clear Cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql intl mbstring exif pcntl bcmath gd

# Set working directory
WORKDIR /var/www
RUN chown -R www-data:www-data /var/www