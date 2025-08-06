<?php
include "topbar.php";
?>
<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>USER LOGIN</h1>
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

// if (isset($_GET['log']) && $_GET['log'] == 'y') {
//     session_destroy();
//     session_unset();
// }
$email = "";
$pass = "";
$obj = new function1();
if (isset($_POST['loginBtn'])) {
    $email = $_POST['txtemail'];
    $pass = $obj->encrypt($_POST['txtpass']);
    $sqlchk = "SELECT * from tab_user_register where user_email='" . $email . "' and user_password='" . $pass . "'";
    $result = mysqli_query($con, $sqlchk);
    $count = mysqli_num_rows($result);
    if ($count == 1) {
        if ($row = mysqli_fetch_array($result)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['cid'] = $row['user_email'];
            $_SESSION['cname'] = $row['user_name'];
            $_SESSION['cbulk'] = $row['bulkby'];
            // $_SESSION['aimg'] = $row['admin_image'];
            header('Location:index.php');
        }
    } else {
        echo "<script>alert('wrong username or password')</script>";
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
                        <a class="active" id="login-tab" data-toggle="tab" href="#login">Login</a>
                        <a id="register-tab" data-toggle="tab" href="#register">Register</a>
                    </nav>
                    <!-- Login & Register tab Menu -->

                    <div class="tab-content" id="login-reg-tabcontent">
                        <div class="tab-pane fade show active" id="login" role="tabpanel">
                            <div class="login-reg-form-wrap">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="single-input-item">
                                        <input type="email" name="txtemail" id="txtemail" placeholder="Enter your Email" required />
                                    </div>

                                    <div class="single-input-item">
                                        <input type="password" name="txtpass" id="txtpass" placeholder="Enter your Password" required />
                                    </div>

                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                            <!-- <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="rememberMe">
                                                    <label class="custom-control-label" for="rememberMe">Remember
                                                        Me</label>
                                                </div>
                                            </div> -->

                                            <a href="forgotpass.php" class="forget-pwd">Forget Password?</a>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <button type="submit" class="btn-login" name="loginBtn" id="loginBtn">Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <?php
                        $varnm = "";
                        $varemail = "";
                        $varpass = "";
                        $img = "none";

                        if (isset($_POST['registerBtn'])) {
                            $sqlchk="";
                            $varnm = $_POST['txtusname'];
                            $varemail = $_POST['txtemail'];
                            if (isset($_POST['chk'])) {
                                $stat = $_POST['chk'];
                                $sqlchk = "SELECT * FROM tab_user_register WHERE user_email='" . $varemail . "' and bulkby=1";    
                            }else{
                                $stat=0;
                                $sqlchk = "SELECT * FROM tab_user_register WHERE user_email='" . $varemail . "' and bulkby=0";
                            }
                            $varpass = $obj->random_password(8);
                            $varpass1 = $obj->encrypt($varpass);
                            $dt = date("y-m-d h:i:s");
                           
                            $result = mysqli_query($con, $sqlchk);
                            $rowcount = mysqli_num_rows($result);

                            if ($rowcount == 0) {
                                $sql = "INSERT INTO tab_user_register(user_name,user_password, user_email,status, creation_date,bulkby)	
                VALUES('$varnm', '$varpass1', '$varemail',1, '$dt',$stat)";
                                if (!mysqli_query($con, $sql)) {
                                    die('error:' . mysqli_error($con));
                                }
                                $msg = "Welcome $varnm <br/> Your Login id is: $varemail<br/> Your Password is : $varpass ";
                                $obj->email_send($varemail, "User Login Password", $msg);
                                echo "1 record added";
                            } else {
                                echo "<h3>$varemail is already in use. Please try another one.";
                            }
                        }
                        ?>
                        <div class="tab-pane fade" id="register" role="tabpanel">
                            <div class="login-reg-form-wrap">
                                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                    <div class="single-input-item">
                                        <input type="text" name="txtusname" id="txtusname" placeholder="Full Name" required />
                                    </div>

                                    <div class="single-input-item">
                                        <input type="email" name="txtemail" id="txtemail" placeholder="Enter your Email" required />
                                    </div>

                                    <!-- <div class="row">
                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" placeholder="Enter your Password" required/>
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="single-input-item">
                                                <input type="password" placeholder="Repeat your Password" required/>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="single-input-item">
                                        <div class="login-reg-form-meta">
                                            <div class="remember-meta">
                                                <div class="custom-control custom-checkbox">
                                                     <input type="checkbox" name="chk" value="1" class="custom-control-input"
                                                           id="subnewsletter">
                                                    <label class="custom-control-label" for="subnewsletter">Bulkby User please select</label>
                                                    <p class="mt-2"><b>Note:-</b> <span>Your password will sent to your email box</span></p>
                                                   
                                                 
                                                    
                                                  
                                                     
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <button type="submit" class="btn-login" name="registerBtn" id="registerBtn">Register</button>
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