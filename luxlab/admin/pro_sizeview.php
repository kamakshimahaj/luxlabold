<?php
include "topbar.php";
?>
<title>product size view</title>
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
    	<td colspan="5" align="center" >  <h1> PRODUCT SIZE LIST </h1> </td>
        </tr>
      <tr>
        <th>S.NO</th>
        <th>PRODUCT ID</th>
        <th>PRODUCT SIZE</th>
        <th>UNIT</th>
        <th>UPDATE / DELETE</th>
      </tr>
    </thead>
   <?php
	include_once 'connection.php';
	 $sqlview="SELECT * FROM pro_size";//sql query  to fetch data//
	$result= mysqli_query($con,$sqlview);//executing query//
	$sno=1;//initialising serial number//
    echo " <tbody>";//displaying the table//
   	while($row=mysqli_fetch_array($result))
{
    echo"  <tr>";
 echo "<td>".$sno."</td> <td>".$row['PRO_ID']."</td> <td>".$row['PRO_SIZE']."</td> 
   <td>".$row['UNIT']."</td> 
   <td>
    <a href='pro_sizeupdate.php?id=".$row['id']."' > Update </a> ||
	<a href='pro_sizedelete.php?idd=".$row['id']."' > 
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