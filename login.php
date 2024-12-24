<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user;
        header('Location: index.php');
        exit;
    } else {
        echo "Invalid credentials!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <script>
    function validateForm() {
        let email = document.getElementById('email').value;
        let password = document.getElementById('password').value;
        let emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if (!email || !emailRegex.test(email)) {
            alert('Please enter a valid email address.');
            return false;
        }

        if (!password) {
            alert('Please enter your password.');
            return false;
        }

        return true;
    }
    </script>
</head>

<body>
    <?php include 'includes/header.php'; ?>
    <div class="login-container">
        <form method="POST" onsubmit="return validateForm()">
            <h2 class="loginH2">Login</h2>
            <input type="email" id="email" name="email" placeholder="Email" required>
            <input type="password" id="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p class="signup-link">Don't have an account? <a href="signup.php">Sign up</a></p>
        </form>
    </div>
</body>

</html>