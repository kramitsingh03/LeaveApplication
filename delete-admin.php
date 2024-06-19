<!-- delete-admin.php -->
<?php
include("./includes/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Prepare the SQL statement to delete the admin
        $stmt = $conn->prepare("DELETE FROM admin WHERE id = :id");
        $stmt->bindParam(':id', $id);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: new-admin.php"); // Redirect to the admin list page after successful deletion
            exit;
        } else {
            echo "Error deleting admin.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No admin ID provided.";
}
?>
