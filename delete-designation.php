<?php
include("./includes/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Delete the department
        $stmt = $conn->prepare("DELETE FROM tbldesignation WHERE id = :id");
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: new1-designation.php");
            exit;
        } else {
            echo "Error deleting department.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No department ID provided.";
    exit;
}
?>
