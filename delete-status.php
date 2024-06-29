<?php
include("./includes/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare the SQL statement to delete the status
        $stmt = $conn->prepare("DELETE FROM tblleaves WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: new1-leavestatus.php");
            exit;
        } else {
            echo "Error deleting status.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
