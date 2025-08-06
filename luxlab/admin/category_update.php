<?php
include "topbar.php";
?>
<title>category update</title>
<?php
include "sidebar.php";
?>
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


<?php
include 'connection.php';
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


        
<!-- start your design down-->


            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- Start Blank Page -->

                        <div class="col-sm-12 text-center">
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
		<label for="rbvail" style="margin-top:50px;margin-left: -950px;">
		Available
		</label>
	</div>
	<div class="col-sm-6" style="display:inline-flex;margin-top: 56px;margin-left:-405px;">
<input type="radio" name="rbavil" id="rbavil"  value="1" <?php if($varavail==1) echo "checked"; ?> /> YES
<input type="radio" name="rbavil" id="rbavil"  value="0" <?php if($varavail==0) echo "checked"; ?> /> NO

	</div>
</div>
<div class="row mb-3">
 	<div class="col-sm-4" style="margin-left:310px";>
<input type="submit" name="btnupd" id="btn" value="submit"/>
	</div>
	<div class="col-sm-4" style="margin-left: 310px;">
		<a href="category_view.php">view</a>

	</div>
			
</div>

</form>
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
