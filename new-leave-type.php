<?php
include("./includes/config.php");

$leaveTypes = []; // Initialize $leaveTypes array to avoid undefined variable error

try {
    // Fetch all leave types
    $stmt = $conn->prepare("SELECT leaveid, leavetype, description, daysallowed, status FROM tblleavetype");
    $stmt->execute();

    // Fetch all results as an associative array
    $leaveTypes = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leave Type Dashboard</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <style>
    /* Add extra space after the navbar */
    .navbar {
      margin-bottom: 70px; /* Adjust this value as needed */
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav>
    <?php include("./includes/navbar.php"); ?>
  </nav>
  <!-- /.navbar -->

  <!-- Sidebar -->
  <?php include("./includes/sidebar.php"); ?>
  <!-- /.sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Leave Types</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addLeaveTypeModal">
                    Add Leave Type
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body" style="width:70vw">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>ID</th>
                      <th>Leave Type</th>
                      <th>Description</th>
                      <th>Days Allowed</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (count($leaveTypes) > 0): ?>
                      <?php foreach ($leaveTypes as $index => $leaveType): ?>
                        <tr>
                          <td><?php echo htmlspecialchars(++$index) ?></td>
                          <td><?php echo htmlspecialchars($leaveType['leaveid']); ?></td>
                          <td><?php echo htmlspecialchars($leaveType['leavetype']); ?></td>
                          <td><?php echo htmlspecialchars($leaveType['description']); ?></td>
                          <td><?php echo htmlspecialchars($leaveType['daysallowed']); ?></td>
                          <td>
                            <?php if ($leaveType['status'] == 'active'): ?>
                              <button class="btn btn-success btn-sm m-1"><i class="fas fa-check"></i> Active</button>
                            <?php else: ?>
                              <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Inactive</button>
                            <?php endif; ?>
                          </td>
                          <td>
                            <a href="update-leave-type.php?id=<?php echo htmlspecialchars($leaveType['leaveid']); ?>" class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i></a>
                            <a href="delete-leave-type.php?id=<?php echo htmlspecialchars($leaveType['leaveid']); ?>" class="btn btn-danger btn-sm m-1" onclick="return confirm('Are you sure you want to delete this leave type?');"><i class="fas fa-trash"></i></a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="7">No leave types found.</td>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Modal for adding leave type -->
  <div class="modal fade" id="addLeaveTypeModal" tabindex="-1" role="dialog" aria-labelledby="addLeaveTypeModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addLeaveTypeModalLabel">Add Leave Type</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="save-leave-type.php" method="post">
            <div class="form-group">
              <label for="leaveTypeId">ID</label>
              <input type="text" class="form-control" id="leaveTypeId" name="leaveTypeId" placeholder="Enter ID" required>
            </div>
            <div class="form-group">
              <label for="leaveType">Leave Type</label>
              <input type="text" class="form-control" id="leaveType" name="leaveType" placeholder="Enter Leave Type" required>
            </div>
            <div class="form-group">
              <label for="leaveDescription">Description</label>
              <input type="text" class="form-control" id="leaveDescription" name="leaveDescription" placeholder="Enter Description" required>
            </div>
            <div class="form-group">
              <label for="daysAllowed">Days Allowed</label>
              <input type="number" class="form-control" id="daysAllowed" name="daysAllowed" placeholder="Enter Days Allowed" required>
            </div>
            <div class="form-group">
              <label for="leaveStatus">Status</label>
              <select class="form-control" id="leaveStatus" name="leaveStatus" required>
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

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>
</html>
