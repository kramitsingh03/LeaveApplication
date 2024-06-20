<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leave Status Dashboard</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
    .nav-treeview {
      display: none; /* Hide the submenu by default */
    }
    .nav-item.show .nav-treeview {
      display: block; /* Show submenu when parent is active */
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
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
        <a class="nav-link" href="#" role="button">
          Logout <i class="fas fa-sign-out-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Admin Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Dashboard Section -->
          <!-- <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>Dashboard</p>
            </a>
          </li> -->
          <!-- Employee Section -->
          <li class="nav-item">
            <a href="new-faculty.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>Employees</p>
            </a>
          </li>
          <!-- Leave Application -->
          <li class="nav-item">
            <a href="leave-application.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>Leave Applications</p>
            </a>
          </li>
          <!-- Master Settings -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Master Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="new1-department.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Departments</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="new1-designation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="new1-leavetype.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Types</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="new1-leavestatus.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Status</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dropdown Option</p>
                </a>
              </li>
            </ul>
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
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Leave Status</h1>
        </div>
      </div><!-- /.container-fluid -->
    </div>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Leave Status Applications</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addLeaveStatusModal">
                  Add Leave Status
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>ID</th>
                    <th>Status Type</th>
                    <th>Description</th>
                    <th>Requested Date</th>
                    <th>Days Requested</th>
                    <th>Status</th>
                    <th style="width: 150px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>12345</td>
                    <td>Annual Leave</td>
                    <td>Annual leave for vacation</td>
                    <td>2024-05-15</td>
                    <td>10</td>
                    <td>
                      <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Deactivate</button>
                    </td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>12346</td>
                    <td>Sick Leave</td>
                    <td>Leave for medical reasons</td>
                    <td>2024-06-01</td>
                    <td>5</td>
                    <td>
                      <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Deactivate</button>
                    </td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>12347</td>
                    <td>Maternity Leave</td>
                    <td>Leave for maternity</td>
                    <td>2024-07-10</td>
                    <td>90</td>
                    <td>
                      <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Deactivate</button>
                    </td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>12348</td>
                    <td>Emergency Leave</td>
                    <td>Leave for family emergency</td>
                    <td>2024-08-20</td>
                    <td>3</td>
                    <td>
                      <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Deactivate</button>
                    </td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>12349</td>
                    <td>Unpaid Leave</td>
                    <td>Leave without pay</td>
                    <td>2024-09-15</td>
                    <td>20</td>
                    <td>
                      <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Deactivate</button>
                    </td>
                    <td>
                      <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                      <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
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

<!-- Modal for adding leave status -->
<div class="modal fade" id="addLeaveStatusModal" tabindex="-1" aria-labelledby="addLeaveStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLeaveStatusModalLabel">Add Leave Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
          <div class="mb-3">
            <label for="statusId" class="form-label">ID</label>
            <input type="text" class="form-control" id="statusId" placeholder="Enter ID">
          </div>
          <div class="mb-3">
            <label for="statusType" class="form-label">Status Type</label>
            <input type="text" class="form-control" id="statusType" placeholder="Enter Status Type">
          </div>
          <div class="mb-3">
            <label for="statusDescription" class="form-label">Description</label>
            <input type="text" class="form-control" id="statusDescription" placeholder="Enter Description">
          </div>
          <div class="mb-3">
            <label for="requestedDate" class="form-label">Requested Date</label>
            <input type="date" class="form-control" id="requestedDate" placeholder="Enter Requested Date">
          </div>
          <div class="mb-3">
            <label for="daysRequested" class="form-label">Days Requested</label>
            <input type="number" class="form-control" id="daysRequested" placeholder="Enter Days Requested">
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap and necessary plugins -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
<script>
  // Toggle submenu in sidebar
  document.addEventListener('DOMContentLoaded', function () {
    let links = document.querySelectorAll('.nav-link');
    links.forEach(function (link) {
      link.addEventListener('click', function (event) {
        let submenu = this.nextElementSibling;
        if (submenu && submenu.classList.contains('nav-treeview')) {
          event.preventDefault();
          submenu.classList.toggle('show');
        }
      });
    });
  });
</script>
</body>
</html>
