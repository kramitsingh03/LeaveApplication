<!-- update-admin.php -->
<?php
include("./includes/config.php");

$id = $_GET['id']; // Get the ID from the URL parameter

try {
    // Prepare the SQL statement to fetch current admin details
    $stmt = $conn->prepare("SELECT id, email, designation FROM admin WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Update Admin Details</h2>
        <?php if ($admin): ?>
        <form action="update-admin-handler.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($admin['id']); ?>">
            <div class="form-group">
                <label for="adminEmail">Email</label>
                <input type="email" class="form-control" id="adminEmail" name="adminEmail" value="<?php echo htmlspecialchars($admin['email']); ?>" required>
            </div>
            <div class="form-group">
                <label for="adminDesignation">Designation</label>
                <select class="form-control" id="adminDesignation" name="adminDesignation" required>
                    <option value="admin" <?php if ($admin['designation'] == 'admin') echo 'selected'; ?>>Admin</option>
                    <option value="dean" <?php if ($admin['designation'] == 'dean') echo 'selected'; ?>>Dean</option>
                    <option value="hod" <?php if ($admin['designation'] == 'hod') echo 'selected'; ?>>HOD</option>
                    <option value="faculty" <?php if ($admin['designation'] == 'faculty') echo 'selected'; ?>>Faculty</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
        <?php else: ?>
        <p>Admin not found.</p>
        <?php endif; ?>
    </div>

    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
