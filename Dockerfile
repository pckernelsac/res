FROM php:8.2-apache

# Instalar extensiones necesarias
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar proyecto
COPY . /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html

# Habilitar mod_rewrite (por .htaccess)
RUN a2enmod rewrite

EXPOSE 80
