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
            } else {
                echo "Error updating password.";
            }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>







<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-light">
    <div class="container-fluid">
      <!-- Start navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <!-- End navbar links -->

      <ul class="navbar-nav ml-auto">
        <!-- User Dropdown Menu -->
        <li class="nav-item dropdown user-menu">
          <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
           <img src="<?php echo htmlspecialchars($admin['img']); ?>" class="user-image img-circle shadow" alt="User Image">
            <span class="d-none d-md-inline"><?php echo htmlspecialchars($admin['name']); ?></span>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <!-- User image -->
            <li class="user-header bg-primary">
              <img src="<?php echo htmlspecialchars($admin['img']); ?>" class="img-circle shadow" alt="User Image">
              <p>
              <?php echo htmlspecialchars($admin['name']); ?>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <a href="#" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#changePasswordModal">Change Password</a>
              <a href="logout.php" class="btn btn-secondary btn-flat float-right">Logout</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Main Sidebar Container -->


  <!-- Change Password Modal -->
  <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
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
            <input type="password" value="<?php echo($currentPassword) ?>"  class="form-control" id="currentPassword" name="currentPassword" required>
        </div>
        <div class="form-group">
            <label for="newPassword">New Password</label>
            <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirm New Password</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
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
<!-- ./wrapper -->

