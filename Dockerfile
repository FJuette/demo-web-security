FROM php:7.0-apache

RUN apt-get update && docker-php-ext-install mysqli

COPY php.ini /usr/local/etc/php/
COPY ./src/ /var/www/html/
