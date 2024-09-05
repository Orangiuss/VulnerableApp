FROM php:7.4-apache

# Installe les extensions PHP nécessaires
RUN docker-php-ext-install mysqli

# Copie les fichiers source de l'application
COPY src/ /var/www/html/
RUN mkdir /var/www/html/.github
RUN touch /var/www/html/.git-credentials
RUN echo "https://johndoe:JohNDoePA$5w0rd@github.com" > /var/www/html/.git-credentials
RUN echo "https://user_123:MotDePassespecial!@github.com" >> /var/www/html/.git-credentials
RUN echo "https://vulnerableAppUser:Vuln3rabl3AppP@gitlab.com " >> /var/www/html/.git-credentials
RUN echo "https://VulnerableApp:VulnApp{.f1Le$_I$_D@N6erOuS..}!@gitlab.com" >> /var/www/html/.git-credentials
RUN echo "VulnApp{You_4re_4w3s0m3!}" >> /etc/passwd

COPY conf/httpd.conf /etc/apache2/sites-available/000-default.conf

RUN a2ensite 000-default.conf

# Copie le fichier de configuration de la base de données
COPY conf/init.sql /docker-entrypoint-initdb.d/