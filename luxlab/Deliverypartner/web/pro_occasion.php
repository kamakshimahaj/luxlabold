<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css" />
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style type="text/css">
    .center {
        background-color: #ECCA9C
    }
    </style>
</head>

<body>
    <?PHP
    $id="";
if(isset($_GET["id"])){
    $id=$_GET["id"];

}

  $varoid="";
  $varimg="";
  $varcm="";
  $varavail="";
include_once "newconnection.php";
if(isset($_POST['btn2']))
{
	
	$varoid= $_POST['num2'];
    $varcm= $_POST['txtname'];
    $varavail=$_POST['rbact'];
	$dt= date("y-m-d h:i:s");
  $varimg=  $_FILES["img1"]["name"];	
move_uploaded_file($_FILES["img1"]["tmp_name"],"screenshots/".$varimg);
	 $sqlins="INSERT INTO pro_occasion(occ_id,image,active,creation_date,special_comment)
VALUES'$varoid','$varimg','1','$dt','$varcm')";

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
<div class="container-fluid">

        <div class="row">
            <div class="col-sm-3">
            </div>
            <div class="col-sm-6" style="background-color:#eadaec">

                <h1>PRODUCT OCCASION CREATION</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                <div>
                <div class="form-group">
                    <input type="hidden" name="proid" id="proid" value="<?php echo $id; ?>">
                <label for="num2">OCCASION Dress</label>
              


                <?php 
                if (isset($_GET["did"])) {
                    echo ' <input type="hidden" name="occdressid" id="occdressid" value="'.$_GET["did"].'">';

                }else{
                    echo '<a href="occasionselect.php?pid='.$id.'"> Choose Here</a>';
                }
                 ?>
                
                <!-- <select name="num2" class="form-control border" id="num2"   onchange="get_subcat(this.value);" required >
                <option value=""> -- Select occasion id -- </option>
                <option value="0">occasion</option> -->
               <?php
                // $sqlparent="select * from tab_occasiondress ";
                // $result= mysqli_query($con, $sqlparent);
                // while($row=mysqli_fetch_array($result))
                // {
                // echo"<option value='".$row['id']."'>" .$row['occ_id']."</option>";
                // }
                ?>
                <!-- </select> -->

                </div>
            </div>


                    <!-- <div class="form-group">
                        <label for="num3">COLOR ID</label>
                        <input type="num" class="form-control" id="num3" name="num3" placeholder="ENTER COLOR ID">
                    </div>

                    <div class="form-group">
                        <label for="num4">DRESSTYPE ID</label>
                        <input type="num" class="form-control" id="num4" name="num4" placeholder="ENTER DRESSTYPE ID">
                    </div> -->

                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" id="image" name="img1">
                    </div>

                    <div class="form-group">
                        <label for="txtname">SPECIAL COMMENT</label>
                        <textarea class="form-control" id="txtname" rows="3"
                            placeholder="ENTER SPECIAL INSTRUCTION"></textarea>
                    </div>

                    <fieldset class="form-group">
                        <legend>ACTIVE</legend>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="rbact" id="rbact"
                                    value="1">Yes</label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="rbact" id="rbact" value="0"
                                    checked>No</label>
                        </div>
                    </fieldset>
                    <div>
                        <div class="row">
                            <div class="col-sm-6">
                                <?php if(isset($_GET["pid"]) && isset($_GET["did"])){
                                    echo '<button type="submit" name="btn2" class="btn btn-block btn-primary">Submit</button>'
                                }else{
                                    echo '<button type="submit" name="btn2" class="btn btn-block btn-primary" disabled>Submit</button>'
                                }
                                    ?>
                                
                                <a href="pro_occasionview.php">view</a>
                            </div>
                        </div>
                    </div>
    

            </form>
        </div>
    </div>
    <div class="col-sm-3">
      
    </div>
    </div>
    </div>
</body>

</html>