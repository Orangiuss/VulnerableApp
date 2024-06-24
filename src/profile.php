<?php
// Exemple de données utilisateur (id => nom)
$users = [
    "6384e2b2184bcbf58eccf10ca7a6563c" => 'Alice',
    "9f9d51bc70ef21ca5c14f307980a29d8" => 'Bob',
    "bf779e0933a882808585d19455cd7937" => 'Charlie',
    "20541eeb668da7d30c80c56f00726f07" => 'admin_78'
];

// Récupération de l'ID de l'utilisateur depuis l'URL
if (isset($_GET['id'])) {
    $userId = $_GET['id'];
    
    // Vérifier si l'utilisateur existe dans notre liste
    if (array_key_exists($userId, $users)) {
        $username = $users[$userId];
    } else {
        // Redirection vers une page d'erreur si l'utilisateur n'existe pas
        header('Location: error.php');
        exit;
    }
} else {
    // Redirection vers une page d'erreur si l'ID n'est pas spécifié
    header('Location: error.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur - IDOR Vulnérabilité</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>Profil Utilisateur</h1>
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
        <h2>Bienvenue sur le profil de <?php echo htmlspecialchars($username); ?></h2>
        <p>Ici, vous pouvez voir les informations confidentielles de l'utilisateur <?php echo htmlspecialchars($username); ?>.</p>
        <!-- Si c'est l'administrateur admin_78 alors affiche le panneau de commande-->
        <?php
        if ($username === 'admin_78') {
            echo "<p>Vous avez trouvé l'administrateur, flag : VulnApp{iD0r_C@n_B3_CRit1K}</p>";
        }
        ?>
        <p>Cette page est vulnérable à une Insecure Direct Object Reference (IDOR) car l'ID utilisateur est directement accessible via l'URL sans vérification d'autorisation.</p>
    </div>
    </div>
</body>
</html>
