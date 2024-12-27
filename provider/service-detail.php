<?php
require 'C:\xampp\htdocs\HomeServe\db.php';
session_start();

if (!isset($_GET['id'])) {
    die("Service ID is missing.");
}

$service_id = $_GET['id'];

// Fetch the specific service details
$query = "SELECT * FROM services WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->execute([$service_id]);
$service = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$service) {
    die("Service not found.");
}

// Fetch other relevant services (excluding the current one)
$relevant_query = "SELECT * FROM services WHERE id != ? ORDER BY created_at DESC LIMIT 4";
$relevant_stmt = $conn->prepare($relevant_query);
$relevant_stmt->execute([$service_id]);
$relevant_services = $relevant_stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $service['title'] ?></title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>

<body>
    <?php include 'C:\xampp\htdocs\HomeServe\includes\header.php'; ?>

    <main>
        <section class="service-detail">
            <div class="container3">
                <div class="service-info">
                    <div class="service-image-detail">
                        <img src="<?= $service['image_url'] ?>" alt="Service Image">
                    </div>
                    <div class="service-details">
                        <h1><?= $service['title'] ?></h1>
                        <p><?= $service['description'] ?></p>
                        <p><strong>Price:</strong> $<?= $service['price'] ?></p>
                        <p><strong>Category:</strong> <?= $service['category'] ?></p>
                        <p><strong>Created On:</strong> <?= date('F j, Y', strtotime($service['created_at'])) ?></p>
                        <button class="btn btn-primary" id="bookNowBtn">Book Now</button>
                    </div>
                </div>
                <a href="services.php" class="btn">Back to Services</a>
            </div>
        </section>

        <section class="relevant-services">
            <div class="container3">
                <h2>Relevant Services</h2>
                <div class="service-list">
                    <?php foreach ($relevant_services as $rel_service) : ?>
                    <div class="service-item">
                        <img src="<?= $rel_service['image_url'] ?>" alt="Service Image">
                        <h3><?= $rel_service['title'] ?></h3>
                        <p><?= substr($rel_service['description'], 0, 100) ?>...</p>
                        <a href="service-detail.php?id=<?= $rel_service['id'] ?>" class="btn">View Details</a>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
    </main>

    <!-- Booking Popup-->
    <div id="bookingFormModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" id="closeModal">&times;</span>
            <h2>Book Service: <?= $service['title'] ?></h2>
            <form action="process-booking.php" method="POST" novalidate>
                <input type="hidden" name="service_id" value="<?= $service['id'] ?>">

                <div class="popup-form-fields">
                    <div class="form-group">
                        <label for="full_name">Full Name:</label>
                        <input type="text" name="full_name" id="full_name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address:</label>
                        <input type="email" name="email" id="email" required>
                    </div>
                </div>

                <div class="popup-form-fields">
                    <div class="form-group">
                        <label for="phone">Phone Number:</label>
                        <input type="tel" name="phone" id="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address:</label>
                        <input type="text" name=" address" id="address" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="preferred_date">Preferred Date:</label>
                    <input type="date" name="preferred_date" id="preferred_date" required>
                </div>
                <div class="form-group">
                    <label for="additional_info">Additional Information:</label>
                    <textarea name="additional_info" id="additional_info" rows="4"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit Booking</button>
                </div>
            </form>
        </div>
    </div>


    <script>
    document.querySelector('form').addEventListener('submit', function(event) {
        // Get form values
        const fullName = document.getElementById('full_name').value.trim();
        const email = document.getElementById('email').value.trim();
        const phone = document.getElementById('phone').value.trim();
        const address = document.getElementById('address').value.trim();
        const preferredDate = document.getElementById('preferred_date').value.trim();

        // Validation checks
        if (!fullName) {
            alert('Full Name is required.');
            event.preventDefault();
            return;
        }

        if (!email || !/\S+@\S+\.\S+/.test(email)) {
            alert('Please enter a valid email address.');
            event.preventDefault();
            return;
        }

        if (!phone || !/^\+?[0-9]{7,15}$/.test(phone)) {
            alert('Please enter a valid phone number.');
            event.preventDefault();
            return;
        }

        if (!address) {
            alert('Address is required.');
            event.preventDefault();
            return;
        }

        if (!preferredDate || new Date(preferredDate) < new Date()) {
            alert('Preferred Date must be a future date.');
            event.preventDefault();
            return;
        }
    });

    // Modal close functionality
    document.getElementById('closeModal').addEventListener('click', function() {
        document.getElementById('bookingFormModal').style.display = 'none';
    });

    const modal = document.getElementById('bookingFormModal');
    const bookNowBtn = document.getElementById('bookNowBtn');
    const closeModal = document.getElementById('closeModal');

    bookNowBtn.addEventListener('click', () => {
        modal.style.display = 'flex';
    });

    closeModal.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    window.addEventListener('click', (e) => {
        if (e.target === modal) {
            modal.style.display = 'none';
        }
    });
    </script>

</body>

</html>