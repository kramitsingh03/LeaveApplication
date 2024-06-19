<?php
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['adminName'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['adminEmail'], FILTER_SANITIZE_EMAIL);
    $password = filter_var($_POST['adminPassword'], FILTER_SANITIZE_STRING);
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    $designation = "admin";

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO admin (name,email, password, designation) VALUES (:name,:email, :password, :designation)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':designation', $designation);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: new-admin.php");
    } else {
        alert("Error saving data");
    }
}
?>
