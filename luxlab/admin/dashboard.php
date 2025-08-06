<?php
include "topbar.php";
?>
<title>Admin dashboard</title>
<?php
include "sidebar.php";
?>

    <div class="page-wrapper">

        <div class="page-body">
            <div class="row">

                <!-- order-card start -->
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Orders Received</h6>
                            <h2 class="text-right"><i class="ti-truck f-left"></i><span>486</span></h2>
                            <p class="m-b-0">Completed Orders<span class="f-right">351</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-green order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Sales</h6>
                            <h2 class="text-right"><i class="ti-receipt f-left"></i><span>1641</span></h2>
                            <p class="m-b-0">This Month<span class="f-right">213</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-yellow order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Revenue</h6>
                            <h2 class="text-right"><i class="ti-reload f-left"></i><span>Rs 42,562</span></h2>
                            <p class="m-b-0">This Month<span class="f-right">Rs 5,032</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-3">
                    <div class="card bg-c-pink order-card">
                        <div class="card-block">
                            <h6 class="m-b-20">Total Profit</h6>
                            <h2 class="text-right"><i class="ti-stats-up f-left"></i><span>Rs 9,562</span></h2>
                            <p class="m-b-0">This Month<span class="f-right">Rs 542</span></p>
                        </div>
                    </div>
                </div>
                <!-- order-card end -->



            </div>
        </div>

        <div id="styleSelector">

        </div>
    </div>

<?php
include "footer.php";
?>