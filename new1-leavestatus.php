<?php
include("./includes/config.php");

try {
    // Prepare the SQL statement to fetch data from tblleaves
    $stmt = $conn->prepare("SELECT id, statustype, status FROM tblleaves");
    $stmt->execute();
    $leaveStatuses = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leave Applications Dashboard</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
   <!-- jQuery -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
  <style>
    /* Add extra space after the navbar */
    body {
            margin: 0;
            padding: 0;
        }
        .content-wrapper {
            margin-top: 20px;
            padding: 20px;
        }
        .main-sidebar {
            width: 250px;
        }
        .table-container {
            margin-left: 16px; /* Adjusted for sidebar width */
            width: calc(100% - 16px); /* Adjusted for sidebar width */
        }
        .modal-content {
            max-width: 100%;
        }
    .content {
      margin-top: 80px; /* Adjust this value as needed */
    }
   
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include("./includes/navbar.php"); ?>

  <!-- Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="height:100vh">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Department Dashboard</span>
    </a>

    <?php include("./includes/sidebar.php"); ?>
  </aside>
  <!-- /.sidebar -->

  <!-- Main content -->
  <section class="content d-flex justify-content-end" style="margin-left:300px">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Leave Status</h3>
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
                    <th>ID</th>
                    <th>Status Type</th>
                    <th>Status</th>
                    <th style="width: 150px">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($leaveStatuses as $leaveStatus): ?>
                    <tr>
                      <td><?php echo htmlspecialchars($leaveStatus['id']); ?></td>
                      <td><?php echo htmlspecialchars($leaveStatus['statustype']); ?></td>
                      <td>
                        <?php if ($leaveStatus['status'] == 'active'): ?>
                          <button class="btn btn-success btn-sm" onclick="updateStatus('<?php echo $leaveStatus['id']; ?>', 'active')"><i class="fas fa-ban"></i> Activate</button>
                        <?php else: ?>
                          <button class="btn btn-danger btn-sm" onclick="updateStatus('<?php echo $leaveStatus['id']; ?>', 'inactive')"><i class="fas fa-check"></i> Deactivate</button>
                        <?php endif; ?>
                      </td>
                      <td>
                        <a href="update-status.php?id=<?php echo $leaveStatus['id']; ?>" class="btn btn-warning btn-sm m-1"><i class="fas fa-edit"></i></a>
                        <button class="btn btn-danger btn-sm m-1" onclick="deleteStatus('<?php echo $leaveStatus['id']; ?>')"><i class="fas fa-trash"></i></button>
                      </td>
                    </tr>
                  <?php endforeach; ?>
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

<!-- Modal for adding leave status -->
<div class="modal fade" id="addLeaveStatusModal" tabindex="-1" aria-labelledby="addLeaveStatusModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLeaveStatusModalLabel">Add Leave Status</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="save-leave-status.php" method="post">
          <div class="mb-3">
            <label for="statusType" class="form-label">Status Type</label>
            <input type="text" class="form-control" id="statusType" name="statustype" placeholder="Enter Status Type" required>
          </div>
          <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
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
  function deleteStatus(id) {
    if (confirm('Are you sure you want to delete this status?')) {
      window.location.href = 'delete-status.php?id=' + id;
    }
  }
</script>
</body>
</html>
