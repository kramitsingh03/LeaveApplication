<?php
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $leaveTypeId = filter_var($_POST['leaveTypeId'], FILTER_SANITIZE_STRING);
    $leaveType = filter_var($_POST['leaveType'], FILTER_SANITIZE_STRING);
    $leaveDescription = filter_var($_POST['leaveDescription'], FILTER_SANITIZE_STRING);
    $daysAllowed = filter_var($_POST['daysAllowed'], FILTER_VALIDATE_INT);
    $leaveStatus = filter_var($_POST['leaveStatus'], FILTER_SANITIZE_STRING);

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO tblleavetype (leaveid, leavetype, description, daysallowed, status) VALUES (:leaveid, :leavetype, :description, :daysallowed, :status)");
    $stmt->bindParam(':leaveid', $leaveTypeId);
    $stmt->bindParam(':leavetype', $leaveType);
    $stmt->bindParam(':description', $leaveDescription);
    $stmt->bindParam(':daysallowed', $daysAllowed);
    $stmt->bindParam(':status', $leaveStatus);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: new-leave-type.php"); // Redirect to leave-types.php or another appropriate page
    } else {
        echo "Error saving data.";
    }
}
?>
