<?php
include("header.php")

?>
<div class="wrapper">

    <!-- Main Content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Form -->
                <div class="container">
                    <h2>Add Designation </h2>
                    <form>
                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation" placeholder="Enter the designation">
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter the name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter the email">
                        </div>
                        <button type="add" class="btn btn-primary">Add</button>
                    </form>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->



</div>



<?php
include("side-navbar.php")

?>








