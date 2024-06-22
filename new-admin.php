

<!-- display all admin -->
<?php
include("./includes/config.php");

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT id,name, email, designation FROM admin");
    $stmt->execute();

    // Fetch all the rows from the executed statement
    $admins = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>












<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
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
<?php 
include("./includes/navbar.php");
?>
  <!-- /.navbar -->



 <!-- Main Sidebar Container -->
 
    <!-- Sidebar -->
  <?php 
  include("./includes/sidebar.php");
  ?>
    <!-- /.sidebar -->



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
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
                <h3 class="card-title">Admin List</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addAdminModal">
                    Add Admin
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-bordered">
      <thead>
        <tr>
          <th style="width: 10px">ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Designation</th>
          <th style="width: 100px">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php if (!empty($admins)): ?>
          <?php foreach ($admins as $admin):
            ?>
            <tr>
              <td><?php echo htmlspecialchars($admin['id']) ?></td>
              <td><?php echo htmlspecialchars($admin['name']) ?></td>
              <td><?php echo htmlspecialchars($admin['email']); ?></td>
              <td><?php echo htmlspecialchars($admin['designation']); ?></td>
              <td>
              <a href="update-admin.php?id=<?php echo $admin['id']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</a>
              <a href="delete-admin.php?id=<?php echo $admin['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this admin?');"><i class="fas fa-trash"></i> Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else: ?>
          <tr>
            <td colspan="4">No data found.</td>
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

  <!-- Main Footer -->
 


<!-- Modal for adding admin -->
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-labelledby="addAdminModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addAdminModalLabel">Add Admin</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="save-new-admin.php" method="post">
        <div class="form-group">
            <label for="adminName">Name :</label>
            <input type="text" class="form-control" id="adminName" name="adminName" placeholder="Enter Name" required>
          </div>
          <div class="form-group">
            <label for="adminEmail">Email address</label>
            <input type="email" class="form-control" id="adminEmail" name="adminEmail" placeholder="Enter email" required>
          </div>
          <div class="form-group">
            <label for="adminPassword">Password</label>
            <input type="password" class="form-control" id="adminPassword" name="adminPassword" placeholder="Enter Password" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
<?php
include("./includes/footer.php");

?>
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