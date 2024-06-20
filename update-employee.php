<?php
include("./includes/config.php");

$empid = isset($_GET['empid']) ? $_GET['empid'] : '';

if ($empid) {
    try {
        // Fetch employee details by empid
        $stmt = $conn->prepare("SELECT empid, name, email, gender, dob, designation, department, address, phone FROM tblemployees WHERE empid = :empid");
        $stmt->bindParam(':empid', $empid, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the result as an associative array
        $employee = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$employee) {
            echo "Employee not found.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    echo "Invalid request.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $gender = filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
    $dob = filter_var($_POST['dob'], FILTER_SANITIZE_STRING);
    $designation = filter_var($_POST['designation'], FILTER_SANITIZE_STRING);
    $department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);

    try {
        // Update employee details
        $stmt = $conn->prepare("UPDATE tblemployees SET name = :name, email = :email, gender = :gender, dob = :dob, designation = :designation, department = :department, address = :address, phone = :phone WHERE empid = :empid");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':dob', $dob);
        $stmt->bindParam(':designation', $designation);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':empid', $empid);

        if ($stmt->execute()) {
            header("Location: new-faculty.php");

        } else {
            echo "Error updating details.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Employee</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Employee</h2>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($employee['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($employee['email']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label> <br>
                <label for="male" class="form-label">Male</label>
                <input type="radio" id="male" name="gender" value="male" <?php echo ($employee['gender'] == 'male') ? 'checked' : ''; ?>>
                <label for="female" class="form-label">Female</label>
                <input type="radio" id="female" name="gender" value="female" <?php echo ($employee['gender'] == 'female') ? 'checked' : ''; ?>>
                <label for="other" class="form-label">Other</label>
                <input type="radio" id="other" name="gender" value="other" <?php echo ($employee['gender'] == 'other') ? 'checked' : ''; ?>>
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="dob" name="dob" value="<?php echo htmlspecialchars($employee['dob']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <select class="form-control" id="designation" name="designation" required>
                    <option value="faculty" <?php echo ($employee['designation'] == 'faculty') ? 'selected' : ''; ?>>Faculty</option>
                    <option value="hod" <?php echo ($employee['designation'] == 'hod') ? 'selected' : ''; ?>>Hod</option>
                    <option value="dean" <?php echo ($employee['designation'] == 'dean') ? 'selected' : ''; ?>>Dean</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <select class="form-control" id="department" name="department" required>
                    <option value="Computer Science Engineering" <?php echo ($employee['department'] == 'Computer Science Engineering') ? 'selected' : ''; ?>>Computer Science Engineering</option>
                    <option value="Information Technology" <?php echo ($employee['department'] == 'Information Technology') ? 'selected' : ''; ?>>Information Technology</option>
                    <option value="Civil Engineering" <?php echo ($employee['department'] == 'Civil Engineering') ? 'selected' : ''; ?>>Civil Engineering</option>
                    <option value="Mechanical Engineering" <?php echo ($employee['department'] == 'Mechanical Engineering') ? 'selected' : ''; ?>>Mechanical Engineering</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($employee['address']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($employee['phone']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Employee</button>
        </form>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
