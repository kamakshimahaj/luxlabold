<?php
include "topbar.php";
?>
<title>product view</title>
<?php
include "sidebar.php";
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        
<!-- start your design down-->


            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- Start Blank Page -->

                        <div class="col-sm-12 text-center">
                        <div class="row">
        <div class="col-sm-12">
  <?php
include 'connection.php';
 $sqlview="SELECT p.id,p.pro_name,p.pro_details,p.pro_size,p.pro_img,p.pro_price,p.cul_type,p.available,
parent.cat_name as parentName ,sub.cat_name as subName
from tab_product as p left join tab_category as parent 
on p.parent_cat=parent.id 
left join tab_category as sub 
on p.sub_cat=sub.id  ";

$result= mysqli_query($con,$sqlview);
echo"<table class='table table-responsive table-hover table-bordered'>";
echo"<tr>";
echo "<H1><center>PRODUCTS</center> </H1>
<th> S.No. </th>
<th> Product Name </th>
<th> Product details </th>
<th>  Parent Category </th>
<th>  Sub Category</th>
<th> Product Image </th>
<th> Product Price </th>
<th> culture type </th>
<th> Product Occassion </th>
<th>  Images/Sizes </td>
<th> Update / Delete </th>";

echo "</tr>";
$sno=1;
while($row=mysqli_fetch_array($result))
{echo "<tr>";
  echo "<td>".$sno++."</td> 
  <td>".$row['pro_name']."</a></td>
  <td>".$row['pro_details']."</a></td>
  <td>";
   if(is_null($row['parentName']) )
    echo "NULL";
    else  echo $row['parentName'];
   echo "</td>

  <td>";
  if(is_null($row['subName']))
  echo  "NULL";
   else   echo $row['subName'];
  echo "</td>

  
  <td><img src='screenshots/".$row['pro_img']."' width='50px' height='50px' /></td>
  <td>".$row['pro_price']."</td>
  <td>".$row['cul_type']."</td>
  <td><a href='pro_occasion.php?id=".$row['id']."'><i class='fa-solid fa-icons fa-2xl'></i></a></td>
  <td><a href='pro_image.php?id=".$row['id']."'><i class='fa fa-camera'></i></a> .
  <a href='pro_size.php?id=".$row['id']."'><i class='fa fa-arrows-alt'></i>
</a></td>";
   echo"
   <td><a href='tab_product_update.php?id=".$row['id']."'><i class='fas fa-edit'></i></a> . 
   <a href='tab_product_delete.php?idd=".$row['id']."'><i class='fa fa-trash'></i></a></td>";
 }

echo "</table>";
mysqli_close($con);
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