<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize form data
    $name = htmlspecialchars(strip_tags($_POST['name']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $subject = htmlspecialchars(strip_tags($_POST['subject']));
    $message = htmlspecialchars(strip_tags($_POST['message']));

    // Email details
    $to = "hijiteam@gmail.com"; // Update with your email address
    $headers = "From: $email" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    $body = "Name: $name\nEmail: $email\nSubject: $subject\nMessage:\n$message";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "Thank you for contacting us, $name. We will get back to you shortly.";
        // Optionally, you can redirect the user to a thank you page after successful submission
        // header("Location: thank-you.html");
        // exit();
    } else {
        echo "Sorry, there was an error sending your message. Please try again later.";
    }
} else {
    echo "Invalid request method.";
}
?>
