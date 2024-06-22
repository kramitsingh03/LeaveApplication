<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Designation Dashboard</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
   <!-- jQuery -->
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  
<?php
include("./includes/navbar.php");
?>


  <!-- /.navbar -->

 <!-- Control Sidebar -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4" style="height:100vh">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Department Dashboard</span>
    </a>

    <!-- Sidebar -->
   <?php
  include("./includes/sidebar.php");
   ?>
    <!-- /.sidebar -->
  </aside>
  <!-- /.control-sidebar -->
 

    <!-- Main content -->
    <section class="content  d-flex justify-content-end" style="margin-left:300px;margin-top:5vh">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Designations</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addDepartmentModal">
                    Add Designation
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>ID</th>
                      <th>Designation</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>101</td>
                      <td>Manager</td>
                      <td>
                        <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Deactivate</button>
                      </td>
                      <td>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>2</td>
                      <td>102</td>
                      <td>Assistant Manager</td>
                      <td>
                        <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Deactivate</button>
                      </td>
                      <td>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>3</td>
                      <td>103</td>
                      <td>Senior Developer</td>
                      <td>
                        <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Deactivate</button>
                      </td>
                      <td>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>104</td>
                      <td>Junior Developer</td>
                      <td>
                        <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Deactivate</button>
                      </td>
                      <td>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                      </td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>105</td>
                      <td>HR</td>
                      <td>
                        <button class="btn btn-success btn-sm"><i class="fas fa-check"></i> Activate</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-ban"></i> Deactivate</button>
                      </td>
                      <td>
                        <button class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i> Delete</button>
                      </td>
                    </tr>
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

<!-- Modal for adding department -->
<div class="modal fade" id="addDepartmentModal" tabindex="-1" role="dialog" aria-labelledby="addDepartmentModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDepartmentModalLabel">Add Department</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addDepartmentForm">
          <div class="form-group">
            <label for="departmentName">Department Name</label>
            <input type="text" class="form-control" id="departmentName" placeholder="Enter Department Name">
          </div>
          <button type="submit" class="btn btn-primary">Next</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal for adding designation -->
<div class="modal fade" id="addDesignationModal" tabindex="-1" role="dialog" aria-labelledby="addDesignationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addDesignationModalLabel">Add Designation</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addDesignationForm">
          <div class="form-group">
            <label for="designationId">ID</label>
            <input type="text" class="form-control" id="designationId" placeholder="Enter ID">
          </div>
          <div class="form-group">
            <label for="designationName">Designation</label>
            <input type="text" class="form-control" id="designationName" placeholder="Enter Designation">
          </div>
          <div class="form-group">
            <label for="designationStatus">Status</label>
            <select class="form-control" id="designationStatus">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Save</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap 4 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="https://adminlte.io/themes/v3/dist/js/adminlte.min.js"></script>

<script>
  $(document).ready(function(){
    $('#addDepartmentForm').submit(function(event){
      event.preventDefault();
      $('#addDepartmentModal').modal('hide');
      $('#addDesignationModal').modal('show');
    });

    $('#addDesignationForm').submit(function(event){
      event.preventDefault();
      // Add your saving logic here
      $('#addDesignationModal').modal('hide');
    });
  });
</script>
</body>
</html>