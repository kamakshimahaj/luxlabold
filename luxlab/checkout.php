<?php
include "topbar.php";
?>

<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Checkout</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop-left-full-wide.php">Shop</a></li>
                        <li><a href="#" class="active">Checkout</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->
<?php
   //session_start();
include 'admin/connection.php';

if(isset($_GET['check']))
{
    $dt=date("y-m-d");
    $sqlselect= "Select * from tab_order where customer_Id='".$_SESSION['cid']."'  and Status='In process'";
    $resultselect=mysqli_query($con,$sqlselect);
    $count=mysqli_num_rows($resultselect);
    if($count==0)   
    {
        $dt=date("y-m-d");

        $sqlins="INSERT INTO tab_order(Customer_Id,order_date,order_amount,Status,creation_date) Values('$_SESSION[cid]','$dt', '$_SESSION[total]',  'In process','$dt')";
        if(!mysqli_query($con,$sqlins))
        {
            die('error:'.mysqli_error($con));
        }
    }
}

$sql3="select max(id) from tab_order where Customer_Id='".$_SESSION['cid']."'  and Status='In process'";
$result1=mysqli_query($con,$sql3);
while($row=mysqli_fetch_array($result1))
{
    $_SESSION['Order_Id']=$row[0];
}

$sqlcart="SELECT a.id as cartid,a.customer_id, a.product_id, a.quantity, a.status, b.pro_name, b.pro_price,
a.quantity*b.pro_price as amount,c.id,c.image_url  from tab_cart a left join tab_product b on a.product_id=b.id left join pro_image as c on b.id=c.pro_id  where a.customer_id='".$_SESSION['cid']."' and a.status='pending'";



$result=mysqli_query($con,$sqlcart);
$dt=date("y-m-d");
while($row = mysqli_fetch_array($result))
{ 
   $q="INSERT into tab_order_item(Order_Id,product_id,Quantity,Status,creation_date) 
   values('$_SESSION[Order_Id]', '".$row['product_id']."', '".$row['quantity']."','In process','$dt')";
    if(!mysqli_query($con,$q))
    {
        die('ERROR:'.mysqli_error($con));
    }
}


$sql11= "update  tab_cart set Status='ordered' where Customer_Id='".$_SESSION['cid']."'  and Status='pending'";
if(!mysqli_query($con,$sql11))
{
    die('ERROR:'.mysqli_error($con));
}


    //header('location:confirm.php');
?>


<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <!--== Checkout Page Content Area ==-->
        <div class="row">
            <div class="col-12">
                <!-- Checkout Login Coupon Accordion Start -->
                <div class="checkoutaccordion" id="checkOutAccordion">
                    <!-- <div class="card">
                        <h3>Returning Customer? <span data-toggle="collapse" data-target="#logInaccordion">Click Here To Login</span>
                        </h3>

                        <div id="logInaccordion" class="collapse" data-parent="#checkOutAccordion">
                            <div class="card-body">
                                <p>If you have shopped with us before, please enter your details in the boxes below. If
                                you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                                <div class="login-reg-form-wrap">
                                    <form action="" method="post">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <input type="email" placeholder="Enter your Email" required/>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="single-input-item">
                                                    <input type="password" placeholder="Enter your Password" required/>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="single-input-item">
                                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                <div class="remember-meta">
                                                    <div class="custom-control custom-checkbox">
                                                        <input type="checkbox" class="custom-control-input"
                                                        id="rememberMe">
                                                        <label class="custom-control-label" for="rememberMe">Remember
                                                        Me</label>
                                                    </div>
                                                </div>

                                                <a href="#" class="forget-pwd">Forget Password?</a>
                                            </div>
                                        </div>

                                        <div class="single-input-item">
                                            <button class="btn-login">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> -->
