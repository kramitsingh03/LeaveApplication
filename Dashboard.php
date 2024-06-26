<?php
session_start();

// Check if the user is logged in and is an admin

if (!isset($_SESSION['user_id']) || $_SESSION['designation'] != 'admin') {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

   <!-- AdminLTE CSS -->
   <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Custom CSS -->
  <style>
    .content-wrapper {
      margin-left: 250px;
    }
    </style>








  <!-- Add your custom styles here -->
</head>
<body>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Custom CSS -->
  <style>
    .info-box {
      min-height: 100px;
    }
    .info-box .info-box-icon {
      height: 100px;
      line-height: 100px;
    }
    .info-box .info-box-content {
      padding-top: 20px;
    }
    .pagination-wrapper {
      display: flex;
      justify-content: flex-end;
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

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
       
        <p><a class="btn btn-danger" href="logout.php">Logout</a></p>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="Dashboard.php" class="brand-link">
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
   <?php 
include("./includes/sidebar.php")
   ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Total Employees -->
          <div class="col-lg-4 col-6">
            <div class="info-box bg-info">
              <span class="info-box-icon"><i class="fas fa-users"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Employees</span>
                <span class="info-box-number">150</span>
              </div>
            </div>
          </div>
          <!-- Total Departments -->
          <div class="col-lg-4 col-6">
            <div class="info-box bg-success">
              <span class="info-box-icon"><i class="fas fa-building"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Departments</span>
                <span class="info-box-number">8</span>
              </div>
            </div>
          </div>
          <!-- Total Pending Leave -->
          <div class="col-lg-4 col-6">
            <div class="info-box bg-warning">
              <span class="info-box-icon"><i class="fas fa-hourglass-half"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Pending Leave</span>
                <span class="info-box-number">12</span>
              </div>
            </div>
          </div>
          <!-- Total Rejected Leave -->
          <div class="col-lg-4 col-6">
            <div class="info-box bg-danger">
              <span class="info-box-icon"><i class="fas fa-times"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Rejected Leave</span>
                <span class="info-box-number">5</span>
              </div>
            </div>
          </div>
          <!-- Total Approved Leave -->
          <div class="col-lg-4 col-6">
            <div class="info-box bg-primary">
              <span class="info-box-icon"><i class="fas fa-check"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total  Leave</span>
                <span class="info-box-number">35</span>
              </div>
            </div>
          </div>
          <!-- Total Recommended Applications -->
          <div class="col-lg-4 col-6">
            <div class="info-box bg-secondary">
              <span class="info-box-icon"><i class="fas fa-thumbs-up"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Total Recommended Applications</span>
                <span class="info-box-number">22</span>
              </div>
            </div>
          </div>
        </div>
        <!-- /.row -->

        <!-- Recent Employees Table -->
        <div class="card mt-4">
          <div class="card-header">
            <h3 class="card-title">Recent Employees</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sl No</th>
                    <th>Employee Name</th>
                    <th>ID</th>
                    <th>Leave Type</th>
                    <th>Current Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Sample Data (10 rows) -->
                  <tr>
                    <td>1</td>
                    <td>John Doe</td>
                    <td>EMP001</td>
                    <td>Sick Leave</td>
                    <td>Pending</td>
                    <td><button class="btn btn-info btn-sm">View Details</button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Jane Smith</td>
                    <td>EMP002</td>
                    <td>Casual Leave</td>
                    <td>Approved</td>
                    <td><button class="btn btn-info btn-sm">View Details</button></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>James Johnson</td>
                    <td>EMP003</td>
                    <td>Maternity Leave</td>
                    <td>Rejected</td>
                    <td><button class="btn btn-info btn-sm">View Details</button></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Linda Williams</td>
                    <td>EMP004</td>
                    <td>Annual Leave</td>
                    <td>Approved</td>
                    <td><button class="btn btn-info btn-sm">View Details</button></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Robert Brown</td>
                    <td>EMP005</td>
                    <td>Sick Leave</td>
                    <td>Pending</td>
                    <td><button class="btn btn-info btn-sm">View Details</button></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>Patricia Taylor</td>
                    <td>EMP006</td>
                    <td>Casual Leave</td>
                    <td>Rejected</td>
                    <td><button class="btn btn-info btn-sm">View Details</button></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>Michael Davis</td>
                    <td>EMP007</td>
                    <td>Maternity Leave</td>
                    <td>Approved</td>
                    <td><button class="btn btn-info btn-sm">View Details</button></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>Barbara Martinez</td>
                    <td>EMP008</td>
                    <td>Annual Leave</td>
                    <td>Pending</td>
                    <td><button class="btn btn-info btn-sm">View Details</button></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td>Paul Garcia</td>
                    <td>EMP009</td>
                    <td>Sick Leave</td>
                    <td>Rejected</td>
                    <td><button class="btn btn-info btn-sm">View Details</button></td>
                  </tr>
                  <tr>
                    <td>10</td>
                    <td>Mary Wilson</td>
                    <td>EMP010</td>
                    <td>Casual Leave</td>
                    <td>Approved</td>
                    <td><button class="btn btn-info btn-sm">View Details</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <div class="pagination-wrapper">
              <nav aria-label="Page navigation">
                <ul class="pagination">
                  <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
        <!-- /.card -->

      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 <?php 
 include("./includes/footer.php");
 ?>
<!-- </div> -->
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>
</html>




















