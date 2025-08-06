<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>

<body>
<?php
include 'newconnection.php';
$sqlview="SELECT main.id,main.cat_name , main.cat_description, parent.cat_name as parent_cat, sub.cat_name as sub_cat,main.available 
FROM tab_category as main left join tab_category as parent 
on main.parent_cat= parent.id
left join tab_category as sub
on main.sub_cat= sub.id";
$result= mysqli_query($con,$sqlview);
echo"<table class='table table-hover'>";
echo"<tr>";
echo "
<td> S.No. </td>
<td> Category Name </td>
<td> Category Parent </td>
<td> Category Sub </td>
<td> Category Description </td>
<td> Available </td>
<td> Update / Delete </td>";

echo "</tr>";
$sno=1;
while($row=mysqli_fetch_array($result))
{
	echo "<tr>";
	echo "<td>".$sno++."</td> 
	<td>".$row['cat_name']."</a></td>
	<td>";
	 if(is_null($row['parent_cat']) )
	 	echo "NULL";
	 	else  echo $row['parent_cat'];

	 echo	"</td>
	<td>";
	if(is_null($row['sub_cat']))
	echo  "NULL";
	 else  
	 echo $row['sub_cat'];
	echo "</td>
	<td>".$row['cat_description']."</td>
	<td>".$row['available']."</td>
	
	
	<td>
	<a href='category_update.php?id=".$row['id']."'> <img src='images/update_icon.jpg' width= 60px height=60px /> </a> ||
	
	<a href='category_delete.php? idd=".$row['id']."'>Delete</a></td>";
	echo"</tr>";
}
echo "</table>";
mysqli_close($con);
?>
</body>
</html>