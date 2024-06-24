<?php
include 'db.php';

if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];
    // Vulnérabilité XSS
    echo "Comment submitted: " . $comment;
}
?>
