<?php
include "topbar.php";
?>
<title>occasion dress</title>
<?php
include "sidebar.php";
?>
<style type="text/css">
	.center
	{background-color:#ECCA9C}
	</style>
</head>
<body>

  <?PHP
  $varoid="";
  $varcid="";
  $vardid="";
  $varimg="";
  $varsi="";
  $varavail="";
include_once "connection.php";
if(isset($_POST['btn2']))
{
	$varoid= $_POST['num2'];
	$varcid= $_POST['num3'];
    $vardid= $_POST['num4'];
    $varsi= $_POST['txtname'];
    $varavail=$_POST['rbact'];
	$dt= date("y-m-d h:i:s");
  $varimg=  $_FILES["img1"]["name"];	
move_uploaded_file($_FILES["img1"]["tmp_name"],"screenshots/".$varimg);
	 $sqlins="INSERT INTO tab_occasiondress(occ_id,color_id,dresstype_id,special_instruction,image,active,creation_date)
VALUES('$varoid','$varcid','$vardid','$varsi','$varimg','1','$dt')";

if (mysqli_query($con,$sqlins))
{
echo "1 record added";
}
else
{
  die('Error: ' . mysqli_error($con));
}
// mysqli_close($con);
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

<h1>TAB OCCASSION DRESS CREATION</h1>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >

<div class="form-group">
<label for="num4">DRESSTYPE NAME</label>
<select name="num4" class="form-control border" id="num4" onchange="get_subcat(this.value);" required >
<option value=""> -- Select dresstype name-- </option>

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
<select name="num3" class="form-control border" id="num3" onchange="get_subcat(this.value);" required >
<option value=""> -- Select color name-- </option>
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
<select name="num2" class="form-control border" id="num2" onchange="get_subcat(this.value);" required >
<option value=""> -- Select occasion name-- </option>
<option value="0">occasion </option>
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
<textarea class="form-control" id="txtname" name="txtname" rows="3" placeholder="ENTER SPECIAL INSTRUCTION" ></textarea>
</div>

<div class="form-group">
<label for="image">Image</label>
<input type="file" class="form-control" id="image" name="img1">
</div>

<div class="row mb-3">
    <div class="col-sm-4" >
        <fieldset class="mb-3" >
            <legend style="text-align:left;">ACTIVE</legend>

            <div class="col-sm-4">
              <div  class="form-check" style="margin-left:550%;margin-top:-1300%;">
               <input type="radio" class="form-check-input" name="rbact" id="optionsRadios1" value="option2" checked >
                <label class="form-check-label" >
                YES
              </label>
            </div>
           </div>
            <div class="form-check" style="margin-top:-17%;margin-left:180%;">
              
            
                <input type="radio" class="form-check-input" name="rbact" id="optionsRadios2" value="option2">
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