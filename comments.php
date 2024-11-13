<?php
session_start();
$conn = new mysqli('localhost', 'Web', 'goodpassword', 'vulnerable_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['comment'])) {
    $comment = $_POST['comment'];

    // Vulnérabilité XSS : aucune validation d'entrée
    echo "Your comment: " . $comment;
}
?>
