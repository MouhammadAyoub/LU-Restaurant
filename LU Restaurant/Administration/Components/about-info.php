<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card strpied-tabled-with-hover">
                <div class="card-header ">
                    <h4 class="card-title" style="color:#3878BA;font-weight:bold;margin: 15px 0px 0px 15px;font-size: 27px;">About Details:</h4>

                        <a href="./Edit/editAbout.php"><button style="margin:10px 0px;color:white;float:right; background-color:rgb(251,188,4); border:none;padding:10px;border-radius:5px;margin-right:20px;">EDIT &nbsp; <i class="bi bi-pencil-square"></i></button></a>

                </div>
                <div class="card-body  table-responsive">
                    <table class="table table-hover table-striped" style="text-align: center;">
                        <?php getAboutInfo(); ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>