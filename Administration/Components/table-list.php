<style>
    tbody:before {
    content:"@";
    display:block;
    line-height:20px;
    text-indent:-99999px;
}
</style>

<div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover">
                                <div class="card-header ">
                                    <h4 class="card-title" style="color:#3878BA;font-weight:bold;margin: 15px 0px 0px 15px;font-size: 27px;">Our Tables:</h4>
                                    
                                    <a href="./Add/addTable.php"><button style="color:white;float:right; background-color:green; border:none;padding:10px;border-radius:5px;margin-right:20px;">Add new Table &nbsp; <i class="bi bi-plus-square-fill"></i></button></a>
                                    
                                </div>
                                <div class="card-body  table-responsive">
                                    <table class="table table-hover table-striped" >
                                        <thead>
                                            <th style="font-size: 19px;color:gray;font-weight:bold;padding-left:70px;">Table ID</th>
                                            <th style="font-size: 19px;color:gray;font-weight:bold;">Nbr Of Chairs</th>
                                            <th style="font-size: 19px;color:gray;font-weight:bold;">Is Free</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php getTables();?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</div>