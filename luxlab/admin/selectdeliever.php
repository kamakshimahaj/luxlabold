<?php
include "topbar.php";
?>
<title>Select for Delievery</title>
<?php
include "sidebar.php";
?>
<style type="text/css">
    .table-hover>tbody tr:hover
    { background-color: darkgoldenrod;}
  </style>
        
<!-- start your design down-->
<?php 
include 'connection.php';
if (isset($_POST['subbtn'])) {

  $name=$_POST['chk'];
  $partner=$_POST['partner'];
  
  for ($i=0; $i <count($name) ; $i++) { 
    $sql="update tab_order set delievery_parnter_id='".$partner."', status='transit' where id=".$name[$i];
      if (!mysqli_query($con,$sql)) {
         die('error:'.mysqli_error($con));
      }
  }
} 
?>

            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- Start Blank Page -->

                        <div class="col-sm-12 text-center">
                            <h1>Delievery Partner </h1>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                                <div class="row mb-3">
                                    <div class="col-sm-6">
                                        <label>Select Partner for Delievery</label>
                                    </div>
                                    
                                        <div class="col-sm-6">
                                            <select class="form-control form-select" name="partner">
                                                <option value="">Select Delievery Person</option>
                                            <?php 
                                            $sql="Select * from tab_deliverypartner where active=1";
                                            $result=mysqli_query($con,$sql);
                                            while ($row=mysqli_fetch_array($result)) {
                                                echo '<option value="'.$row["login_id"].'">'.$row["name"].'</option>';
                                            }
                                            ?>
                                            </select>
    
                                    </div>
                                </div>
                            <div class="row mt-3">
                                  <?php

$sqlview="SELECT ord.id, ord.order_date, ord.order_amount, cus.user_name, ship.first_name,ship.last_name, ship.address, ship.state,ship.zip_code,ship.country, ship.note,ship.mob_num from tab_order as ord left JOIN tab_user_register as cus on ord.customer_id= cus.user_email left join tab_shipment as ship on ord.customer_id= ship.customer_id where ord.status='paid' and cus.bulkby=0 group by ord.id asc ";
$result= mysqli_query($con,$sqlview);
echo"<table class='table table-hover'>";
echo"<tr>";
echo "
<td> Checkbox </td>
<td> Order Number </td>
<td> Customer Name </td>
<td> Mobile Number</td>
<td> Customer Address </td>
<td> Order Date </td>";

echo "</tr>";
$sno=1;
while($row=mysqli_fetch_array($result))
{
    echo "<tr>";
    echo "<td><input class='form-check-input' type='checkbox' value='".$row['id']."' name='chk[]' id='chk-1'></td> 
    <td>".$row['id']."</a></td>
    <td>";
     if(is_null($row['user_name']) )
        echo "NULL";
        else  echo $row['user_name'];

     echo   "</td>
    <td>";
    if(is_null($row['mob_num']))
    echo  "NULL";
     else  
     echo $row['mob_num'];
    echo "</td>
    <td>".$row['address'].', '.$row['state'].', '.$row['zip_code']."</td>
    <td>".$row['order_date']."</td>";
    echo"</tr>";
}
echo "</table>";
// mysqli_close($con);
?>
                            </div>
                      <div class="row">
                          <div class="col-sm-4"></div>
                          <div class="col-sm-4">
                              <button type="submit" class="btn btn-primary" name="subbtn">Assign Partners</button>
                          </div>
                          <div class="col-sm-4"></div>
                      </div>
                          </form>  
                        </div>

                        <!-- End Blank Page
                        <td>
    <a href='category_update.php?id=".$row['id']."'> <img src='images/update_icon.jpg' width= 60px height=60px /> </a> ||
    
    <a href='category_delete.php? idd=".$row['id']."'>Delete</a></td> -->

                    </div>
                </div>

                <div id="styleSelector">

                </div>
            </div>


<!-- end your design up-->
    
    

<?php
include "footer.php";
?>