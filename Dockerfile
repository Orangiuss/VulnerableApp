FROM php:7.4-apache

# Installe les extensions PHP nécessaires
RUN docker-php-ext-install mysqli

# Copie les fichiers source de l'application
COPY src/ /var/www/html/

# Copie le fichier de configuration de la base de données
COPY init.sql /docker-entrypoint-initdb.d/