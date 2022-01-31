FROM php:8.0-fpm

USER root

RUN apt update \
    && apt install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

RUN apt update \
    && pecl install redis \
    && docker-php-ext-enable redis

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

CMD test ! -f /var/www/html/app/symfony.lock && \
    composer create-project symfony/skeleton app; \
    cd /var/www/html/app; \
    composer require symfony/redis-messenger; \
    composer require symfony/monolog-bundle; \
    symfony server:ca:install; \
    symfony server:start;