<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>XML Parser - XXE Vulnérabilité</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>XML Parser</h1>
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
        <h3>XML Parser</h3>
            <p>Soumettre des données XML :</p>
            <form action="xxe_vulnerable.php" method="post">
                <textarea id="xmldata" name="xmldata" rows="10" cols="50"><!--?xml version="1.0" ?-->
<userInfo>
 <firstName>John</firstName>
 <lastName>Doe</lastName>
</userInfo>
</textarea><br>
                <button type="submit">Soumettre</button>
            </form>
            <br>
            <p> Aide : <a href="https://github.com/payloadbox/xxe-injection-payload-list"> XXE Payloads</a></p>
            <?php
            if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['xmldata'])) {
                libxml_disable_entity_loader(false);
                $xmlContent = $_POST['xmldata'];

                // Parse and process the XML
                $dom = new DOMDocument();
                $dom->loadXML($xmlContent, LIBXML_NOENT | LIBXML_DTDLOAD);

                // Extract data from the XML
                $xml = simplexml_import_dom($dom);

                $firstName = (string)$xml->firstName;
                $lastName = (string)$xml->lastName;

                echo "<h2>Résultat des données XML :</h2>";
                echo "<p>Nom complet : " . htmlspecialchars($firstName) . " " . htmlspecialchars($lastName) . "</p>";
            }
            ?>
    </div>
    </div>
</body>
</html>