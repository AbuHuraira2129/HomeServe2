<?php
require 'C:\xampp\htdocs\HomeServe\db.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Get service ID from the URL
$service_id = $_GET['id'];
$provider_id = $_SESSION['user']['id'];

// Fetch service data from the database
$query = "SELECT * FROM services WHERE id = :service_id AND provider_id = :provider_id";
$stmt = $conn->prepare($query);
$stmt->bindValue(':service_id', $service_id, PDO::PARAM_INT);
$stmt->bindValue(':provider_id', $provider_id, PDO::PARAM_INT);
$stmt->execute();
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$service) {
    echo "Service not found.";
    exit;
}

// Update the service data when the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

    // Image handling (optional)
    $image_url = $service['image_url'];
    if (isset($_FILES['service_image']) && $_FILES['service_image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['service_image']['tmp_name'];
        $image_name = basename($_FILES['service_image']['name']);
        $image_path = 'uploads/' . $image_name;

        if (move_uploaded_file($image_tmp_name, $image_path)) {
            $image_url = $image_path;
        }
    }

    // Update service in the database
    $update_query = "UPDATE services SET title = :title, description = :description, price = :price, category = :category, image_url = :image_url WHERE id = :service_id";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bindValue(':title', $title, PDO::PARAM_STR);
    $update_stmt->bindValue(':description', $description, PDO::PARAM_STR);
    $update_stmt->bindValue(':price', $price, PDO::PARAM_STR);
    $update_stmt->bindValue(':category', $category, PDO::PARAM_STR);
    $update_stmt->bindValue(':image_url', $image_url, PDO::PARAM_STR);
    $update_stmt->bindValue(':service_id', $service_id, PDO::PARAM_INT);

    if ($update_stmt->execute()) {
        header('Location: provider-dashboard.php');
        exit;
    } else {
        echo "Error updating service.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Service</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include 'C:\xampp\htdocs\HomeServe\includes\header.php'; ?>

    <main>
        <section class="edit-service">
            <div class="container3">
                <h1>Edit Service</h1>
                <form action="edit-service.php?id=<?= $service['id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" value="<?= $service['title'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea id="description" name="description" rows="5"
                            required><?= $service['description'] ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" value="<?= $service['price'] ?>" required
                            step="0.01">
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" id="category" name="category" value="<?= $service['category'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="service_image">Service Image</label>
                        <input type="file" id="service_image" name="service_image">
                    </div>
                    <button type="submit" class="btn-update">Update Service</button>
                </form>
            </div>
        </section>
    </main>
</body>

</html>