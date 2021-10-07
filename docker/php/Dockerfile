FROM php:8.0.11-fpm

# COPY php.ini
COPY ./php.ini /usr/local/etc/php/php.ini

RUN apt-get update && apt-get install -y \
    mariadb-client \
    libzip-dev \
    unzip \
    zlib1g-dev \
    && docker-php-ext-install \
    zip \
    pdo_mysql \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

#Composer install
COPY --from=composer /usr/bin/composer /usr/bin/composer

#nodejs install
# COPY --from=node:16 /usr/local/bin /usr/local/bin
# COPY --from=node:16 /usr/local/lib /usr/local/lib

# RUN npm install npm@latest -g

# RUN npm install -g yarn --force

#xdebug install
# RUN pecl install xdebug-3.0.4 && docker-php-ext-enable xdebug
# ENV PHP_IDE_CONFIG 'serverName=localhost'
# ENV XDEBUG_CONFIG 'client_host=host.docker.internal'
WORKDIR /var/www/html
