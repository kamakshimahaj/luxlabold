<?php
include "topbar.php";
?>
<title>Blank Page</title>
<?php
include "sidebar.php";
?>
 <?PHP
include_once "connection.php";

    $id="";
    $pname="";
if(isset($_GET["id"])){
    $id=$_GET["id"];
    $sql="select * from tab_product where id=".$_GET["id"];
    $res=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($res);
    $pname=$row["pro_name"];

}

  $varoid="";
  $varimg="";
  $varcm="";
  $varavail="";
if(isset($_POST['btn2']))
{
	
	$varoid= $_POST['occdressid'];
	$proid= $_POST['proid'];
    $inst= $_POST['txtname'];
    // $varavail=$_POST['rbact'];
	$dt= date("y-m-d h:i:s");
  $varimg=  $_FILES["img1"]["name"];	
move_uploaded_file($_FILES["img1"]["tmp_name"],"../screenshots/".$varimg);
	 $sqlins="INSERT INTO pro_occasion(pro_id,dresstype_id,image,active,creation_date,special_comment)
VALUES('$proid','$varoid','$varimg','1','$dt','$inst')";

if (mysqli_query($con,$sqlins))
{
echo "1 record added";
header("location: product_view.php");
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
                            <h1>Product Occassion </h1>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="proid" id="proid" value="<?php echo $id; ?>">
                                <div class="row  mt-4">
                                 <div class="col-sm-6">
                                 <label for="num2">OCCASION DRESS</label>
                                 </div>   
                                 <div class="col-sm-6">
                                    <?php 
                                        if (isset($_GET["did"])) {
                                            echo ' <input type="hidden" name="occdressid" id="occdressid" value="'.$_GET["did"].'">';
                                            echo 'Selected';


                                        }else{
                                            echo '<a class="btn btn-secondary text-white" href="occasionselect.php?pid='.$id.'"> Choose Here</a>';
                                        }
                                    ?>
                                 </div>   
                                </div>
                                <div class="row mt-4">
                                    <div class="col-sm-6">
                                        <label for="Product Name">Product Name</label>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" readonly class="form-control" value="<?php echo $pname ;?>">
                                    </div>
                                </div>
                                <div class="row mt-4">
                                 <div class="col-sm-6">
                                 <label for="image">Image</label>
                                 </div>   
                                 <div class="col-sm-6">
                                    <input type="file" class="form-control" id="image" name="img1">
                                 </div>   
                                </div>
                                <div class="row mt-4">
                                 <div class="col-sm-6"><label for="txtname">SPECIAL INSTRUCTION</label></div>   
                                 <div class="col-sm-6">
                                 <textarea class="form-control" id="txtname" name="txtname" rows="3" placeholder="ENTER SPECIAL INSTRUCTION"></textarea>
                                 </div>   
                                </div>
                                <div class="row-mb-3">
    <div class="col-sm-4">
        <fieldset class="mb-3">
            <legend style="margin-top:20%">ACTIVE</legend>
            <div class="col-sm-4">
            <div  class="form-check" style="margin-left:550%;margin-top:-30%;">
               <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option2" checked>
                <label class="form-check-label">
                YES
              </label>
            </div>
           </div>
            <div class="form-check" style="margin-left:180%;margin-top:-8%;">
              
            
                <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                <label class="form-check-label">
                NO
              </label>
            
           </div>
    </div>
</div>

                                <div class="row mt-4">
                                 <div class="col-sm-6" >
                                 <?php if(isset($_GET["did"])){
                                    echo '<button type="submit" name="btn2" class="btn btn-block btn-primary" ">Submit</button>';
                                }else{
                                    echo '<button type="submit" name="btn2" class="btn btn-block btn-primary" disabled >Submit</button>';
                                }
                                    ?>
                                 </div>   
                                 <div class="col-sm-6">
                                 <?php if(isset($_GET["did"])){
                                    echo '<i href="occasionselect.php?pid='.$id.'" class="btn btn-block btn-secondary">Go Back</i>';
                                }
                                    ?>
                                 </div>   
                                </div>
                            </form>
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