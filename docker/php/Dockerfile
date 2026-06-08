FROM php:8.4-fpm

RUN apt-get update && apt-get install -y \
    git curl zip unzip nodejs npm \
    libpng-dev libonig-dev libxml2-dev \
    libzip-dev libjpeg-dev libfreetype6-dev libpq-dev

WORKDIR /var/www

COPY . .

# PHP deps
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --no-interaction

# JS deps + build
RUN npm install
RUN npm run build

# права
RUN mkdir -p storage/framework/cache storage/framework/views storage/framework/sessions bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]