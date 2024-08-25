<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Build Your Future</title>
   <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f8f9fa;
}

header {
    background-color: #007bff;
    color: #fff;
    text-align: center;
    padding: 40px 0;
    margin-bottom: 40px;
}

h1 {
    margin: 0;
    font-size: 48px;
}

main {
    max-width: 800px;
    margin: 0 auto;
    padding: 0 20px;
}

.contact-info {
    background-color: #fff;
    border-radius: 8px;
    padding: 40px;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
}

.contact-info h2 {
    color: #007bff;
    font-size: 32px;
    margin-bottom: 30px;
}

.contact-info p {
    margin-bottom: 20px;
}

.contact-info label {
    font-weight: bold;
}

.contact-info input[type="text"],
.contact-info input[type="email"],
.contact-info textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.contact-info input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    cursor: pointer;
}

.contact-info input[type="submit"]:hover {
    background-color: #0056b3;
}
</style>
</head>
<body>
    <header>
        <h1>Contact Us</h1>
    </header>
    <main>
        <section class="contact-info">
            <h2>Get in Touch</h2>
            <p>If you have any questions or inquiries, feel free to reach out to us:</p>
            <form action="contact.php" method="post">
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br>
                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>
                <label for="message">Message:</label><br>
                <textarea id="message" name="message" rows="4" required></textarea><br>
                <input type="submit" value="Submit">
            </form>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $message = $_POST['message'];

                // Simple validation
                if (empty($name) || empty($email) || empty($message)) {
                    echo "<p>Please fill in all fields.</p>";
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    echo "<p>Invalid email format.</p>";
                } else {
                    // Send email (Replace 'your_email@example.com' with your actual email address)
                    $to = "your_email@example.com";
                    $subject = "New Message from Build Your Future Contact Form";
                    $body = "Name: $name\nEmail: $email\nMessage: $message";
                    $headers = "From: $email";

                    if (mail($to, $subject, $body, $headers)) {
                        echo "<p>Message sent successfully! We'll get back to you shortly.</p>";
                    } else {
                        echo "<p>Oops! Something went wrong. Please try again later.</p>";
                    }
                }
            }
            ?>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Build Your Future. All rights reserved.</p>
    </footer>
</body>
</html>
