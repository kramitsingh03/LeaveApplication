<?php
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $statustype = filter_var($_POST['statustype'], FILTER_SANITIZE_STRING);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

    try {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO tblleaves (statustype, status) VALUES (:statustype, :status)");
        $stmt->bindParam(':statustype', $statustype);
        $stmt->bindParam(':status', $status);
        // Execute the statement
        if ($stmt->execute()) {
            header("Location: new1-leavestatus.php");
        } else {
            echo "Error: Could not execute the query";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
