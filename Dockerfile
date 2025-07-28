FROM php:8.2-cli

# Instala dependências do sistema
RUN apt-get update && apt-get install -y \
    git unzip curl libpq-dev libzip-dev zip libpng-dev libonig-dev libxml2-dev libicu-dev \
    # Instala Node.js e npm
    && curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    # Limpa cache do apt
    && apt-get clean

# Instala extensões PHP
RUN docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl intl

# Instala Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Define o diretório de trabalho
WORKDIR /var/www/html

# Copia o projeto inteiro
COPY . .

# Instala dependências JS e compila assets
RUN npm install && npm run build

# Instala dependências PHP (somente produção)
RUN composer install --no-dev --optimize-autoloader

# Ajusta permissões
RUN chown -R www-data:www-data storage bootstrap/cache

# Expõe porta e define o comando de inicialização
EXPOSE 8080
# CMD php artisan config:clear && \
#     php artisan key:generate && \
#     php artisan migrate --force && \
#     #php artisan db:seed --force && \
#     php artisan serve --host=0.0.0.0 --port=8080
RUN php artisan config:clear

RUN php artisan key:generate

RUN php artisan migrate --force

RUN php artisan bd:seed --force

RUN php artisan serve --host=0.0.0.0 --port=8080




# FROM php:8.2-cli

# # Instala dependências
# RUN apt-get update && apt-get install -y \
#     git unzip curl libpq-dev libzip-dev zip libpng-dev libonig-dev libxml2-dev libicu-dev \
#     && docker-php-ext-install pdo pdo_pgsql mbstring zip exif pcntl intl

# # Instala Composer
# COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# # Define o diretório
# WORKDIR /var/www/html

# # Copia o projeto
# COPY . .

# # Instala as dependências sem pacotes de desenvolvimento
# RUN composer install --no-dev --optimize-autoloader

# # Permissões corretas
# RUN chown -R www-data:www-data storage bootstrap/cache

# # Porta e comando
# EXPOSE 8080
# CMD php artisan config:clear && php artisan key:generate && php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=8080
