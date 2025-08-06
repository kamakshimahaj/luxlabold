<?php
include "topbar.php";
?>
<title>product image update</title>
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
$pname="";
$id="";
// if(isset($_GET["id"])){
//   $id=$_GET["id"];
//   $sql="select* from tab_product where id=".$_GET["id"];
//   $res=mysqli_query($con,$sql);
//   $rowz=mysqli_fetch_array($res);
//   $pname=$rowz["pro_name"];
// }
$varid="" ;
$varpid="";
$varimg="";
$varavail="";
if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM pro_image where id='$_GET[id]'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
  {
	$varid=$row['id']; 
  $varpid= $row['pro_id'];
	$varimg=$row['image_url'];
  $varavail=$row['active'];
  echo $sql="select* from tab_product where id=".$row["pro_id"];
  $res=mysqli_query($con,$sql);
  $rowz=mysqli_fetch_array($res);
  $pname=$rowz["pro_name"];
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
	 $sqlupd="update pro_image set pro_id='$_POST[num]',image_url='$varimg' where id='$_POST[txtid]'";
   if (!mysqli_query($con,$sqlupd))
   {
   die('Error: ' . mysqli_error($con));
   }
 echo "1 record added";
 header("location: pro_imageview.php");
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

<h1>PRODUCT IMAGE CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

<div class="form-group">
<label for="num">PRO NAME</label>
<input type="text" class="form-control" id="pname" readonly name="pname" value="<?php echo $pname; ?>"
placeholder="ENTER PRODUCT NAME">
<input type="hidden" class="form-control" id="num" name="num" value="<?php echo $id; ?>"
 placeholder="ENTER PRODUCT ID">
 <input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
</div>

<div class="form-group">
<label for="image">Image</label>
<input type="file" class="form-control" id="image" name="img1">
<input type="hidden" name="txtimg1" value="<?php echo $varimg; ?>" />
<img src='screenshots/<?php echo $varimg; ?>' width="100px" height="100px"/>
</div>

<!-- <div class="form-group">
<label for="txtname1">IMAGE TYPE</label>
<input type="text" class="form-control" id="txtname1" name="txtname1" placeholder="ENTER IMAGE TYPE" required="required" value="<?php echo $vartype; ?>" >
</div>

<div class="form-group">
<label for="txtname2">IMAGE SIZE</label>
<input type="text" class="form-control" id="txtname2" name="txtname2" placeholder="ENTER IMAGE SIZE" required="required" value="<?php echo $varsize; ?>" >
</div> -->

<fieldset class="form-group">
<legend>ACTIVE</legend>
<div class="form-check"> 
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="1"  <?php if($varavail==1) echo "checked"; ?>>Yes</label>
</div>
<div class="form-check">
<label class="form-check-label">
<input type="radio" class="form-check-input" name="rbact" id="rbact" value="0"  <?php if($varavail==0) echo "checked"; ?> >No</label>
</div>
</fieldset><div class="row mb-3">
    <div class="col-sm-4" >
        <fieldset class="mb-3" >
            <legend style="text-align:left;">ACTIVE</legend>

            <div class="col-sm-4">
              <div  class="form-check" style="margin-left:550%;margin-top:-1300%;">
               <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option2" checked >
                <label class="form-check-label" >
                YES
              </label>
            </div>
           </div>
            <div class="form-check" style="margin-top:-17%;margin-left:180%;">
              
            
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                <label class="form-check-label">
                NO
              </label>
                
           </div>
    </div>
</div>
<div >
<div class="row">
<div class="col-sm-12">
<button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>
<a href="pro_imageview.php">view</a>
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