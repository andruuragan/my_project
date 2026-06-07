FROM php:8.4-fpm

# Устанавливаем Nginx и системные библиотеки
RUN apt-get update && apt-get install -y \
    nginx \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    libzip-dev libjpeg-dev libfreetype6-dev libpq-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Копируем конфиг Nginx
COPY ./docker/nginx/default.conf /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

RUN chmod -R 777 storage bootstrap/cache

# Порт 10000 для Nginx
EXPOSE 10000

# Запускаем PHP-FPM и Nginx вместе
CMD php-fpm -D && nginx -g "daemon off;"