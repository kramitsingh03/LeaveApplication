<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lms";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "database connection succesfully";
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
