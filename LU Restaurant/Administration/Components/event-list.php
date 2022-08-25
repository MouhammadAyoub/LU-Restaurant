<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <span class="card-title" style="font-size:24px; margin: 10px 0px 0px 20px;">Our Events</span>
                                    
                                    <a href="./Add/addEvent.php"><button style="color:white;float:right; background-color:green; border:none;padding:10px;border-radius:5px;margin-right:20px;">Add new Event &nbsp; <i class="bi bi-plus-square-fill"></i></button></a>
                                      
                                </div>
                                <div class="card-body  table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <th>Event ID</th>
                                            <th>Event Name</th>
                                            <th>Description</th>
                                            <th>Date</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php getEvents();?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</div>