FROM php:8.2-apache

# herramientas básicas
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libssl-dev \
    pkg-config \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# habilitar mod rewrite (opcional pero útil)
RUN a2enmod rewrite

# instalar composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer