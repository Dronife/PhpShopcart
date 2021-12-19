FROM php:7.4-cli
COPY . /usr/src/myapp
WORKDIR /usr/src/myapp
COPY --from=composer /usr/bin/composer /usr/bin/composer
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip
RUN composer install
