<?php
session_start();
$conn = new mysqli('localhost', 'Web', 'goodpassword', 'vulnerable_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Injection SQL (faible, vulnérable)
    $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $username;
        echo "Welcome, " . htmlspecialchars($username);
    } else {
        echo "Invalid login!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vulnerable App</title>
</head>
<body>
    <h1>Login Page</h1>
    <form method="POST" action="index.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password"><br>
        <button type="submit" name="login">Login</button>
    </form>

    <h2>Post a Comment (XSS Demo)</h2>
    <form method="POST" action="comments.php">
        <label for="comment">Your Comment:</label><br>
        <textarea id="comment" name="comment"></textarea><br>
        <input type="submit" value="Post Comment">
    </form>
</body>
</html>
