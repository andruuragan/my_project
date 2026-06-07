FROM php:8.4-fpm

# Установка системных зависимостей
RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libpng-dev libonig-dev libxml2-dev \
    libzip-dev libjpeg-dev libfreetype6-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Копируем файлы проекта
COPY . .

# Установка зависимостей
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 🔥 КРИТИЧЕСКИЙ ШАГ: Установка прав и владельца
RUN mkdir -p storage/framework/{cache,views,sessions} bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Порт
EXPOSE 10000

# Команда для запуска
CMD php -r "file_exists('.env') || copy('.env.example', '.env');" && \
    php artisan key:generate --force && \
    php -S 0.0.0.0:10000 -t public