<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <?php include 'includes/Header.php'; ?>
    <h2 class="faqH2">Frequently Asked Questions</h2>

    <div class="accordion-container">
        <div class="accordion">
            <button class="accordion-btn">What services do you offer?</button>
            <div class="accordion-content">
                <p>We offer a wide range of services including web development, UI/UX design, and digital marketing
                    solutions to enhance your business.</p>
            </div>
        </div>

        <div class="accordion">
            <button class="accordion-btn">How can I contact support?</button>
            <div class="accordion-content">
                <p>You can contact support via our <a href="contact.php">Contact Us</a> page or send an email to
                    support@homeserve.com.</p>
            </div>
        </div>

        <div class="accordion">
            <button class="accordion-btn">Do you provide free consultations?</button>
            <div class="accordion-content">
                <p>Yes, we offer free consultations to understand your business needs and how we can help you achieve
                    your goals.</p>
            </div>
        </div>

        <div class="accordion">
            <button class="accordion-btn">What is the turnaround time for a project?</button>
            <div class="accordion-content">
                <p>The turnaround time depends on the complexity of the project. We will provide a detailed timeline
                    after the initial consultation.</p>
            </div>
        </div>
    </div>

    <script>
    // JavaScript to handle the accordion functionality
    document.querySelectorAll('.accordion-btn').forEach((button) => {
        button.addEventListener('click', () => {
            // Toggle the 'active' class on the parent accordion container
            const accordion = button.parentElement;
            accordion.classList.toggle('active');

            // Close all other accordions
            document.querySelectorAll('.accordion').forEach((otherAccordion) => {
                if (otherAccordion !== accordion) {
                    otherAccordion.classList.remove('active');
                }
            });
        });
    });
    </script>
    <?php include 'includes/footer.php'; ?>
</body>

</html>