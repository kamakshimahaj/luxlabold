<?php
include "topbar.php";
?>
<title>product image view</title>
<?php
include "sidebar.php";
?>
<style type="text/css">
    .table-hover>tbody tr:hover
    { background-color: darkgoldenrod;}
  </style>
        
<!-- start your design down-->


            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- Start Blank Page -->

                        <div class="col-sm-12 text-center">
                        <div class="container">
  <table class="table table-hover">
    <thead>
    <tr>
    	<td colspan="6" align="center" >  <h1> PRODUCT IMAGE LIST </h1> </td>
        </tr>
      <tr>
        <th>S.NO</th>
        <th>PRO ID</th>
        <th>IMAGE URL</th>
        <th>UPDATE / DELETE</th>
      </tr>
    </thead>
   <?php
	include_once 'connection.php';
	 $sqlview="SELECT * FROM pro_image";//sql query  to fetch data//
	$result= mysqli_query($con,$sqlview);//executing query//
	$sno=1;//initialising serial number//
    echo " <tbody>";//displaying the table//
   	while($row=mysqli_fetch_array($result))
{
    echo"  <tr>";
 echo "<td>".$sno."</td> <td>".$row['pro_id']."</td> <td>".$row['image_url']."</td> 
   <td>
    <a href='pro_imageupdate.php?id=".$row['id']."' > Update </a> ||
	  <a href='pro_imagedelete.php?idd=".$row['id']."' > 
    <i class='fa-solid fa-trash'></i></a</td>
    </tr>";
	  $sno++;
}
 echo " </tbody>
  </table>";
  ?>
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