<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A10:2021 - SSRF (Falsification de requête côté serveur)</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>A10:2021 - SSRF (Falsification de requête côté serveur)</h1>
    </header>
    <nav>
        <a href="A01.php">A01</a>
        <a href="A02.php">A02</a>
        <a href="A03.php">A03</a>
        <a href="A04.php">A04</a>
        <a href="A05.php">A05</a>
        <a href="A06.php">A06</a>
        <a href="A07.php">A07</a>
        <a href="A08.php">A08</a>
        <a href="A09.php">A09</a>
        <a href="A10.php">A10</a>
    </nav>
    <div class="center">
        <div class="container">
            <h2>SSRF (Falsification de requête côté serveur)</h2>
            <p>La falsification de requête côté serveur (SSRF) est une vulnérabilité qui permet à un attaquant de faire envoyer des requêtes par un serveur cible vers des domaines ou des adresses IP de son choix. Les attaquants exploitent cette vulnérabilité en trompant le serveur afin qu'il envoie des requêtes malveillantes, souvent vers des systèmes internes non accessibles publiquement, des services de cloud, ou même des API de tierces parties.</p>
            
            <h3>Risques associés à SSRF :</h3>
            <ul>
                <li><strong>Accès à des réseaux internes :</strong> Les attaquants peuvent accéder à des systèmes internes protégés par des pare-feu.</li>
                <li><strong>Vol de données sensibles :</strong> Les attaquants peuvent récupérer des données sensibles disponibles uniquement à partir du réseau interne.</li>
                <li><strong>Exploitation de services :</strong> Utilisation des services internes pour lancer des attaques supplémentaires (par exemple, scanner des ports internes, exploitation de services vulnérables).</li>
                <li><strong>Manipulation de la configuration :</strong> Les attaquants peuvent modifier des configurations ou des métadonnées, comme celles utilisées par des services de cloud.</li>
            </ul>
        </div>
    </div>
</body>
</html>
