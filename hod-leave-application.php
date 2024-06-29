<?php
session_start();
include("./includes/config.php");

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit;
}

$email = $_SESSION['email']; // Assuming the email is stored in the session

try {
    // Fetch admin details
    $stmt = $conn->prepare("SELECT name, email, img, designation FROM admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Fetch all leave applications
    $stmt = $conn->prepare("SELECT id, name, email, contact, address, department, leavetype, startdate, enddate, reason FROM tblleaveapplication");
    $stmt->execute();
    $leaveApplications = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Fetch specific user's details
    $stmt2 = $conn->prepare("SELECT employeeEmail, employeeContact, employeeAddress, employeeDepartment FROM employees WHERE employeeEmail = :email");
    $stmt2->bindParam(':email', $email);
    $stmt2->execute();
    $details = $stmt2->fetch(PDO::FETCH_ASSOC);


    // Set default values if no details found
    if (!$details) {
        $details = [
            'employeeContact' => '',
            'employeeAddress' => '',
            'employeeDepartment' => ''
        ];
    }
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
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <style>
    .content-wrapper {
        margin-top: 30px;
        /* Space after the navbar */
    }

    .table-container {
        margin-left: 25px;
        /* Aligning with sidebar */
        width: calc(100% - 25px);
        /* Full width minus sidebar */
    }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-light">
            <div class="container-fluid">
                <!-- Start navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <!-- End navbar links -->

                <ul class="navbar-nav ml-auto">
                    <!-- User Dropdown Menu -->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo htmlspecialchars($admin['img']); ?>"
                                class="user-image img-circle shadow" alt="User Image">
                            <span class="d-none d-md-inline"><?php echo htmlspecialchars($admin['name']); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="<?php echo htmlspecialchars($admin['img']); ?>" class="img-circle shadow"
                                    alt="User Image">
                                <p>
                                    <?php echo htmlspecialchars($admin['name']); ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-primary btn-flat" data-toggle="modal"
                                    data-target="#changePasswordModal">Change Password</a>
                                <a href="logout.php" class="btn btn-secondary btn-flat float-right">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Change Password Form -->
                        <form id="changePasswordForm" method="post" action="change-password.php">
                            <div class="form-group">
                                <label for="currentPassword">Current Password</label>
                                <input type="password" class="form-control" id="currentPassword" name="currentPassword"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                    required>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="hod-dashboard.php" class="brand-link">
                <span class="brand-text font-weight-light">HOD Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Leave Applications -->
                        <li class="nav-item">
                            <a href="hod-leave-application.php" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Leave Application
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="hod-manage-leave.php" class="nav-link">
                                <i class="nav-icon fas fa-file-alt"></i>
                                <p>
                                    Manage Leave
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Main content -->
        <div class="content-wrapper">
            <div class="container-fluid table-container">
                <div class="mb-3" style="float:right">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Apply for leave
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="save-hod-leave-application.php" method="post"
                                    enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Leave Application Form</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                            value="<?php echo htmlspecialchars($admin['name']); ?>"
                                                            class="form-control" id="name" name="name"
                                                            placeholder="Enter your name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email <span
                                                                class="text-danger">*</span></label>
                                                        <input type="email"
                                                            value="<?php echo htmlspecialchars($admin['email']); ?>"
                                                            class="form-control" id="email" name="email"
                                                            placeholder="Enter your email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact">Contact No <span
                                                                class="text-danger">*</span></label>
                                                        <input type="text"
                                                            value="<?php echo htmlspecialchars($details['employeeContact']); ?>"
                                                            class="form-control" id="contact" name="contact"
                                                            placeholder="Enter Contact No" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address <span
                                                                class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="address" name="address"
                                                            rows="3" placeholder="Enter your address"
                                                            required><?php echo htmlspecialchars($details['employeeAddress']); ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="department">Department <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-control" id="department" name="department"
                                                            required>
                                                            <option value="">--SELECT DEPARTMENT--</option>
                                                            <option value="<?php echo htmlspecialchars($details['employeeDepartment']); ?>" selected ><?php echo htmlspecialchars($details['employeeDepartment']); ?></option>
                                                            
                                                            <option
                                                                value="Computer Science And Engineering">Computer Science Engineering
                                                            
                                                            </option>
                                                            <option
                                                                value="Safety And Fire">Safety And FILTER_SANITIZE_STRING
                                                            
                                                            </option>
                                                            <option
                                                                value="Mechanical Engineering">Mechanical Engineering
                                                            
                                                            </option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="leaveType">Leave Type <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-control" id="leaveType" name="leaveType"
                                                            required>
                                                            <option value="">--SELECT LEAVE TYPE--</option>
                                                            <option>Sick Leave</option>
                                                            <option>Casual Leave</option>
                                                            <option>Maternity Leave</option>
                                                            <option>Paternity Leave</option>
                                                            <option>Annual Leave</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="startDate">Start Date <span
                                                                class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="startDate"
                                                            name="startDate" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="endDate">End Date <span
                                                                class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="endDate"
                                                            name="endDate" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="reason">Reason for Leave <span
                                                                class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="reason" name="reason"
                                                            rows="3" placeholder="Enter reason for leave"
                                                            required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Modal end -->

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
                            </tr>
                            <?php endforeach; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="10" class="text-center">No leave applications found</td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>

</html>