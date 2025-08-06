
                        <?php
$varparent=$_GET["pid"];
include 'connection.php';
$sql="select * from tab_category where parent_cat='$varparent' and sub_cat  is null";
$result=mysqli_query($con,$sql);
echo"<select name='ddlsub'  class='form-control' id='ddlsub'>";
echo"<option value=''>--Select Sub Category--</option>";
echo"<option value='0'>None</option>";
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>".$row['cat_name']."</option>";
}
echo"</select>";
// mysqli_close($con);
	
?>