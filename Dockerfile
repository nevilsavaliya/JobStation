FROM php:8.2-apache

# Enable Apache rewrite module
RUN a2enmod rewrite

# Install PHP MySQL extension
RUN docker-php-ext-install mysqli

# Allow .htaccess overrides for Apache
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copy project files into Apache root
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose port
EXPOSE 80
