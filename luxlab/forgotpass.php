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
    $obj = new function1();  // creating class object 
    $varlid = "";
    $varpass = "";
    if (isset($_POST['forgotBtn'])) {
        $varlid = $_POST['txtemail'];
        $varpass =$obj->random_password(8);
        $varpass1 = $obj->encrypt($varpass);

        $sqlchk = "SELECT * FROM tab_user_register where user_email='" . $varlid . "'";
        $result = mysqli_query($con, $sqlchk);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount != 0) {
            $sqlupdate = "update tab_user_register set user_password='$varpass1' where user_email='" . $varlid . "'";
            mysqli_query($con, $sqlupdate);
            echo "<script>alert('Password Reset  successfully.)</script>";
            if (!mysqli_query($con, $sqlupdate)) {
                die('error:' . mysqli_error($con));
            } else {

                $msg = "Hi<br/> Your Login id is: $varlid<br/> Your new Password is : $varpass ";
                $obj->email_send($varlid, " User Login Password ", $msg);
            }
        } else {
            echo "<h3> $varlid does not exists  . Try another one !!! </h3>";
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
                        <a class="active" id="login-tab" data-toggle="tab" href="#login">Forgot Password</a>
                    </nav>
                    <!-- Login & Register tab Menu -->

                    <div class="tab-content" id="login-reg-tabcontent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel">
                            <div class="login-reg-form-wrap">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="single-input-item">
                                        <input type="email" name="txtemail" id="txtemail" placeholder="Enter your email" required />
                                    </div>

                                    <div class="single-input-item">
                                        <button type="submit" class="btn-login" name="forgotBtn" id="forgotBtn">Submit</button>
                                        <a href="login-register.php">Back to Login</a>
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