FROM php:8.0-cli

RUN pecl install redis \
    && docker-php-ext-enable redis \
    && rm -rf /var/lib/apt/lists/*