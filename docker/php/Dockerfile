FROM php:8.4-fpm

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    libzip-dev libjpeg-dev libfreetype6-dev \
    # Конфигурация GD с поддержкой JPEG и FreeType
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Разрешаем Composer работать от root и устанавливаем его
ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Копируем файлы проекта (если нужно) и выполняем установку
COPY . .
RUN composer install --no-dev --optimize-autoloader --no-interaction
