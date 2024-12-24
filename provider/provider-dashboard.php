<?php
require 'C:\xampp\htdocs\HomeServe\db.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit;
}

// Get the provider's ID from the session
$provider_id = $_SESSION['user']['id'];

// Fetch services for this provider from the database
$query = "SELECT * FROM services WHERE provider_id = :provider_id ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->bindValue(':provider_id', $provider_id, PDO::PARAM_INT);
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Provider Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include 'C:\xampp\htdocs\HomeServe\includes\header.php'; ?>

    <main>
        <section class="dashboard">
            <div class="container">
                <h1>Welcome to Your Dashboard</h1>

                <div class="dashboard-actions">
                    <a href="add-service.php" class="btn btn-primary">Add New Service</a>
                </div>

                <h2>Your Services</h2>

                <?php if (empty($services)) : ?>
                <p>You haven't added any services yet. <a href="add-service.php">Add a Service</a></p>
                <?php else : ?>
                <div class="service-list">
                    <?php foreach ($services as $service) : ?>
                    <div class="service-item">
                        <img src="<?= $service['image_url'] ?>" alt="Service Image" class="service-image">
                        <h3><?= $service['title'] ?></h3>
                        <p><?= $service['description'] ?></p>
                        <p><strong>Price:</strong> $<?= $service['price'] ?></p>
                        <p><strong>Category:</strong> <?= $service['category'] ?></p>
                        <p><strong>Created On:</strong> <?= $service['created_at'] ?></p>

                        <div class="service-actions">
                            <a href="edit-service.php?id=<?= $service['id'] ?>" class="btn btn-secondary">Edit</a>
                            <a href="delete-service.php?id=<?= $service['id'] ?>" class="btn btn-danger"
                                onclick="return confirm('Are you sure you want to delete this service?');">Delete</a>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </section>
    </main>

    <script src="assets/js/script.js"></script>
</body>

</html>