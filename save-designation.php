<?php
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deptname = filter_var($_POST['deptname'], FILTER_SANITIZE_STRING);
    $designationName = filter_var($_POST['designationName'], FILTER_SANITIZE_STRING);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

    // Check if any required field is empty
    if (empty($deptname) || empty($designationName) || empty($status)) {
        echo "All fields are required.";
        exit;
    }

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO tbldesignation (department, designation, status) VALUES (:deptname, :designationName, :status)");
        $stmt->bindParam(':deptname', $deptname);
        $stmt->bindParam(':designationName', $designationName);
        $stmt->bindParam(':status', $status);

        // Execute the statement
        if ($stmt->execute()) {
            echo "Data successfully saved.";
            header("Location: new1-designation.php");
        } else {
            echo "Error saving data.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
