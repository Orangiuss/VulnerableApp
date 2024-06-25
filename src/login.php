<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exemple A07 - SAP Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
        <h1>Exemple A07 - SAP Connexion</h1>
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
            <h2>SAP Connexion</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="form-group">
                    <label for="username">Nom d'utilisateur :</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe :</label>
                    <input type="text" id="password" name="password" required>
                </div>
                <button type="submit" name="login">Se connecter</button>
            </form>
            <?php
            // Vérification des informations de connexion
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $username = $_POST['username'];
                $password = $_POST['password'];

                // Simulation de données utilisateur pour l'exemple
                $valid_username = 'SOLMAN_ADMIN';
                $valid_password = '1qaz2wsx';
                if ($username === $valid_username) {
                    if ($password === $valid_password) {
                        echo '<p class="success">Connexion réussie ! Bienvenue, ' . $username . '. Flag : VulnApp{4UTheNtifiCaT!ON_is_IMp0Rt4NT}</p>';
                    } else {
                        echo '<p class="error">Mot de passe incorrect. Veuillez réessayer.</p>';
                    }
                }
                else {
                    echo '<p class="error">Nom d\'utilisateur incorrect. Veuillez réessayer.</p>';
                }
            }
            ?>
        </div>
    </div>
</body>
</html>
