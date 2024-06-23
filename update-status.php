<?php
include("./includes/config.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        // Fetch the current data
        $stmt = $conn->prepare("SELECT id, statustype, status FROM tblleaves WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $leaveStatus = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $statustype = $_POST['statustype'];
    $status = $_POST['status'];

    try {
        // Update the data
        $stmt = $conn->prepare("UPDATE tblleaves SET statustype = :statustype, status = :status WHERE id = :id");
        $stmt->bindParam(':statustype', $statustype);
        $stmt->bindParam(':status', $status);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header("Location: new1-leavestatus.php");
            exit;
        } else {
            echo "Error updating status.";
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
    <title>Edit Leave Status</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Leave Status</h2>
        <form action="update-status.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($leaveStatus['id']); ?>">
            <div class="form-group">
                <label for="statusType">Status Type</label>
                <input type="text" class="form-control" id="statusType" name="statustype" value="<?php echo htmlspecialchars($leaveStatus['statustype']); ?>" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="active" <?php if ($leaveStatus['status'] == 'active') echo 'selected'; ?>>Active</option>
                    <option value="inactive" <?php if ($leaveStatus['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
