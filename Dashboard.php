<?php
session_start();
include("./includes/config.php");
$email = $_SESSION['email']; // Assuming the email is stored in the session
// Check if user is logged in
$stmt = $conn->prepare("SELECT name,password,img FROM admin WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
$admin = $stmt->fetch(PDO::FETCH_ASSOC);
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to login page if not logged in
    exit;
}

// Now you can use the session variables
$user_id = $_SESSION['user_id'];
$designation = $_SESSION['designation'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if ($newPassword !== $confirmPassword) {
        echo "New passwords do not match.";
        exit;
    }

    try {
            // Update the password
            $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            $updateStmt = $conn->prepare("UPDATE admin SET password = :newPassword WHERE email = :email");
            $updateStmt->bindParam(':newPassword', $hashedNewPassword);
            $updateStmt->bindParam(':email', $email);

            if ($updateStmt->execute()) {
                echo "Password successfully updated.";
                header("Location: Dashboard.php");
            } else {
                echo "Error updating password.";
            }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <!-- Custom CSS -->
    <style>
    .content-wrapper {
        margin-left: 250px;
    }

    .info-box {
        min-height: 100px;
    }

    .info-box .info-box-icon {
        height: 100px;
        line-height: 100px;
    }

    .info-box .info-box-content {
        padding-top: 20px;
    }

    .pagination-wrapper {
        display: flex;
        justify-content: flex-end;
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
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
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="Dashboard.php" class="brand-link">
                <span class="brand-text font-weight-light">Admin Dashboard</span>
            </a>

            <!-- Sidebar -->
            <?php include("./includes/sidebar.php"); ?>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Main content -->
            <?php 
            include("./includes/totaldashboard.php");
            ?>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

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

        <!-- Main Footer -->
        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Anything you want
            </div>
            <strong>Copyright &copy; 2023 <a href="#">Your Company</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- AdminLTE Scripts -->
    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>

</html>