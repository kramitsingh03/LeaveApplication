<?php
include("./includes/config.php");

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['empid'])) {
    // Fetch employee details for editing
    $empid = $_GET['empid'];

    try {
        $stmt = $conn->prepare("SELECT * FROM employees WHERE employeeId = :empid");
        $stmt->bindParam(':empid', $empid);
        $stmt->execute();
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Update employee details
    $empid = $_POST['empid'];
    $employeeName = $_POST['employeeName'];
    $employeeEmail = $_POST['employeeEmail'];
    $employeePassword = !empty($_POST['employeePassword']) ? password_hash($_POST['employeePassword'], PASSWORD_BCRYPT) : null;
    $employeeDesignation = $_POST['employeeDesignation'];
    $employeeDepartment = $_POST['employeeDepartment'];
    $employeeContact = $_POST['employeeContact'];
    $employeeAddress = $_POST['employeeAddress'];
    $employeePhoto = null;

    if (!empty($_FILES['employeePhoto']['name'])) {
        $targetDir = "uploads/";
        $employeePhoto = $targetDir . basename($_FILES["employeePhoto"]["name"]);
        move_uploaded_file($_FILES["employeePhoto"]["tmp_name"], $employeePhoto);
    }

    try {
        $query = "UPDATE employees SET employeeName = :employeeName, employeeEmail = :employeeEmail, ";
        if ($employeePassword) {
            $query .= "employeePassword = :employeePassword, ";
        }
        $query .= "employeeDesignation = :employeeDesignation, employeeDepartment = :employeeDepartment, employeeContact = :employeeContact, employeeAddress = :employeeAddress";
        if ($employeePhoto) {
            $query .= ", employeePhoto = :employeePhoto";
        }
        $query .= " WHERE employeeId = :empid";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':empid', $empid);
        $stmt->bindParam(':employeeName', $employeeName);
        $stmt->bindParam(':employeeEmail', $employeeEmail);
        if ($employeePassword) {
            $stmt->bindParam(':employeePassword', $employeePassword);
        }
        $stmt->bindParam(':employeeDesignation', $employeeDesignation);
        $stmt->bindParam(':employeeDepartment', $employeeDepartment);
        $stmt->bindParam(':employeeContact', $employeeContact);
        $stmt->bindParam(':employeeAddress', $employeeAddress);
        if ($employeePhoto) {
            $stmt->bindParam(':employeePhoto', $employeePhoto);
        }

        if ($stmt->execute()) {
            header("Location: new-faculty.php");
            exit;
        } else {
            echo "Error updating employee.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    header("Location: new-faculty.php"); // Redirect if no empid is provided or not a GET/POST request
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Edit Employee</h2>
    <form action="update-employee.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="empid" value="<?php echo htmlspecialchars($employee['employeeId']); ?>">
        <table class="table table-bordered">
            <tr>
                <th>Upload Photo</th>
                <td>
                    <input type="file" class="form-control-file" style="margin-left:100px" id="employeePhoto" name="employeePhoto">
                    <?php if (!empty($employee['employeePhoto'])): ?>
                        <img src="<?php echo htmlspecialchars($employee['employeePhoto']); ?>" alt="Employee Photo" style="width:50px; height:50px;">
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Employee Name</th>
                <td>
                    <input type="text" class="form-control" id="employeeName" name="employeeName" value="<?php echo htmlspecialchars($employee['employeeName']); ?>" required>
                </td>
            </tr>
            <tr>
                <th>Employee Email</th>
                <td>
                    <input type="email" class="form-control" id="employeeEmail" name="employeeEmail" value="<?php echo htmlspecialchars($employee['employeeEmail']); ?>" required>
                </td>
            </tr>
            <tr>
                <th>Employee Password</th>
                <td>
                    <input type="password" class="form-control" id="employeePassword" name="employeePassword" placeholder="Enter new password if you want to change">
                </td>
            </tr>
            <tr>
                <th>Employee Designation</th>
                <td>
                    <input type="text" class="form-control" id="employeeDesignation" name="employeeDesignation" value="<?php echo htmlspecialchars($employee['employeeDesignation']); ?>" required>
                </td>
            </tr>
            <tr>
                <th>Employee Department</th>
                <td>
                    <input type="text" class="form-control" id="employeeDepartment" name="employeeDepartment" value="<?php echo htmlspecialchars($employee['employeeDepartment']); ?>" required>
                </td>
            </tr>
            <tr>
                <th>Employee Contact No.</th>
                <td>
                    <input type="text" class="form-control" id="employeeContact" name="employeeContact" value="<?php echo htmlspecialchars($employee['employeeContact']); ?>" required>
                </td>
            </tr>
            <tr>
                <th>Employee Address</th>
                <td>
                    <input type="text" class="form-control" id="employeeAddress" name="employeeAddress" value="<?php echo htmlspecialchars($employee['employeeAddress']); ?>" required>
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Update Employee</button>
    </form>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

