FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
        git \
        unzip \
        libmcrypt-dev \
        libpng-dev \
        imagemagick \
        libmagick++-dev \
        libmagickwand-dev \
        libpq-dev \
        libzip-dev \
        nano \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install \
        pdo_pgsql \
        bcmath \
        gd \
        zip \
        intl \
        opcache \
    && pecl install apcu_bc \
    && pecl install imagick  \
    && docker-php-ext-enable apcu \
    && docker-php-ext-enable imagick

COPY docker/php/custom.ini docker/php/opcache.ini docker/php/apcu.ini /usr/local/etc/php/conf.d/

WORKDIR /var/www/app
COPY . /var/www/app

RUN usermod -u 1000 www-data && chown -R 1000:1000 /var/www/app