FROM php:7.0-apache

RUN apt-get update && docker-php-ext-install mysqli
RUN apt-get update && apt-get install -y host

COPY php.ini /usr/local/etc/php/
COPY ./src/ /var/www/html/
