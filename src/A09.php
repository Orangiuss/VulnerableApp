<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>A09 - Carence des systèmes de contrôle et de journalisation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>A09 - Carence des systèmes de contrôle et de journalisation</h1>
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
            <h2>Carence des systèmes de contrôle et de journalisation</h2>
            <p>Les défauts dans la journalisation et la surveillance des activités système peuvent compromettre la détection et la réponse aux incidents de sécurité. Cette catégorie inclut une variété de failles difficiles à tester et est très reliée aux métiers du SOC, de surveillance de logs, etc.</p>
            
            <h3>Exemples de carences :</h3>
            <ul>
                <li>Les événements auditables, tels que les connexions, les échecs de connexion et les transactions de grande valeur, ne sont pas enregistrés.</li>
                <li>Les avertissements et les erreurs ne génèrent pas de messages de journalisation, ou ces messages sont inadéquats ou peu clairs.</li>
                <li>Les journaux des applications et des API ne sont pas surveillés pour détecter une activité suspecte.</li>
                <li>Les tests d'intrusion et les scans effectués par des outils de test de sécurité des applications ne déclenchent pas d'alertes ou il n'y a pas d'outils.</li>
                <li>L'application ne peut pas détecter ou alerter en cas d'attaques actives en temps réel.</li>
            </ul>

            <h3>Question :</h3>
            <p>Quelle est l'adresse IP d'un attaquant potentiel avec ce fichier de log : <a href="login-logs_159.txt">logs.txt</a> ?</p>
            <form method="POST" action="">
                <input type="text" name="hash" placeholder="Entrez l'adresse IP">
                <input type="submit" value="Soumettre">
            </form>

            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $userHash = $_POST['hash'];
                $correctHash = '49.99.13.16';
                if ($userHash === $correctHash) {
                    echo "<p>Félicitations ! Voici le flag : VulnApp{lOGS_arE_1ife}</p>";
                } else {
                    echo "<p>L'adresse IP est incorrecte. Veuillez réessayer.</p>";
                }
            }
            ?>

        </div>
    </div>
</body>
</html>