# Usar a imagem base oficial do PHP 8 com Apache
FROM php:8.1-apache

# Instalar dependências necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    && docker-php-ext-configure gd \
    && docker-php-ext-install gd pdo pdo_mysql mbstring exif pcntl bcmath

# Habilitar o mod_rewrite do Apache para URLs amigáveis do Laravel
RUN a2enmod rewrite

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Definir o diretório de trabalho
WORKDIR /var/www

# Expõe a porta 80
EXPOSE 80
