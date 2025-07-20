FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy files to Apache's root
COPY . /var/www/html/

# Allow .htaccess overrides in the default site config
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

EXPOSE 80
