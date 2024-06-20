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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deptName = filter_var($_POST['deptname'], FILTER_SANITIZE_STRING);
    $deptShortName = filter_var($_POST['deptshortname'], FILTER_SANITIZE_STRING);
    $deptCode = filter_var($_POST['deptcode'], FILTER_SANITIZE_STRING);

    // Update the department details
    try {
        $stmt = $conn->prepare("UPDATE tbldepartments SET deptname = :deptname, deptshortname = :deptshortname, deptcode = :deptcode WHERE deptid = :deptid");
        $stmt->bindParam(':deptid', $deptId);
        $stmt->bindParam(':deptname', $deptName);
        $stmt->bindParam(':deptshortname', $deptShortName);
        $stmt->bindParam(':deptcode', $deptCode);

        if ($stmt->execute()) {
            header("Location: new-department.php");
            exit;
        } else {
            echo "Error updating data.";
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
    <title>Edit Department</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2 class="mb-4">Edit Department</h2>
        <form action="update-department.php?deptid=<?php echo htmlspecialchars($deptId); ?>" method="POST">
            <div class="form-group">
                <label for="departmentName">Department Name</label>
                <input type="text" class="form-control" id="departmentName" name="deptname" value="<?php echo htmlspecialchars($department['deptname']); ?>" required>
            </div>
            <div class="form-group">
                <label for="dept-short-name">Department Short Name</label>
                <input type="text" class="form-control" id="dept-short-name" name="deptshortname" value="<?php echo htmlspecialchars($department['deptshortname']); ?>" required>
            </div>
            <div class="form-group">
                <label for="dept-code">Department Code</label>
                <input type="text" class="form-control" id="dept-code" name="deptcode" value="<?php echo htmlspecialchars($department['deptcode']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Department</button>
        </form>
        <a href="new-department.php" class="btn btn-secondary mt-3">Back to Departments</a>
    </div>

    <!-- Add Bootstrap JS and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
