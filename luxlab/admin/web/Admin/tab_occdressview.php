<?php
include "topbar.php";
?>
<title>occasion dress view</title>
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
    	<td colspan="9" align="center" >  <h1> PRODUCT OCCASION LIST </h1> </td>
        </tr>
      <tr>
        <th>S.NO</th>
        <th>OCCASION NAME</th>
        <th>COLOR NAME</th>
        <th>DRESSTYPE NAME</th>
        <th>SPECIAL INSTRUCTION</th>
        <th>IMAGE</th>
        <th>UPDATE / DELETE</th>
        <?php if(isset($_GET["pid"])){
          echo '<th>Select Here</th>';
        } ?>
      </tr>
    </thead>
   <?php
	include_once 'connection.php';
	 $sqlview="SELECT main.id as mid,occ.occ_name,col.color_name,drs.dress_type,main.special_instruction,main.image,main.active,main.creation_date from tab_occasiondress main LEFT join tab_occasion occ on main.occ_id=occ.id LEFT JOIN tab_color col ON main.color_id=col.id LEFT JOIN tab_dresstype drs ON main.dresstype_id=drs.id";//sql query  to fetch data//
	$result= mysqli_query($con,$sqlview);//executing query//
	$sno=1;//initialising serial number//
    echo " <tbody>";//displaying the table//
   	while($row=mysqli_fetch_array($result))
{
    echo"  <tr>";
 echo "<td>".$sno."</td> 
   <td>".$row['occ_name']."</td> 
   <td>".$row['color_name']."</td> 
   <td>".$row['dress_type']."</td> 
   <td>".$row['special_instruction']."</td> 
   <td><img src='screenshots/".$row['image']."' width=80px height=80px/></td> 
   <td>
    <a href='tab_occdressupdate.php?id=".$row['mid']."' > Update </a> ||
	  <a href='tab_occdressdelete.php?idd=".$row['mid']."' > Delete</a>
  </td>";

    if(isset($_GET["pid"])){
      echo "<td><a href='pro_occasion.php?id=".$_GET["pid"]."&did=".$row['mid']."'> 
      Choose for Product Occassion</a></td>";
    }

    echo "</tr>";
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