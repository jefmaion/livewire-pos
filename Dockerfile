FROM php:8.2-cli

# Instala dependências
RUN apt-get update && apt-get install -y \
    git unzip curl libpq-dev libzip-dev zip libpng-dev libonig-dev libxml2-dev libicu-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl intl

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define o diretório
WORKDIR /var/www/html

# Copia o projeto
COPY . .

# Instala as dependências sem pacotes de desenvolvimento
RUN composer install --no-dev --optimize-autoloader

# Permissões corretas
RUN chown -R www-data:www-data storage bootstrap/cache

# Porta e comando
EXPOSE 8080
CMD php artisan config:clear && php artisan key:generate && php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=8080
