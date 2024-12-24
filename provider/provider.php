<?php
require 'C:\xampp\htdocs\HomeServe\includes\header.php'; // Include the header

// Static data for providers
$providers = [
    [
        'id' => 1,
        'name' => 'John Doe',
        'profile_image' => 'https://th.bing.com/th/id/OIP.fGzCnLqkdQNgHKwX8TsAwwHaE7?rs=1&pid=ImgDetMain',
        'short_description' => 'Experienced plumber offering quality services.',
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
    [
        'id' => 2,
        'name' => 'Jane Smith',
        'profile_image' => 'https://th.bing.com/th/id/OIP.fGzCnLqkdQNgHKwX8TsAwwHaE7?rs=1&pid=ImgDetMain',
        'short_description' => 'Reliable electrician with 5+ years of experience.',
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
?>

<main>
    <section class="providers">
        <div class="container">
            <h1>Our Providers</h1>
            <p>Explore the trusted providers and their services.</p>

            <div class="provider-list">
                <?php foreach ($providers as $provider): ?>
                <div class="provider-card">
                    <img src="<?= $provider['profile_image'] ?>" alt="<?= $provider['name'] ?>'s image"
                        class="provider-image">
                    <h2><?= $provider['name'] ?></h2>
                    <p><?= $provider['short_description'] ?></p>
                    <a href="provider-details.php?id=<?= $provider['id'] ?>" class="btn">View Profile</a>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<?php
require 'C:\xampp\htdocs\HomeServe\includes\footer.php'; // Include the footer
?>