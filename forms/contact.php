<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];
    
    // Set recipient email address
    $to = 'sharmaranjeet113@gmail.com'; // Replace with your email address
    
    // Set email headers
    $headers = "From: $name <$email>" . "\r\n" .
               "Reply-To: $email" . "\r\n" .
               "X-Mailer: PHP/" . phpversion();
    
    // Build the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Subject: $subject\n\n";
    $email_content .= "Message:\n$message\n";
    
    // Send the email
    if (mail($to, $subject, $email_content, $headers)) {
        // If mail is sent successfully, redirect back to the form with a success message
        header("Location: /your-form-page.php?status=success");
        exit;
    } else {
        // If there's an error sending the mail, redirect back to the form with an error message
        header("Location: /your-form-page.php?status=error");
        exit;
    }
} else {
    // If accessed directly without POST method, redirect back to the form with an error message
    header("Location: /your-form-page.php?status=error");
    exit;
}
?>

