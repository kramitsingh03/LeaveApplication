<?php
include("header.php")

?>
<div class="wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Leave Application Form</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        
        <section class="content">
            <div class="container-fluid">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add leave type</h3>
                    </div>
                   
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="leaveType">Leave Type</label>
                                <select class="form-control" id="leaveType">
                                    <option>Sick Leave</option>
                                    <option>Casual Leave</option>
                                    <option>Maternity Leave</option>
                                    <option>Paternity Leave</option>
                                    <option>Annual Leave</option>
                                </select>
                            </div>
                          
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add leave type</button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add leave type</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
     
      
      <form>
                                <div class="form-group">
                                    <label for="leave">Leave Type</label>
                                    <input type="text" class="form-control" id="leave type" placeholder="Enter Leave Type">
                               
                            </form>





      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Add</button>
      </div>
    </div>
  </div>
</div>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>



<?php
include("side-navbar.php")

?>