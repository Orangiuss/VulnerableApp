<?php
// PHP Script to change password
session_start();

// Check if the user is logged in, if not then redirect him to login page
// if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
//     header("location: login.php");
//     exit;
// }

// Include config file
echo "This is ChangePassword.php";

function password_hash($password, $algo, $options) {
    return password_hash($password, $algo, $options);
}

// Si il y a le paramètre "password" dans l'url
if(isset($_GET['password'])) {
    // On récupère le mot de passe
    $password = $_GET['password'];
    // On le hash
    $password = password_hash($password, PASSWORD_DEFAULT);
    // On le stocke dans la session
    $_SESSION['password'] = $password;
    // On redirige vers la page de profil
    header('Location: profil.php');
    exit();
}