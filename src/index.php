<?php
session_start();
include 'db.php';

// A01:2021 - Contrôles d'accès défaillants
function checkAccess() {
    if (!isset($_SESSION['user_id'])) {
        die("Access denied!");
    }
}

// A02:2021 - Défaillances cryptographiques
function weakHash($password) {
    return md5($password); // Utilisation de md5, qui est une méthode de hachage faible
}

// A03:2021 - Injection SQL
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['user_id'] = $result->fetch_assoc()['id'];
        echo "Logged in successfully!";
    } else {
        echo "Invalid credentials!";
    }
}

// A04:2021 - Conception non sécurisée
function getSecretQuestion() {
    return "What is your pet's name?"; // Question de sécurité non sécurisée
}

// A05:2021 - Mauvaise configuration de sécurité
ini_set('display_errors', 1);
error_reporting(E_ALL);

// A07:2021 - Identification et authentification de mauvaise qualité
function login($username, $password) {
    global $conn;
    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '" . weakHash($password) . "'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $_SESSION['user_id'] = $result->fetch_assoc()['id'];
        echo "Logged in successfully!";
    } else {
        echo "Invalid credentials!";
    }
}

// A10:2021 - SSRF (Falsification de requête côté serveur)
function fetchUrl($url) {
    $response = file_get_contents($url); // Vulnérabilité SSRF
    echo $response;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Vulnerable Application</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST">
        Username: <input type="text" name="username"><br>
        Password: <input type="password" name="password"><br>
        <input type="submit" name="login" value="Login">
    </form>

    <h1>Search User</h1>
    <form method="GET">
        Search: <input type="text" name="search"><br>
        <input type="submit" value="Search">
    </form>

    <?php
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $sql = "SELECT * FROM users WHERE username LIKE '%$search%'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Username: " . $row['username'] . "<br>";
            }
        } else {
            echo "No users found!";
        }
    }
    ?>

    <h1>Submit Comment</h1>
    <form method="POST" action="submit_comment.php">
        Comment: <input type="text" name="comment"><br>
        <input type="submit" value="Submit">
    </form>

    <?php
    if (isset($_GET['url'])) {
        $url = $_GET['url'];
        fetchUrl($url);
    }
    ?>
</body>
</html>
