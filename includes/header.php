<link rel="stylesheet" href="../assets/css/style.css">

<header class="navbar">
    <div class="container1">
        <div onclick="window.location.href = '/HomeServe'" class="logo">
            <h2>HomeServe</h2>
        </div>
        <nav class="nav-links">
            <a href="/HomeServe/index.php">Home</a>
            <a href="/HomeServe/about-us.php">About Us</a>
            <a href="/HomeServe/provider/services.php">Services</a>
            <a href="/HomeServe/provider/provider.php">Providers</a>
            <a href="/HomeServe/contact.php">Contact</a>
            <a href="faq.php">FAQ</a>
        </nav>
        <div class="nav-buttons">
            <?php if (isset($_SESSION['user'])): ?>
            <a class="defaultBtn" href="/HomeServe/provider/provider-dashboard.php">Dashboard</a>
            <a class="OtherBtn" href="/HomeServe/logout.php">Logout</a>
            <?php else: ?>
            <a class="defaultBtn" href="/HomeServe/login.php">Login</a>
            <a class="OtherBtn" href="/HomeServe/register.php">Signup</a>
            <?php endif; ?>
        </div>
    </div>
</header>