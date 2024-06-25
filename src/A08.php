<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A08 - Manque d'intégrité des données et du logiciel</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>A08 - Manque d'intégrité des données et du logiciel</h1>
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
            <p>
                Les échecs d'intégrité des logiciels et des données concernent le code et l'infrastructure qui ne protègent pas contre les violations d'intégrité. 
                Par exemple, une application qui dépend de plugins, de bibliothèques ou de modules provenant de sources non fiables, de dépôts et de réseaux de distribution de contenu (CDN) est vulnérable. 
                Une pipeline CI/CD non sécurisée peut introduire des risques d'accès non autorisé, de code malveillant ou de compromission du système.
            </p>
            <h3>Exemple : Utilisation incorrecte de jQuery sans vérification d'intégrité</h3>
            <p>
                Supposons que vous avez un site web qui utilise des bibliothèques tierces stockées sur des serveurs externes hors de votre contrôle. Bien que cela puisse sembler étrange, c'est en fait une pratique assez courante. 
                Prenons par exemple jQuery, une bibliothèque JavaScript couramment utilisée. Si vous le souhaitez, vous pouvez inclure jQuery dans votre site web directement depuis leurs serveurs sans le télécharger en incluant la ligne suivante dans le code HTML de votre site web :
            </p>
            <pre><code>&lt;script src="https://code.jquery.com/jquery-3.6.1.min.js"&gt;&lt;/script&gt;</code></pre>
            <p>
                Lorsqu'un utilisateur navigue sur votre site web, son navigateur lira le code HTML et téléchargera jQuery depuis la source externe spécifiée.
            </p>
            <h3>JS sans vérification d'intégrité</h3>
            <p>
                Le problème est que si un attaquant parvient à pirater le dépôt officiel de jQuery, il pourrait modifier le contenu de <a href="https://code.jquery.com/jquery-3.6.1.min.js">https://code.jquery.com/jquery-3.6.1.min.js</a> pour injecter du code malveillant. 
                En conséquence, toute personne visitant votre site web récupérerait maintenant le code malveillant et l'exécuterait dans son navigateur à son insu. 
                C'est une défaillance d'intégrité logicielle car votre site web ne vérifie pas la bibliothèque tierce pour voir si elle a été modifiée. 
                Les navigateurs modernes vous permettent de spécifier un hash avec l'URL de la bibliothèque afin que le code de la bibliothèque ne soit exécuté que si le hash du fichier téléchargé correspond à la valeur attendue. Ce mécanisme de sécurité est appelé Intégrité des sous-ressources (SRI), et vous pouvez en savoir plus à ce sujet <a href="https://developer.mozilla.org/fr/docs/Web/Security/Subresource_Integrity">ici</a>.
            </p>
            <p>
                La bonne façon d'insérer la bibliothèque dans votre code HTML serait d'utiliser SRI et d'inclure un hash d'intégrité afin que si un attaquant parvient à modifier la bibliothèque, tout client naviguant sur votre site web n'exécutera pas la version modifiée. Voici à quoi cela devrait ressembler en HTML :
            </p>
            <pre><code>&lt;script src="https://code.jquery.com/jquery-3.6.1.min.js" <br> integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"&gt;&lt;/script&gt;</code></pre>
            <p>Vous pouvez aller sur <a href="https://www.srihash.org/">https://www.srihash.org/</a> pour générer des hash pour n'importe quelle bibliothèque si nécessaire.</p>
        
            <h3>Question :</h3>
            <p>Quel est le hash SHA-256 de <a href="https://code.jquery.com/jquery-1.12.4.min.js">https://code.jquery.com/jquery-1.12.4.min.js</a> ?</p>
            <form method="POST" action="">
                <input type="text" name="hash" placeholder="Entrez le hash SHA-256">
                <input type="submit" value="Soumettre">
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $userHash = $_POST['hash'];
                $correctHash = 'sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=';
                if ($userHash === $correctHash) {
                    echo "<p>Félicitations ! Voici le flag : VulnApp{DON7_0VeRLo0K_inTegR!tY}</p>";
                } else {
                    echo "<p>Le hash est incorrect. Veuillez réessayer.</p>";
                }
            }
            ?>
        </div>
    </div>
</body>
</html>