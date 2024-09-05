<?php

// Set a cookie with httpOnly flag
setcookie("JSESSIONID", "983F774D31AB5BE7lolilol21091665A", time() + 3600, "/", "", 0, 1);
setcookie("PHPSESSID", "f86294106c501411lolilol26018f39d9861e0", time() + 3600, "/");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>A03 - Injection</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>A03 - Injection</h1>
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
        <h2>Injection SQL et Injection XSS</h2>
        
        <!-- Injection SQL -->
        <h3>Exemple d'injection SQL</h3>
        <form action="" method="GET">
            <label for="username">Recherchez un utilisateur par nom :</label><br>
            <input type="text" id="username" name="username">
            <input type="submit" value="Rechercher">
        </form>

        <?php

        // Connexion à la base de données (exemple simple, pas sécurisé)
        $servername = "db";
        $username = "root";
        $password = "root";
        $dbname = "vulnerable_app";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Connexion échouée : " . $conn->connect_error);
        }

        // Traitement de la requête avec potentiellement une injection SQL
        if ($_SERVER["REQUEST_METHOD"] == "GET") {
            $search = $_GET['username'];
            $sql = "SELECT * FROM users WHERE username = '$search'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "<h4>Résultats de la recherche :</h4>";
                echo "<ul>";
                while($row = $result->fetch_assoc()) {
                    echo "<li>Nom d'utilisateur : " . htmlspecialchars($row["username"]) . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Aucun résultat trouvé pour cet utilisateur.</p>";
            }
        }

        $conn->close();
        ?>
        <br>
        <br>
        <!-- Injection XSS -->
        <h3>Exemple d'injection XSS</h3>
        <form action="" method="POST">
            <label for="comment">Laissez un commentaire :</label><br>
            <textarea id="comment" name="comment" rows="4" cols="50"></textarea><br>
            <input type="submit" value="Envoyer">
        </form>

        <?php
        // Traitement de la requête avec potentiellement une injection XSS
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $comment = $_POST['comment'];
            echo "<p>Votre commentaire : " . $comment . "</p>";
        }
        ?>

        <p>Cette page est vulnérable aux injections SQL et XSS. Assurez-vous de mettre en place des mesures de sécurité appropriées pour protéger votre application contre ces types d'attaques.</p>
    </div>
    </div>
</body>
</html>
