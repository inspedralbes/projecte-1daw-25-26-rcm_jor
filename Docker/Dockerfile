FROM php:8.2-apache

# Herramientas básicas y extensión de MongoDB
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libssl-dev \
    pkg-config \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb

# INSTALAR MYSQLI (Añade esta línea)
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Habilitar mod rewrite
RUN a2enmod rewrite

# Instalar composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer