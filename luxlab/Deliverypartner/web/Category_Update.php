<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
<title>Untitled Document</title>
</head>
<script>
function get_subcat(idd)
{
	//alert(str);

	if(idd=="")
	{
		document.getElementById("sdiv").innerHTML="";
		return;
	}
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("sdiv").innerHTML=xmlhttp.responseText;
		}
}
//alert(idd);

xmlhttp.open("GET", "get_subcat.php?pid="+ idd,true);
xmlhttp.send();
}
</script>
<body>

<?php
include 'newconnection.php';
$varid="";
$varname="";
$varparent="";
$varsub="";
$vardes="";
$varavail="";
if(isset($_GET['id']))
{
	$result=mysqli_query($con,"SELECT * FROM tab_category where id='$_GET[id]'");
		while($row=mysqli_fetch_array($result))
		{
			$varid=$row['id'];
			$varname=$row['cat_name'];
			$varparent=$row['parent_cat'];
			$varsub=$row['sub_cat'];
			$vardes=$row['cat_description'];
			$varavail= $row['available'];
		}
}
if(isset($_POST['btnupd']))
{
	
$varname=$_POST['txtname'];
$vardes=$_POST['txtdescription'];
$varparent=$_POST['ddlparent'];
$varsub=$_POST['ddlsub'];
$varavail=$_POST['rbavil'];
$varid= $_POST['txtid'];
$varparent= ($varparent!=0)?"'$varparent'": "NULL";
$varsub= ($varsub!=0)?"'$varsub'": "NULL";
$sql="update tab_category set	cat_name='$varname', parent_cat=$varparent,
			sub_cat=$varsub,cat_description='$vardes'
			where	id='$varid'";
			if(!mysqli_query($con,$sql))
			{
				die('error:'.mysqli_error($con));
			}
			echo "1 record update";
			header("Location:category_view.php");
			//mysql_close($con);
}
?>

<div class="row">
	<div class="col-sm-2">
    </div>
  	<div class="col-sm-8 back">


<form name="f1" id="f1" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
	<div class="row form-group">
		<div class="col-sm-12">Category Update </div>
	</div>
 <div class="row mb-3">
 	<div class="col-sm-3">
<label for="txtname">
			 Category Name <span class="required">*</span> 
			</label>
	</div>
	<div class="col-sm-6">
		<input type="hidden" name="txtid" id="txtid" value="<?php echo $varid;?>" />
			<input type="text" name="txtname" class="form-control" id="txtname" placeholder="Enter Name" required="required" value="<?php echo $varname;?>"/>
	</div>
</div>

 <div class="row mb-3">
 	<div class="col-sm-3">

		<label for="txtdescription">
		 	Description</td>
		 </label>
	</div>
	<div class="col-sm-6">
<textarea name="txtdescription" class="form-control border" id="txtdescription" cols="45" rows="3"><?php echo $vardes;?></textarea>
	</div>
</div>
<div class="row mb-3">
 	<div class="col-sm-3">
			<label for="ddlparent">
			Parent Category <span class="required">*</span>
			</label>
	</div>
	<div class="col-sm-6">
		
<select name="ddlparent" class="form-control border" onchange="get_subcat(this.value);" >
<option value="-1"> -- Select Parent Category -- </option>
<option value="0"  
	 <?php if(is_null($varparent)) echo 'selected >'; else echo '>'; ?> Parent </option>
    
    <?php
    $sqlparent="select * from tab_category where parent_cat is NULL";
	$result= mysqli_query($con,$sqlparent);
	while($row=mysqli_fetch_array($result))
	{
		echo"<option value='".$row['id'];
		if($varparent==$row['id'])
		{
			echo "' selected >";
		}
		else
		{
			echo"'>";
		}
		echo $row['cat_name']."</option>";
	}
	?>
    </select>

	</div>
</div>


<div class="row mb-3">
 	<div class="col-sm-3">
		<label for ="ddlsub">
		Sub Category <span class="required">*</span>
		</label>
	</div>

	<div class="col-sm-6">
			<div id="sdiv">
<select class="form-control border" name="ddlsub">
<option value="-1"> -- Select Sub Category -- </option>
<option value=""  
	 <?php if(is_null($varsub)) echo 'selected >'; else echo '>'; ?> None </option>
   <?php
   if(is_null($varparent))
 echo $sql1="select * from tab_category where parent_cat  is null  and sub_cat is NULL";
   	else
 echo $sql1="select * from tab_category where parent_cat =".$varparent." and sub_cat is NULL";

	$result= mysqli_query($con,$sql1);
	while($row=mysqli_fetch_array($result))
	{
		echo "<option value='".$row['id'];
		if($varsub==$row['id'])
		{
			echo "' selected>";
		}
		else
		{
			echo"' >";
		}
		echo $row['cat_name']."</option>";
	}
	?>
 
</select>
			</div>
</div>


<div class="row mb-3">
 	<div class="col-sm-3">
		<label for="rbvail">

		Available
		</label>
	</div>
	<div class="col-sm-6">
<input type="radio" name="rbavil" id="rbavil"  value="1" <?php if($varavail==1) echo "checked"; ?> /> YES
<input type="radio" name="rbavil" id="rbavil"  value="0" <?php if($varavail==0) echo "checked"; ?> /> NO

	</div>
</div>
<div class="row mb-3">
 	<div class="col-sm-4">
<input type="submit" name="btnupd" id="btn" value="submit"/>
	</div>
	<div class="col-sm-4">
		<a href="category_view.php">view</a>

	</div>
			
</div>

</form>
</div>
</div>


</body>
</html>