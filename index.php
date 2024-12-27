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

    <section class="categories">
        <div class="container3">
            <h2>Featured Categories</h2>
            <div class="category-list">
                <div class="category-item">
                    <img src="assets/images/Plumbers.png" alt="Plumbers">
                    <h3>Plumbers</h3>
                </div>
                <div class="category-item">
                    <img src="assets/images/electrician.png" alt="Electricians">
                    <h3>Electricians</h3>
                </div>
                <div class="category-item">
                    <img src="assets/images/Barbers.png" alt="Barbers">
                    <h3>Barbers</h3>
                </div>
                <div class="category-item">
                    <img src="assets/images/Cleaning Services.png" alt="Cleaning">
                    <h3>Cleaning</h3>
                </div>
            </div>
        </div>
    </section>


    <div class="services">
        <h2>Explore Services</h2>

        <div class="container3">
            <?php if (empty($services)) : ?>
            <p>You haven't added any services yet. <a href="add-service.php">Add a Service</a></p>
            <?php else : ?>
            <div class="service-list">
                <?php foreach ($services as $service) : ?>
                <div class="service-item">
                    <img src="./provider/<?= $service['image_url'] ?>" alt="Service Image">
                    <h3><?= $service['title'] ?></h3>
                    <p><?= $service['description'] ?></p>
                    <p><strong>Price:</strong> $<?= $service['price'] ?></p>
                    <p><strong>Category:</strong> <?= $service['category'] ?></p>
                    <p><strong>Created On:</strong> <?= $service['created_at'] ?></p>
                    <a href="/HomeServe/provider/service-detail.php?id=<?= $service['id'] ?>" class="btn">View
                        Details</a>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

    </div>

    <section class="about">
        <div class="container">
            <div class="about-content">
                <h2>About HomeServe</h2>
                <p>At HomeServe, we strive to connect you with reliable and trusted service providers for your home and
                    business needs.
                    Our goal is to make your life easier by providing quick access to the best services, tailored to
                    your requirements.</p>
            </div>
        </div>
    </section>

    <section class="testimonials">
        <div class="container">
            <h2>What Our Customers Say</h2>
            <div class="testimonial-list">
                <div class="testimonial-item">
                    <p>"HomeServe helped me find a reliable plumber in no time. Excellent service and highly
                        recommended!"</p>
                    <strong>- Sarah Johnson</strong>
                </div>
                <div class="testimonial-item">
                    <p>"The landscaping services I booked through HomeServe were top-notch. My garden has never looked
                        better!"</p>
                    <strong>- Michael Lee</strong>
                </div>
            </div>
        </div>
    </section>

    <section class="cta">
        <div class="cta-container">
            <h2>Join as a Service Provider!</h2>
            <p>Join the army of service providers and connect with your customers today.</p>
            <a href="/HomeServe/register.php" class="btn btn-primary">Get Started</a>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>
</body>

</html>