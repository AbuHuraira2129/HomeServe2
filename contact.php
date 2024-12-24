<?php
require 'db.php'; // Include your database connection

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Insert data into the database
    $stmt = $conn->prepare("INSERT INTO contact_form (name, email, subject, message) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $email, $subject, $message]);

    // Check if the insert was successful
    if ($stmt) {
        $feedbackMessage = "Your message has been submitted successfully!";
        $messageClass = "success";
    } else {
        $feedbackMessage = "There was an error submitting your message. Please try again.";
        $messageClass = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'includes/header.php'; ?>

    <h2 class="contactH2">Contact Us</h2>

    <form class="contactus-form" method="POST">
        <?php if (isset($feedbackMessage)) : ?>
        <div class="message <?= $messageClass ?>"><?= $feedbackMessage ?></div>
        <?php endif; ?>

        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button type="submit">Submit</button>
    </form>
    <?php include 'includes/footer.php'; ?>
</body>

</html>