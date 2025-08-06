<?php
include "topbar.php";
?>


<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Shopping Cart</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop-left-full-wide.php">Shop</a></li>
                        <li><a href="cart.php" class="active">Cart</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->
<?php 
    if (!isset($_SESSION['cid'])) {
        header ('location:login-register.php');
    }

 ?>

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="container">
        <!-- Cart Page Content Start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->




                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Thumbnail</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                                        <?php
                                $tax=0;
                             $tot=0;

                            include 'admin/connection.php';
                            if(isset($_POST['btncart']))
                            {
                             $dt=date('y/m/d');
                             $sql="INSERT into tab_cart(customer_id,product_id,quantity,creation_dt,status)values('$_SESSION[cid]','$_POST[txtprodid]','$_POST[txtqty]','$dt','pending')";
                             if(!mysqli_query($con,$sql))

                             {
                                 die('ERROR:'.mysqli_error($con));

                             }

                         }

                            
                             $sql1="SELECT a.id as cartid,a.customer_id, a.product_id, a.quantity, a.status, b.pro_name, b.pro_price,
                             a.quantity*b.pro_price as amount,c.id,c.image_url  from tab_cart a left join tab_product b on a.product_id=b.id left join pro_image as c on b.id=c.pro_id  where a.customer_id='". $_SESSION['cid']."' and a.status='pending' ";

                             $cartres =mysqli_query($con,$sql1);
                             while($cartrow=mysqli_fetch_array($cartres))
                             {
                                echo '<tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="admin/Screenshots/'.$cartrow['image_url'].'" alt="Product"/></a></td>
                                <td class="pro-title"><a href="#">'.$cartrow['pro_name'].'</a ></td>
                                <td class="pro-price"><span>&#8377; '.$cartrow['pro_price'].'</span></td>
                                <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" value="'.$cartrow['quantity'].'" readonly></div>
                                </td>
                                <td class="pro-subtotal"><span>&#8377; '.$cartrow['amount'].'</span></td>
                                <td class="pro-remove"><a href="delete_cart.php?id='.$cartrow['cartid'].'"><i class="fa fa-trash-o"></i></a></td>
                                </tr>';
                           
                            $tot+= $cartrow['amount'];
                             }
                        

                        $tax= $tot*3/100;

                        $_SESSION['total']= $tot+ $tax; 

                        ?>
                        
                    </tbody>
                </table>
            </div>




            <!-- Cart Update Option -->
            <div class="cart-update-option d-block d-lg-flex">
                <div class="apply-coupon-wrapper">
                    <form action="#" method="post" class=" d-block d-md-flex">
                        <input type="text" placeholder="Enter Your Coupon Code"/>
                        <button class="btn-add-to-cart">Apply Coupon</button>
                    </form>
                </div>
                <div class="cart-update">
                    <a href="index.php" class="btn-add-to-cart">Continue Shopping</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 ml-auto">
            <!-- Cart Calculation Area -->
            <div class="cart-calculator-wrapper">
                <h3>Cart Totals</h3>
                <div class="cart-calculate-items">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <tr>
                                <td>Sub Total</td>
                                <td><?php echo $tot;  ?></td>
                            </tr>
                            <tr>
                                <td>Shipping</td>
                                <td>0</td>
                            </tr>
                            <tr>
                                <td>GST</td>
                                <td><?php echo $tax;  ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td class="total-amount"><?php echo $tot+$tax ;  ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <a href="checkout.php?check=y" class="btn-add-to-cart">Proceed To Checkout</a>
            </div>
        </div>
    </div>
    <!-- Cart Page Content End -->
</div>
</div>
<!--== Page Content Wrapper End ==-->
<?php
include "footer.php";
?>