<!-- display all employee -->
<?php
include("./includes/config.php");

try {
    // Fetch all employees
    $stmt = $conn->prepare("SELECT empid, name, designation, department FROM tblemployees");
    $stmt->execute();

    // Fetch all results as an associative array
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>




















<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Employee Dashboard</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    .content-wrapper {
      margin-left: 0; /* Remove the left margin */
    }
    .table-responsive {
      margin-top: 20px;
    }
    .btn-print {
      font-weight: bold;
      background-color: #343a40; /* Dark color */
      color: #fff; /* White text */
      border-color: #343a40; /* Dark border */
    }
    .btn-print:hover {
      background-color: #23272b; /* Darker color on hover */
      border-color: #1d2124; /* Darker border on hover */
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
            <h1 class="m-0">Employee Section</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <!-- Add New Employee Button -->
        <div class="mb-3">
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">Add New Employee</button>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Employee ID</th>
                        <th>Employee Name</th>
                        <th>Designation</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($employees)): ?>
                        <?php foreach ($employees as $employee): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($employee['empid']); ?></td>
                                <td><?php echo htmlspecialchars($employee['name']); ?></td>
                                <td><?php echo htmlspecialchars($employee['designation']); ?></td>
                                <td><?php echo htmlspecialchars($employee['department']); ?></td>
                                <td>
                                <a href="view-employee-detail.php?empid=<?php echo htmlspecialchars($employee['empid']); ?>" class="btn btn-info btn-sm">View</a>
                                <a href="update-employee.php?empid=<?php echo htmlspecialchars($employee['empid']); ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete-employee.php?empid=<?php echo htmlspecialchars($employee['empid']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
                                <a href="print-employee.php?empid=<?php echo htmlspecialchars($employee['empid']); ?>" class="btn btn-print btn-sm">Print</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-center">No employees found.</td>
                        </tr>
                    <?php endif; ?>
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

   <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Employee Dashboard</span>
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

<!-- Add Employee Modal -->
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addEmployeeModalLabel">Add New Employee</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="save-new-employee.php" method="post">
            <div class="mb-3">
                <label for="employeeId" class="form-label">Employee ID</label>
                <input type="text" class="form-control" id="employeeId" name="employeeId" placeholder="Enter Employee ID" required>
            </div>
            <div class="mb-3">
                <label for="employeeName" class="form-label">Employee Name</label>
                <input type="text" class="form-control" id="employeeName" name="employeeName" placeholder="Enter Employee Name" required>
            </div>
            <div class="mb-3">
                <label for="employeeEmail" class="form-label">Employee Email</label>
                <input type="email" class="form-control" id="employeeEmail" name="employeeEmail" placeholder="Enter Employee Email" required>
            </div>
            <div class="mb-3">
                <label for="employeePassword" class="form-label">Employee Password</label>
                <input type="password" class="form-control" id="employeePassword" name="employeePassword" placeholder="Enter Employee Password" required>
            </div>
            <div class="mb-3">
                <label for="gender" class="form-label">Gender</label><br>
                <label for="male" class="form-label">Male</label>
                <input type="radio" id="male" name="gender" value="male" required>
                <label for="female" class="form-label">Female</label>
                <input type="radio" id="female" name="gender" value="female" required>
                <label for="other" class="form-label">Other</label>
                <input type="radio" id="other" name="gender" value="other" required>
            </div>
            <div class="mb-3">
                <label for="Dob" class="form-label">Date of Birth</label>
                <input type="date" class="form-control" id="Dob" name="Dob" required>
            </div>
            <div class="mb-3">
                <label for="designation" class="form-label">Designation</label>
                <select class="form-control" name="designation" id="designation" required>
                    <option value="" disabled selected>--Select Designation--</option>
                    <option value="faculty">Faculty</option>
                    <option value="hod">Hod</option>
                    <option value="dean">Dean</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="department" class="form-label">Department</label>
                <select class="form-control" name="department" id="department" required>
                    <option value="" disabled selected>--Select Department--</option>
                    <option value="Computer Science Engineering">Computer Science Engineering</option>
                    <option value="Information Technology">Information Technology</option>
                    <option value="Civil Engineering">Civil Engineering</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
            </div>
            <div class="mb-3">
                <label for="employeePhone" class="form-label">Phone Number</label>
                <input type="number" maxlength="10" class="form-control" id="employeePhone" name="employeePhone" placeholder="Enter Phone Number" required>
            </div>
            <button type="submit" class="btn btn-primary">Add Employee</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap 5 JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>
</html>
