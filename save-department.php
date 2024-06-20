<?php
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deptId = filter_var($_POST['deptid'], FILTER_SANITIZE_STRING);
    $deptName = filter_var($_POST['deptname'], FILTER_SANITIZE_STRING);
    $deptShortName = filter_var($_POST['deptshortname'], FILTER_SANITIZE_STRING);
    $deptCode = filter_var($_POST['deptcode'], FILTER_SANITIZE_STRING);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO tbldepartments (deptid, deptname, deptshortname, deptcode) VALUES (:deptid, :deptname, :deptshortname, :deptcode)");
    $stmt->bindParam(':deptid', $deptId);
    $stmt->bindParam(':deptname', $deptName);
    $stmt->bindParam(':deptshortname', $deptShortName);
    $stmt->bindParam(':deptcode', $deptCode);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: new-department.php");
        exit();
    } else {
        echo "<script>alert('Error saving data');</script>";
    }
}
?>
