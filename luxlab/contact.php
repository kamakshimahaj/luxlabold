<?php
include "topbar.php";
?>
<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Contact Us</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="login-register.php" class="active">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <div class="row">
            <!-- Contact Page Content Start -->
            <div class="col-lg-12">
                <!-- Contact Method Start -->
                <div class="contact-method-wrap">
                    <div class="row">
                        <!-- Single Method Start -->
                        <div class="col-lg-3 col-sm-6 text-center">
                            <div class="contact-method-item">
                                <span class="method-icon"><i class="fa fa-map-marker"></i></span>
                                <div class="method-info">
                                    <h3>Street Address</h3>
                                    <p>Address : Guru Nanak Dev University<br> Grand Truck Road,off NH1 Amritsar Punjab 143005,India.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Method End -->

                        <!-- Single Method Start -->
                        <div class="col-lg-3 col-sm-6 text-center">
                            <div class="contact-method-item">
                                <span class="method-icon"><i class="fa fa-phone"></i></span>
                                <div class="method-info">
                                    <h3>Phone Number</h3>
                                    <a href="tel:6283087875">6283087875</a>
                                    <a href="tel:6280843662">6280843662</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Method End -->

                        <!-- Single Method Start -->
                        <div class="col-lg-3 col-sm-6 text-center">
                            <div class="contact-method-item">
                                <span class="method-icon"><i class="fa fa-envelope-open-o"></i></span>
                                <div class="method-info">
                                    <h3>Number Fax</h3>
                                    <a href="tel:9646224606">9646224606</a>
                                    <a href="tel:8360203874">8360203874</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Method End -->

                        <!-- Single Method Start -->
                        <div class="col-lg-3 col-sm-6 text-center">
                            <div class="contact-method-item">
                                <span class="method-icon"><i class="fa fa-envelope"></i></span>
                                <div class="method-info">
                                    <h3>Email Address</h3>
                                    <a href="mailto:kamakshimhjn@gmail.com">kamakshimhjn@gmail.com</a>
                                    <a href="mailto:luxaurajewels@gmail.com">Luxaurajewels@gmail.com</a>
                                </div>
                            </div>
                        </div>
                        <!-- Single Method End -->
                    </div>
                </div>
                <!-- Contact Method End -->
            </div>
            <!-- Contact Page Content End -->
        </div>


        
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3396.9940286966157!2d74.82332847541063!3d31.634013874162207!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39196527e76e3995%3A0xf5779932d3dab5d0!2sGuru%20Nanak%20Dev%20University!5e0!3m2!1sen!2sin!4v1716023539805!5m2!1sen!2sin" width="1100" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>


        <?php
            if(isset($_POST["btnsub"])){
                // include 'admin/function.php';
                $fname=$_POST["first_name"];
                $lname=$_POST["last_name"];
                $mob=$_POST["number"];
                $email=$_POST["email_address"];
                $msgrep=$_POST["message"];
                $obj1=new function1();

                $msg1="it will be recieved to you within 2 days";
                $msg=" My order doesn't recieved yet ";
                $obj1->email_send($email,"Customer Query Reply" ,$msg1);
                $obj1->email_send("kamakshimhjn@gmail.com","User Contacted for Query" ,$msg);
            }

        ?>
        <div class="row">
            <!-- Contact Form Start -->
            <div class="col-lg-9 m-auto">
                <div class="contact-form-wrap">
                    <h2>Request a Quote</h2>

                    <form id="contact-form" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <input type="text" name="first_name" placeholder="First Name *" required/>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <input type="text" name="last_name" placeholder="Last Name *" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <input type="email" name="email_address" placeholder="Email Address *" required/>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="single-input-item">
                                    <input type="text" name="number" placeholder="Mobile Number *" required/>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="single-input-item">
                                    <textarea name="message" id="message" cols="30" rows="6"
                                              placeholder="Message"></textarea>
                                </div>

                                <div class="single-input-item text-center">
                                    <button type="submit" name="btnsub" class="btn-add-to-cart">Send Meassage</button>
                                </div>

                                <!-- Form Notification -->
                                <div class="form-messege"></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Contact Form End -->
        </div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->
<?php
include "footer.php";
?>