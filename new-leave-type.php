<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leave Type Dashboard</title>
  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://adminlte.io/themes/v3/dist/css/adminlte.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <!-- <nav class="main-header navbar navbar-expand navbar-white navbar-light"> -->
    <!-- Left navbar links -->
    <!-- <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      
    </ul> -->
  </nav>
  <!-- /.navbar -->

  
   

      

  <!-- Content Wrapper. Contains page content -->
  >
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Leave Type </h1>
          <!-- </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div> -->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Leave Type Applications</h3>
                <div class="card-tools">
                  <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addLeaveTypeModal">
                    Add Leave Type
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
                      <th>Leave Type</th>
                      <th>Description</th>
                      <th>Days Allowed</th>
                      <th>Status</th>
                      <th style="width: 150px">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>LT001</td>
                      <td>Annual Leave</td>
                      <td>Annual leave for personal reasons</td>
                      <td>30</td>
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
                      <td>LT002</td>
                      <td>Sick Leave</td>
                      <td>Leave for medical reasons</td>
                      <td>15</td>
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
                      <td>LT003</td>
                      <td>Maternity Leave</td>
                      <td>Leave for maternity reasons</td>
                      <td>90</td>
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
                      <td>LT004</td>
                      <td>Emergency Leave</td>
                      <td>Leave for emergencies</td>
                      <td>5</td>
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
                      <td>LT005</td>
                      <td>Unpaid Leave</td>
                      <td>Leave without pay</td>
                      <td>Unlimited</td>
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

 
<!-- ./wrapper -->

<!-- Modal for adding leave type -->
<div class="modal fade" id="addLeaveTypeModal" tabindex="-1" role="dialog" aria-labelledby="addLeaveTypeModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addLeaveTypeModalLabel">Add Leave Type</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="leaveTypeId">ID</label>
            <input type="text" class="form-control" id="leaveTypeId" placeholder="Enter ID">
          </div>
          <div class="form-group">
            <label for="leaveType">Leave Type</label>
            <input type="text" class="form-control" id="leaveType" placeholder="Enter Leave Type">
          </div>
          <div class="form-group">
            <label for="leaveDescription">Description</label>
            <input type="text" class="form-control" id="leaveDescription" placeholder="Enter Description">
          </div>
          <div class="form-group">
            <label for="daysAllowed">Days Allowed</label>
            <input type="number" class="form-control" id="daysAllowed" placeholder="Enter Days Allowed">
          </div>
          <div class="form-group">
            <label for="leaveStatus">Status</label>
            <select class="form-control" id="leaveStatus">
              <option value="active">Active</option>
              <option value="inactive">Inactive</option>
            </select>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
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
</body>
</html>