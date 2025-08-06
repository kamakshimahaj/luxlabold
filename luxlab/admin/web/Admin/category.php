<?php
include "topbar.php";
?>
<title>Category Creation</title>
<?php
include "sidebar.php";
?>
<style>
	.required{
		color:red;
		font-weight:bold;
	}

	input[type="text"] 
	{
		border: 2px solid black;
	}
	.back {
		background-color: silver;
	}
</style>



<script type="text/javascript">
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
//alert(str);
xmlhttp.open("GET", "get_subcat.php?pid="+ idd,true);
xmlhttp.send();
}
</script>
<?php
include 'connection.php';

$varcatnm="";
$varcatdesc="";
$varpcat="";
$varscat="";
$varavil="";
if(isset ($_POST['btn']))
{
$varcatnm=$_POST['txtname'];
$varcatdesc=$_POST['txtdescription'];
$varpcat=$_POST['ddlparent'];
$varscat=$_POST['ddlsub'];
$varavil=$_POST['rbavil'];
$varpcat= ($varpcat!=0)?"'$varpcat'": "NULL";
$varscat= ($varscat!=0)?"'$varscat'": "NULL";
//$varpcat='1'
//$varpcat=NULL
// move_uploaded_file($_FILES['img1']['tmp_name'], "images/".$_FILES['img1']['name']);
// $img="images/".$_FILES['img1']['name'];
$dt= date('Y-m-d');
$sql="INSERT INTO tab_Category(cat_name,cat_description,parent_cat,sub_cat,available,creation_date)	Values('$varcatnm', '$varcatdesc' , $varpcat,$varscat,'$varavil','$dt')";
	if(!mysqli_query($con, $sql))
	{
		die('error:'.mysqli_error($con));
	}
	echo"1 record added";
	//mysqli_close($con);
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
		<div class="col-sm-12">CategoryCreation </div>

	</div>

 <div class="row mb-3">
 	<div class="col-sm-3">
<label for="txtname">
			 Category Name <span class="required">*</span> 
			</label>
	</div>
	<div class="col-sm-6">
			<input type="text" name="txtname" class="form-control" id="txtname" placeholder="Enter Name" required="required"/>
	</div>
</div>

 <div class="row mb-3">
 	<div class="col-sm-3">

		<label for="txtdescription">
		 	Description</td>
		 </label>
	</div>
	<div class="col-sm-6">
<textarea name="txtdescription" class="form-control border" id="txtdescription" cols="45" rows="3"></textarea>
	</div>
</div>
<div class="row mb-3">
 	<div class="col-sm-3">
			<label for="ddlparent">
			Parent Category <span class="required">*</span>
			</label>
	</div>
	<div class="col-sm-6">
		
<select name="ddlparent" class="form-control border" onchange="get_subcat(this.value);" required >
<option value=""> -- Select Parent Category -- </option>
<option value="0">Parent</option>
<?php
$sqlparent="select * from tab_category where parent_cat is NULL";
$result= mysqli_query($con, $sqlparent);
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>" .$row['cat_name']."</option>";
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
<select class="form-control border" name="ddlsub" required>
<option value=""> -- Select Sub Category -- </option>
<option value="0">None</option>
</select>
			</div>

	</div>

</div>

<!-- <div class="row mb-3">
 	<div class="col-sm-3">
		<label for="image">
		Image</label>
	</div>
	<div class="col-sm-6">
<input type="file" class="form-control-file" name="img1" id="image"/>

	</div>
</div> -->

<div class="row mb-3">
 	<div class="col-sm-3">
		<label for="rbavil">

		Available
		</label>
	</div>
	<div class="col-sm-6">
<input type="radio" name="rbavil" id="rbavil"  value="1" /> YES
<input type="radio" name="rbavil" id="rbavil"  value="0" /> NO

	</div>
</div>
<div class="row mb-3">
 	<div class="col-sm-4">
<input type="submit" name="btn" id="btn" value="submit"/>
	</div>
	<div class="col-sm-4">
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