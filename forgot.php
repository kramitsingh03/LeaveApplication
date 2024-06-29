<?php
session_start();
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    // Check if user exists
    $stmt = $conn->prepare("SELECT id FROM admin WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $token = bin2hex(random_bytes(50));
        $stmt = $conn->prepare("UPDATE admin SET reset_token = :token WHERE email = :email");
        $stmt->bindParam(':token', $token);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        // Display the reset link on the screen (instead of sending an email)
        $resetLink = "http://localhost/leaveApplication-main/reset-password.php?token=$token";
        echo "<a class='btn btn-primary' href='$resetLink'>Verify user</a>";
    } else {
        echo "No account found with that email.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
    }
  </style>
</head>
<body class="d-flex justify-content-center align-items-center">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-4">
        <form action="forgot.php" method="post" class="mt-5 p-4 border rounded bg-light">
          <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input type="email" id="email" name="email" required class="form-control">
          </div>
          <button type="submit" class="btn btn-primary btn-block">Reset Password</button>
        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

