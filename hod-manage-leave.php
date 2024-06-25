<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['designation'] != 'hod') {
    header("Location: index.php");
    exit;
}

// Pagination variables
$records_per_page = 5;
$current_page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;

// Example data array (replace with your actual data retrieval logic)
$applications = array(
    array('id' => 1, 'name' => 'John Doe', 'email' => 'johndoe@example.com', 'department' => 'Computer Science', 'status' => 'Pending'),
    array('id' => 2, 'name' => 'Jane Smith', 'email' => 'janesmith@example.com', 'department' => 'Mathematics', 'status' => 'Approved'),
    array('id' => 3, 'name' => 'Michael Johnson', 'email' => 'michaeljohnson@example.com', 'department' => 'Physics', 'status' => 'Rejected'),
    array('id' => 4, 'name' => 'Emily Davis', 'email' => 'emilydavis@example.com', 'department' => 'Biology', 'status' => 'Pending'),
    array('id' => 5, 'name' => 'William Brown', 'email' => 'williambrown@example.com', 'department' => 'Chemistry', 'status' => 'Approved'),
    array('id' => 6, 'name' => 'Sophia Wilson', 'email' => 'sophiawilson@example.com', 'department' => 'English', 'status' => 'Pending'),
    array('id' => 7, 'name' => 'Daniel Martinez', 'email' => 'danielmartinez@example.com', 'department' => 'History', 'status' => 'Approved'),
);

// Apply pagination
$total_records = count($applications);
$total_pages = ceil($total_records / $records_per_page);

// Get current page of applications
$current_applications = array_slice($applications, $offset, $records_per_page);

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
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <span class="brand-text font-weight-light">HOD Dashboard</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Leave Applications -->
            <li class="nav-item">
              <a href="leave-application.php" class="nav-link">
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
              <h1 class="m-0">Recent Applications</h1>
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
                  <?php foreach ($current_applications as $application): ?>
                    <tr>
                      <td><?php echo $application['id']; ?></td>
                      <td><?php echo $application['name']; ?></td>
                      <td><?php echo $application['email']; ?></td>
                      <td><?php echo $application['department']; ?></td>
                      <td><span class="badge <?php echo getStatusBadgeClass($application['status']); ?>"><?php echo $application['status']; ?></span></td>
                      <td class="table-actions">
                        <a href="#" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> View</a>
                        <a href="#" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                        <a href="#" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Recommend</a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
              <ul class="pagination pagination-sm m-0 float-right">
                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                  <li class="page-item <?php echo ($i == $current_page) ? 'active' : ''; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                  </li>
                <?php endfor; ?>
              </ul>
            </div>
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

  <!-- PHP function to determine badge class based on status -->
  <?php
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
  ?>
</body>
</html>