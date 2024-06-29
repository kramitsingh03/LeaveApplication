<?php
include("./includes/config.php");

if (isset($_GET['deptid'])) {
    $deptId = filter_var($_GET['deptid'], FILTER_SANITIZE_STRING);

    try {
        // Fetch department details
        $stmt = $conn->prepare("SELECT * FROM tbldepartments WHERE deptid = :deptid");
        $stmt->bindParam(':deptid', $deptId);
        $stmt->execute();

        // Fetch the department record
        $department = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$department) {
            echo "No department found with the given ID.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    echo "No department ID provided.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Department</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">View Department Details</h2>
        <div class="card">
            <div class="card-header">
                Department Details
            </div>
            <div class="card-body">
                <p><strong>Department ID:</strong> <?php echo htmlspecialchars($department['deptid']); ?></p>
                <p><strong>Department Name:</strong> <?php echo htmlspecialchars($department['deptname']); ?></p>
                <p><strong>Department Short Name:</strong> <?php echo htmlspecialchars($department['deptshortname']); ?></p>
                <p><strong>Department Code:</strong> <?php echo htmlspecialchars($department['deptcode']); ?></p>
            </div>
            <div class="card-footer">
                <a href="new-department.php" class="btn btn-secondary">Back to Departments</a>
                <a href="update-department.php?deptid=<?php echo htmlspecialchars($department['deptid']); ?>" class="btn btn-primary btn-sm">Edit</a>

            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
