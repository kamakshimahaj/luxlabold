<?php
include "topbar.php";
?>
<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Member Area</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login-register.php" class="active">Company Profile</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->
  <?php

  $varname="";
  $varadd="";
  $varweb="";
  $vargst="";
  $varcon="";
  $varlogo="";
  // include_once "connection.php";
if(isset($_POST['btn2']))
{
    
    $varname=$_POST['txtname'];
    $varadd= $_POST['txtname1'];
    $varweb= $_POST['txtname2'];
    $vargst=$_POST['num'];
    $varcon=$_POST['num1'];
    $dt= date("y-m-d h:i:s");
    $varlogo=  $_FILES["img1"]["name"]; 
    move_uploaded_file($_FILES["img1"]["tmp_name"],"screenshots/".$varlogo);
    $sqlins="INSERT INTO bulkbuyer_profile (BB_LOGIN_ID,COMP_NAME,COMP_ADD,COMP_WEBSITE,COMP_GST_NO,COMP_CONTACT_NO,COMP_LOGO,ACTIVE,CREATION_DATE)
    VALUES('$_SESSION[cid]','$varname','$varadd', '$varweb','$vargst','$varcon','$varlogo','1','$dt')";

if (mysqli_query($con,$sqlins))
{
if (isset($_GET['ord'])) {
    header("location: checkout.php");
}else{
    header("location: index.php");

}
}
else
{
  die('Error: ' . mysqli_error($con));
}
// mysqli_close($con);
}
?>
<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 m-auto">
                <!-- Login & Register Content Start -->

                  <h1 align="center" class="mb-3">Company Details </h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="single-input-item col-sm-6">
                        <!-- <label for="txtname">COMPANY NAME</label> -->
                        <input type="text" id="txtname" name="txtname" placeholder="Enter company Name" required="required">
                        </div>
                        <div class="single-input-item col-sm-6">
                        <!-- <label for="txtname2">COMPANY WEBSITE</label> -->
                        <input type="text" id="txtname2" name="txtname2" placeholder="Enter website Name" required="required">
                        </div>
                    </div>
                    <div class="row">
                         <div class="single-input-item col-sm-6">
                        <!-- <label for="num">COMPANY GST NUM.</label> -->
                        <input type="number" id="num" name="num" placeholder="Enter GST NO.">
                        </div>
                        <div class="single-input-item col-sm-6">
                        <!-- <label for="num1">COMPANY CONTACT NUM.</label> -->
                        <input type="number" id="num1" name="num1" placeholder="Enter contact no.">
                        </div>
                    </div>

                    <div class="row">
                         <div class="single-input-item  col-sm-8">
                        <!-- <label for="txtname1">COMPANY ADDRESS</label> -->
                        <textarea  id="txtname1" name="txtname1" rows="3" placeholder="Enter company address" ></textarea>
                        </div>
                        <div class="single-input-item col-sm-4 align-self-center">
                        <!-- <label for="image">COMPANY LOGO</label> -->
                        <input type="file"  id="image" name="img1">
                        </div>
                    </div>
                    <!-- <div class="row-mb-3">
                        <div class="col-sm-4">
                            <fieldset class="mb-3">
                                <legend style="text-align:left;">ACTIVE</legend>
                                <div class="col-sm-4">
                                <div  class="form-check" style="margin-left:580%;margin-top:-130%;">
                                   <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option2" checked>
                                    <label class="form-check-label">
                                    YES
                                  </label>
                                </div>
                               </div>
                                <div class="form-check" style="margin-left:180%;margin-top:-20%;">
                                  
                                
                                    <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
                                    <label class="form-check-label">
                                    NO
                                  </label>
                                
                               </div>
                        </div>
                    </div> -->

                    <div class="row">
                        <div class="col-sm-4"></div>
                        <div class="col-sm-4">
                            <button type="submit" name="btn2" class="btn-login">Submit</button> </div>
                        <div class="col-sm-4"><button type="reset" name="btnres" class="btn-login">Reset</button></div>

                    </div>


                </form>
          
      
                      
                       
                    
              
                <!-- Login & Register Content End -->
            </div>
        </div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->
<?php
include "footer.php";
?>