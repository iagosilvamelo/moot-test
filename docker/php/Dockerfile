FROM php:8.2-apache

# Instala extensões básicas
RUN apt-get update && apt-get install -y \
    git curl unzip libpng-dev libonig-dev libxml2-dev zip libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl zip

# Instala a extensão intl
RUN apt-get update && apt-get install -y libicu-dev && \
    docker-php-ext-install intl

# Ativa mod_rewrite do Apache
RUN a2enmod rewrite

# Define o diretório público como raiz do Apache
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Atualiza a conf do Apache
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Instala dependências e bcmath
RUN apt-get update && apt-get install -y \
        libpq-dev \
        libzip-dev \
        unzip \
    && docker-php-ext-install bcmath \
    && docker-php-ext-install pdo pdo_mysql

# Copia arquivos de config opcional
COPY docker/php/opcache.ini /usr/local/etc/php/conf.d/opcache.ini
COPY docker/php/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

# Instala o Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
