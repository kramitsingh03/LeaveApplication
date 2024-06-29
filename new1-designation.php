<?php
include("./includes/config.php");

try {
    // Fetch all department data
    $stmt = $conn->prepare("SELECT id, department, designation, status FROM tbldesignation");
    $stmt->execute();
    $departments = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Designation Dashboard</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <?php include("./includes/navbar.php"); ?>
  <!-- /.navbar -->

  <!-- Control Sidebar -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" style="height:100vh">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Department Dashboard</span>
    </a>

    <!-- Sidebar -->
    <?php include("./includes/sidebar.php"); ?>
    <!-- /.sidebar -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid" style="margin-top: 70px;"> <!-- Added margin-top here -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Designations</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDepartmentModal">
                    Add Designation
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Status</th>
                        <th style="width: 150px">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php if (!empty($departments)): ?>
                        <?php foreach ($departments as $index => $department): ?>
                          <tr>
                            <td><?php echo $index + 1; ?></td>
                            <td><?php echo htmlspecialchars($department['id']); ?></td>
                            <td><?php echo htmlspecialchars($department['department']); ?></td>
                            <td><?php echo htmlspecialchars($department['designation']); ?></td>
                            <td>
                              <?php if ($department['status'] == 'active'): ?>
                                <button class="btn btn-success btn-sm activate" data-id="<?php echo $department['id']; ?>"><i class="fas fa-ban"></i> Activate</button>
                              <?php else: ?>
                                <button class="btn btn-danger btn-sm deactivate" data-id="<?php echo $department['id']; ?>"><i class="fas fa-check"></i> Deactivate</button>
                              <?php endif; ?>
                            </td>
                            <td>
                              <a href="update-designation.php?id=<?php echo $department['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                              <a href="delete-designation.php?id=<?php echo $department['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this department?');"><i class="fas fa-trash"></i></a>
                            </td>
                          </tr>
                        <?php endforeach; ?>
                      <?php else: ?>
                        <tr>
                          <td colspan="6" class="text-center">No data found</td>
                        </tr>
                      <?php endif; ?>
                    </tbody>
                  </table>
                </div>
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

  <!-- Modal for adding department -->
  <div class="modal fade" id="addDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addDepartmentModalLabel">Add Designation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="save-designation.php" method="post">
            <div class="form-group">
              <label for="designationID">ID</label>
              <input type="text" class="form-control" id="designationID" name="designationID" placeholder="Enter Designation ID">
            </div>
            <div class="form-group">
              <label for="departmentName">Department Name</label>
              <select name="deptname" id="deptname" class="form-control">
                <option selected>--Select Department name--</option>
                <option value="Computer Science and Engineering">Computer Science and Engineering</option>
                <option value="Information Technology">Information Technology</option>
                <option value="Civil Engineering">Civil Engineering</option>
                <option value="Mechanical Engineering">Mechanical Engineering</option>
              </select>
            </div>
            <div class="form-group">
              <label for="designationName">Designation</label>
              <input type="text" class="form-control" id="designationName" name="designationName" placeholder="Enter Designation">
            </div>
            <!-- <div class="form-group">
                <label for="status" class="form-label">Status</label>
                <select name="status" id="status" class="form-control">
                    <option selected>--Select Status--</option>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal for adding designation -->

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Bootstrap 5 -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>

  <script>
    $(document).ready(function(){
      $('#addDepartmentForm').submit(function(event){
        event.preventDefault();
        $('#addDepartmentModal').modal('hide');
        $('#addDesignationModal').modal('show');
      });

      $('#addDesignationForm').submit(function(event){
        event.preventDefault();
        // Add your saving logic here
        $('#addDesignationModal').modal('hide');
      });
    });
  </script>
</body>
</html>