<?php 
if (isset($_POST["ship"])) {
      $fname=$_POST['first'];
      $lname=$_POST['last'];
      $add=$_POST['addr']." ".$_POST['extra'];
      $state=$_POST['state'];
      $country=$_POST['countr'];
      $zip=$_POST['zip'];
      $note=$_POST['note'];
      $num=$_POST['num'];
      $town=$_POST['town'];
      $dt= date('y/m/d');

      $sql="INSERT into tab_shipment(first_name,last_name,mob_num,address, state, country,zip_code,customer_id,note,town,status,creation_date) values('$fname', '$lname','$num','$add','$state','$country','$zip','$_SESSION[cid]', '$note' ,'$town', '1', '$dt')";
              if(!mysqli_query($con,$sql))
              {
                  die('ERROR:'.mysqli_error($con));
              }else{
                  $_SESSION['shipm']="y";
                  header("location:checkout.php?check=y");
              }

    }  ?>
                    <div class="card">
                        <h3>Have A Coupon? <span data-toggle="collapse" data-target="#couponaccordion">Click Here To Enter Your Code</span>
                        </h3>
                        <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                            <div class="card-body">
                                <div class="cart-update-option">
                                    <div class="apply-coupon-wrapper">
                                        <form action="#" method="post" class=" d-block d-md-flex">
                                            <input type="text" placeholder="Enter Your Coupon Code"/>
                                            <button class="btn-add-to-cart">Apply Coupon</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Checkout Login Coupon Accordion End -->
            </div>
        </div>

        <div class="row">
            <!-- Checkout Billing Details -->
            <div class="col-lg-6 <?php if (isset($_SESSION["shipm"]) || $_SESSION['cbulk']==1) { echo 'd-none'; } ?>">
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">First Name</label>
                                        <input type="text" name="first" id="f_name" placeholder="First Name"/>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">Last Name</label>
                                        <input type="text" name="last" id="l_name" placeholder="Last Name"/>
                                    </div>
                                </div>
                            </div>

                            <div class="single-input-item">
                                <label for="email" class="required">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="Email Address"/>
                            </div>

                            <div class="single-input-item">
                                <label for="country" name="countr" class="required">Country</label>
                                <select name="countr" id="country">
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="India">India</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="England">England</option>
                                    <option value="London">London</option>
                                    <option value="London">London</option>
                                    <option value="Chaina">Chaina</option>
                                </select>
                            </div>

                            <div class="single-input-item">
                                <label for="street-address" class="required">Street address</label>
                                <input type="text" id="street-address" name="addr"  placeholder="Street address Line 1"/>
                            </div>

                            <div class="single-input-item">
                                <input type="text" name="extra" placeholder="Street address Line 2 (Optional)"/>
                            </div>

                            <div class="single-input-item">
                                <label for="town" class="required">Town / City</label>
                                <input type="text" name="town" id="town" placeholder="Town / City"/>
                            </div>

                            <div class="single-input-item">
                                <label for="state">State / Divition</label>
                                <input type="text" name="state" id="state" placeholder="State / Divition"/>
                            </div>

                            <div class="single-input-item">
                                <label for="postcode" class="required">Postcode / ZIP</label>
                                <input type="text" name="zip" id="postcode" placeholder="Postcode / ZIP"/>
                            </div>

                            <div class="single-input-item">
                                <label for="phone">Phone</label>
                                <input type="text" name="num" id="phone" placeholder="Phone"/>
                            </div>
                            <div class="single-input-item">
                                <label for="ordernote">Order Note</label>
                                <textarea name="ordernote" name="note" id="ordernote" cols="30" rows="3"
                                placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                            </div>
                            <div class="single-input-item">
                                <button type="submit" name="ship" class="btn btn-primary">Add Shiping Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php if (isset($_SESSION['shipm'])) {
                 $sql="SELECT * from tab_shipment where customer_id='".$_SESSION['cid']."' and status=1";
                $result=mysqli_query($con,$sql);
                while ($rowz=mysqli_fetch_array($result)) {
                    echo '<div class="col-lg-6">
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                       
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">Full Name</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">'.$rowz["first_name"]." ".$rowz["last_name"].'</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">Email Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">'.$rowz["customer_id"].'</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">Mobile Number</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">'.$rowz["mob_num"].'</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">'.$rowz["address"].",".$rowz["state"].",".$rowz["country"].'</label>
                                        
                                    </div>
                                </div>
                            </div>

                            
                        
                    </div>
                </div>
            </div>'  ;  
                }
                
            }elseif ($_SESSION['cbulk']==1) {
                     $sql="SELECT * from bulkbuyer_profile where BB_LOGIN_ID='".$_SESSION['cid']."' and active=1";
                $result=mysqli_query($con,$sql);
                $count=mysqli_num_rows($result);
                if ($count==0) {
                    echo '<div class="col-lg-6">
                <div class="checkout-billing-details-wrap">
                    <h2>You Did not Register your Company profile with GST Number</h2>
                    <a class="btn-success btn" href="cmpprofile.php?ord=det">Add Details</a>
                    </div>
                </div>'; 
                }else{


                while ($rowz1=mysqli_fetch_array($result)) {
                    echo '<div class="col-lg-6">
                <div class="checkout-billing-details-wrap">
                    <h2>Billing Details</h2>
                    <div class="billing-form-wrap">
                       
                            <div class="row">
                                <div class="col-md-4">
                                </div>

                                <div class="col-md-4">
                                    <img class="img-fluid" src="Screenshots/'.$rowz1["COMP_LOGO"].'" alt="Product"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">Company Name</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">'.$rowz1["COMP_NAME"].'</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">Email Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">'.$rowz1["BB_LOGIN_ID"].'</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">Mobile Number</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">'.$rowz1["COMP_CONTACT_NO"].'</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">GST Number</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">'.$rowz1["COMP_GST_NO"].'</label>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="f_name" class="required">Address</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="single-input-item">
                                        <label for="l_name" class="required">'.$rowz1["COMP_ADD"].'</label>
                                        
                                    </div>
                                </div>
                            </div>

                          
            
   
        <h2>Bank Details</h2>
            <div class="row">
                <div class="col-md-6">
                    <div class="single-input-item">
                        <label for="bankname" class="required">Bank Name: Axis Bank</label>
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="single-input-item">
                        <label for="accnum" class="required">Account Number:AXCDF38327532PS</label>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="single-input-item">
                        <label for="ifsc" class="required">IFSC Code:AXIS0083621</label>
                        
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="single-input-item">
                        <label for="holdname" class="required">Account Holder Name:Admin</label>
                       
                    </div>
                </div>
            </div>
                <form action="'.$_SERVER["PHP_SELF"].'" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="single-input-item">
                        <label for="add">Address:ABCD,XYZ,Punjab,India</label>
                        
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="single-input-item">
                        <label for="trans" class="required">Transaction ID</label>
                         <input type="text" name="transcode" required id="transcode" placeholder="Postcode / ZIP"/>
                    </div>
                </div>                
            </div>
            <div class="single-input-item">
                <button type="submit" name="bill" class="btn btn-primary">Submit</button>
            </div>
                 </form> 
                        
                    </div>
                </div>
            </div>'  ;  
                }
            }
        } ?>
        <?php if (isset($_POST["bill"])) {
            $trans=$_POST['transcode'];
            header("location:payment.php?payid=".$trans."&ordid=".$_SESSION['Order_Id']); 
        } ?>

            <!-- Order Summary Details -->
            <div class="col-lg-6 mt-5 mt-lg-0">
                <div class="order-summary-details">
                    <h2>Your Order Summary</h2>
                    <div class="order-summary-content">
                        <!-- Order Summary Table -->
                        <div class="order-summary-table table-responsive text-center">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Products</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>

                                <?php

                                $tax=0;
                                $tot=0;
                                $prod="";
                                $qnty="";
                              $sql1="SELECT a.id, a.product_id, a.quantity, a.status, b.pro_name, b.pro_price, a.quantity*b.pro_price as amount 
 from tab_order_item  a left join tab_product b on a.product_id=b.id left join tab_order c on a.order_id=c.id
  where c.customer_id='". $_SESSION['cid']."' and c.status='In process'";
                                $result=mysqli_query($con,$sql1);
                                while($row= mysqli_fetch_array($result))
                                {
                                    echo ' <tbody>
                                    <tr>
                                    <td><a >'.$row['pro_name'].' <strong> × '.$row['quantity'].'</strong></a></td>
                                    <td>'.$row['amount'].'</td>
                                    </tr>

                                    </tbody>';



                                    $tot+= $row['amount'];

                                }

                                $tax= $tot*3/100;
                                $tot1=$tot+$tax;
                                ?>



                               





                                <tfoot>
                                    <tr>
                                        <td>Sub Total</td>
                                        <td><strong><?php echo $tot;  ?></strong></td>
                                    </tr>
                                    <tr>
                                        <td>GST</td>
                                        <td><strong><?php echo $tax;  ?></strong></td>
                                    </tr>

                                    <tr>
                                        <td>Shipping</td>
                                        <td class="d-flex justify-content-center">
                                            <ul class="shipping-type">
                                               
                                                <li>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="freeshipping" name="shipping"
                                                        class="custom-control-input" checked />
                                                        <label class="custom-control-label" for="freeshipping">Free
                                                        Shipping</label>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Total Amount</td>
                                        <td><strong><?php echo $tot1;  ?></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>






                        <!-- Order Payment Method -->
                        <div class="order-payment-method">
                           <!--  <div class="single-payment-method show">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="cashon" name="paymentmethod" value="cash"
                                        class="custom-control-input" checked/>
                                        <label class="custom-control-label" for="cashon">Cash On Delivery</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="cash">
                                    <p>Pay with cash upon delivery.</p>
                                </div>
                            </div> -->

                           <!--  <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="directbank" name="paymentmethod" value="bank"
                                        class="custom-control-input"/>
                                        <label class="custom-control-label" for="directbank">Direct Bank
                                        Transfer</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="bank">
                                    <p>Make your payment directly into our bank account. Please use your Order ID as the
                                        payment reference. Your order will not be shipped until the funds have cleared
                                    in our account..</p>
                                </div>
                            </div>

                            <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="checkpayment" name="paymentmethod" value="check"
                                        class="custom-control-input"/>
                                        <label class="custom-control-label" for="checkpayment">Pay with Check</label>
                                    </div>
                                </div>
                                <div class="payment-method-details" data-method="check">
                                    <p>Please send a check to Store Name, Store Street, Store Town, Store State /
                                    County, Store Postcode.</p>
                                </div>
                            </div>

                            <div class="single-payment-method">
                                <div class="payment-method-name">
                                    <div class="custom-control custom-radio">
                                        <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal"
                                        class="custom-control-input"/>
                                        <label class="custom-control-label" for="paypalpayment">Paypal <img
                                            src="assets/img/paypal-card.jpg" class="img-flcid paypal-card"
                                            alt="Paypal"/></label>
                                        </div>
                                    </div>
                                    <div class="payment-method-details" data-method="paypal">
                                        <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                        account.</p>
                                    </div>
                                </div>-->

                                <div class="summary-footer-area">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="terms" required/>
                                       <!--  <label class="custom-control-label" for="terms">I have read and agree to the website
                                            <a
                                            href="#">terms and conditions.</a></label> -->
                                        </div>
                                        <?php if (isset($_SESSION['shipm'])) {
                                            echo '<a id="rzp-button1" class="btn btn-add-to-cart btn-success check_out" href="#">Place Order</a>';
                                        }elseif($_SESSION['cbulk']==1){
                                            echo '<a href="#" class="btn-add-to-cart"> Place Order</a>';
                                        } ?>
                                         
                                        
                                    </div>
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <!--== Checkout Page Content End ==-->
            </div>
        </div>

        <!-- <button id="rzp-button1" class="btn btn-default check_out">Pay Now</button> -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
var options = {
    "key": "rzp_test_BbZ7Iy5kpLnVby",
    "amount": "<?php echo $tot1*100; ?>", // 2000 paise = INR 20
    "name": "Luxaura",
    "description": "<?php echo $_SESSION['cname'] ; ?>",
    "image": "assets\img\logo-black.png",
    "handler": function (response){
      
      window.location="payment.php?ordid=<?php echo $_SESSION['Order_Id'];?>&payid="+response.razorpay_payment_id;
    },
    "prefill": {
        "name": "<?php echo $_SESSION['cname'] ; ?>",
        "email": "<?php echo $_SESSION['cid'] ; ?>"
    },
    "notes": {
        "address": "Hello World"
    },
    "theme": {
        "color": "#F37254"
    }
};
var rzp1 = new Razorpay(options);

document.getElementById('rzp-button1').onclick = function(e){
    //alert("hello");
    rzp1.open();
    e.preventDefault();
}
</script>
<!--</div>-->
        <!--== Page Content Wrapper End ==-->
        <?php
        include "footer.php";
    ?>