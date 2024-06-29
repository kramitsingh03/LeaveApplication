<?php
include("./includes/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Delete the leave type
        $stmt = $conn->prepare("DELETE FROM tblleavetype WHERE leaveid = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "<script>alert('Leave type deleted successfully.');</script>";
            echo "<script>window.location.href='new-leave-type.php';</script>";
            exit;
        } else {
            echo "<script>alert('Error deleting leave type.');</script>";
            echo "<script>window.location.href='new-leave-type.php';</script>";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "<script>alert('No leave type ID provided.');</script>";
    echo "<script>window.location.href='new-leave-type.php';</script>";
    exit;
}
?>
