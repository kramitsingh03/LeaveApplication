<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Application Form</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Sidebar -->
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
          <!-- Admin Section -->
          <!-- <li class="nav-item">
            <a href="new-admin.php" class="nav-link">
              <i class="nav-icon fas fa-user-shield"></i>
              <p>
                Admin Section
              </p>
            </a>
          </li> -->
          <!-- Employee Section -->
          <li class="nav-item">
            <a href="new-faculty.php" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Employee Section
              </p>
            </a>
          </li>
          <!-- Leave Application -->
          <li class="nav-item">
               <a href="leave-application.php" class="nav-link">
               <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                       Leave Application
                 </p>
                     </a>
           </li>

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
          <!-- <li class="nav-item">
            <a href="new-leave-type.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Leave Type
              </p>
            </a>
          </li> -->
          <!-- <li class="nav-item">
            <a href="new-leave-status.php" class="nav-link">
              <i class="nav-icon fas fa-file-alt"></i>
              <p>
                Leave Status
              </p>
            </a>
          </li> -->
          <!-- Master Settings -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Master Settings
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="new1-department.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Department</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="new1-designation.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Designation</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="new1-leavetype.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Type</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="new1-leavestatus.php" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Leave Status</p>
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
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Leave Application Form</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Fill in the details</h3>
                    </div>
                    
                    <form action="save-leave-application.php" method="post" enctype="multipart/form-data">
    <div class="card-body">
        <!-- Photograph Upload -->
        <div class="form-group">
            <label for="photo">Upload Photograph</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>

        <!-- Personal Details Section -->
        <h4>Personal Details</h4>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
        </div>
        <div class="form-group">
            <label for="contact">Contact No</label>
            <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact No">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address"></textarea>
        </div>
        
        <!-- Organizational Details Section -->
        <h4>Organizational Details</h4>
        <div class="form-group">
            <label for="department">Department</label>
            <select class="form-control" id="department" name="department">
                <option>--Select Department--</option>
                <option>Computer science and engineering</option>
                <option>Information Technology</option>
                <option>Civil Engineering</option>
            </select>
        </div>
        <div class="form-group">
            <label for="leaveType">Leave Type</label>
            <select class="form-control" id="leaveType" name="leaveType">
                <option>Sick Leave</option>
                <option>Casual Leave</option>
                <option>Maternity Leave</option>
                <option>Paternity Leave</option>
                <option>Annual Leave</option>
            </select>
        </div>
        <div class="form-group">
            <label for="startDate">Start Date</label>
            <input type="date" class="form-control" id="startDate" name="startDate">
        </div>
        <div class="form-group">
            <label for="endDate">End Date</label>
            <input type="date" class="form-control" id="endDate" name="endDate">
        </div>
        <div class="form-group">
            <label for="reason">Reason for Leave</label>
            <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter reason for leave"></textarea>
        </div>
    </div>
    <!-- /.card-body -->

    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

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
</div>
<!-- ./wrapper -->

<!-- AdminLTE JS -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>
</html>
