# LABEL authors="robya"
FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    npm \
    curl \
    vim \
    libpq-dev \
    && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy custom Apache configuration file
COPY apache-config.conf /etc/apache2/sites-available/000-default.conf

# Install PHP extensions for PostgreSQL, GD, PDO, MySQL, and zip
RUN docker-php-ext-install pdo_pgsql pgsql gd pdo_mysql mysqli zip

# Set working directory
WORKDIR /var/www/html

# Copy Composer files and install dependencies
COPY composer.* ./
RUN composer install --no-scripts --no-autoloader

# Copy npm files and install dependencies
COPY package*.json ./
RUN npm install

# 
# RUN apt install nano
# RUN cp .env.example .env
# RUN php artisan key:generate

# Copy Laravel project files
COPY . .

# Generate Laravel mix assets
RUN npm run build

# Set permissions for Laravel storage and cache directories
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Restart Apache service
RUN service apache2 restart

# Expose port for Apache server
EXPOSE 8082

# Start Apache in foreground
CMD ["apache2-foreground"]
