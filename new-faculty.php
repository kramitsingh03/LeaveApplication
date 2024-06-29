<?php
session_start();
include("./includes/config.php"); // Database connection file

try {
    $stmt = $conn->prepare("SELECT * FROM employees");
    $stmt->execute();
    $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $email = $_SESSION['email']; // Assuming the email is stored in the session
// Check if user is logged in
$stmt = $conn->prepare("SELECT name,password,img FROM admin WHERE email = :email");
$stmt->bindParam(':email', $email);
$stmt->execute();
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
    <title>Employee Dashboard</title>
    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <style>
    .content-wrapper {
        margin-left: 0;
        /* Remove the left margin */
    }

    .table-responsive {
        margin-top: 20px;
    }

    .btn-print {
        font-weight: bold;
        background-color: #343a40;
        /* Dark color */
        color: #fff;
        /* White text */
        border-color: #343a40;
        /* Dark border */
    }

    .btn-print:hover {
        background-color: #23272b;
        /* Darker color on hover */
        border-color: #1d2124;
        /* Darker border on hover */
    }

    .img-placeholder {
        width: 150px;
        height: 150px;
        border: 2px dashed #ccc;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 14px;
        color: #aaa;
        margin-bottom: 10px;
        margin-left: auto;
        margin-right: auto;
    }

    .modal-xl-45 {
        max-width: 45%;
    }
    </style>
</head>

<body class="hold-transition">
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
                                <img src="<?php echo htmlspecialchars($admin['img']); ?>" class="img-circle shadow"
                                    alt="User Image">
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

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Employees</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <!-- Add New Employee Button -->
                    <div class="mb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            data-bs-target="#addEmployeeModal">Add New Employee</button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Employee Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Department</th>
                                    <th>Contact No.</th>
                                    <th>Address</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($employees)): ?>
                                <?php foreach ($employees as $employee): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($employee['employeeId']); ?></td>
                                    <td><?php echo htmlspecialchars($employee['employeeName']); ?></td>
                                    <td><?php echo htmlspecialchars($employee['employeeEmail']); ?></td>
                                    <td><?php echo htmlspecialchars($employee['employeeDesignation']); ?></td>
                                    <td><?php echo htmlspecialchars($employee['employeeDepartment']); ?></td>
                                    <td><?php echo htmlspecialchars($employee['employeeContact']); ?></td>
                                    <td><?php echo htmlspecialchars($employee['employeeAddress']); ?></td>
                                    <td><img src="<?php echo htmlspecialchars($employee['employeePhoto']); ?>"
                                            alt="Employee Photo" style="width:50px; height:50px;"></td>
                                    <td>

                                        <a href="update-employee.php?empid=<?php echo htmlspecialchars($employee['employeeId']); ?>"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <a href="delete-employee.php?empid=<?php echo htmlspecialchars($employee['employeeId']); ?>"
                                            class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure you want to delete this employee?');">Delete</a>
                                        <a href="print-employee.php?empid=<?php echo htmlspecialchars($employee['employeeId']); ?>"
                                            class="btn btn-print btn-sm">Print</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                                <?php else: ?>
                                <tr>
                                    <td colspan="9" class="text-center">No employees found.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="d-flex justify-content-center">
                        <nav aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <li class="page-item active" aria-current="page">
                                    <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Sidebar -->
        <?php include("./includes/sidebar.php"); ?>

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <!-- <div class="float-right d-none d-sm-inline">
      Employee Dashboard
    </div> -->
            <!-- Default to the left -->
            <!-- <strong>Employee Dashboard &copy; 2024</strong> -->
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- Add Employee Modal -->
    <div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="addEmployeeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addEmployeeModalLabel">Add New Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="save-new-employee.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <div class="img-placeholder">
                                    <label for="employeePhoto" class="form-label">Upload Photo</label> <span
                                        style="color: red;">*</span>
                                    <input type="file" class="form-control" id="employeePhoto" name="employeePhoto"
                                        required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="employeeId" class="form-label">Employee ID</label> <span
                                        style="color: red;">*</span>
                                    <input type="text" class="form-control" id="employeeId" name="employeeId"
                                        placeholder="Enter Employee ID" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="employeeName" class="form-label">Employee Name</label> <span
                                        style="color: red;">*</span>
                                    <input type="text" class="form-control" id="employeeName" name="employeeName"
                                        placeholder="Enter Employee Name" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="employeeEmail" class="form-label">Employee Email</label> <span
                                        style="color: red;">*</span>
                                    <input type="email" class="form-control" id="employeeEmail" name="employeeEmail"
                                        placeholder="Enter Employee Email" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="employeePassword" class="form-label">Employee Password</label> <span
                                        style="color: red;">*</span>
                                    <input type="password" class="form-control" id="employeePassword"
                                        name="employeePassword" placeholder="Enter Employee Password" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="employeeDesignation" class="form-label">Employee Designation</label>
                                    <span style="color: red;">*</span>
                                    <select name="employeeDesignation" class="form-control" id="employeeDesignation"
                                        required>
                                        <option>--SELECT EMPLOYEE DESIGNATION--</option>
                                        <option value="Faculty">Faculty</option>
                                        <option value="Dean">Dean</option>
                                        <option value="Hod">Hod</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="employeeDepartment" class="form-label">Employee Department</label> <span
                                        style="color: red;">*</span>
                                    <select class="form-control" id="employeeDepartment" name="employeeDepartment"
                                        required>
                                        <option>--SELECT EMPLOYEE DEPARTMENT--</option>
                                        <option value="Computer Science Engineering">Computer Science Engineering
                                        </option>
                                        <option value="Information Technology">Information Technology</option>
                                        <option value="Civil Engineering">Civil Engineering</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="employeeContact" class="form-label">Employee Contact No.</label> <span
                                        style="color: red;">*</span>
                                    <input type="text" class="form-control" id="employeeContact" name="employeeContact"
                                        placeholder="Enter Employee Contact No." required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="employeeAddress" class="form-label">Employee Address</label> <span
                                        style="color: red;">*</span>
                                    <input type="text" class="form-control" id="employeeAddress" name="employeeAddress"
                                        placeholder="Enter Employee Address" required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save Employee</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- View Employee Modal -->


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE JS -->
    <script src="https://adminlte.io/themes/v3/plugins/jquery/jquery.min.js"></script>
    <script src="https://adminlte.io/themes/v3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>

    <!-- Custom JS -->
    <script>
    $(document).ready(function() {
        $('.view-employee-btn').on('click', function() {
            var empid = $(this).data('empid');
            $.ajax({
                url: 'get-employee-details.php',
                type: 'POST',
                data: {
                    empid: empid
                },
                dataType: 'json',
                success: function(response) {
                    if (response) {
                        $('#viewEmployeeId').val(response.empid);
                        $('#viewEmployeeName').val(response.name);
                        $('#viewEmployeeEmail').val(response.email);
                        $('#viewEmployeeDesignation').val(response.designation);
                        $('#viewEmployeeDepartment').val(response.department);
                        $('#viewEmployeeContact').val(response.contact);
                        $('#viewEmployeeAddress').val(response.address);
                        $('#viewEmployeePhoto').html('<img src="path-to-photos-folder/' +
                            response.photo + '" class="img-fluid">');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
    </script>

</body>

</html>