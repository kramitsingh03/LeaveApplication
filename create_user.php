<?php
include("./includes/config.php");

// User details
$email = 'hod@gmail.com';
$password = 'hod'; // Replace with your desired password
$designation = 'hod'; // Replace with 'dean', 'hod', or 'faculty' as needed

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

try {
    // Insert user into the database
    $stmt = $conn->prepare("INSERT INTO admin (email, password, designation) VALUES (:email, :password, :designation)");
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashed_password);
    $stmt->bindParam(':designation', $designation);
    $stmt->execute();
    echo "User created successfully.";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;
?>
