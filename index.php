<?php
session_start();
require 'db.php';

$query = "SELECT * FROM services ORDER BY created_at DESC LIMIT 8";
$stmt = $conn->prepare($query);
$stmt->execute();
$services = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>HomeServe - Home</title>
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <section class="hero">
        <div class="hero-container">
            <div class="hero-text">
                <h1>Find the Best Services<br><span>For Your Home and Business</span></h1>
                <p>HomeServe connects you with trusted service providers for all your needs. From plumbing to
                    landscaping, we've got you covered!</p>
                <a href="/HomeServe/provider/services.php" class="btn btn-primary">Explore Services</a>
            </div>
            <div class="hero-image">
                <img src="https://th.bing.com/th/id/OIP.8ejTJRIq9sQsHK29AogTogHaE8?rs=1&pid=ImgDetMain"
                    alt="Hero Image">
            </div>
        </div>
    </section>
    <div class="services">
        <h2>Explore Services</h2>

        <div class="service-list">
            <?php foreach ($services as $service) : ?>
            <div class="service-item">
                <img src="./provider/<?= $service['image_url']; ?>" alt="Service Image">
                <h3><?= $service['title'] ?></h3>
                <p><?= $service['description'] ?></p>
                <p><strong>Price:</strong> $<?= $service['price'] ?></p>
                <p><strong>Category:</strong> <?= $service['category'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>

    </div>

    <?php include 'includes/footer.php'; ?>
</body>

</html>