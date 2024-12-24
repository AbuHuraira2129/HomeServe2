<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $stmt = $conn->prepare("INSERT INTO users (username, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->execute([$username, $email, $password, $role]);

    header('Location: login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <div class="register-container">
        <form method="POST" class="register-form">
            <h2 class="registerH2">Create an Account</h2>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <select name="role" required>
                <option value="customer">Customer</option>
                <option value="provider">Service Provider</option>
            </select>
            <button type="submit">Register</button>
            <p class="login-link">Already have an account? <a href="login.php">Login here</a></p>
        </form>
    </div>
</body>

</html>