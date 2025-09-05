FROM composer:latest

WORKDIR /var/www/laravel

ENTRYPOINT ["composer"]
CMD ["install", "--ignore-platform-reqs"]