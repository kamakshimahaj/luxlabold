<?php
include "topbar.php";
?>
<title>Change Password</title>
<?php
include "sidebar.php";
?>

      
<!-- start your design down-->


<?php
// session_start();
include 'function.php';
include 'connection.php';
$obj1= new function1();  // creating class object 
 $varid="";
    $oldpass="";
    $newpass="";
    $conpass="";
if (isset($_POST['btn']))
    { 
        $oldpass=$_POST['txtoldpass'];
        $newpass=$_POST['txtpass'];
        $conpass=$_POST['txtconpass'];
        if(isset($_SESSION['dld']))
        {
 $sql= "SELECT * FROM tab_deliverypartner where login_id='".$_SESSION['dld']."'";
        $result = mysqli_query($con,$sql);
        $count=mysqli_num_rows($result);
        if($count!=0)
        {
              if($row = mysqli_fetch_array($result))
                {
        //echo "$oldpass and ".decrypt($row['password']);
            if($oldpass==$obj1->decrypt($row['password']))
             {
                        if ($newpass==$conpass)
                        {
                          $newpass = $obj1->encrypt($newpass);
    $sqpupdate="update tab_deliverypartner set password='$newpass' where login_id='".$_SESSION['dld']."'";

             mysqli_query($con,$sqpupdate);
              echo "<script>alert('Password Change successfully.')</script>";
                  }
                   else
                    {
                            echo "<script>alert('Password does not match.')</script>";
                      }
                }
                else
                    echo "<script>alert('Wrong Old Password')</script>";
            }
                

        
 
    }
    else
        echo "<script>alert('Wrong User id')</script>";
}
}
?>


<!-- Begin Page Content -->
<div class="container-fluid">
    <form class="form-horizontal" name="passchange" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-sm-2 ">
            </div>
            <div class="col-sm-6 ">
                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-3">
                        </div>
                        <div class="col-sm-8 ">
                            <h1 class="required"> delivery partner Change Password</h1>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtoldpass" class="label-control col-xs-5">Old Password</label>
                        <div class="col-xs-7">
                            <input type="text" class="form-control" id="txtoldpass" name="txtoldpass" placeholder="Enter old password" required />
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="txtpass" class="label-control col-xs-5">New Password</label>
                        <div class="col-xs-7">
                            <input type="text" class="form-control" id="txtpass" name="txtpass" placeholder="Enter password" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="txtconpass" class="label-control col-xs-5">New Password</label>
                        <div class="col-xs-7">
                            <input type="text" class="form-control" id="txtconpass" name="txtconpass" placeholder="Enter confirm password" required />
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row px-3">
                        <div class="col-xs-2"></div>
                        <div class="col-xs-3">
                            <button type="submit" name="btn" class="btn btn-block btn-primary">Submit</button>
                        </div>
                        <div class="col-xs-3">
                            <button type="cancel" name="btn2" class="btn btn-block btn-danger">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- end your design up-->
      
    

<?php
include "footer.php";
?>