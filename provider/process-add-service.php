<?php
require 'C:\xampp\htdocs\HomeServe\db.php'; // Database connection

session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Get form data
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$category = $_POST['category'];
$provider_id = $_SESSION['user']['id']; // The provider's ID from the session
$image_url = null; // Default value if no image is uploaded

// Handle image upload
if (isset($_FILES['service_image']) && $_FILES['service_image']['error'] === UPLOAD_ERR_OK) {
    $image_tmp_name = $_FILES['service_image']['tmp_name'];
    $image_name = basename($_FILES['service_image']['name']);
    $image_path = 'uploads/' . $image_name;

    if (move_uploaded_file($image_tmp_name, $image_path)) {
        $image_url = $image_path; // Set the image path
    }
}

$query = "INSERT INTO services (provider_id, title, description, price, category, image_url, created_at) 
          VALUES (:provider_id, :title, :description, :price, :category, :image_url, NOW())";
$stmt = $conn->prepare($query);

$stmt->bindValue(':provider_id', $provider_id, PDO::PARAM_INT);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':description', $description, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':category', $category, PDO::PARAM_STR);
$stmt->bindValue(':image_url', $image_url, PDO::PARAM_STR);

if ($stmt->execute()) {
    header('Location: services.php');
    exit;
} else {
    echo "Error: " . $stmt->errorInfo()[2]; 
}

$stmt->closeCursor();
?>