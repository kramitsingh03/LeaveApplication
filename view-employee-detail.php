<?php
include("./includes/config.php");

$empid = isset($_GET['empid']) ? $_GET['empid'] : '';

if ($empid) {
    try {
        // Fetch employee details by empid
        $stmt = $conn->prepare("SELECT empid, name, email, gender, dob, designation, department, address, phone, RegDate FROM tblemployees WHERE empid = :empid");
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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Details</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Employee Details</h2>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?php echo htmlspecialchars($employee['name']); ?></h5>
                <p class="card-text">
                    <strong>Employee ID:</strong> <?php echo htmlspecialchars($employee['empid']); ?><br>
                    <strong>Email:</strong> <?php echo htmlspecialchars($employee['email']); ?><br>
                    <strong>Gender:</strong> <?php echo htmlspecialchars($employee['gender']); ?><br>
                    <strong>Date of Birth:</strong> <?php echo htmlspecialchars($employee['dob']); ?><br>
                    <strong>Designation:</strong> <?php echo htmlspecialchars($employee['designation']); ?><br>
                    <strong>Department:</strong> <?php echo htmlspecialchars($employee['department']); ?><br>
                    <strong>Address:</strong> <?php echo htmlspecialchars($employee['address']); ?><br>
                    <strong>Phone:</strong> <?php echo htmlspecialchars($employee['phone']); ?><br>
                    <strong>Registration Date:</strong> <?php echo htmlspecialchars($employee['RegDate']); ?><br>
                </p>
                <a href="update-employee.php?empid=<?php echo htmlspecialchars($employee['empid']); ?>" class="btn btn-primary btn-sm">Edit</a>
                <a href="delete-employee.php?empid=<?php echo htmlspecialchars($employee['empid']); ?>" onclick="return confirm('Are you sure you want to delete this employee?');" class="btn btn-danger btn-sm">Delete</a>
                <a href="print-employee.php?empid=<?php echo htmlspecialchars($employee['empid']); ?>" class="btn btn-secondary btn-sm">Print</a>

            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
