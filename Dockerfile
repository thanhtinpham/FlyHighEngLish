FROM php:8.2-apache

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Enable Apache mod_rewrite for Laravel routing
RUN a2enmod rewrite

# Change Apache Port to 8080 or default
ENV PORT=8080
RUN sed -i 's/80/${PORT}/g' /etc/apache2/ports.conf /etc/apache2/sites-available/*.conf

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Set Document Root to Laravel public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

# Install Composer dependencies
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 8080

CMD ["apache2-foreground"]
