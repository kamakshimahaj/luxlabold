<?php
include "topbar.php";
?>
<title>product update</title>
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
<body>

<?php
include 'connection.php';
$varid="";
$varpn="" ;
$varpd="";
$varpcat="";
$varscat="";
$varimg= "";
$varps= "";
$varpp= "";
$varct= "";
$varavail="";

if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM tab_product where id='$_GET[id]'";
	$result = mysqli_query($con,$sql1);
	while($row = mysqli_fetch_array($result))
	{
		$varid=$row['id']; 
		$varpn=$row['pro_name'];
		$varpd=$row['pro_details'];
		$varpcat=$row['parent_cat'];
		$varscat=$row['sub_cat'];
		$varimg=$row ['pro_img'];
		$varps= $row['pro_size'];
		$varpp= $row['pro_price'];
		$varct= $row['cul_type'];
		$varavail=$row['available'];
	}
}
if(isset($_POST['btn2']))
{
    $varpn=$_POST['txtname'];
	$varpd=$_POST['txtname1'];
	$varpcat=$_POST['ddlparent'];
	$varscat=$_POST['ddlsub'];
	$varps= $_POST['txtname5'];
	$varpp= $_POST['num'];
	$varct= $_POST['ccltype'];
	$varavil=$_POST['rbact'];
	$varid= $_POST['txtid'];
	$varpcat= ($varpcat!=0)?"'$varpcat'": "NULL";
	$varscat= ($varscat!=0)?"'$varscat'": "NULL";


	if(isset($_FILES['img1']) && !empty($_FILES['img1']['name']))
	{
// uploading image if user choose new image to update 
	move_uploaded_file($_FILES['img1']['tmp_name'],"screenshots/".$_FILES['img1']['name']);
	$varimg=$_FILES['img1']['name'];
	}
	else
	{
	$varimg= $_POST['txtimg1'];  // getting image value from hidden text box
	}


$sql="update tab_product set	pro_name='$varpn', parent_cat= $varpcat,
			sub_cat= $varscat,pro_details='$varpd',pro_size='$varps',pro_img='$varimg',pro_price='$varpp',cul_type='$varct'
			where	id='$varid'";
			if(!mysqli_query($con,$sql))
			{
				die('error:'.mysqli_error($con));
			}
			echo "1 record update";
			header("Location:tab_product_view.php");
			//mysql_close($con);
}
?>
        
<!-- start your design down-->


            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">

                        <!-- Start Blank Page -->

                        <div class="col-sm-12 text-center">
                        <div class="container-fluid" >

<div class="row"> 
<div class="col-sm-3">
</div>
<div class="col-sm-6" style="background-color:#eadaec"  >

<h1>PRODUCT CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >


<div class="form-group">
<label for="txtname">PRODUCT NAME</label>
<input type="hidden" name="txtid" id="txtid" value="<?php echo $varid;?>" />
<input type="text" class="form-control" id="txtname" name="txtname" placeholder="ENTER PRODUCT NAME"  value="<?php echo $varpn;?>" >
</div>

<div class="form-group">
<label for="txtname3">PRODUCT DETAILS</label>
<textarea class="form-control" id="txtname3" name="txtname1" rows="10" placeholder="ENTER PRODUCT DETAILS"   ><?php echo $varpd;?></textarea>
</div>

<div class="form-group">
<label for="ddlparent">PARENT CATEGORY</label>
<select name="ddlparent" class="form-control border" id="ddlparent" onchange="get_subcat(this.value);" required   >
<option value=""> -- Select Parent Category -- </option>
<option value="0"  
	 <?php if(is_null($varpcat)) echo 'selected >'; else echo '>'; ?> Parent </option>
    
    <?php
    $sqlparent="select * from tab_category where parent_cat is NULL";
	$result= mysqli_query($con,$sqlparent);
	while($row=mysqli_fetch_array($result))
	{
		echo"<option value='".$row['id'];
		if($varpcat==$row['id'])
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

<div class="form-group">
<label for ="ddlsub"> Sub Category <span class="required">*</span></label>
<div id="sdiv">
<select class="form-control border" name="ddlsub">
<option value="-1"> -- Select Sub Category -- </option>
<option value=""  
	 <?php if(is_null($varscat)) echo 'selected >'; else echo '>'; ?> None </option>
   <?php
   if(is_null($varpcat))
 echo $sql1="select * from tab_category where parent_cat  is null  and sub_cat is NULL";
   	else
 echo $sql1="select * from tab_category where parent_cat =".$varpcat." and sub_cat is NULL";

	$result= mysqli_query($con,$sql1);
	while($row=mysqli_fetch_array($result))
	{
		echo "<option value='".$row['id'];
		if($varscat==$row['id'])
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


  <!-- <div class="form-group">
<label for="ddlsubsub">SUBSUB CATEGORY</label>
<select name="ddlsubsub" class="form-control border" id="ddlsubsub" onchange="get_subcat(this.value);" required >
<option value=""> -- Select subsub Category -- </option>
<option value="0">subsub</option>
</select>
</div>   -->

<div class="form-group">
<label for="image">PRODUCT IMAGE</label>
<input type="file" class="form-control" id="image" name="img1">
<input type="hidden" name="txtimg1" value="<?php echo $varimg; ?>" />
 <img src='screenshots/<?php echo $varimg; ?>' width="100px" height="100px"/>
</div>

<div class="form-group">
<label for="txtname2"> PRODUCT SIZE</label>
<input type="text" class="form-control" id="txtname2" name="txtname5" placeholder="ENTER PRODUCT SIZE" required="required"  value="<?php echo $varps;?>" >
</div>

<div class="form-group">
<label for="num">PRODUCT PRICE</label>
<input type="num" class="form-control" id="num" name="num" placeholder="ENTER PRODUCT PRICE"  value="<?php echo $varpp;?>" >
</div>

<div class="form-group">
<label for="ccltype">CULTURE TYPE</label>
<select  class="form-control border" id="ccltype"   name="ccltype" >
     <option value="">select culture type</option>
     <option value="western" <?php if($varct=="western" ) echo "selected" ?> >Western</option>
     <option value="punjab" <?php if($varct=="punjab" ) echo "selected" ?>>punjab</option>
     <option value="jodhpur" <?php if($varct=="jodhpur" ) echo "selected" ?>>jodhpur</option>
     <option value="jaipur" <?php if($varct=="jaipur" ) echo "selected" ?>>jaipur </option>
	 <option value="south indian"  <?php if($varct=="south indian" ) echo "selected" ?>>south indian </option>
</select>
</div>

<fieldset class="form-group">
<legend>AVL</legend>
<div class="form-check"> 
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="1" <?php if($varavail==1) echo "checked"; ?> >Yes</label >
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="0"   <?php if($varavail==0) echo "checked"; ?>>No</label>
</div>
</fieldset>
<div >
<div class="row">
<div class="col-sm-12">
<button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>
<a href="tab_product_view.php">view</a>
</div>
</div>
</div>
</div>

</form></div>
</div>
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