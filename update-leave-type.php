<?php
include("./includes/config.php");

if (isset($_GET['id'])) {
    $leaveTypeId = $_GET['id'];

    // Fetch leave type details
    try {
        $stmt = $conn->prepare("SELECT leaveid, leavetype, description, daysallowed, status FROM tblleavetype WHERE leaveid = :leaveid");
        $stmt->bindParam(':leaveid', $leaveTypeId);
        $stmt->execute();
        $leaveType = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$leaveType) {
            echo "Leave type not found.";
            exit;
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        exit;
    }
} else {
    echo "No leave type ID provided.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $leaveType = filter_var($_POST['leavetype'], FILTER_SANITIZE_STRING);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_STRING);
    $daysAllowed = filter_var($_POST['daysallowed'], FILTER_SANITIZE_NUMBER_INT);
    $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

    try {
        // Prepare the SQL statement
        $stmt = $conn->prepare("UPDATE tblleavetype SET leavetype = :leavetype, description = :description, daysallowed = :daysallowed, status = :status WHERE leaveid = :leaveid");
        $stmt->bindParam(':leaveid', $id);
        $stmt->bindParam(':leavetype', $leaveType);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':daysallowed', $daysAllowed);
        $stmt->bindParam(':status', $status);

        // Execute the statement
        if ($stmt->execute()) {
            header("Location: new-leave-type.php");
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
    <title>Edit Leave Type</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Leave Type</h2>
        <form action="update-leave-type.php?id=<?php echo htmlspecialchars($leaveType['leaveid']); ?>" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($leaveType['leaveid']); ?>">
            <div class="form-group">
                <label for="leaveType">Leave Type</label>
                <input type="text" class="form-control" id="leaveType" name="leavetype" value="<?php echo htmlspecialchars($leaveType['leavetype']); ?>" required>
            </div>
            <div class="form-group">
                <label for="leaveDescription">Description</label>
                <input type="text" class="form-control" id="leaveDescription" name="description" value="<?php echo htmlspecialchars($leaveType['description']); ?>" required>
            </div>
            <div class="form-group">
                <label for="daysAllowed">Days Allowed</label>
                <input type="number" class="form-control" id="daysAllowed" name="daysallowed" value="<?php echo htmlspecialchars($leaveType['daysallowed']); ?>" required>
            </div>
            <div class="form-group">
                <label for="leaveStatus">Status</label>
                <select class="form-control" id="leaveStatus" name="status" required>
                    <option value="active" <?php if ($leaveType['status'] == 'active') echo 'selected'; ?>>Active</option>
                    <option value="inactive" <?php if ($leaveType['status'] == 'inactive') echo 'selected'; ?>>Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</body>
</html>
