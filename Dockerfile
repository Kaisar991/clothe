
# Stage 1: Build frontend assets
FROM node:22-alpine AS frontend
WORKDIR /app

COPY package.json package-lock.json ./
RUN npm ci
COPY . .
RUN npm run build

# Stage 2: Install PHP dependencies
FROM composer:2 AS vendor
WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts
COPY . .
RUN composer dump-autoload --no-dev --optimize

# Stage 3: Run Laravel with Apache
FROM php:8.3-apache
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y --no-install-recommends \
        libsqlite3-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo_sqlite mbstring bcmath pcntl dom xml \
    && a2enmod rewrite \
    && sed -ri 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && printf '<Directory /var/www/html/public>\n    AllowOverride All\n    Require all granted\n</Directory>\n' > /etc/apache2/conf-available/laravel.conf \
    && a2enconf laravel \
    && rm -rf /var/lib/apt/lists/*

COPY . .
COPY --from=vendor /app/vendor ./vendor
COPY --from=frontend /app/public/build ./public/build

RUN mkdir -p storage/framework/cache/data storage/framework/sessions storage/framework/views storage/logs bootstrap/cache database \
    && touch database/database.sqlite \
    && chown -R www-data:www-data storage bootstrap/cache database \
    && chmod -R ug+rwx storage bootstrap/cache database

ENV PORT=10000

EXPOSE 10000

CMD ["sh", "-c", "sed -ri 's/^Listen 80$/Listen ${PORT}/' /etc/apache2/ports.conf && sed -ri 's/<VirtualHost \\*:80>/<VirtualHost *:${PORT}>/' /etc/apache2/sites-available/000-default.conf && php artisan package:discover --ansi && php artisan migrate --force && apache2-foreground"]
