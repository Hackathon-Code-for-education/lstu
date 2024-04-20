FROM php:8.2-apache

RUN apt-get update \
    && apt-get install -y libpq-dev postgresql-client \
    && docker-php-ext-install pdo pdo_pgsql \
    && pecl install  xdebug \
    && docker-php-ext-enable xdebug 

# RUN pecl install xdebug


RUN docker-php-ext-enable xdebug


WORKDIR /var/www/html

COPY . .