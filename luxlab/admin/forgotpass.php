<!DOCTYPE html>
<html lang="en">

<head>
    <title>Forgot Password </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes">
    <!-- Favicon icon -->
    <!-- <link rel="icon" href="assets/images/" type="image/x-icon"> -->
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>
<style>

.common-img-bg {
    background-size: cover;
    /* background: linear-gradient(45deg, #40ff4d, #73b4ff); */
    background-image: url('login.jpg');
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
}
.bg-primary {
    background-color: #4099ff !important;
    color: #fff;
}
.auth-box{
    background-color: rgba(255, 255, 255, 0);
}
</style>
<?php
    // session_start();
    include 'function.php';
    include 'connection.php';
    $obj = new function1();  // creating class object 
    $varlid = "";
    $varpass = "";
    if (isset($_POST['forgotBtn'])) {
        $varlid = $_POST['txtemail'];
        $varpass =$obj->random_password(8);
        $varpass1 = $obj->encrypt($varpass);

        $sqlchk = "SELECT * FROM tab_admin where login_id='" . $varlid . "'";
        $result = mysqli_query($con, $sqlchk);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount != 0) {
            $sqlupdate = "update tab_admin set password='$varpass1' where login_id='" . $varlid . "'";
            mysqli_query($con, $sqlupdate);
            echo "<script>alert('Password Reset  successfully.)</script>";
            if (!mysqli_query($con, $sqlupdate)) {
                die('error:' . mysqli_error($con));
            } else {

                $msg = "Hi<br/> Your Login id is: $varlid<br/> Your new Password is : $varpass ";
                $obj->email_send($varlid, " Admin Login Password ", $msg);
            }
        } else {
            echo "<h3> $varlid does not exists  . Try another one !!! </h3>";
        }
    }
    ?>

<body class="fix-menu">
        <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->

    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="login-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material user" id="loginForm" name="loginForm" method="POST" action="<?php echo($_SERVER['PHP_SELF'])?>">
                            
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-left txt-primary">Forgot Password</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input type="email" class="form-control" name="txtemail" id="txtemail" placeholder="Your Email Address">
                                    <span class="md-line"></span>
                                </div>
                                
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="forgotBtn" class="btn btn-primary">Submit</button>
                                        <a href="index.php" class="btn btn-success">Back</a>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Your password will send to your email.</p>
                                        <!-- <p class="text-inverse text-left"><b>Your Authentication Team</b></p> -->
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- end of form -->
                    </div>
                    <!-- Authentication card end -->
                </div>
                <!-- end of col-sm-12 -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container-fluid -->
    </section>
    <!-- Required Jquery -->
    <script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
    <script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
    <script type="text/javascript" src="assets/js/common-pages.js"></script>
</body>

</html>
