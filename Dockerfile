FROM php:8.2-apache

# Copy all your PHP files to the Apache server root
COPY . /var/www/html/

# Expose Apache port
EXPOSE 80
