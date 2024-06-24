# Usar la imagen oficial de PHP
FROM php:7.4-apache

# Instalar las extensiones necesarias para MySQL
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Copiar el contenido del proyecto a la carpeta del servidor web
COPY . /var/www/html/

# Exponer el puerto 80
EXPOSE 80