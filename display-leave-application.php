<?php
include("./includes/config.php");

try {
    // Fetch all leave applications
    $stmt = $conn->prepare("SELECT id, name, email, contact, address, department, leavetype, startdate, enddate, reason, photo FROM tblleaveapplication");
    $stmt->execute();

    // Fetch all results as an associative array
    $leaveApplications = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Applications</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Leave Applications</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Department</th>
                        <th>Leave Type</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Reason</th>
                        <th>Photo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($leaveApplications)): ?>
                        <?php foreach ($leaveApplications as $index => $application): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($application['id']); ?></td>
                                <td><?php echo htmlspecialchars($application['name']); ?></td>
                                <td><?php echo htmlspecialchars($application['email']); ?></td>
                                <td><?php echo htmlspecialchars($application['contact']); ?></td>
                                <td><?php echo htmlspecialchars($application['address']); ?></td>
                                <td><?php echo htmlspecialchars($application['department']); ?></td>
                                <td><?php echo htmlspecialchars($application['leavetype']); ?></td>
                                <td><?php echo htmlspecialchars($application['startdate']); ?></td>
                                <td><?php echo htmlspecialchars($application['enddate']); ?></td>
                                <td><?php echo htmlspecialchars($application['reason']); ?></td>
                                <td>
                                    <?php if (!empty($application['photo'])): ?>
                                        <img src="uploads/<?php echo htmlspecialchars($application['photo']); ?>" alt="Photo" style="width: 100px; height: auto;">
                                    <?php else: ?>
                                        No Photo
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="11" class="text-center">No leave applications found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
