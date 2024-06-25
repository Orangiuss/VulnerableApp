<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A08:2021 - Manque d'intégrité des données et du logiciel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>A08:2021 - Manque d'intégrité des données et du logiciel</h1>
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
            <h2>Manque d'intégrité des données et du logiciel</h2>
            <p>Les échecs d'intégrité des logiciels et des données concernent le code et l'infrastructure qui ne protègent pas contre les violations d'intégrité. Par exemple, une application qui dépend de plugins, de bibliothèques ou de modules provenant de sources non fiables, de dépôts et de réseaux de distribution de contenu (CDN) est vulnérable. Une pipeline CI/CD non sécurisée peut introduire des risques d'accès non autorisé, de code malveillant ou de compromission du système.</p>

            <h3>Comment Prévenir :</h3>
            <ul>
                <li>Utiliser des signatures numériques ou des mécanismes similaires pour vérifier que le logiciel ou les données proviennent de la source attendue et n'ont pas été altérés.</li>
                <li>S'assurer que les bibliothèques et les dépendances, telles que npm ou Maven, proviennent de dépôts de confiance. Pour les profils à risque élevé, envisager d'héberger un dépôt interne vérifié.</li>
                <li>Utiliser un outil de sécurité de la chaîne d'approvisionnement logicielle, comme OWASP Dependency Check ou OWASP CycloneDX, pour vérifier que les composants ne contiennent pas de vulnérabilités connues.</li>
            </ul>

            <p> Exemple : blabla </p>
        </div>
    </div>
</body>
</html>