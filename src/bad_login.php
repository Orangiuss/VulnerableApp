</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exemple A04 - Conception non sécurisée</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Exemple A04 - Conception non sécurisée</h1>
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
        <h2>Récupération de mot de passe</h2>
        <form method="post" action="bad_login.php">
            <label for="username">Nom d'utilisateur</label>
            <input type="text" id="username" name="username" required>

            <label for="security_question">Question de sécurité :</label>
            <select id="security_question" name="security_question" required>
                <option value="">Sélectionnez une question de sécurité</option>
                <option value="1">Quel est le nom de jeune fille de votre mère ?</option>
                <option value="2">Quel est le nom de votre animal de compagnie ?</option>
                <option value="3">Quel est votre lieu de naissance ?</option>
            </select>
            <input type="text" id="security_question2" name="security_question2" required>
            
            <button type="submit">Envoyer</button>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $security_question = $_POST['security_question'];
            $securityAnswer = $_POST['security_question2'];

            // Exemple de validation de réponse à la question de sécurité (à remplacer par la logique réelle)
            if ($username === 'administrateur') {
                if ($security_question === "1") {
                    if ($securityAnswer === "Smith" || $securityAnswer === "smith" || $securityAnswer === "SMITH") {
                        echo "<p class='success'>Vous avez récupéré l'accès au compte de $username. Flag : VulnApp{Oh_n0_1N5EcURE_D3s!6N}</p>";
                    } else {
                        echo "<p class='error'>La réponse à la question de sécurité est incorrecte.</p>";
                    }
                } elseif ($security_question === "2") {
                    if ($securityAnswer === "Fluffy" || $securityAnswer === "fluffy" || $securityAnswer === "FLUFFY") {
                        echo "<p class='success'>Vous avez récupéré l'accès au compte de $username. Flag : VulnApp{Oh_n0_1N5EcURE_D3s!6N}</p>";
                    } else {
                        echo "<p class='error'>La réponse à la question de sécurité est incorrecte.</p>";
                    }
                } elseif ($security_question === "3") {
                    if ($securityAnswer === "Paris" || $securityAnswer === "paris" || $securityAnswer === "PARIS") {
                        echo "<p class='success'>Vous avez récupéré l'accès au compte de $username. Flag : VulnApp{Oh_n0_1N5EcURE_D3s!6N}</p>";
                    } else {
                        echo "<p class='error'>La réponse à la question de sécurité est incorrecte.</p>";
                    }
                } else {
                    echo "<p class='error'>Question de sécurité invalide. $security_question</p>";
                }
            } else {
                echo "<p class='error'>Nom d'utilisateur inconnu.</p>";
            }
        }
        ?>
    </div>
    </div>
</body>
</html>
