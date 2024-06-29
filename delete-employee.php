<?php
include("./includes/config.php");

$empid = isset($_GET['empid']) ? $_GET['empid'] : '';

if ($empid) {
    try {
        // Delete employee by empid
        $stmt = $conn->prepare("DELETE FROM employees WHERE employeeid = :empid");
        $stmt->bindParam(':empid', $empid, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo "Employee deleted successfully.";
            header("Location: new-faculty.php");
        } else {
            echo "Error deleting employee.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "Invalid request.";
}
?>
