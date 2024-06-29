<?php

session_start();
include("./includes/config.php");

try {
    // Fetch all leave applications
    $stmt = $conn->prepare("SELECT id, name, email, contact, address, department, leavetype, startdate, enddate, reason, photo FROM tblleaveapplication");
    $stmt->execute();
    $email = $_SESSION['email']; // Assuming the email is stored in the session
// Check if user is logged in
$stmt1 = $conn->prepare("SELECT name,password,img FROM admin WHERE email = :email");
$stmt1->bindParam(':email', $email);
$stmt1->execute();
$admin = $stmt1->fetch(PDO::FETCH_ASSOC);

    // Fetch all results as an associative array
    $leaveApplications = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Applications</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <!-- Custom CSS 
    <style>
        .main-content {
            margin-top: 20px; /* Add margin-top for space after navbar */
            margin-left: 250px; /* Adjust sidebar width */
            width: 80%; /* Take up 80% of the viewport width */
        }

        @media (max-width: 992px) {
            .main-content {
                margin-left: 0;
                width: 100%; /* Full width on smaller screens */
            }
        }
    </style>-->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
   <!-- Navbar -->
   <nav class="main-header navbar navbar-expand navbar-light">
            <div class="container-fluid">
                <!-- Start navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                class="fas fa-bars"></i></a>
                    </li>
                </ul>
                <!-- End navbar links -->

                <ul class="navbar-nav ml-auto">
                    <!-- User Dropdown Menu -->
                    <li class="nav-item dropdown user-menu">
                        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                            <img src="<?php echo htmlspecialchars($admin['img']); ?>"
                                class="user-image img-circle shadow" alt="User Image">
                            <span class="d-none d-md-inline"><?php echo htmlspecialchars($admin['name']); ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <!-- User image -->
                            <li class="user-header bg-primary">
                                <img src="<?php echo htmlspecialchars($admin['img']); ?>"
                                    class="img-circle shadow" alt="User Image">
                                <p>
                                    <?php echo htmlspecialchars($admin['name']); ?>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <a href="#" class="btn btn-primary btn-flat" data-toggle="modal"
                                    data-target="#changePasswordModal">Change Password</a>
                                <a href="logout.php" class="btn btn-secondary btn-flat float-right">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        
        <!-- Change Password Modal -->
        <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="changePasswordModalLabel">Change Password</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Change Password Form -->
                        <form id="changePasswordForm" method="post" action="Dashboard.php">
                            <div class="form-group">
                                <label for="currentPassword">Current Password</label>
                                <input type="password" value="<?php echo($currentPassword) ?>" class="form-control"
                                    id="currentPassword" name="currentPassword" required>
                            </div>
                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" class="form-control" id="newPassword" name="newPassword"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="confirmPassword">Confirm New Password</label>
                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
                                    required>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.Change Password Modal -->
        <!-- /.navbar -->
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <?php include("./includes/sidebar.php"); ?>
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h1>Leave Application</h1>
          </div>
          
          <div class="col-sm-2" style="float:right">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Apply for leave
            </button>
        </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">List of Leave Applications</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Contact</th>
                      <th>Address</th>
                      <th>Department</th>
                      <th>Leave Type</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Reason</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($leaveApplications)): ?>
                        <?php foreach ($leaveApplications as $index => $application): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($application['id']); ?></td>
                                <td><?php echo htmlspecialchars($application['name']); ?></td>
                                <td><?php echo htmlspecialchars($application['email']); ?></td>
                                <td><?php echo htmlspecialchars($application['contact']); ?></td>
                                <td><?php echo htmlspecialchars($application['address']); ?></td>
                                <td><?php echo htmlspecialchars($application['department']); ?></td>
                                <td><?php echo htmlspecialchars($application['leavetype']); ?></td>
                                <td><?php echo htmlspecialchars($application['startdate']); ?></td>
                                <td><?php echo htmlspecialchars($application['enddate']); ?></td>
                                <td><?php echo htmlspecialchars($application['reason']); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" class="text-center">No leave applications found</td>
                        </tr>
                    <?php endif; ?>
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
	<!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Leave Application Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="save-admin-leave-application.php" method="post">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Leave Application Form</h3>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Name <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="contact">Contact No <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" id="contact" name="contact" placeholder="Enter Contact No" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="address">Address <span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="address" name="address" rows="3" placeholder="Enter your address" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="department">Department <span class="text-danger">*</span></label>
                                                <select class="form-control" id="department" name="department" required>
                                                    <option value="">--Select Department--</option>
                                                    <option>Computer Science and Engineering</option>
                                                    <option>Information Technology</option>
                                                    <option>Civil Engineering</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="leaveType">Leave Type <span class="text-danger">*</span></label>
                                                <select class="form-control" id="leaveType" name="leaveType" required>
                                                    <option>Sick Leave</option>
                                                    <option>Casual Leave</option>
                                                    <option>Maternity Leave</option>
                                                    <option>Paternity Leave</option>
                                                    <option>Annual Leave</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="startDate">Start Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="startDate" name="startDate" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="endDate">End Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" id="endDate" name="endDate" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="reason">Reason for Leave <span class="text-danger">*</span></label>
                                                <textarea class="form-control" id="reason" name="reason" rows="3" placeholder="Enter reason for leave" required></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal end -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <?php include("./includes/footer.php"); ?>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>
</html>
