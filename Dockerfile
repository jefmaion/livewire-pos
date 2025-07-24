FROM php:8.2-fpm

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git unzip curl libpq-dev libzip-dev zip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl

# Instala o Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Define diretório de trabalho
WORKDIR /var/www/html

# Copia os arquivos do projeto
COPY . .

# Instala dependências PHP (sem dev)
RUN composer install --no-dev --optimize-autoloader

# Gera APP_KEY se ainda não existir
RUN php artisan config:clear && php artisan key:generate

# Ajusta permissões
RUN chown -R www-data:www-data storage bootstrap/cache

# Servidor embutido
CMD php artisan serve --host=0.0.0.0 --port=8080
