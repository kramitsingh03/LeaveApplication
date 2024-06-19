<?php
include("header.php")

?>

        <div class="wrapper">
            <div class="container d-flex justify-content-start" style="margin-left:25vw;width:75vw">
                <div class="card card-primary" style="width:60%">
                    <div class="card-header">
                        <h3 class="card-title">Enter Department Details</h3>
                    </div>
                    
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Enter your email">
                            </div>
                            <div class="form-group">
                                <label for="department">Department</label>
                                <input type="text" class="form-control" id="department" placeholder="Enter department name">
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->

        <!-- /.content -->
    </div>
 

<?php
include("side-navbar.php")

?>

