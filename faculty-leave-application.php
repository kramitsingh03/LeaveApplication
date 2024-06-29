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
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <style>
        .content-wrapper {
            margin-top: 30px; /* Space after the navbar */
        }
    </style>
</head>
<body class="hold-transition sidebar-mini">

    <div class="wrapper">
        <!-- Navbar -->
        <?php
session_start();
include("./includes/config.php");
$email = $_SESSION['email']; // Assuming the email is stored in the session
// Check if user is logged in
$stmt = $conn->prepare("SELECT name,password,img FROM admin WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit;
}

// Now you can use the session variables
$user_id = $_SESSION['user_id'];
$designation = $_SESSION['designation'];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($newPassword !== $confirmPassword) {
        echo "New passwords do not match.";
        exit;
    }

    try {
            // Update the password
            $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateStmt = $conn->prepare("UPDATE admin SET password = :newPassword WHERE email = :email");
            $updateStmt->bindParam(':newPassword', $hashedNewPassword);
            $updateStmt->bindParam(':email', $email);

            if ($updateStmt->execute()) {
                echo "Password successfully updated.";
            } else {
                echo "Error updating password.";
            }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>


  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <div class="container-fluid">
      <!-- Start navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- End navbar links -->

      <ul class="navbar-nav ml-auto">
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
            <img src="<?php echo htmlspecialchars($admin['img']); ?>" class="user-image img-circle shadow" alt="User Image">
            <span class="d-none d-md-inline"><?php echo htmlspecialchars($admin['name']); ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="<?php echo htmlspecialchars($admin['img']); ?>" class="img-circle shadow" alt="User Image">
              <p>
              <?php echo htmlspecialchars($admin['name']); ?>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="#" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#changePasswordModal">Change Password</a>
              <a href="logout.php" class="btn btn-secondary btn-flat float-right">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Main Sidebar Container -->


  <!-- Change Password Modal -->

  <!-- /.modal -->
  <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
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
          <form id="changePasswordForm" method="post" action="faculty-dashboard.php">
        <div class="form-group">
            <label for="currentPassword">Current Password</label>
            <input type="password" value="<?php echo($currentPassword) ?>"  class="form-control" id="currentPassword" name="currentPassword" required>
        </div>
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm New Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </form>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ./wrapper -->




        <!-- Sidebar -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="faculty-dashboard.php" class="brand-link">
                <span class="brand-text font-weight-light">Faculty Dashboard</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Leave Application -->
                        <li class="nav-item">
                            <a href="faculty-leave-application.php" class="nav-link">
                                <i class="nav-icon fas fa-calendar-alt"></i>
                                <p>Leave Application</p>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin-left: 300px;">

            <!-- Main content -->
            <div class="container-fluid">
                <div class="mb-3" style="float:right">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Apply for leave
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="save-faculty-leave-application.php" method="post" enctype="multipart/form-data">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Leave Application Form</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email <span class="text-danger">*</span></label>
                                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact">Contact No <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact No" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="address">Address <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="department">Department <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="department" name="department" required>
                                                            <option value="">--Select Department--</option>
                                                            <option>Computer Science and Engineering</option>
                                                            <option>Information Technology</option>
                                                            <option>Civil Engineering</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="leaveType">Leave Type <span class="text-danger">*</span></label>
                                                        <select class="form-control" id="leaveType" name="leaveType" required>
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
                                                        <label for="startDate">Start Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="startDate" name="startDate" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="endDate">End Date <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="endDate" name="endDate" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="reason">Reason for Leave <span class="text-danger">*</span></label>
                                                        <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter reason for leave" required></textarea>
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
                                <!-- <th>Photo</th> -->
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
                                        <!-- <td>
                                            <?php if (!empty($application['photo'])): ?>
                                                <img src="uploads/<?php echo htmlspecialchars($application['photo']); ?>" alt="Photo" style="width: 100px; height: auto;">
                                            <?php else: ?>
                                                No Photo
                                            <?php endif; ?>
                                        </td> -->
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
    <!-- jQuery -->


<!-- Change Password Script -->
<script>
  function changePassword() {
    // Placeholder function for changing password, can be implemented with Ajax to send data to server
    alert('Password change functionality to be implemented.');
  }
</script>
</body>
</html>
