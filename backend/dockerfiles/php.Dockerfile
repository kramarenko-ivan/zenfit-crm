FROM php:8.2-fpm-alpine

WORKDIR /var/www/laravel

# Установка PHP-расширений
RUN docker-php-ext-install pdo pdo_mysql