FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip \
    libpng-dev libonig-dev libxml2-dev \
    libzip-dev libjpeg-dev libfreetype6-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

# 🔥 ГАРАНТИРОВАННОЕ СОЗДАНИЕ ПАПОК И ПРАВ
RUN mkdir -p storage/framework/cache storage/framework/views storage/framework/sessions bootstrap/cache && \
    chmod -R 777 storage bootstrap/cache

EXPOSE 10000

CMD php -r "file_exists('.env') || copy('.env.example', '.env');" && \
    php artisan key:generate --force && \
    php -S 0.0.0.0:10000 -t public