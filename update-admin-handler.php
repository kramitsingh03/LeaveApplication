<!-- update-admin-handler.php -->
<?php
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $email = filter_var($_POST['adminEmail'], FILTER_SANITIZE_EMAIL);
    $designation = filter_var($_POST['adminDesignation'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL statement to update the admin details
        $stmt = $conn->prepare("UPDATE admin SET email = :email, designation = :designation WHERE id = :id");
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':designation', $designation);
        $stmt->bindParam(':id', $id);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Admin details updated successfully.";
            header("Location: new-admin.php"); // Redirect to the admin list page
            exit;
        } else {
            echo "Error updating admin details.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
