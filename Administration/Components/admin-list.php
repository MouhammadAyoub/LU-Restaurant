


<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title">Our Admins</h4>
                                    
                                    <a href="./Add/addAdmin.php"><button style="color:white;float:right; background-color:green; border:none;padding:10px;border-radius:5px;margin-right:20px;">Add new Admin &nbsp; <i class="bi bi-plus-square-fill"></i></button></a>
                                    

                                </div>
                                <div class="card-body  table-responsive">
                                    
                                <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Username</th>
                                            <th>Password</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Is Super</th>
                                            <th></th>
                                        </thead>
                                        <tbody>

                                           <?php 
                                           
                                           getAdmins();
                                           
                                           ?>
                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</div>