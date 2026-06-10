FROM php:8.4-fpm

# Системные зависимости
RUN apt-get update && apt-get install -y \
    git curl zip unzip nodejs npm \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql pdo_pgsql mbstring exif pcntl bcmath zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Копируем проект
COPY . .

# Laravel системные папки
RUN mkdir -p \
    storage/framework/views \
    storage/framework/cache \
    storage/framework/sessions \
    storage/logs \
    bootstrap/cache

# Права
RUN chmod -R 775 storage bootstrap/cache

# Composer install
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Node dependencies + build
RUN npm ci || npm install
RUN npm run build

# Storage link (важно для картинок)
RUN php artisan storage:link || true

# НЕ кэшируем конфиги на build (важно для Render)
# RUN php artisan config:cache

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000

#FROM php:8.4-fpm

#RUN apt-get update && apt-get install -y \
#   git curl zip unzip nodejs npm \
#   libpng-dev libjpeg-dev libfreetype6-dev \
#   libonig-dev libxml2-dev libzip-dev libpq-dev \
#   && docker-php-ext-configure gd --with-freetype --with-jpeg \
#   && docker-php-ext-install gd pdo_mysql pdo_pgsql mbstring exif pcntl bcmath zip

#COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

#WORKDIR /var/www

#COPY . .

#RUN mkdir -p storage/framework/views \
#   storage/framework/cache \
#   storage/framework/sessions \
#   storage/logs \
#   bootstrap/cache

#RUN chmod -R 775 storage bootstrap/cache

#RUN composer install --no-dev --optimize-autoloader --no-interaction

#RUN npm install && npm run build



#EXPOSE 10000

#CMD php artisan serve --host=0.0.0.0 --port=10000