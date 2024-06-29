<?php
// include('./config.php');

try {
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Query to count rows in employee table
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM employees");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalEmployees = $result['total'];

    // Query to count rows in tblleaveapplication table
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM tblleaveapplication");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalLeaveApplications = $result['total'];

    // Query to count rows in tbldepartments table
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM tbldepartments");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalDepartments = $result['total'];

    // Query to count rows in tbldesignations table
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM tbldesignation");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalDesignations = $result['total'];

    // Query to count recommended leaves in tblleaveapplication table
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM tblleaveapplication WHERE recommend = 1");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalRecommended = $result['total'];

    // Query to count status in tblleaveapplication table
    $stmt = $conn->prepare("SELECT COUNT(*) AS total FROM tblleaveapplication WHERE status = 'active'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $totalApprovedStatus = $result['total'];

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- Total Employees -->
                <div class="col-lg-4 col-6">
                    <div class="info-box bg-info">
                        <span class="info-box-icon"><i class="fas fa-users"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Employees</span>
                            <span class="info-box-number"><?php echo $totalEmployees; ?></span>
                        </div>
                    </div>
                </div>
                <!-- Total Leave Applications -->
                <div class="col-lg-4 col-6">
                    <div class="info-box bg-warning">
                        <span class="info-box-icon"><i class="fas fa-file-alt"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Leave Applications</span>
                            <span class="info-box-number"><?php echo $totalLeaveApplications; ?></span>
                        </div>
                    </div>
                </div>
                <!-- Total Departments -->
                <div class="col-lg-4 col-6">
                    <div class="info-box bg-success">
                        <span class="info-box-icon"><i class="fas fa-building"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Departments</span>
                            <span class="info-box-number"><?php echo $totalDepartments; ?></span>
                        </div>
                    </div>
                </div>
                <!-- Total Designations -->
                <div class="col-lg-4 col-6">
                    <div class="info-box bg-primary">
                        <span class="info-box-icon"><i class="fas fa-briefcase"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Designations</span>
                            <span class="info-box-number"><?php echo $totalDesignations; ?></span>
                        </div>
                    </div>
                </div>
                <!-- Total Recommended Leaves -->
                <div class="col-lg-4 col-6">
                    <div class="info-box bg-secondary">
                        <span class="info-box-icon"><i class="fas fa-thumbs-up"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Recommended Leaves</span>
                            <span class="info-box-number"><?php echo $totalRecommended; ?></span>
                        </div>
                    </div>
                </div>
                <!-- Total Approved Status -->
                <div class="col-lg-4 col-6">
                    <div class="info-box bg-danger">
                        <span class="info-box-icon"><i class="fas fa-check"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Total Approved Status</span>
                            <span class="info-box-number"><?php echo $totalApprovedStatus; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

 