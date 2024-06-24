<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A01 - Contrôles d'accès défaillants</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>A01 - Contrôles d'accès défaillants</h1>
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
            <p>Les contrôles d'accès incorrects permettent aux utilisateurs non autorisés d'accéder à des fonctions et des données. En moyenne, 3,81% des applications testées avaient une ou plusieurs Common Weakness Enumeration (CWEs) dans cette catégorie.</p>
            
            <h3>Exemples de contrôles d'accès défaillants :</h3>
            <ul>
                <li>Autoriser l'affichage ou la modification du compte de quelqu'un d'autre, en fournissant son identifiant unique (références directes d'objet non sécurisées) / Insecure Direct Object References (IDOR)</li>
                <li>Manipulation de métadonnées, comme le rejeu ou la falsification de JSON Web Token (JWT), de cookies ou de champs cachés, afin d'élever les privilèges ou abuser de l'invalidation JWT.</li>
                <li>Élévation de privilège. Agir en tant qu'utilisateur sans être connecté ou agir en tant qu'administrateur lorsqu'il est connecté en tant qu'utilisateur.</li>
                <!-- Ajoutez d'autres exemples si nécessaire -->
            </ul>
    </div>


    <div class="container">
        <h2>Sélectionner un utilisateur pour voir son profil :</h2>
        <ul>
            <li><a href="profile.php?id=6384e2b2184bcbf58eccf10ca7a6563c">Alice</a></li>
            <li><a href="profile.php?id=9f9d51bc70ef21ca5c14f307980a29d8">Bob</a></li>
            <li><a href="profile.php?id=bf779e0933a882808585d19455cd7937">Charlie</a></li>
            <!-- L'URL directe est utilisée ici sans vérification d'autorisation -->
        </ul>
        <p>Cette page est vulnérable à une faille de contrôle d'accès (A01) car elle permet à tout utilisateur de voir les profils d'autres utilisateurs sans vérification d'authentification ou d'autorisation.</p>
    </div>
    </div>
</body>
</html>
