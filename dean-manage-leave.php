<?php
session_start();
$email = $_SESSION['email'];
include("./includes/config.php");
try {

  $stmt1 = $conn->prepare("SELECT name,password,img FROM admin WHERE email = :email");
  $stmt1->bindParam(':email', $email);
  $stmt1->execute();
  $admin = $stmt1->fetch(PDO::FETCH_ASSOC);
  // Assuming the email is stored in the session
// Check if user is logged in

} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}
// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['designation'] != 'dean') {
    header("Location: index.php");
    exit;
}

// Include the database configuration file


// Function to determine badge class based on status
function getStatusBadgeClass($status) {
    switch ($status) {
        case 'Pending':
            return 'badge-warning';
        case 'Approved':
            return 'badge-success';
        case 'Rejected':
            return 'badge-danger';
        default:
            return 'badge-secondary';
    }
}

// Update status if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['application_id'])) {
    $application_id = $_POST['application_id'];
    $new_status = $_POST['action'] == 'approve' ? 'Approved' : 'Rejected';

    try {
        $stmt = $conn->prepare("UPDATE tblleaveapplication SET status = :status WHERE id = :id");
        $stmt->bindParam(':status', $new_status);
        $stmt->bindParam(':id', $application_id);
        $stmt->execute();
        // Assuming the email is stored in the session
// Check if user is logged in

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

// Retrieve all leave applications
try {
    $stmt = $conn->prepare("SELECT id, name, email, department, status FROM tblleaveapplication");
    $stmt->execute();

    // Fetch all the data
    $applications = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>HOD Dashboard</title>

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

<!-- Main Sidebar Container -->


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
<!-- /.modal -->

</div>
    <!-- /.navbar -->

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
            <!-- Leave Applications -->
            <li class="nav-item">
              <a href="display-dean-leave-application.php" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Leave Application</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="hod-manage-leave.php" class="nav-link">
                <i class="nav-icon fas fa-file-alt"></i>
                <p>Manage Leave</p>
              </a>
            </li>
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
              <h1 class="m-0">Manage Leave</h1>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Table -->
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Department</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (count($applications) > 0): ?>
                    <?php foreach ($applications as $application): ?>
                      <tr>
                        <td><?php echo htmlspecialchars($application['id']); ?></td>
                        <td><?php echo htmlspecialchars($application['name']); ?></td>
                        <td><?php echo htmlspecialchars($application['email']); ?></td>
                        <td><?php echo htmlspecialchars($application['department']); ?></td>
                        <td><span class="badge <?php echo getStatusBadgeClass($application['status']); ?>"><?php echo htmlspecialchars($application['status']); ?></span></td>
                        <td class="table-actions">
                          <form method="post" action="">
                            <input type="hidden" name="application_id" value="<?php echo htmlspecialchars($application['id']); ?>">
                            <button type="submit" name="action" value="approve" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Approve</button>
                            <button type="submit" name="action" value="reject" class="btn btn-danger btn-sm"><i class="fas fa-times"></i> Reject</button>
                          </form>
                        </td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="6">No records found.</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

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
  <!-- ./wrapper -->
</body>
</html>