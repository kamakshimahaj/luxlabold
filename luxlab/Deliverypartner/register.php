<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Gradient Able Bootstrap admin template made using Bootstrap 4. The starter version of Gradient Able is completely free for personal project." />
    <meta name="keywords" content="free dashboard template, free admin, free bootstrap template, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="codedthemes">
    <!-- Favicon icon -->
    <!-- <link rel="icon" href="assets/images/" type="image/x-icon"> -->
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head>

<body class="fix-menu">
<?php

include 'function.php';
include 'connection.php';

$obj = new function1(); // creating class object 
$varnm = "";
$varemail = "";
$varpass = "";
$img = "none";

if (isset($_POST['registerBtn'])) {
    $varnm = $_POST['txtusname'];
    $varemail = $_POST['txtemail'];
    $varpass=$obj->random_password(8);
    $varpass1 = $obj->encrypt($varpass);
    $dt = date("y-m-d h:i:s");
    $sqlchk = "SELECT * FROM tab_deliverypartner WHERE login_id='" . $varemail . "'";
    $result = mysqli_query($con, $sqlchk);
    $rowcount = mysqli_num_rows($result);
    
    if ($rowcount == 0) {
        $sql = "INSERT INTO tab_deliverypartner(name,password, login_id,active, creation_date)	
                VALUES('$varnm', '$varpass1', '$varemail',1, '$dt')";
        if (!mysqli_query($con, $sql)) {
            die('error:' . mysqli_error($con));
        }
       $msg = "Welcome $varnm <br/> Your Login id is: $varemail<br/> Your Password is : $varpass ";
        $obj->email_send($varemail, "Admin Login Password", $msg);
        echo "1 record added";
    } else {
        echo "<h3>$varemail is already in use. Please try another one.";
    }

}
?>
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
@media only screen and (max-width: 992px){
    .common-img-bg {
    background-size: cover;
    /* background: linear-gradient(45deg, #40ff4d, #73b4ff); */
    background-image: url('login.jpg') !important;
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
.login{
    position: absolute !important;
}
}
</style>

       <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="loader-bar"></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <section class="login p-fixed d-flex text-center bg-primary common-img-bg">
        <!-- Container-fluid starts -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <!-- Authentication card start -->
                    <div class="signup-card card-block auth-body mr-auto ml-auto">
                        <form class="md-float-material" id="registerForm" name="registerForm" method="POST" action="<?php echo($_SERVER['PHP_SELF'])?>">
                            <div class="text-center">
                            </div>
                            <div class="auth-box">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Sign up. It is fast and easy.</h3>
                                    </div>
                                </div>
                                <hr/>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="txtusname" id="txtusname" placeholder="Choose Username">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="txtemail" id="txtemail" placeholder="Your Email Address">
                                    <span class="md-line"></span>
                                </div>
                                <!-- <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Choose Password">
                                    <span class="md-line"></span>
                                </div>
                                <div class="input-group">
                                    <input type="password" class="form-control" placeholder="Confirm Password">
                                    <span class="md-line"></span>
                                </div> -->
                                <!-- <div class="row m-t-25 text-left">
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">I read and accept <a href="#">Terms &amp; Conditions.</a></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Send me the <a href="#!">Newsletter</a> weekly.</span>
                                            </label>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <button type="submit" name="registerBtn" id="registerBtn" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Sign up now.</button>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-10">
                                        <p class="text-inverse text-left m-b-0">Thank you and enjoy our website.</p>
                                        <p class="text-inverse text-left"><b>Your Authentication Team</b></p>
                                    </div>
                                    <div class="col-md-2">
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
