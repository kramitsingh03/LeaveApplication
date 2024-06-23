<?php
include("./includes/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Fetch department details
        $stmt = $conn->prepare("SELECT id, department, designation, status FROM tbldesignation WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $department = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$department) {
            echo "No department found.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "No department ID provided.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $deptname = filter_var($_POST['deptname'], FILTER_SANITIZE_STRING);
    $designationName = filter_var($_POST['designationName'], FILTER_SANITIZE_STRING);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

    try {
        // Update department details
        $stmt = $conn->prepare("UPDATE tbldesignation SET department = :deptname, designation = :designationName, status = :status WHERE id = :id");
        $stmt->bindParam(':deptname', $deptname);
        $stmt->bindParam(':designationName', $designationName);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: new1-designation.php");
            exit;
        } else {
            echo "Error updating department.";
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Department</h2>
        <form action="update-designation.php?id=<?php echo htmlspecialchars($department['id']); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($department['id']); ?>">
            <div class="form-group">
                <label for="deptname">Department Name</label>
                <input type="text" class="form-control" id="deptname" name="deptname" value="<?php echo htmlspecialchars($department['department']); ?>" required>
            </div>
            <div class="form-group">
                <label for="designationName">Designation</label>
                <input type="text" class="form-control" id="designationName" name="designationName" value="<?php echo htmlspecialchars($department['designation']); ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="active" <?php if ($department['status'] == 'active') echo 'selected'; ?>>Active</option>
                    <option value="inactive" <?php if ($department['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
