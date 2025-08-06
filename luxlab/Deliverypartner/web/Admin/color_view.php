<?php
include "topbar.php";
?>
<title>Blank Page</title>
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
    	<td colspan="7" >  <h1> COLOR NAME LIST </h1> </td>
        </tr>
      <tr>
        <th style="text-align:center;!inportant">S.no</th>
        <th style="text-align:center;!inportant">color name</th>
        <th style="text-align:center;!inportant">Update / Delete</th>
      </tr>
    </thead>
    <?php
	include_once 'connection.php';
	 $sqlview="SELECT * FROM tab_color";//sql query  to fetch data//
	$result= mysqli_query($con,$sqlview);//executing query//
	$sno=1;//initialising serial number//
    echo " <tbody>";//displaying the table//
   	while($row=mysqli_fetch_array($result))
{
  echo"  <tr>";
 echo "<td>".$sno."</td> <td>".$row['color_name']."</td> 
	  <td>
    <a href='color_update.php?id=".$row['id']."' > Update </a> ||
	  <a href='color_delete.php?idd=".$row['id']."' > 
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