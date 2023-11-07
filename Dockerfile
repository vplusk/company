FROM php:8.1-fpm

WORKDIR /var/www/html

RUN apt-get update && apt-get install --quiet --yes --no-install-recommends \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo pdo_mysql

COPY . /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

EXPOSE 9000