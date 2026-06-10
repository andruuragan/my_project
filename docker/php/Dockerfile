FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip nodejs npm \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql pdo_pgsql mbstring exif pcntl bcmath zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

# PHP deps
RUN composer install --no-dev --optimize-autoloader --no-interaction

# FRONTEND BUILD (ВАЖНО)
RUN npm install
RUN npm run build

# Laravel кеши (опционально)
RUN php artisan config:clear || true
RUN php artisan view:clear || true

# права
RUN chmod -R 775 storage bootstrap/cache

EXPOSE 10000

CMD php -S 0.0.0.0:10000 -t public