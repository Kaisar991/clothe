
FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libjpeg62-turbo-dev \
    libfreetype6-dev libonig-dev libxml2-dev \
    nodejs npm \
    && docker-php-ext-install mbstring exif pcntl bcmath gd zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader --no-interaction

RUN npm ci && npm run build

RUN mkdir -p storage/framework/cache/data \
    storage/framework/sessions \
    storage/framework/views \
    storage/logs \
    bootstrap/cache \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R ug+rwX storage bootstrap/cache

CMD ["sh", "-c", "php artisan config:clear && php artisan route:clear && php artisan view:clear && php artisan serve --host=0.0.0.0 --port=${PORT:-8080}"]
