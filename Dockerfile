FROM php:7.0-apache

RUN apt-get update && docker-php-ext-install mysqli

COPY ./src/ /var/www/html/

# Add custom php.ini later
#COPY ./php.ini /etc/php5/apache2/