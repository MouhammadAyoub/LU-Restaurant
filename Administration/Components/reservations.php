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
                                    <h4 class="card-title" style="color:#3878BA;font-weight:bold;margin: 15px 0px 0px 15px;font-size: 27px;padding-bottom:25px;">Our Reservations:</h4>
                                </div>
                                <div class="card-body  table-responsive">
                                    <table class="table table-hover table-striped" >
                                        <thead >
                                            <th style="font-size: 19px;color:gray;font-weight:bold;padding-left:50px;">Name</th>
                                            <th style="font-size: 19px;color:gray;font-weight:bold;padding-left:15px;">Phone</th>
                                            <th style="font-size: 19px;color:gray;font-weight:bold;">Table ID</th>
                                            <th style="font-size: 19px;color:gray;font-weight:bold;">Guests</th>
                                            <th style="font-size: 19px;color:gray;font-weight:bold;padding-left:60px;">Date</th>
                                            <th></th>
                                        </thead>
                                        <tbody>
                                            <?php getReservations();?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
</div>