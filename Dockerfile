FROM php:8.1-apache

RUN apt-get update && apt-get install -y \
    git unzip libpng-dev libonig-dev libxml2-dev zip

RUN docker-php-ext-install pdo_mysql mbstring bcmath gd

# MATIKAN SEMUA MPM
RUN rm -f /etc/apache2/mods-enabled/mpm_* \
 && a2enmod mpm_prefork rewrite

WORKDIR /var/www/html
COPY . .

RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

EXPOSE 80
