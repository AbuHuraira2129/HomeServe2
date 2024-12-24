<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /HomeServe/login.php');
    exit();
}
?>