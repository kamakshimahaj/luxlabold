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
    <div class="container-fluid p-3">
        <!-- Cart Page Content Start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Cart Table Area -->




                <div class="cart-table table-responsive">
                    <table class="table table-bordered w-100">
                        <thead>
                            <tr>
                                <th class="pro-thumbnail">Thumbnail</th>
                                <th class="pro-title">Product</th>
                                <th class="pro-price">Price</th>
                                <th class="pro-quantity">Quantity</th>
                                <th class="pro-subtotal">Total</th>
                                <th class="pro-remove">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                                        <?php
                               

                            include 'admin/connection.php';
                             $sql1="SELECT a.id, a.product_id, a.quantity, a.status, b.pro_name, b.pro_price,b.pro_img,c.status as stat, a.quantity*b.pro_price as amount from tab_order_item  a left join tab_product b on a.product_id=b.id left join tab_order c on a.order_id=c.id where c.customer_id='". $_SESSION['cid']."' and c.status !='In process' ";

                             $cartres =mysqli_query($con,$sql1);
                             while($cartrow=mysqli_fetch_array($cartres))
                             {
                                echo '<tr>
                                <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="admin/Screenshots/'.$cartrow['pro_img'].'" alt="Product"/></a></td>
                                <td class="pro-title"><a href="#">'.$cartrow['pro_name'].'</a ></td>
                                <td class="pro-price"><span>&#8377; '.$cartrow['pro_price'].'</span></td>
                                <td class="pro-quantity">
                                <div class="pro-qty"><input type="text" value="'.$cartrow['quantity'].'" readonly></div>
                                </td>
                                <td class="pro-subtotal"><span>&#8377; '.$cartrow['amount'].'</span></td>
                                <td class="pro-remove">'.$cartrow['stat'].'</td>
                                </tr>';
                             }
                    

                        ?>
                        
                    </tbody>
                </table>
            </div>




            <!-- Cart Update Option -->
            <!-- <div class="cart-update-option d-block d-lg-flex">
                <div class="apply-coupon-wrapper">
                    <form action="#" method="post" class=" d-block d-md-flex">
                        <input type="text" placeholder="Enter Your Coupon Code"/>
                        <button class="btn-add-to-cart">Apply Coupon</button>
                    </form>
                </div>
                <div class="cart-update">
                    <a href="#" class="btn-add-to-cart">Update Cart</a>
                </div>
            </div> -->
        </div>
    </div>

    <!-- Cart Page Content End -->
</div>
</div>
<!--== Page Content Wrapper End ==-->
<?php
include "footer.php";
?>