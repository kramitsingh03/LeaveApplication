<?php
include("./includes/config.php");

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token is valid
    $stmt = $conn->prepare("SELECT id FROM admin WHERE reset_token = :token");
    $stmt->bindParam(':token', $token);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $newPassword = $_POST['newPassword'];
            $confirmPassword = $_POST['confirmPassword'];

            if ($newPassword === $confirmPassword) {
                $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

                // Update the password
                $stmt = $conn->prepare("UPDATE admin SET password = :password, reset_token = NULL WHERE reset_token = :token");
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->bindParam(':token', $token);
                if ($stmt->execute()) {
                    echo "Your password has been successfully reset.";
                } else {
                    echo "Failed to reset your password.";
                }
            } else {
                echo "Passwords do not match.";
            }
        }
    } else {
        echo "Invalid or expired token.";
    }
} else {
    echo "No token provided.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
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
<body>
  <div class="container" style="background-color:#fff;padding:5rem;border-radius:20px;width:60vw">
    <h2>Reset Password</h2>
    <form action="reset-password.php?token=<?php echo htmlspecialchars($_GET['token']); ?>" method="post">
      <div class="form-group">
        <label for="newPassword" class="form-label">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required class="form-control">
      </div>
      <div class="form-group">
        <label for="confirmPassword" class="form-label">Confirm New Password:</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Reset Password</button>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
