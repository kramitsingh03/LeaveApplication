<?php
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contact = filter_var($_POST['contact'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
    $leaveType = filter_var($_POST['leaveType'], FILTER_SANITIZE_STRING);
    $startDate = filter_var($_POST['startDate'], FILTER_SANITIZE_STRING);
    $endDate = filter_var($_POST['endDate'], FILTER_SANITIZE_STRING);
    $reason = filter_var($_POST['reason'], FILTER_SANITIZE_STRING);

    // Prepare the SQL statement
    try {
        $stmt = $conn->prepare("INSERT INTO tblleaveapplication (name, email, contact, address, department, leavetype, startdate, enddate, reason) VALUES (:name, :email, :contact, :address, :department, :leavetype, :startdate, :enddate, :reason)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':leavetype', $leaveType);
        $stmt->bindParam(':startdate', $startDate);
        $stmt->bindParam(':enddate', $endDate);
        $stmt->bindParam(':reason', $reason);

        // Execute the statement
        if ($stmt->execute()) {
           header("Location: hod-leave-application.php");
        } else {
            echo "Error submitting leave application.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
