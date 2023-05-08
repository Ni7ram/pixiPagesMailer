<?php

function main(array $args) : array
{
    $name = $args["name"] ?? "stranger";
    
    $greeting = "Hello {$name}!";
    echo $greeting;
 
    return [
        'body' => $greeting,
    ];
}

echo $_GET["naming"]

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the POST variables
    $keyToSendEmails = $_POST["keyToSendEmails"] ?? "";
    $email = $_POST["email"] ?? "";
    $username = $_POST["username"] ?? "";

    // Validate keyToSendEmails
    $privateKey = "p84n5urS3cR3K3y"; // Hardcoded private key
    if ($keyToSendEmails !== $privateKey) {
        echo "Invalid key";
        exit;
    }

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email";
        exit;
    }

    // Send email
    $to = $email;
    $subject = "Welcome to PixiPages";
    $message = "Welcome to PixiPages, " . $username . "!";
    $headers = "From: noreply@pixipages.com" . "\r\n" .
        "Reply-To: noreply@pixipages.com" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();

    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully";
    } else {
        echo "Failed to send email";
    }
} else {
    echo "Invalid request method";
    exit;
}

?>
