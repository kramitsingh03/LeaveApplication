<?php
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Check if the email exists in the database
    $stmt = $conn->prepare("SELECT id FROM admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));
        $expiry = date('Y-m-d H:i:s', strtotime('+1 hour'));

        // Store the token in the database
        $stmt = $conn->prepare("INSERT INTO password_resets (email, token, expiry) VALUES (:email, :token, :expiry)");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':expiry', $expiry);
        $stmt->execute();

        // Send reset email
        $resetLink = "http://loc/reset-password.php?token=$token";
        $subject = "Password Reset Request";
        $message = "Click the following link to reset your password: $resetLink";
        $headers = "From: no-reply@yourdomain.com";

        mail($email, $subject, $message, $headers);

        echo "Password reset link has been sent to your email.";
    } else {
        echo "Email address not found.";
    }
}
?>
