<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "vulnerable_app";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
