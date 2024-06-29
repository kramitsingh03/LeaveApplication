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

<p><a href="logout.php">Logout</a></p>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dean Dashboard</title>

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/css/adminlte.min.css">

  <!-- Bootstrap CSS (required by AdminLTE) -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Bootstrap JS (required by AdminLTE) -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

  <!-- AdminLTE JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.1.0/js/adminlte.min.js"></script>

  <!-- Optional: Moment.js for date/time handling -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

  <!-- Your custom styles -->
  <style>
    .table-actions a {
      margin-right: 10px;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

   
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

    <!-- Change Password Modal -->
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
          <form id="changePasswordForm" method="post" action="dean-dashboard.php">
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
  <!-- /.modal -->


    <!-- Main Sidebar Container -->
   <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Dean Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Admin Section -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Admin Section
              </p>
            </a>
          </li> -->
          <!-- Employee Section -->
          <!-- <li class="nav-item">
            <a href="new-faculty.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employee Section
              </p>
            </a>
          </li> -->
          <!-- Department Section -->
          <!-- <li class="nav-item">
            <a href="new-department.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Department Section
              </p>
            </a>
          </li> -->
          <!-- Leave Applications -->
          <li class="nav-item">
            <a href="display-dean-leave-application.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Leave Application
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="dean-manage-leave.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
              Manage Leave              </p>
            </a>
          </li>
          <!-- Master Settings -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Master Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Status</p>
                </a>
              </li>
            </ul>
          </li> -->
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Dean Dashboard</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

     <?php
     include("./includes/totaldashboard.php");
     ?>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal for Apply Leave -->
    <div class="modal fade" id="applyLeaveModal" tabindex="-1" role="dialog" aria-labelledby="applyLeaveModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="applyLeaveModalLabel">Apply Leave</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Leave application form -->
            <form>
              <div class="form-group">
                <label for="leaveStartDate">Start Date</label>
                <input type="date" class="form-control" id="leaveStartDate" required>
              </div>
              <div class="form-group">
                <label for="leaveEndDate">End Date</label>
                <input type="date" class="form-control" id="leaveEndDate" required>
              </div>
              <div class="form-group">
                <label for="leaveReason">Reason</label>
                <textarea class="form-control" id="leaveReason" rows="3" required></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Apply</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal -->

    <!-- Modal for Approve Leave -->
    <div class="modal fade" id="approveLeaveModal" tabindex="-1" role="dialog" aria-labelledby="approveLeaveModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="approveLeaveModalLabel">Approve Leave</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Leave approval form -->
            <form>
              <div class="form-group">
                <label for="leaveApprovalDate">Approval Date</label>
                <input type="date" class="form-control" id="leaveApprovalDate" required>
              </div>
              <div class="form-group">
                <label for="leaveComments">Comments</label>
                <textarea class="form-control" id="leaveComments" rows="3" required></textarea>
              </div>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-success">Approve</button>
          </div>
        </div>
      </div>
    </div>
    <!-- /.modal -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <!-- To be filled as needed -->
    </footer>
  </div>
  <!-- ./wrapper --><script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
<!-- Change Password Script -->
<script>
  function changePassword() {
    // Placeholder function for changing password, can be implemented with Ajax to send data to server
    alert('Password change functionality to be implemented.');
  }
</script>

</body>
</html>