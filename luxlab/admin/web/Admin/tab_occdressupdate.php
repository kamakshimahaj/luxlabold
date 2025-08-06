<?php
include "topbar.php";
?>
<title>occasion dress update</title>
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
$varcid= "";
$vardid= "";
$varsi= "";
$varimg= "";
$varavail="";

if(isset($_GET['id']))
{
	$sql1= "SELECT * FROM tab_occasiondress where id='$_GET[id]'";
$result = mysqli_query($con,$sql1);
while($row = mysqli_fetch_array($result))
  {
	$varid=$row['id']; 
	$varoid=$row['occ_id'];
	$varcid= $row['color_id'];
    $vardid= $row['dresstype_id'];
    $varsi= $row['special_instruction'];
    $varavail=$row['active'];
  $varimg= $row['image'];
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
	 $sqlupd="update tab_occasiondress set occ_id='$_POST[num2]', color_id= '$_POST[num3]',dresstype_id= '$_POST[num4]',special_instruction='$_POST[txtname]',image='$varimg' where id='$_POST[txtid]'";
   if (!mysqli_query($con,$sqlupd))
   {
   die('Error: ' . mysqli_error($con));
   }
 echo "1 record added";
 header("location:tab_occdressview.php");
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

<h1>TAB OCCASION DRESS CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

<div class="form-group">
<label for="num4">DRESSTYPE NAME</label>
<input type="hidden" id="txtid" name="txtid" value="<?php echo $varid; ?>" />
<select name="num4" class="form-control border" id="num4"  value="<?php echo $vardid; ?>" onchange="get_subcat(this.value);" required >
<option value=""> -- Select dresstype name -- </option>
<option value="0">dresstype </option>
<?php
$sqlparent="select * from tab_dresstype";
$result= mysqli_query($con, $sqlparent);
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>" .$row['dress_type']."</option>";
}
?>
</select>
</div>

<div class="form-group">
<label for="num3">COLOR NAME</label>
<select name="num3" class="form-control border" id="num3" value="<?php echo $varcid; ?>" onchange="get_subcat(this.value);" required >
<option value=""> -- Select color name -- </option>
<option value="0">color </option>
<?php
$sqlparent="select * from tab_color";
$result= mysqli_query($con, $sqlparent);
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>" .$row['color_name']."</option>";
}
?>
</select>
</div>

<div class="form-group">
<label for="num2">OCCASION NAME</label>
<select name="num2" class="form-control border" id="num2"  value="<?php echo $varoid; ?>" onchange="get_subcat(this.value);" required >
<option value=""> -- Select occasion name-- </option>
<option value="0">occasion</option>
<?php
$sqlparent="select * from tab_occasion ";
$result= mysqli_query($con, $sqlparent);
while($row=mysqli_fetch_array($result))
{
echo"<option value='".$row['id']."'>" .$row['occ_name']."</option>";
}
?>
</select>
</div>


<div class="form-group">
<label for="txtname">SPECIAL INSTRUCTION</label>
<textarea class="form-control" id="txtname" rows="3"  value="<?php echo $varsi; ?>" placeholder="ENTER SPECIAL INSTRUCTION" ></textarea>
</div>


<div class="form-group">
<label for="image">Image</label>
<input type="hidden" name="txtimg1" value="<?php echo $varimg; ?>" />
<input type="file" class="form-control" id="image" name="img1" >
<img src='screenshots/<?php echo $varimg; ?>' width="100px" height="100px"/>
</div>


<div class="row mb-3">
    <div class="col-sm-4" >
        <fieldset class="mb-3" >
            <legend style="text-align:left;">ACTIVE</legend>

            <div class="col-sm-4">
              <div  class="form-check" style="margin-left:550%;margin-top:-60%;">
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
<a href="tab_occdressview.php">view</a>
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