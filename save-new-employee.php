<?php
include("./includes/config.php"); // Database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve and sanitize form inputs
    $employeeId = htmlspecialchars($_POST['employeeId']);
    $employeeName = htmlspecialchars($_POST['employeeName']);
    $employeeEmail = htmlspecialchars($_POST['employeeEmail']);
    $employeePassword = password_hash($_POST['employeePassword'], PASSWORD_BCRYPT); // Hashing the password
    $employeeDesignation = htmlspecialchars($_POST['employeeDesignation']);
    $employeeDepartment = htmlspecialchars($_POST['employeeDepartment']);
    $employeeContact = htmlspecialchars($_POST['employeeContact']);
    $employeeAddress = htmlspecialchars($_POST['employeeAddress']);
    
    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["employeePhoto"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["employeePhoto"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
    
    // Check file size
    if ($_FILES["employeePhoto"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["employeePhoto"]["tmp_name"], $target_file)) {
            // Prepare SQL and bind parameters
            $stmt = $conn->prepare("INSERT INTO employees (employeeId, employeeName, employeeEmail, employeePassword, employeeDesignation, employeeDepartment, employeeContact, employeeAddress, employeePhoto) VALUES (:employeeId, :employeeName, :employeeEmail, :employeePassword, :employeeDesignation, :employeeDepartment, :employeeContact, :employeeAddress, :employeePhoto)");
            
            $stmt->bindParam(':employeeId', $employeeId);
            $stmt->bindParam(':employeeName', $employeeName);
            $stmt->bindParam(':employeeEmail', $employeeEmail);
            $stmt->bindParam(':employeePassword', $employeePassword);
            $stmt->bindParam(':employeeDesignation', $employeeDesignation);
            $stmt->bindParam(':employeeDepartment', $employeeDepartment);
            $stmt->bindParam(':employeeContact', $employeeContact);
            $stmt->bindParam(':employeeAddress', $employeeAddress);
            $stmt->bindParam(':employeePhoto', $target_file);


            $stmt1 = $conn->prepare("INSERT INTO admin (id, name, email, password, designation,img) VALUES (:employeeId, :employeeName, :employeeEmail, :employeePassword, :employeeDesignation, :employeePhoto)");
            $stmt1->bindParam(':employeeId', $employeeId);
            $stmt1->bindParam(':employeeName', $employeeName);
            $stmt1->bindParam(':employeeEmail', $employeeEmail);
            $stmt1->bindParam(':employeePassword', $employeePassword);
            $stmt1->bindParam(':employeeDesignation', $employeeDesignation);
            $stmt1->bindParam(':employeePhoto', $target_file);
           
            
            // Execute the query
            if ($stmt->execute() AND  $stmt1->execute()) {
                header("Location: new-faculty.php");
            } else {
                echo "Error: " . $stmt->errorInfo();
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
} else {
    echo "Invalid request method.";
}
?>
