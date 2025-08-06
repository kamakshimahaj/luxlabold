<?php
include "topbar.php";
?>
<title>Category View</title>
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
							<h1>Order view</h1>
                        <?php
include 'connection.php';
$sqlview="SELECT main.*,cus.user_name as name FROM tab_order main LEFT JOIN tab_user_register cus on main.customer_id=cus.user_email where main.status !='In process' and cus.bulkby=0 ";
$result= mysqli_query($con,$sqlview);
echo"<table class='table table-hover'>";
echo"<tr>";
echo "
<td> S.No. </td>
<td>Customer Name</td>
<td> Order Date </td>
<td> Order Amount </td>
<td> Cusomer Email </td>
<td>Order ID </td>
<td> Status </td>";

echo "</tr>";
$sno=1;
while($row=mysqli_fetch_array($result))
{
	echo '<tr>';
	echo '<td>'.$sno++.'</td> 
	<td>'.$row['name'].'</td>
    <td ><a href="#">'.$row['order_date'].'</a ></td>
    <td ><span>&#8377; '.$row['order_amount'].'</span></td>
    <td >'.$row['customer_id'].'</td>
    <td ><span> '.$row['id'].'</span></td>
    <td >'.$row['status'].'</td>';
	echo"</tr>";
}
echo "</table>";
mysqli_close($con);
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