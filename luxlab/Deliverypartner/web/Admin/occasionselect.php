<?php
include "topbar.php";
?>
<title>occasion dress view</title>
<?php
include "sidebar.php";
?>
<style type="text/css">
.card {
    padding: 20px;
    width: 300px;
    min-height: 350px;
    border-radius: 20px;
    background: #e8e8e8;
    box-shadow: 5px 5px 6px #dadada,
        -5px -5px 6px #f6f6f6;
    transition: 0.4s;
}

.card:hover {
    translate: 0 -10px;
}

.card-title {
    font-size: 18px;
    font-weight: 600;
    color: #2e54a7;
    margin: 15px 0 0 10px;
}

.card-image {
    min-height: 200px;
    background-color: #c9c9c9;
    border-radius: 15px;
    box-shadow: inset 8px 8px 10px #c3c3c3,
        inset -8px -8px 10px #cfcfcf;
}

.card-body {
    padding: 10px; /* Add padding for spacing */
    color: #1f1f1f; /* Use hexadecimal color for better contrast */
    font-size: 15px;
}

.card-text {
    line-height: 1.5; /* Add line height for better readability */
}

.attribute {
    font-weight: bold; /* Make attribute text bold */
    color: #2e54a7; /* Add color for better contrast */
}

.value {
    color: #636363; /* Add color for better contrast */
}

.footer {
    float: right;
    margin: 28px 0 0 18px;
    font-size: 13px;
    color: #636363;
}

.by-name {
    font-weight: 700;
}
</style>


<!-- start your design down-->

<!-- <img src="../screenshots/'.$row['image'].'" width=230px height=170px /> -->
<div class="page-wrapper">

    <div class="page-body">
        <div class="row">

            <!-- Start Blank Page -->

            <div class="col-sm-12 text-center">
                <div class="container">
                    <div class="row">
                        <?php
            include_once 'connection.php';
            $sqlview="SELECT main.id as mid,occ.occ_name,col.color_name,drs.dress_type,main.special_instruction,main.image,main.active,main.creation_date from tab_occasiondress main LEFT join tab_occasion occ on main.occ_id=occ.id LEFT JOIN tab_color col ON main.color_id=col.id LEFT JOIN tab_dresstype drs ON main.dresstype_id=drs.id";//sql query  to fetch data//
            $result= mysqli_query($con,$sqlview);//executing query//
            $sno=1;//initialising serial number//
            while($row=mysqli_fetch_array($result))
        {
            echo'<div class="col-12 col-sm-12 col-md-6 col-lg-4"><div class="card">
            <div class="card-image" style="background:url(Screenshots/'.$row['image'].'); background-size:cover"></div>
            <p class="card-title">'.$row["occ_name"].'</p>
            <div class="card-body">
                <div class="card-text">
                <span class="attribute"><strong>Color Name:</strong></span>
                <span class="value">'.$row["color_name"].'</span>
                <br>
                <span class="attribute"><strong>Dress Type:</strong></span>
                <span class="value">'.$row["dress_type"].'</span>
                <br>
                <span class="attribute"><strong>Instructions:</strong></span>
                <span class="value">'.$row["special_instruction"].'</span>
            </div>
        </div>
            <p class="footer"> <h6><a href="pro_occasion.php?id='.$_GET["pid"]."&did=".$row['mid'].'">Choose</a><h6></p>
          </div></div>';
        
            $sno++;
        }

  ?>
                    </div>
                </div>

            </div>

            <!-- End Blank Page -->

        </div>
    </div>

    <div id="styleSelector">

    </div>
</div>


<!-- end your design up-->



<?php
include "footer.php";
?>