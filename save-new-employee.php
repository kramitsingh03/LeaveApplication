<!-- save-employee.php -->
<?php
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $employeeId = filter_var($_POST['employeeId'], FILTER_SANITIZE_STRING);
    $employeeName = filter_var($_POST['employeeName'], FILTER_SANITIZE_STRING);
    $employeeEmail = filter_var($_POST['employeeEmail'], FILTER_SANITIZE_EMAIL);
    $employeePassword = password_hash($_POST['employeePassword'], PASSWORD_BCRYPT); // Hash the password
    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
    $Dob = filter_var($_POST['Dob'], FILTER_SANITIZE_STRING);
    $designation = filter_var($_POST['designation'], FILTER_SANITIZE_STRING);
    $department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $employeePhone = filter_var($_POST['employeePhone'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("INSERT INTO tblemployees (empid, name, email, password, gender, dob, designation, department, address, phone) 
                                VALUES (:employeeId, :employeeName, :employeeEmail, :employeePassword, :gender, :Dob, :designation, :department, :address, :employeePhone)");

        // Bind the parameters
        $stmt->bindParam(':employeeId', $employeeId);
        $stmt->bindParam(':employeeName', $employeeName);
        $stmt->bindParam(':employeeEmail', $employeeEmail);
        $stmt->bindParam(':employeePassword', $employeePassword);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':Dob', $Dob);
        $stmt->bindParam(':designation', $designation);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':employeePhone', $employeePhone);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: new-faculty.php");
        } else {
            echo "Error saving data.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
