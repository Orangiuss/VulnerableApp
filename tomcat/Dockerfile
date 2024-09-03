# Utiliser l'image officielle de Tomcat comme base
FROM tomcat:9-jdk11

# Copiez le fichier WAR de l'application dans le répertoire webapps de Tomcat
COPY target/webapp.war /usr/local/tomcat/webapps/webapp.war

# Expose le port sur lequel Tomcat écoute
EXPOSE 8080

# Commande pour démarrer Tomcat
CMD ["catalina.sh", "run"]
