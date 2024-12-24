<?php
require 'C:\xampp\htdocs\HomeServe\db.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Get service ID from URL
$service_id = $_GET['id'];
$provider_id = $_SESSION['user']['id'];

// Check if the service belongs to the logged-in provider
$query = "SELECT * FROM services WHERE id = :service_id AND provider_id = :provider_id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':service_id', $service_id, PDO::PARAM_INT);
$stmt->bindValue(':provider_id', $provider_id, PDO::PARAM_INT);
$stmt->execute();
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if ($service) {
    // Delete the service
    $delete_query = "DELETE FROM services WHERE id = :service_id";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->bindValue(':service_id', $service_id, PDO::PARAM_INT);
    if ($delete_stmt->execute()) {
        header('Location: provider-dashboard.php');
        exit;
    } else {
        echo "Error deleting service.";
    }
} else {
    echo "Service not found or you do not have permission to delete it.";
}
?>
``