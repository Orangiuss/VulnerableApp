<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A07:2021 - Identification et authentification de mauvaise qualité</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>A07:2021 - Identification et authentification de mauvaise qualité</h1>
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
            <h2>Identification et authentification de mauvaise qualité</h2>
            <p>Les mécanismes d'identification et d'authentification faibles exposent les systèmes à des risques d'usurpation d'identité. Cette catégorie inclut maintenant les failles d'identification en plus des erreurs d'authentification.</p>

            <h3>Exemples de failles d'identification et d'authentification :</h3>
            <ul>
                <li>Permet des attaques automatisées telles que le bourrage d'identifiants, où l'attaquant dispose d'une liste de noms d'utilisateur et de mots de passe valides.</li>
                <li>Permet les attaques par force brute ou autres attaques automatisées.</li>
                <li>Permet l'utilisation de mots de passe par défaut, faibles ou bien connus, tels que "Password1" ou "admin/admin".</li>
                <li>Utilise des processus de récupération d'identifiants et de mots de passe oubliés faibles ou inefficaces, tels que les "réponses basées sur des connaissances", qui ne peuvent pas être sécurisées.</li>
                <li>Utilise des magasins de mots de passe en texte clair, cryptés ou faiblement hachés.</li>
                <li>Possède une authentification multi-facteurs manquante ou inefficace.</li>
                <li>Expose l'identifiant de session dans l'URL.</li>
                <li>Réutilise l'identifiant de session après une connexion réussie.</li>
                <li>N'invalide pas correctement les identifiants de session. Les sessions utilisateur ou les jetons d'authentification (principalement les jetons de connexion unique (SSO)) ne sont pas correctement invalidés lors de la déconnexion ou après une période d'inactivité.</li>
            </ul>

            <!-- <p>Source : <a href="https://portswigger.net/">PortsWigger</a></p> -->
        </div>
    </div>
</body>
</html>