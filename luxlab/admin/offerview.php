<?php
include "topbar.php";
?>
<title>offer view</title>
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
    	<td colspan="7" align="center" >  <h1> offer data list </h1> </td>
        </tr>
      <tr>
        <th>S.NO</th>
        <th>OFFER TITLE</th>
        <th>START DATE</th>
        <th>END DATE</th>
        <th>OFFER PERCENTAGE</th>
        <th>OFFER IMAGE</th>
        <th>UPDATE / DELETE</th>
      </tr>
    </thead>
   <?php
	include_once 'connection.php';
	 $sqlview="SELECT * FROM tab_offer";//sql query  to fetch data//
	$result= mysqli_query($con,$sqlview);//executing query//
	$sno=1;//initialising serial number//
    echo " <tbody>";//displaying the table//
   	while($row=mysqli_fetch_array($result))
{
    echo"  <tr>";
 echo "<td>".$sno."</td> <td>".$row['offer_title']."</td> <td>".$row['start_date']."</td> 
   <td>".$row['end_date']."</td> <td>".$row['offer_percentage']."</td> 
   <td><img src='screenshots/".$row['offer_image']."' width=80px height=80px/></td>
   <td>
    <a href='offerupdate.php?id=".$row['id']."' > Update </a> ||
	  <a href='offerdelete.php?idd=".$row['id']."' > 
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