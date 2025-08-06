<?php
include "topbar.php";
?>
<title>product occasion update</title>
<?php
include "sidebar.php";
?>

<style type="text/css">
  .back{
    background-color: silver;
  }
input[type="text"], input[type="email"], input[type="password"]
{
  border: 2px solid black;
}
</style>
<?PHP
include_once "connection.php";
$varid="" ;
$varoid="";
$varimg= "";
$varcm= "";
$varavail="";

if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM pro_occasion where id='$_GET[id]'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
  {
	$varid=$row['id']; 
	$varoid=$row['occ_id'];
  $varimg= $row['image'];
  $varcm= $row['special_comment'];
  $varavail=$row['active'];
		}
}
if(isset($_POST['btn2']))
	{
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
	 $sqlupd="update pro_occasion set occ_id='$_POST[num2]',image='$varimg', special_comment='$_POST[txtname]' where id='$_POST[txtid]'";
   if (!mysqli_query($con,$sqlupd))
   {
   die('Error: ' . mysqli_error($con));
   }
 echo "1 record added";
 header("location:pro_occasionview.php");
 mysqli_close($con);
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

<h1>PRODUCT OCCASION CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

<!-- <div class="form-group">
<label for="num">PRO ID</label>
<input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
<input type="num" class="form-control" id="num" name="num" placeholder="ENTER PRODUCT ID"  value="<?php echo $varpid; ?>" >
</div>

<div class="form-group">
<label for="num1">PRO IMAGE ID</label>
<input type="num" class="form-control" id="num1" name="num1" placeholder="ENTER PRODUCT IMAGE ID"  value="<?php echo $varpimgid; ?>" >
</div> -->

</div>

<div class="form-group">
<label for="num2">OCCASION ID</label>
<select name="num2" class="form-control border" id="num2"  value="<?php echo $varoid; ?>" onchange="get_subcat(this.value);" required >
<option value=""> -- Select occasion id -- </option>
<option value="0">occasion</option>
<?php
$sqlparent="select * from tab_occasiondress ";
$result= mysqli_query($con, $sqlparent);
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>" .$row['occ_id']."</option>";
}
?>
</select>
</div>


<!-- <div class="form-group">
<label for="num3">COLOR ID</label>
<input type="num" class="form-control" id="num3" name="num3" placeholder="ENTER COLOR ID"  value="<?php echo $varcid; ?>" >
</div>

<div class="form-group">
<label for="num4">DRESSTYPE ID</label>
<input type="num" class="form-control" id="num4" name="num4" placeholder="ENTER DRESSTYPE ID"  value="<?php echo $vardid; ?>" >
</div> -->

<div class="form-group">
<label for="image">Image</label>
<input type="hidden" name="txtimg1" value="<?php echo $varimg; ?>" />
<input type="file" class="form-control" id="image" name="img1" >
<img src='screenshots/<?php echo $varimg; ?>' width="100px" height="100px"/>
</div>

<div class="form-group">
<label for="txtname">SPECIAL COMMENT</label>
<textarea class="form-control" id="txtname" rows="3" placeholder="ENTER SPECIAL INSTRUCTION" ></textarea>
</div>

<fieldset class="form-group">
<legend>ACTIVE</legend>
<div class="form-check"> 
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="1"  <?php if($varavail==1) echo "checked"; ?>>Yes</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="0"  <?php if($varavail==0) echo "checked"; ?>>No</label>
</div>
</fieldset>
<div >
<div class="row">
<div class="col-sm-6">
<button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>
<a href="pro_occasionview.php">view</a>
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