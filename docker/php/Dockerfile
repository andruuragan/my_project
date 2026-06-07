FROM php:8.4-fpm

# Устанавливаем Nginx и системные библиотеки
# ОБРАТИТЕ ВНИМАНИЕ: добавлено расширение libpq-dev для поддержки PostgreSQL
RUN apt-get update && apt-get install -y \
    nginx \
    git curl zip unzip libpng-dev libonig-dev libxml2-dev \
    libzip-dev libjpeg-dev libfreetype6-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd zip

# Копируем конфиг
COPY ./docker/nginx/default.config /etc/nginx/sites-available/default
RUN ln -sf /etc/nginx/sites-available/default /etc/nginx/sites-enabled/default

# Устанавливаем Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
COPY . .

# Настройка прав
RUN chmod -R 777 storage bootstrap/cache

# Указываем, что приложение слушает порт 10000
EXPOSE 10000

# Включаем вывод ошибок в логи
RUN echo "display_errors = On" >> /usr/local/etc/php/php.ini \
    && echo "display_startup_errors = On" >> /usr/local/etc/php/php.ini \
    && echo "error_reporting = E_ALL" >> /usr/local/etc/php/php.ini

# Запускаем встроенный сервер PHP
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]