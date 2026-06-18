FROM php:8.4-fpm

# Установка Node.js (актуальная версия) и системных зависимостей
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get update && apt-get install -y \
    git curl zip unzip nodejs \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql pdo_pgsql mbstring exif pcntl bcmath zip

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# Копируем файлы проекта
COPY . .

# Подготовка папок Laravel и прав доступа
RUN mkdir -p storage/framework/{views,cache,sessions} storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Установка PHP зависимостей
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Установка JS зависимостей и сборка фронтенда
RUN npm install && npm run build

# Создание ссылки для картинок
RUN php artisan storage:link || true

EXPOSE 10000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=10000"]

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