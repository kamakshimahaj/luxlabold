<?php
include "topbar.php";
?>
<script type="text/javascript">
    function wishlist(id)
{ 
 // alert(id);
    if(id=="")
    {
        document.getElementById("error").innerHTML="";
        return;
    }
    if(window.XMLHttpRequest)
    {
        xmlhttp=new XMLHttpRequest();
    }
    else
    {
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange=function()
    {
        if(xmlhttp.readyState==4 && xmlhttp.status==200)
        {

            // alert(xmlhttp.responseText);
            if (xmlhttp.responseText==1) {
                 alert('Please Login');

            }
            else if (xmlhttp.responseText==2)
            {
                alert('Product Already Added in Wishlist');
            }
             else if (xmlhttp.responseText==3){
                wishcount();
                alert('Sucessfully Added in Wishlist');

            }
            // console.log(xmlhttp.responseText);

//document.getElementById("error").innerHTML=xmlhttp.responseText;
        }
}
// alert(id);
xmlhttp.open("GET", "addwish.php?pid="+id,true);
xmlhttp.send();
}

</script>
<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Shop</a></li>
                        <li><a href="#" class="active">Single Product Page</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Page Title Area End ==-->

<!--== Page Content Wrapper Start ==-->
<div id="page-content-wrapper" class="p-9">
    <div class="ruby-container">
        <div class="row">
            <!-- Single Product Page Content Start -->
            <div class="col-lg-12">
                <div class="single-product-page-content">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="product-thumbnail-wrap">
                                <div class="product-thumb-carousel owl-carousel">
                                    <!-- Product Thumbnail Start -->
                                    <?php
                                    if (isset($_GET['id'])) {
                                        $id = $_GET['id'];
                                        // include 'admin/connection.php';
                                        $imgsql = "SELECT * FROM pro_image where pro_id=$id";
                                        $imgresult = mysqli_query($con, $imgsql);
                                        while ($imgrow = mysqli_fetch_array($imgresult)) {
                                            echo '<div class="single-thumb-item">
                                            <a href="single-product.,php"><img class="img-fluid" src="admin/Screenshots/' . $imgrow['image_url'] . '" alt="Product" /></a>
                                        </div>';
                                        }
                                    }
                                    ?>





                                </div>
                            </div>
                        </div>
                        <!-- Product Thumbnail End -->

                        <!-- Product Details Start -->
                        <div class="col-lg-7 mt-5 mt-lg-0">
                            <?php
                            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $prosql = "SELECT * FROM tab_product WHERE id=$id";
                                $proresult = mysqli_query($con, $prosql);
                                while ($prorow = mysqli_fetch_array($proresult)) {
                                    echo '<div class="product-details">
                                <h2><a href="#">' . $prorow['pro_name'] . '</a></h2>

                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>

                                <span class="price">&#8377; ' . $prorow['pro_price'] . '</span>

                                <div class="product-info-stock-sku">
                                    <span class="product-stock-status">STOCK</span>
                                    <span class="product-sku-status ml-5">' . $prorow['pro_size'] . '</span>
                                </div>

                                <p class="products-desc">' . $prorow['pro_details'] . '</p>
                                <div class="shopping-option-item">
                                    <h4>Color</h4>
                                    <ul class="color-option-select d-flex">
                                        <li class="color-item black">
                                            <div class="color-hvr">
                                                <span class="color-fill"></span>
                                                <span class="color-name">Black</span>
                                            </div>
                                        </li>

                                        <li class="color-item green">
                                            <div class="color-hvr">
                                                <span class="color-fill"></span>
                                                <span class="color-name">green</span>
                                            </div>
                                        </li>

                                        <li class="color-item orange">
                                            <div class="color-hvr">
                                                <span class="color-fill"></span>
                                                <span class="color-name">Orange</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <form action="cart.php" method="post" >
                                <div class="product-quantity d-flex align-items-center">
                                    <div class="quantity-field">
                                        <label for="qty">Qty</label>';
                                        $gstnum="";
                                        $company="";
                                        if ($_SESSION['cbulk']==1) {
                                            $sql3="SELECT * from bulkbuyer_profile where BB_LOGIN_ID='".$_SESSION['cid']."' and active=1";
                                                $result1=mysqli_query($con,$sql3);
                                                $count=mysqli_num_rows($result1);
                                                if ($count==0) {
                                                    echo "You Didn't Provide Your Company Profile yet firstly  Provide with details";
                                                }else{
                                                    while ($row1=mysqli_fetch_array($result1)) {
                                                        $gstnum=$row1["COMP_GST_NO"];
                                                        $company=$row1["COMP_NAME"];
                                                    }
                                                }
                                               echo '<input type="number" name="txtqty" id="qty" min="50" max="1000" value="50" />';
                                        }else{
                                            echo '<input type="number" name="txtqty" id="qty" min="1" max="100" value="1" />';
                                        }
                                        
                                    echo '</div>
                                     <input type="hidden" name="txtprodid" value="'.$id.'" />
                                    <button  type="submit" name="btncart" class="btn btn-add-to-cart">Add to Cart</button> 
                                    
                                </div>
                                  </form>
                                        <button type="button" onclick="wishlist('.$id.');" class="btn btn-add-to-cart btn-whislist">+ Add to Wishlist </button>
                                <div class="product-btn-group">';
                                if ($_SESSION['cbulk']==1) {
                                    echo ' <div class="row" style="font-size:18px">
                                        <div class="col-sm-5">
                                        <strong>Company Name:</strong> <span style="font-weight:bolder; margin-right:50px;">'.$company.'</span>
                                        </div>
                                       
                                        <div class="col-sm-5">
                                           <strong>GST Number:</strong><span style="font-weight:bolder;" >'.$gstnum.'</span>
                                        </div>
                                        </div>';
                                }
                                       
                                echo'</div>
                            </div>';
                                }
                            }
                            ?>

                        </div>
                        <!-- Product Details End -->
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Product Full Description Start -->
                            <div class="product-full-info-reviews">
                                <!-- Single Product tab Menu -->
                                <nav class="nav" id="nav-tab">
                                    <a class="active" id="description-tab" data-toggle="tab" href="#description">Description</a>
                                    <a id="reviews-tab" data-toggle="tab" href="#reviews">Reviews</a>
                                </nav>
                                <!-- Single Product tab Menu -->

                                <!-- Single Product tab Content -->
                                <div class="tab-content" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="description">
                                          <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $prosql = "SELECT * FROM tab_product WHERE id=$id";
        $proresult = mysqli_query($con, $prosql);
        while ($prorow = mysqli_fetch_array($proresult)) {
            echo '<p>' . $prorow['pro_details'] . '</p>';
        }
    }
    ?>

                                       
                                    </div>

                                    <div class="tab-pane fade" id="reviews">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                <div class="product-ratting-wrap">
                                                    <div class="pro-avg-ratting">
                                                        <h4>4.5 <span>(Overall)</span></h4>
                                                        <span>Based on 9 Comments</span>
                                                    </div>
                                                    <div class="ratting-list">
                                                        <div class="sin-list float-left">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <span>(5)</span>
                                                        </div>
                                                        <div class="sin-list float-left">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(3)</span>
                                                        </div>
                                                        <div class="sin-list float-left">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(1)</span>
                                                        </div>
                                                        <div class="sin-list float-left">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(0)</span>
                                                        </div>
                                                        <div class="sin-list float-left">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <i class="fa fa-star-o"></i>
                                                            <span>(0)</span>
                                                        </div>
                                                    </div>
                                                    <div class="rattings-wrapper">

                                                        <div class="sin-rattings">
                                                            <div class="ratting-author">
                                                                <h3>MANYA</h3>
                                                                <div class="ratting-star">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <span>(5)</span>
                                                                </div>
                                                            </div>
                                                            <p>best website to shop.everytime i used to shop from here.</p>
                                                        </div>

                                                        <div class="sin-rattings">
                                                            <div class="ratting-author">
                                                                <h3>SRISHTI</h3>
                                                                <div class="ratting-star">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <span>(5)</span>
                                                                </div>
                                                            </div>
                                                            <p>afforable product with much better quality. </p>
                                                        </div>

                                                        <div class="sin-rattings">
                                                            <div class="ratting-author">
                                                                <h3>HITESHI</h3>
                                                                <div class="ratting-star">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <span>(5)</span>
                                                                </div>
                                                            </div>
                                                            <p>i shop from here for my weddimg day their jewellery added sparkle to my big day.</p>
                                                        </div>

                                                    </div>
                                                    <div class="ratting-form-wrapper fix">
                                                        <h3>Add your Comments</h3>
                                                        <?PHP
                                                        $varnm="";
                                                         $varem="";
                                                       $varrev="";
  
  
                                                        include_once "connection.php";
                                                        if(isset($_POST['btnsub']))
                                                        {
                                                           $varrat=$_POST['rating'];
	                                                       $varnm= $_POST['txt'];
	                                                       $varem=$_POST['mail'];
	                                                       $varrev= $_POST['review'];
	                                                       $dt= date("y-m-d h:i:s");
  
	 $sqlins="INSERT INTO tab_review (rating,name,email,review,active,creation_date)
VALUES( '$varrat','$varnm','$varem','$varrev', '1','$dt')";

if (mysqli_query($con,$sqlins))
{
echo "1 record added";
}
else
{
  die('Error: ' . mysqli_error($con));
}
// mysqli_close($con);
}
?>
                                                        
                                                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                                                            <div class="ratting-form row">
                                                                <div class="col-12 mb-4">
                                                                <label for="rating">Rating:</label>
                                                                <select  class="form-control border"  name="rating" id="rating">
                                                                <option value="">select </option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                                </select>

                                                                    <!-- <h5>Rating:</h5>
                                                                    <div class="ratting-star fix">
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                        <i class="fa fa-star-o"></i>
                                                                    </div> -->
                                                                </div>


                                                                <div class="col-md-6 col-12 mb-4">
                                                                    <label for="name">Name:</label>
                                                                    <input id="name" placeholder="Name"  name ="txt" type="text">
                                                                </div>
                                                                <div class="col-md-6 col-12 mb-4">
                                                                    <label for="email">Email:</label>
                                                                    <input id="email" placeholder="Email"  name="mail"type="text">
                                                                </div>
                                                                <div class="col-12 mb-4">
                                                                    <label for="your-review">Your Review:</label>
                                                                    <textarea name="review" name="review" id="your-review" placeholder="Write a review"></textarea>
                                                                </div>
                                                                <div class="col-12">
                                                                    <input value="add review" name="btnsub" type="submit">
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Single Product tab Content -->
                            </div>
                            <!-- Product Full Description End -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Single Product Page Content End -->
        </div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->

<?php
include "footer.php";
?>