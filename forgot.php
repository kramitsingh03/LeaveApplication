<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password Page</title>
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
      background: rgba(255, 255, 0, 0.9); /* Yellow color */
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .login-logo {
      font-size: 1.8rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 20px;
      color: black; /* Black color */
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
    }
    .login-box-msg {
      font-size: 1.2rem;
      font-weight: bold;
      color: white; /* Ensure text is readable on the yellow background */
    }
    .form-control {
      background-color: white; /* Make form input fields white for better contrast */
    }
    .input-group.mb-3 {
      margin-top: -10px; /* Adjust position of the input group */
    }
    .input-group-text {
      background-color: white; /* Make input group addon white for better contrast */
    }
  </style>
</head>
<body>
<div class="login-box">
  <div class="login-logo" style="color: black; font-weight: bold;">
    Forgot Password
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg text-center">Enter your email to reset your password</p>

      <form action="forget.html" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <a href="index.php" class="btn btn-default btn-block">Back to Login</a>
          </div>
          <!-- /.col -->
          <div class="col-6">
            <button type="submit" class="btn btn-primary btn-block">Submit</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery and Bootstrap JS -->
<script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
<script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>
</body>
</html>