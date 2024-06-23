<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['designation'] != 'hod') {
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

    .modal-dialog {
      max-width: 75%;
      margin: 1.75rem auto;
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
            <a href="#" class="nav-link" data-toggle="modal" data-target="#leaveApplicationModal">
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
                <span class="info-box-text">Total Leave</span>
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
    <!-- /.modal -->

    <!-- Leave Application Modal -->
    <div class="modal fade" id="leaveApplicationModal" tabindex="-1" role="dialog" aria-labelledby="leaveApplicationModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="leaveApplicationModalLabel">Leave Application Form</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="leaveApplicationForm">
              <div class="form-group">
                <label for="employeeName">Name</label>
                <input type="text" class="form-control" id="employeeName" name="employeeName" required>
              </div>
              <div class="form-group">
                <label for="employeeEmail">Email</label>
                <input type="email" class="form-control" id="employeeEmail" name="employeeEmail" required>
              </div>
              <div class="form-group">
                <label for="employeeDepartment">Department</label>
                <input type="text" class="form-control" id="employeeDepartment" name="employeeDepartment" required>
              </div>
              <div class="form-group">
                <label for="employeeContact">Contact Number</label>
                <input type="text" class="form-control" id="employeeContact" name="employeeContact" required>
              </div>
              <div class="form-group">
                <label for="employeeAddress">Address</label>
                <textarea class="form-control" id="employeeAddress" name="employeeAddress" rows="3" required></textarea>
              </div>
              <div class="form-group">
                <label for="leaveType">Leave Type</label>
                <select class="form-control" id="leaveType" name="leaveType" required>
                  <option value="Sick Leave">Sick Leave</option>
                  <option value="Casual Leave">Casual Leave</option>
                  <option value="Maternity Leave">Maternity Leave</option>
                  <option value="Annual Leave">Annual Leave</option>
                </select>
              </div>
              <div class="form-group">
                <label for="startDate">Start Date</label>
                <input type="date" class="form-control" id="startDate" name="startDate" required>
              </div>
              <div class="form-group">
                <label for="endDate">End Date</label>
                <input type="date" class="form-control" id="endDate" name="endDate" required>
              </div>
              <div class="form-group">
                <label for="leaveReason">Reason for Leave</label>
                <textarea class="form-control" id="leaveReason" name="leaveReason" rows="3" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
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

  <!-- Custom JavaScript to handle the modal -->
  <script>
    $(document).ready(function() {
      $('#leaveApplicationForm').on('submit', function(e) {
        e.preventDefault();
        // Handle form submission logic here
        alert('Leave application submitted!');
        $('#leaveApplicationModal').modal('hide');
      });
    });
  </script>
</body>
</html>
