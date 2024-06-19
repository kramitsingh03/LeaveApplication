<?php
session_start();

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['designation'] != 'faculty') {
    header("Location: index.php");
    exit;
}
?>

 <p><a href="logout.php">Logout</a></p>

 <?php
include('side-navbar.php');
?>
 
  <!-- Custom CSS -->
  


<div class="wrapper">

  <!-- Navbar -->
  <?php
include('side-navbar.php');
?>
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
      <!-- <div class="container-fluid"> -->
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Employee Section</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      <!-- </div>/.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <!-- <div class="container-fluid"> -->
        <!-- Add New Employee Button -->
        <div class="mb-3">
          <button type="button" class="btn btn-primary">Add New Employee</button>
        </div>

        <!-- Employees Table -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Employee ID</th>
                <th>Employee Name</th>
                <th>Designation</th>
                <th>Department</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <!-- Sample Data (more rows added) -->
              <tr>
                <td>001</td>
                <td>John Doe</td>
                <td>Software Engineer</td>
                <td>IT Department</td>
                <td>Pending</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm">View</button>
                  <button type="button" class="btn btn-primary btn-sm">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm">Delete</button>
                  <button type="button" class="btn btn-print btn-sm">Print</button>
                </td>
              </tr>
              <tr>
                <td>002</td>
                <td>Jane Smith</td>
                <td>HR Manager</td>
                <td>Human Resources</td>
                <td>Inactive</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm">View</button>
                  <button type="button" class="btn btn-primary btn-sm">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm">Delete</button>
                  <button type="button" class="btn btn-print btn-sm">Print</button>
                </td>
              </tr>
              <tr>
                <td>003</td>
                <td>James Johnson</td>
                <td>Accountant</td>
                <td>Finance</td>
                <td>Active</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm">View</button>
                  <button type="button" class="btn btn-primary btn-sm">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm">Delete</button>
                  <button type="button" class="btn btn-print btn-sm">Print</button>
                </td>
              </tr>
              <tr>
                <td>004</td>
                <td>Linda Williams</td>
                <td>Marketing Manager</td>
                <td>Marketing</td>
                <td>Active</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm">View</button>
                  <button type="button" class="btn btn-primary btn-sm">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm">Delete</button>
                  <button type="button" class="btn btn-print btn-sm">Print</button>
                </td>
              </tr>
              <tr>
                <td>005</td>
                <td>Robert Brown</td>
                <td>Project Manager</td>
                <td>Project Management</td>
                <td>Inactive</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm">View</button>
                  <button type="button" class="btn btn-primary btn-sm">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm">Delete</button>
                  <button type="button" class="btn btn-print btn-sm">Print</button>
                </td>
              </tr>
              <tr>
                <td>006</td>
                <td>John Doe</td>
                <td>Software Engineer</td>
                <td>IT Department</td>
                <td>Active</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm">View</button>
                  <button type="button" class="btn btn-primary btn-sm">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm">Delete</button>
                  <button type="button" class="btn btn-print btn-sm">Print</button>
                </td>
              </tr>
              <tr>
                <td>007</td>
                <td>John Doe</td>
                <td>Software Engineer</td>
                <td>IT Department</td>
                <td>Pending</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm">View</button>
                  <button type="button" class="btn btn-primary btn-sm">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm">Delete</button>
                  <button type="button" class="btn btn-print btn-sm">Print</button>
                </td>
              </tr>
              <tr>
                <td>008</td>
                <td>John Doe</td>
                <td>Software Engineer</td>
                <td>IT Department</td>
                <td>Pending</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm">View</button>
                  <button type="button" class="btn btn-primary btn-sm">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm">Delete</button>
                  <button type="button" class="btn btn-print btn-sm">Print</button>
                </td>
              </tr>
              <tr>
                <td>009</td>
                <td>John Doe</td>
                <td>Software Engineer</td>
                <td>IT Department</td>
                <td>Active</td>
                <td>
                  <button type="button" class="btn btn-info btn-sm">View</button>
                  <button type="button" class="btn btn-primary btn-sm">Edit</button>
                  <button type="button" class="btn btn-danger btn-sm">Delete</button>
                  <button type="button" class="btn btn-print btn-sm">Print</button>
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
      <!-- </div>/.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <!-- <div class="float-right d-none d-sm-inline">
      Employee Dashboard
    </div> -->
    <!-- Default to the left -->
    <!-- <strong>Employee Dashboard &copy; 2024</strong> -->
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery and Bootstrap JS -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
