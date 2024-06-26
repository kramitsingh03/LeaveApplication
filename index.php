<?php
session_start();
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT id, password, designation FROM admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['designation'] = $user['designation'];
            
            // Redirect based on designation
            switch ($user['designation']) {
                case 'admin':
                    header("Location: Dashboard.php");
                    break;
                case 'dean':
                    header("Location: dean-dashboard.php");
                    break;
                case 'hod':
                    header("Location: hod-dashboard.php");
                    break;
                case 'faculty':
                    header("Location: faculty-dashboard.php");
                    break;
                default:
                    $error = "Invalid designation.";
            }
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Custom CSS -->
  <style>
    body {
      background-image: url('https://www.nitp.ac.in/static/685e11af58859d405b102d0f0f43291f/d8255/IMG_20220109_124221_1920x1080.jpg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Arial', sans-serif;
    }
    .login-box {
      max-width: 500px;
      width: 100%;
      padding: 20px;
      background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);
      backdrop-filter: blur(8px);
      border-radius: 10px;
    }
    .card {
      background: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .login-logo {
      font-size: 1.8rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
      color: white;
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }
    .login-box-msg {
      font-size: 1.2rem;
      font-weight: bold;
    }
    .error {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
<div class="login-box">
  <div class="login-logo">
    Welcome to Leave Management System of NITP
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg text-center">Log in</p>
      <?php if (isset($error)): ?>
        <div class="error"><?php echo $error; ?></div>
      <?php endif; ?>
      <form action="index.php" method="post">
        <div class="input-group mb-3">
          <input type="email" name="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="forgot.php" class="btn btn-default btn-block">Forgot Password</a>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Log In</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- jQuery and Bootstrap JS -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>
</html>
