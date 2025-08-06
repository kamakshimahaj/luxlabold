<?php
include "topbar.php";
?>
<title>occassion delete</title>
<?php
include "sidebar.php";
?>

        
<!-- start your design down-->


            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- Start Blank Page -->

                        <div class="col-sm-12 text-center">
                        <?php
include_once "connection.php";
if(isset($_GET['idd']))
{
$sqldel="DELETE from tab_occasion where id='$_GET[idd]'";
mysqli_query($con, $sqldel );
header('Location: occasion_view.php');  //page redirect 
}
?>
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