<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Success</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        padding: 0;
    }

    .container {
        width: 80%;
        margin: 50px auto;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #4CAF50;
    }

    p {
        text-align: center;
        font-size: 1.2em;
        color: #555;
    }

    .btn {
        display: block;
        width: 200px;
        margin: 20px auto;
        padding: 10px;
        text-align: center;
        background-color: #4CAF50;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 1.1em;
    }

    .btn:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <?php include 'C:\xampp\htdocs\HomeServe\includes\header.php'; ?>

    <div class="container">
        <h1>Booking Successful!</h1>
        <p>Your booking has been confirmed. We look forward to serving you.</p>
        <a href="/HomeServe/" class="btn btn-primary">Return to Homepage</a>
    </div>
    <?php
require 'C:\xampp\htdocs\HomeServe\includes\footer.php'; // Include the footer
?>
</body>

</html>