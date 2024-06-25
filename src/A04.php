<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A04 - Conception non sécurisée</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>A04 - Conception non sécurisée</h1>
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
        <h2>Exemples de conception non sécurisée</h2>
        <ul>
            <li>Questions secrètes pour la récupération d'identifiants : Interdites par les standards de sécurité, elles ne garantissent pas l'identité.</li>
            <li>Pas de redemande de mot de passe pour des actions sensibles : Ne pas redemander de mot de passe ou d'identification pour des actions comme un changement d'email ou de mot de passe.</li>
            <li>Pas de protection contre des attaques sur l'authentification : Pas de blocage après un nombre excessif de tentatives de connexion.</li>
            <li>Fonctionnalité mot de passe oublié non sécurisée : La fonctionnalité de mot de passe oublié peut permettre l'énumération des utilisateurs et ne met pas en place de contrôles d'identification suffisamment robustes.</li>
            <li> <b> Exemple : </b>  <a href="bad_login.php">Récupération de mot de Passe</a></li>
        </ul>
    </div>
    </div>
</body>
</html>
