FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip nodejs npm \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql pdo_pgsql mbstring exif pcntl bcmath zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# 1. Сначала копируем ТОЛЬКО composer файлы (важно)
COPY composer.json composer.lock ./

# 2. Создаём нужные папки ДО composer install
RUN mkdir -p bootstrap/cache storage/framework/views storage/framework/cache storage/framework/sessions

# 3. Устанавливаем PHP зависимости
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 4. Теперь копируем весь проект
COPY . .

# 5. Node зависимости
RUN npm install
RUN npm run build

# 6. Laravel cache (без падений)
RUN php artisan config:clear || true
RUN php artisan view:clear || true
RUN php artisan route:clear || true

# 7. Права
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

CMD php -S 0.0.0.0:10000 -t public