FROM php:8.1-apache

COPY --chown=www-data:www-data src/ /var/www/html

RUN docker-php-ext-install pdo pdo_mysql
RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"
