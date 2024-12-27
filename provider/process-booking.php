<?php
require 'C:\xampp\htdocs\HomeServe\db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_id = $_POST['service_id'];
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $preferred_date = $_POST['preferred_date'];
    $additional_info = $_POST['additional_info'];

    $query = "INSERT INTO bookings (service_id, full_name, email, phone, address, preferred_date, additional_info) 
              VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->execute([$service_id, $full_name, $email, $phone, $address, $preferred_date, $additional_info]);

    header('Location: booking-success.php');
    exit;
} else {
    die("Invalid request.");
}
?>