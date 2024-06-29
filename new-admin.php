<?php
include("./includes/config.php");

try {
    // Prepare the SQL statement
    $stmt = $conn->prepare("SELECT id, name, email, designation,img FROM admin WHERE id = 17");
    $stmt->execute();

    // Fetch the row from the executed statement
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Detail</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <style>
    .action-btns .fas {
        font-size: 1.5em;
        /* Increase the icon size */
        font-weight: bold;
        /* Ensure the icons are bold */
    }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <div class="wrapper">

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
                                        class="user-image img-circle shadow" alt="User Image">
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

            <!-- Main Sidebar Container -->


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
                            <form id="changePasswordForm" method="post" action="faculty-dashboard.php">
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
                                    <input type="password" class="form-control" id="confirmPassword"
                                        name="confirmPassword" required>
                                </div>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Change Password</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.modal -->

        </div>
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
                        <div class="col-sm-6">
                            <h1>Admin Detail</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
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
                                    <h3 class="card-title">Admin Detail</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (!empty($admin)): ?>
                                            <tr>
                                                <td><?php echo htmlspecialchars($admin['id']); ?></td>
                                                <td><?php echo htmlspecialchars($admin['name']); ?></td>
                                                <td><?php echo htmlspecialchars($admin['email']); ?></td>
                                                <td><?php echo htmlspecialchars($admin['designation']); ?></td>
                                                <td class="action-btns">
                                                    <a href="update-admin.php?id=<?php echo $admin['id']; ?>"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="delete-admin.php?id=<?php echo $admin['id']; ?>"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Are you sure you want to delete this admin?');">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="5">No data found.</td>
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