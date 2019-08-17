FROM php:latest

RUN apt-get update && \
    apt-get -y install git curl

RUN docker-php-ext-install bcmath

RUN curl --insecure https://getcomposer.org/composer.phar -o /usr/bin/composer && chmod +x /usr/bin/composer

RUN composer self-update

ENTRYPOINT /var/www/app/bin/react