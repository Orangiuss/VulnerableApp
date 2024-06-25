<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A05:2021 - Mauvaise configuration de sécurité</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>A05:2021 - Mauvaise configuration de sécurité</h1>
    </header>
    <nav>
        <a href="index.php">Accueil</a>
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
            <p> Les configurations de sécurité incorrectes sont courantes et peuvent exposer des systèmes à des vulnérabilités. 90% des applications testées présentent ce type de failles, souvent dues à des configurations par défaut non sécurisées. </p>
            <h2>Exemples de mauvaise configuration de sécurité</h2>
            <ul>
                <li>Mauvaise configuration des parsers XML : Possibilité de XXE / XEE, exemple : <a href="xxe_vulnerable.php">XML Parser</a></li>
                <li>Mots de passe par défaut</li>
                <li>La fonctionnalité de listage des répertoires n'est pas désactivée sur le serveur.</li>
                <li>Le serveur d'application est livré avec des applications classiques qui ne sont pas supprimées du serveur mis en production. Ces mêmes applications ont des failles de sécurité connues que les attaquants utilisent afin de compromettre le serveur. Si l'une de ces applications est la console d'administration, et que les comptes par défaut n'ont pas été modifiés, l'attaquant se connecte avec les mots de passe par défaut et prend la main sur la cible.</li>
                <li>Cookie de session sans les flags HttpOnly et Secure</li>
                <li>Pas d'entêtes de sécurité sur l'application</li>
            </ul>
        </div>
    </div>
</body>
</html>