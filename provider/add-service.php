<?php
require 'C:\xampp\htdocs\HomeServe\db.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: HomeServe/login.php');
    exit;
}

// Get the provider's ID from the session
$provider_id = $_SESSION['user']['id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Service</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'C:\xampp\htdocs\HomeServe\includes\header.php'; ?>

    <main>
        <section class="add-service">
            <div class="container3">
                <h1>Add Your Service</h1>
                <form action="process-add-service.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Service Title</label>
                        <input type="text" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Service Description</label>
                        <textarea id="description" name="description" rows="5" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price (in USD)</label>
                        <input type="number" id="price" name="price" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select id="category" name="category" required>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Electrical">Electrical</option>
                            <option value="Cleaning">Cleaning</option>
                            <option value="Carpentry">Carpentry</option>
                            <!-- Add more categories as needed -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="service_image">Service Image</label>
                        <input type="file" id="service_image" name="service_image">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Service</button>
                </form>
            </div>
        </section>
    </main>

    <script src="assets/js/script.js"></script>
</body>

</html>