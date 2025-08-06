<?php
include "topbar.php";
?>
<title>product image delete</title>
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
$sqldel="DELETE from pro_image where id='$_GET[idd]'";
mysqli_query($con, $sqldel );
header('Location:pro_imageview.php');  //page redirect 
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