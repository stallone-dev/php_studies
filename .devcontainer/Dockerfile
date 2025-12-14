FROM php:8.2-apache

# Dependências do SO
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libicu-dev \
    libpq-dev \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Extensões PHP
RUN docker-php-ext-install \
    pdo_pgsql \
    zip \
    intl \
    bcmath

# Xdebug
RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY .devcontainer/xdebug.ini /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini

# Habilita Mod Rewrite do Apache
RUN a2enmod rewrite

# Configuração do Apache
COPY .devcontainer/apache-config.conf /etc/apache2/sites-available/000-default.conf

# Composer oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
