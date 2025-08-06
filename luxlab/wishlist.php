<?php
include "topbar.php";
?>
<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Wishlist</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="shop-left-full-wide.php">Shop</a></li>
                        <li><a href="#" class="active">Wishlist</a></li>
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
        <!-- Wishlist Page Content Start -->
        <div class="row">
            <div class="col-lg-12">
                <!-- Wishlist Table Area -->
                <div class="cart-table table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th class="pro-thumbnail">Thumbnail</th>
                            <th class="pro-title">Product</th>
                            <th class="pro-price">Price</th>
                            <th class="pro-quantity">Stock Status</th>
                            <th class="pro-subtotal">Add to Cart</th>
                            <th class="pro-remove">Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if (isset($_SESSION['cid'])) {
                $sql1="SELECT a.id,a.customer_id, a.product_id, a.quantity, a.status, b.pro_name, b.pro_img, b.pro_price,
                    a.quantity*b.pro_price as amount from tab_wishlist a left join tab_product b on a.product_id=b.id  where a.customer_id='". $_SESSION['cid']."' and a.status=0 ";

                    $result=mysqli_query($con,$sql1);
                        while($row= mysqli_fetch_array($result))
                                {
                                    if (mysqli_num_rows($result)!=0) {
                                        echo' <tr>
                                        <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="admin/Screenshots/'.$row['pro_img'].'" alt="Product"/></a></td>
                                        <td class="pro-title">'.$row['pro_name'].'</td>
                                        <td class="pro-price"><span>'.$row['pro_price'].'</span></td>
                                        <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                                             <form action="cart.php" method="post" >
                         <input type="hidden" name="txtprodid" value="'.$row['product_id'].'" />
                         <input type="hidden" name="txtqty"  min="1" max="10" value="'.$row['quantity'].'">
                                        <td class="pro-subtotal"><button type="submit" name="btncart" class="btn-add-to-cart">Add to Cart</button></td>
                                        </form>
                                        <td class="pro-remove"><a href="delete_wishlist.php?id='.$row['id'].'"><i class="fa fa-trash-o"></i></a></td>
                                    </tr>';
                                     }else{
                                        echo "<tr><td colspan=6>Please Choose Something to add in Whishlist</td></tr>";
                                     }
                                    
                                }          
                            }else{
                                echo "<tr><td colspan=6>You Didn't Login please Login first to view Whishlist</td></tr>";
                            }

                             ?>
                       
                       <!--  <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/img/product-2.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Aquet Drone D 420</a></td>
                            <td class="pro-price"><span>$275.00</span></td>
                            <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                            <td class="pro-subtotal"><a href="cart.php" class="btn-add-to-cart">Add to Cart</a></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr> -->
                        <!-- <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/img/product-3.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Game Station X 22</a></td>
                            <td class="pro-price"><span>$295.00</span></td>
                            <td class="pro-quantity"><span class="text-danger">Stock Out</span></td>
                            <td class="pro-subtotal"><a href="cart.php" class="btn-add-to-cart disabled">Add to
                                Cart</a></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr> -->
                        <!-- <tr>
                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="assets/img/product-4.jpg"
                                                                       alt="Product"/></a></td>
                            <td class="pro-title"><a href="#">Roxxe Headphone Z 75 </a></td>
                            <td class="pro-price"><span>$110.00</span></td>
                            <td class="pro-quantity"><span class="text-success">In Stock</span></td>
                            <td class="pro-subtotal"><a href="cart.php" class="btn-add-to-cart">Add to Cart</a></td>
                            <td class="pro-remove"><a href="#"><i class="fa fa-trash-o"></i></a></td>
                        </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Wishlist Page Content End -->
    </div>
</div>
<!--== Page Content Wrapper End ==-->
<?php
include "footer.php";
?>