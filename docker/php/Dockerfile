FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip nodejs npm \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql pdo_pgsql mbstring exif pcntl bcmath zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# 1. копируем ВСЁ СРАЗУ (важно для artisan)
COPY . .

# 2. dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 3. Laravel safety
RUN mkdir -p bootstrap/cache storage
RUN chmod -R 775 storage bootstrap/cache

# 4. cache (не критично)
RUN php artisan package:discover || true

# 5. frontend build (можно оставить, но лучше отдельно)
RUN npm install && npm run build

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000