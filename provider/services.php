<?php
require 'C:\xampp\htdocs\HomeServe\db.php';
session_start();

// Fetch services for this provider from the database
$query = "SELECT * FROM services ORDER BY created_at DESC";
$stmt = $conn->prepare($query);
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Services</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include 'C:\xampp\htdocs\HomeServe\includes\header.php'; ?>

    <main>
        <section class="services">
            <div class="container">
                <h1>Your Services</h1>

                <?php if (empty($services)) : ?>
                <p>You haven't added any services yet. <a href="add-service.php">Add a Service</a></p>
                <?php else : ?>
                <div class="service-list">
                    <?php foreach ($services as $service) : ?>
                    <div class="service-item">
                        <img src="<?= $service['image_url'] ?>" alt="Service Image">
                        <h3><?= $service['title'] ?></h3>
                        <p><?= $service['description'] ?></p>
                        <p><strong>Price:</strong> $<?= $service['price'] ?></p>
                        <p><strong>Category:</strong> <?= $service['category'] ?></p>
                        <p><strong>Created On:</strong> <?= $service['created_at'] ?></p>
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