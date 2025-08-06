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
                        <li><a href="login-register.php" class="active">Login & Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->
<?php
$obj1= new function1();  // creating class object 
 $varid="";
    $oldpass="";
    $newpass="";
    $conpass="";
if (isset($_POST['btncng']))
    {   
        $oldpass=$_POST['txtoldpass'];
        $newpass=$_POST['txtpass'];
        $conpass=$_POST['txtconpass'];
        // echo $_SESSION['cid'];
        if(isset($_SESSION['cid']))
        {$sql="";
            if ($_SESSION['cbulk']==0) {
            $sql= "SELECT * FROM tab_user_register where user_email='".$_SESSION['cid']."'";
                               
            }else{
                $sql= "SELECT * FROM tab_user_register where bulkby=1 and  user_email='".$_SESSION['cid']."'"; 
            }
        $result = mysqli_query($con,$sql);
        $count=mysqli_num_rows($result);
        if($count!=0)
        {
              if($row = mysqli_fetch_array($result))
                {
        //echo "$oldpass and ".decrypt($row['password']);
            if($oldpass==$obj1->decrypt($row['user_password']))
             {
                        if ($newpass==$conpass)
                        {
                          $newpass = $obj1->encrypt($newpass);
                           if ($_SESSION['cbulk']==0) {
                            $sqpupdate="update tab_user_register set user_password='$newpass' where user_email='".$_SESSION['cid']."'";

                           }else
    $sqpupdate="update tab_user_register set user_password='$newpass' where bulkby=1 and user_email='".$_SESSION['cid']."'";

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
<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 m-auto">
                <!-- Login & Register Content Start -->
                <div class="login-register-wrapper">
                    <!-- Login & Register tab Menu -->
                    <nav class="nav login-reg-tab-menu">
                        <a class="active" id="login-tab" data-toggle="tab" href="#login">User Change Password</a>
                    </nav>
                    <!-- Login & Register tab Menu -->

                    <div class="tab-content" id="login-reg-tabcontent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel">
                            <div class="login-reg-form-wrap">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="single-input-item">
                                        <input type="text" name="txtoldpass" id="txtoldpass" placeholder="Enter Old Password" required />
                                    </div>

                                    <div class="single-input-item">
                                        <input type="password" name="txtpass" id="txtpass" placeholder="Enter your Password" required />
                                    </div>
                                    <div class="single-input-item">
                                        <input type="password" name="txtconpass" id="txtconpass" placeholder="Confirm your Password" required />
                                    </div>

                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                           
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <button type="submit" class="btn-login" name="btncng" id="btn">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                      
                       
                    </div>
                </div>
                <!-- Login & Register Content End -->
            </div>
        </div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->
<?php
include "footer.php";
?>