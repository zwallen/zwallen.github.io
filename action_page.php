<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form was submitted via POST method

    // Collect form data using $_POST
    $name = $_POST['name'];  // Name field
    $email = $_POST['email'];  // Email field
    $message = $_POST['message'];  // Message field

    // OPTIONAL: You can sanitize and validate the data here
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Example: Sending an email with the form data (basic email sending)
    $to = "zachary.d.wallen@gmail.com";
    $subject = "New Message from Contact Form";
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message sent successfully!";
    } else {
        echo "There was an error sending the message.";
    }
} else {
    // If the form wasn't submitted via POST, show an error or redirect
    echo "Invalid request.";
}
?>
