<?php
session_start();

// Check if the user is logged in and is a dean
if (!isset($_SESSION['user_id']) || $_SESSION['designation'] != 'dean') {
    header("Location: index.php");
    exit;
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
            <a href="leave-application.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Leave Application
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="dean-dashboard.php" class="nav-link">
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

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          <!-- Button for Apply Leave -->
          <div class="mb-3">
            <a href="leave-application.php" class="btn btn-primary">
              Apply Leave
            </a>
          </div>

          <!-- Table -->
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>johndoe@example.com</td>
                    <td>
                      <span class="badge badge-warning">Pending</span>
                    </td>
                    <td class="table-actions">
                      <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#viewModal"><i class="fas fa-eye"></i> View</a>
                      <a href="#" class="btn btn-info btn-sm"><i class="fas fa-edit"></i> Edit</a>
                      <a href="#" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Update</a>
                      <a href="#" class="btn btn-success btn-sm" data-toggle="modal" data-target="#approveLeaveModal"><i class="fas fa-check"></i> Approve Leave</a>
                    </td>
                  </tr>
                  <!-- Add more rows as needed -->
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
  <!-- ./wrapper -->
</body>
</html>