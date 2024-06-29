<?php
include("./includes/config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $contact = filter_var($_POST['contact'], FILTER_SANITIZE_STRING);
    $address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
    $department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
    $leaveType = filter_var($_POST['leaveType'], FILTER_SANITIZE_STRING);
    $startDate = filter_var($_POST['startDate'], FILTER_SANITIZE_STRING);
    $endDate = filter_var($_POST['endDate'], FILTER_SANITIZE_STRING);
    $reason = filter_var($_POST['reason'], FILTER_SANITIZE_STRING);

    // File upload handling
    $photo = $_FILES['photo']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($photo);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file is an actual image
    if (isset($_FILES["photo"])) {
        $check = getimagesize($_FILES["photo"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check file size
    if ($_FILES["photo"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // If everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["photo"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Prepare the SQL statement
    try {
        $stmt = $conn->prepare("INSERT INTO tblleaveapplication (name, email, contact, address, department, leavetype, startdate, enddate, reason, photo) VALUES (:name, :email, :contact, :address, :department, :leavetype, :startdate, :enddate, :reason, :photo)");
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':contact', $contact);
        $stmt->bindParam(':address', $address);
        $stmt->bindParam(':department', $department);
        $stmt->bindParam(':leavetype', $leaveType);
        $stmt->bindParam(':startdate', $startDate);
        $stmt->bindParam(':enddate', $endDate);
        $stmt->bindParam(':reason', $reason);
        $stmt->bindParam(':photo', $photo);

        // Execute the statement
        if ($stmt->execute()) {
           header("Location: display-leave-application.php");
        } else {
            echo "Error submitting leave application.";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
