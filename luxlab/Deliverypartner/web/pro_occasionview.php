<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style type="text/css">
    .table-hover>tbody tr:hover
    { background-color: darkgoldenrod;}
  </style>
</head>
<body>
<div class="container">
  <table class="table table-hover">
    <thead>
    <tr>
    	<td colspan="9" align="center" >  <h1> PRODUCT OCCASION LIST </h1> </td>
        </tr>
      <tr>
        <th>S.NO</th>
        <th>PRODUCT ID</th>
        <th>PRODUCT IMAGE ID</th>
        <th>OCCASION ID</th>
        <th>COLOR ID</th>
        <th>DRESSTYPE ID</th>
        <th>IMAGE</th>
        <th>SPECIAL COMMENT</th>
        <th>UPDATE / DELETE</th>
      </tr>
    </thead>
   <?php
	include_once 'newconnection.php';
	 $sqlview="SELECT * FROM pro_occasion";//sql query  to fetch data//
	$result= mysqli_query($con,$sqlview);//executing query//
	$sno=1;//initialising serial number//
    echo " <tbody>";//displaying the table//
   	while($row=mysqli_fetch_array($result))
{
    echo"  <tr>";
 echo "<td>".$sno."</td> <td>".$row['pro_id']."</td> <td>".$row['pro_image_id']."</td> 
   <td>".$row['occ_id']."</td> <td>".$row['color_id']."</td> <td>".$row['dresstype_id']."</td> 
   <td><img src='screenshots/".$row['image']."' width=80px height=80px/></td> <td>".$row['special_comment']."</td> 
   <td>
    <a href='pro_occasionupdate.php?id=".$row['id']."' > Update </a> ||
	  <a href='pro_occasiondelete.php?idd=".$row['id']."' > 
    <i class='fa-solid fa-trash'></i></a</td>
    </tr>";
	  $sno++;
}
 echo " </tbody>
  </table>";
  ?>
</div>
</body>
</html>