FROM php:8.4-fpm

# 1. системні залежності (ВАЖЛИВО: спочатку)
RUN apt-get update && apt-get install -y \
    git curl zip unzip nodejs npm \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libpq-dev \
    && rm -rf /var/lib/apt/lists/*

# 2. PHP extensions (GD тут головний)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
    gd \
    pdo_mysql \
    pdo_pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    zip

# 3. composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

# 4. код
COPY . .

# 5. PHP deps
RUN composer install --no-dev --optimize-autoloader --no-interaction

# 6. frontend
RUN npm install
RUN npm run build

# 7. права
RUN mkdir -p storage/framework/cache storage/framework/views storage/framework/sessions bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000

CMD ["php-fpm"]