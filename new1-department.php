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
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul> -->

    <!-- Right navbar links -->
    <!-- <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="#"><i class="fas fa-home"></i> Home</a>
      </li> -->
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <!-- <div class="content-wrapper"> -->
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
                <th>Designation</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Sample Data (more rows added) -->
              <tr>
                <td>001</td>
                <td>IT Department</td>
                <td>Software Engineer</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm btn-action">View</button>
                  <button type="button" class="btn btn-primary btn-sm btn-action">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm btn-action">Delete</button>
                </td>
              </tr>
              <tr>
                <td>002</td>
                <td>Human Resources</td>
                <td>HR Manager</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm btn-action">View</button>
                  <button type="button" class="btn btn-primary btn-sm btn-action">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm btn-action">Delete</button>
                </td>
              </tr>
              <tr>
                <td>003</td>
                <td>Finance</td>
                <td>Accountant</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm btn-action">View</button>
                  <button type="button" class="btn btn-primary btn-sm btn-action">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm btn-action">Delete</button>
                </td>
              </tr>
              <tr>
                <td>004</td>
                <td>Marketing</td>
                <td>Marketing Manager</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm btn-action">View</button>
                  <button type="button" class="btn btn-primary btn-sm btn-action">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm btn-action">Delete</button>
                </td>
              </tr>
              <tr>
                <td>005</td>
                <td>Project Management</td>
                <td>Project Manager</td>
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

  <!-- Add Department Modal -->
  <div class="modal fade" id="addDepartmentModal" tabindex="-1" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addDepartmentModalLabel">Add Department</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="addDepartmentForm">
            <div class="form-group">
              <label for="departmentId">Department ID</label>
              <input type="text" class="form-control" id="departmentId" name="departmentId" required>
            </div>
            <div class="form-group">
              <label for="departmentName">Department Name</label>
              <input type="text" class="form-control" id="departmentName" name="departmentName" required>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" form="addDepartmentForm" class="btn btn-primary">Add Department</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- <div class="float-right d-none d-sm-inline">
      Department Dashboard
    </div> -->
    <!-- Default to the left -->
    <!-- <strong>Department Dashboard &copy; 2024</strong> -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery and Bootstrap JS -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function() {
    $('#addDepartmentForm').on('submit', function(event) {
      event.preventDefault();
      // Add your AJAX form submission code here to handle the form data
      // Example:
      // $.ajax({
      //   url: 'your_backend_script.php',
      //   type: 'POST',
      //   data: $(this).serialize(),
      //   success: function(response) {
      //     // Handle success
      //     alert('Department added successfully');
      //     $('#addDepartmentModal').modal('hide');
      //     // Optionally, refresh the page or update the UI dynamically
      //   },
      //   error: function(error) {
      //     // Handle error
      //     alert('An error occurred');
      //   }
      // });
      alert('Department added successfully (this is a placeholder, implement backend logic)');
      $('#addDepartmentModal').modal('hide');
    });
  });
</script>
</body>
</html>
