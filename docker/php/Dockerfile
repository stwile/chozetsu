FROM php:8.2.4-alpine

RUN apk update && apk add \
    zip unzip autoconf gcc g++ make linux-headers && \
    pecl install xdebug && \
    docker-php-ext-enable xdebug

# Composerインストール
COPY --from=composer /usr/bin/composer /usr/bin/composer

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /app