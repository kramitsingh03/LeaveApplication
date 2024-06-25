<?php
include("./includes/config.php");

try {
    // Fetch all leave applications
    $stmt = $conn->prepare("SELECT id, name, email, contact, address, department, leavetype, startdate, enddate, reason, photo FROM tblleaveapplication");
    $stmt->execute();

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

  <!-- Custom CSS -->
</head>
<body>

    <!-- Sidebar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Faculty Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Leave Application -->
          <li class="nav-item">
            <a href="faculty-leave-application.php" class="nav-link">
              <i class="nav-icon fas fa-calendar-alt"></i>
              <p>
                Leave Application
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
      <?php
      include("./includes/navbar.php");
      ?>
    <!-- /.sidebar -->

    <div class="container mt-5" style="margin-left:300px;width:75vw">
    <div class="mb-3" style="float:right">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Apply for leave
</button>
        </div>

        
<!-- modal start here -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Leave Application Form</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      
      
      <form action="save-faculty-leave-application.php" method="post" enctype="multipart/form-data">
            <div class="card">
                <div class="card-header">
                    <h3>Leave Application Form</h3>
                </div>
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
                            <option value="">--Select Department--</option>
                            <option>Computer Science and Engineering</option>
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
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>










      
      </div>
      
    </div>
  </div>
</div>
<!-- modal end here -->








        <h2>Leave Applications</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
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
                        <th>Photo</th>
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
                                <td>
                                    <?php if (!empty($application['photo'])): ?>
                                        <img src="uploads/<?php echo htmlspecialchars($application['photo']); ?>" alt="Photo" style="width: 100px; height: auto;">
                                    <?php else: ?>
                                        No Photo
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="11" class="text-center">No leave applications found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>








    <!-- jQuery -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>
</html>
