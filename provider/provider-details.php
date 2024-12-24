<?php
require 'C:\xampp\htdocs\HomeServe\includes\header.php'; // Include the header

// Static data for the selected provider
$provider_id = $_GET['id'];

// Static data for providers
$providers = [
    1 => [
        'name' => 'John Doe',
        'profile_image' => 'path/to/john-image.jpg',
        'description' => 'John Doe has over 10 years of experience in plumbing. He offers a wide range of plumbing services from installation to repairs. He ensures that every job is done with the utmost professionalism and efficiency.',
        'services' => [
            [
                'title' => 'Pipe Repair',
                'description' => 'Fixing broken or leaking pipes in your home or office.',
                'price' => 150,
                'category' => 'Plumbing'
            ],
            [
                'title' => 'Faucet Installation',
                'description' => 'Installing high-quality faucets in kitchens and bathrooms.',
                'price' => 80,
                'category' => 'Plumbing'
            ]
        ]
    ],
    2 => [
        'name' => 'Jane Smith',
        'profile_image' => 'path/to/jane-image.jpg',
        'description' => 'Jane Smith is a professional electrician with years of experience in residential and commercial electrical systems. Whether you need wiring installation, lighting, or troubleshooting, Jane is here to help.',
        'services' => [
            [
                'title' => 'Wiring Installation',
                'description' => 'Complete electrical wiring installation for homes or offices.',
                'price' => 300,
                'category' => 'Electrical'
            ],
            [
                'title' => 'Light Fixture Installation',
                'description' => 'Installing and upgrading lighting systems.',
                'price' => 120,
                'category' => 'Electrical'
            ]
        ]
    ]
];

// Get the provider details for the selected provider
$provider = $providers[$provider_id];
?>

<main>
    <section class="provider-details">
        <div class="container3">
            <h1>Provider Profile: <?= $provider['name'] ?></h1>

            <div class="provider-info">
                <img src="<?= $provider['profile_image'] ?>" alt="<?= $provider['name'] ?>'s image"
                    class="provider-profile-img">
                <div class="provider-description">
                    <h2>About <?= $provider['name'] ?></h2>
                    <p><?= $provider['description'] ?></p>
                </div>
            </div>

            <h2>Services Offered</h2>
            <div class="services-list">
                <?php if (empty($provider['services'])): ?>
                <p>This provider has not added any services yet.</p>
                <?php else: ?>
                <?php foreach ($provider['services'] as $service): ?>
                <div class="service-card">
                    <h3><?= $service['title'] ?></h3>
                    <p><?= $service['description'] ?></p>
                    <p><strong>Price:</strong> $<?= $service['price'] ?></p>
                    <p><strong>Category:</strong> <?= $service['category'] ?></p>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </section>
</main>

<?php
require 'C:\xampp\htdocs\HomeServe\includes\footer.php'; // Include the footer
?>