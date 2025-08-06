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
    	<td colspan="7" align="center" >  <h1> offer data list </h1> </td>
        </tr>
      <tr>
        <th>S.NO</th>
        <th>OFFER_TITLE</th>
        <th>START_DATE</th>
        <th>END_DATE</th>
        <th>OFFER_PERCENTAGE</th>
        <th>OFFER_IMAGE</th>
        <th>UPDATE / DELETE</th>
      </tr>
    </thead>
   <?php
	include_once 'newconnection.php';
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
</body>
</html>