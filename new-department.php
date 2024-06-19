<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Department Dashboard</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Custom CSS -->
  <style>
    .content-wrapper {
      margin-left: 0; /* Remove the left margin */
    }
    .table-responsive {
      margin-top: 20px;
    }
    .btn-add-department {
      margin-bottom: 20px;
    }
    .btn-action {
      margin-right: 5px;
    }
  </style>
</head>
<body class="hold-transition">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Department Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Add New Department Button -->
        <div class="mb-3">
          <button type="button" class="btn btn-primary btn-add-department" data-toggle="modal" data-target="#addDepartmentModal">Add New Department</button>
        </div>

        <!-- Departments Table -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Department ID</th>
                <th>Department Name</th>
                <th>Department Short Name</th>
                <th>Department Code</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Sample Data (more rows added) -->
              <tr>
                <td>001</td>
                <td>Information Technology</td>
                <td>IT</td>
                <td>IT105</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm btn-action">View</button>
                  <button type="button" class="btn btn-primary btn-sm btn-action">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm btn-action">Delete</button>
                </td>
              </tr>
          
              <!-- Add more rows as needed -->
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->

        <!-- Pagination -->
        <div class="d-flex justify-content-center">
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
        <!-- /.d-flex -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Department Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Admin Section -->
          <li class="nav-item">
            <a href="new-admin.php" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Admin Section
              </p>
            </a>
          </li>
          <!-- Employee Section -->
          <li class="nav-item">
            <a href="new-faculty.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employee Section
              </p>
            </a>
          </li>
          <!-- Department Section -->
          <li class="nav-item">
            <a href="new-department.php" class="nav-link">
              <i class="nav-icon fas fa-building"></i>
              <p>
                Department Section
              </p>
            </a>
          </li>
          <!-- Leave Applications -->
          <li class="nav-item">
            <a href="new-leave-type.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Leave Type
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="new-leave-status.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Leave Status
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
  </footer>
</div>
<!-- ./wrapper -->

<!-- Add Department Modal -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDepartmentModalLabel">Add New Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="save-department.php" method="POST">
            <div class="form-group">
                <label for="departmentId">Department ID</label>
                <input type="text" class="form-control" id="departmentId" name="deptid" placeholder="Enter Department ID" required>
            </div>
            <div class="form-group">
                <label for="departmentName">Department Name</label>
                <input type="text" class="form-control" id="departmentName" name="deptname" placeholder="Enter Department Name" required>
            </div>
            <div class="form-group">
                <label for="dept-short-name">Department Short Name</label>
                <input type="text" class="form-control" id="dept-short-name" name="deptshortname" placeholder="Enter Department Short Name" required>
            </div>
            <div class="form-group">
                <label for="dept-code">Department Code</label>
                <input type="text" class="form-control" id="dept-code" name="deptcode" placeholder="Enter Department Code" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Department</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function() {
    $('.btn-add-department').on('click', function() {
      $('#addDepartmentModal').modal('show');
    });

    $('#addDepartmentForm').on('submit', function(e) {
      e.preventDefault();
      // Add your form submission logic here
      // You can send an AJAX request to save the data to your backend
      alert('New department added successfully!');
      $('#addDepartmentModal').modal('hide');
    });
  });
</script>
</body>
</html>
