<?php
require '../db.php';
require '../includes/auth.php';

if ($_SESSION['user']['role'] != 'admin') {
    header('Location: ../index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Admin Dashboard</h1>
    <a href="manage_users.php">Manage Users</a>
</body>
</html>
