# Kali linux - Docker image

Pour faire le build de l'image :
```
docker build -t vulnapp/kali .
```

Pour lancer un container de Kali pour utiliser les outils :
```
docker run -it vulnapp/kali
```

Pour que ca soit indéfiniment :
```
docker run -d -t vulnapp/kali
```
Et ensuite on peut exécuter un shell comme ceci :
```
docker exec -it <name> bin/bash
```
Pour connecter le container à un réseau Docker si l'environnement est déployé en Docker :
```
docker network connect <network_name> <container_name>
```
