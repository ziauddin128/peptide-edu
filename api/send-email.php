<?php

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$to = "test12web2000@gmail.com";

$subject = "New Message from $name";

$body = "
<html>
<body>
    <h3>New Contact Message</h3>
    <p><strong>Name:</strong> $name</p>
    <p><strong>Email:</strong> $email</p>
    <p><strong>Message:</strong><br>$message</p>
</body>
</html>
";

$headers  = "MIME-Version: 1.0\r\n";
$headers .= "Content-type: text/html; charset=UTF-8\r\n";
$headers .= "From: $email\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($to, $subject, $body, $headers)) {
    echo json_encode([
        "success" => true,
        "message" => "Email sent successfully."
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Failed to send email. Please try again."
    ]);
}
