<?php
include("./includes/config.php");

if (isset($_GET['deptid'])) {
    $deptId = filter_var($_GET['deptid'], FILTER_SANITIZE_STRING);

    try {
        // Delete the department
        $stmt = $conn->prepare("DELETE FROM tbldepartments WHERE deptid = :deptid");
        $stmt->bindParam(':deptid', $deptId);

        if ($stmt->execute()) {
            header("Location: new-department.php");
            exit;
        } else {
            echo "Error deleting data.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No department ID provided.";
    exit;
}
?>
