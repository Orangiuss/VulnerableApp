<?php
session_start();
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>A02 - Défaillances cryptographiques</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <header>
        <h1>A02 - Défaillances cryptographiques</h1>
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
        <h2>Défaillances cryptographiques</h2>
        <!-- Exemples de défaillances cryptographiques -->
        <?php
        function weakHash($password) {
            return md5($password); // Utilisation de md5, qui est une méthode de hachage faible
        }
        ?>
<p>Base64 : YWRtaW46VnVsbkFwcHtCQTVlNjRfMTVfTm90X3NlQ1VSMy4uLn0=</p>
<p>NTLM : F8F07F198A71F8F974EF0A23C25FFBBC</p>
<p>MD5 : 41eb9128c6834194cfc7cf89893e6d92</p>
<p>SHA1 : 0935ea842b85bf3fc4c1ee22e1ae7c1fbac53e8c </p>
<!-- <p>SHA256 : 9258eb999b4cce51bb007f736ef268076ab4d628e3ffc16931365e790bfe29d1 </p>
<p>SHA512 : a78c042fdcb1298c04006cac67a4cafcf969f5c6b44e3209ba19b09a34df616a0b0af27a67ae2b52b5a01e2ab4a02deb33f8d081258d0fd63adbe5caef4a29ca </p> -->
<p> JWT avec un secret faible : eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdWIiOiJKV1QtSVMtU0VDVVJFIiwibmFtZSI6IkpvaG4gRGlmZm9sIiwiaWF0IjoxNTE2MjM5MDIyLCJhcnRlZmFjdCI6IkluY2FsIiwiZW1haWwiOiJzZWNyZXQtZmJpQHlhaG9vLm1lIiwicGFzc3dvcmQiOiIyMzY1MDQ3NDA3YTYxNzUzZTQ2N2M5NzliZGYyMTllZmI5ZGQzYzljIn0.jIXUEj_vUqid6iaPOgVNgdu07yTOmg0iE8MeNcqnSlo </p>
<!-- https://github.com/wallarm/jwt-secrets.git Lien -->
<a href="https://github.com/wallarm/jwt-secrets.git">Wordlist secret JWT</a>
    </br>
</div>
</div>
</body>
</html>
