<?php
include "topbar.php";
?>
<style type="text/css">
    .products-wrapper .single-product-item .product-thumb img {

        width: 204px;
        height: 300px;
    }
</style>
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
                    <h1>Shop</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="index.php" class="active">Shop</a></li>
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
            <!-- Sidebar Area Start -->
            <div class="col-lg-3 mt-5 mt-lg-0 order-last order-lg-first">
                <div id="sidebar-area-wrap">
                    <!-- Single Sidebar Item Start -->
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Shop By</h2>
                        <div class="sidebar-body">
                            <div class="shopping-option">
                               <!--  <h3>Shopping Options</h3>
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

                                        <li class="color-item red">
                                            <div class="color-hvr">
                                                <span class="color-fill"></span>
                                                <span class="color-name">red</span>
                                            </div>
                                        </li>

                                        <li class="color-item yellow">
                                            <div class="color-hvr">
                                                <span class="color-fill"></span>
                                                <span class="color-name">yellow</span>
                                            </div>
                                        </li>

                                        <li class="color-item orange">
                                            <div class="color-hvr">
                                                <span class="color-fill"></span>
                                                <span class="color-name">Orange</span>
                                            </div>
                                        </li>
                                    </ul>
                                </div> -->

                                <div class="shopping-option-item">
                                    <h4>MANUFACTURER</h4>
                                    <ul class="sidebar-list">
                                        <?php  
                                        if(isset($_GET['pid']) ) {
                                            $pid = $_GET['pid'];
                                            // $sid = $_GET['sid'];

                                            $product12sql ="SELECT * FROM tab_category WHERE parent_cat=$pid and sub_cat is null";      
                                            $subresult =mysqli_query($con,$product12sql);
                                            while($subrow=mysqli_fetch_array($subresult)){
                                              echo'  <li><a href="shop.php?pid='.$pid.'&sid='.$subrow['id'].'">'.$subrow['cat_name'].' (19)</a></li>';
                                          }
                                      }
                                      ?>
                                  </ul>
                              </div>

                                <!-- <div class="shopping-option-item">
                                    <h4>Price</h4>
                                    <ul class="sidebar-list">
                                        <li><a href="#">$0.00 - $9.99 (2)</a></li>
                                        <li><a href="#">$10.00 - $19.99 (3)</a></li>
                                        <li><a href="#">$20.00 - $29.99 (5)</a></li>
                                        <li><a href="#">$30.00 - $39.99 (2)</a></li>
                                        <li><a href="#">$40.00 - $49.99 (10)</a></li>
                                        <li><a href="#">$50.00 - $59.99 (12)</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                    <!-- Single Sidebar Item End -->

                    <!-- Single Sidebar Item Start -->
                   <!--  <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">My Wish List</h2>
                        <div class="sidebar-body">
                            <div class="small-product-list">
                                <div class="single-product-item">
                                    <figure class="product-thumb">
                                        <a href="#"><img class="mr-2 img-fluid" src="assets/img/product-2.jpg"
                                                         alt="Products"/></a>
                                    </figure>
                                    <div class="product-details">
                                        <h2><a href="single-product.php">Sprite Yoga Companion Kit</a></h2>
                                        <span class="price">$6.00</span>

                                    </div>
                                </div>

                                <div class="single-product-item">
                                    <figure class="product-thumb">
                                        <a href="single-product.php"><img class="mr-2 img-fluid"
                                                                           src="assets/img/product-3.jpg"
                                                                           alt="Products"/></a>
                                    </figure>
                                    <div class="product-details">
                                        <h2><a href="single-product.php">Set of Sprite Yoga Straps</a></h2>
                                        <span class="price">$88.00</span>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Single Sidebar Item End -->

                    <!-- Single Sidebar Item Start -->
                 <!--    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">MOSTVIEWED PRODUCTS</h2>
                        <div class="sidebar-body">
                            <div class="small-product-list">
                                <div class="single-product-item">
                                    <figure class="product-thumb">
                                        <a href="single-product.php"><img class="mr-2 img-fluid"
                                                                           src="assets/img/product-1.jpg"
                                                                           alt="Products"/></a>
                                    </figure>
                                    <div class="product-details">
                                        <h2><a href="single-product.php">Beginner's Yoga</a></h2>
                                        <span class="price">$50.00</span>
                                    </div>
                                </div>

                                <div class="single-product-item">
                                    <figure class="product-thumb">
                                        <a href="single-product.php"><img class="mr-2 img-fluid"
                                                                           src="assets/img/product-2.jpg"
                                                                           alt="Products"/></a>
                                    </figure>
                                    <div class="product-details">
                                        <h2><a href="single-product.php">Sprite Yoga Companion Kit</a></h2>
                                        <span class="price">$6.00</span>
                                    </div>
                                </div>

                                <div class="single-product-item">
                                    <figure class="product-thumb">
                                        <a href="single-product.php"><img class="mr-2 img-fluid"
                                                                           src="assets/img/product-3.jpg"
                                                                           alt="Products"/></a>
                                    </figure>
                                    <div class="product-details">
                                        <h2><a href="single-product.php">Set of Sprite Yoga Straps</a></h2>
                                        <span class="price">$88.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Single Sidebar Item End -->
                </div>
            </div>
            <!-- Sidebar Area End -->

            <!-- Shop Page Content Start -->
            <div class="col-lg-9">
                <div class="shop-page-content-wrap">
                    <div class="products-settings-option d-block d-md-flex">
                        <div class="product-cong-left d-flex align-items-center">
                            <ul class="product-view d-flex align-items-center">
                                <li class="current column-gird"><i class="fa fa-bars fa-rotate-90"></i></li>
                                <li class="box-gird"><i class="fa fa-th"></i></li>
                                <li class="list"><i class="fa fa-list-ul"></i></li>
                            </ul>
                            <span class="show-items">Items 1 - 9 of 17</span>
                        </div>

                       <!--  <div class="product-sort_by d-flex align-items-center mt-3 mt-md-0">
                            <label for="sort">Sort By:</label>
                            <select name="sort" id="sort">
                                <option value="Position">Relevance</option>
                                <option value="Name Ascen">Name, A to Z</option>
                                <option value="Name Decen">Name, Z to A</option>
                                <option value="Price Ascen">Price low to heigh</option>
                                <option value="Price Decen">Price heigh to low</option>
                            </select>
                        </div> -->
                    </div>

                    <div class="shop-page-products-wrap">
                        <div class="products-wrapper">
                            <div class="row">
                                <?php
                                if(isset($_GET['pid']) && isset($_GET['sid'])) {
                                    $pid = $_GET['pid'];
                                    $sid = $_GET['sid'];

                                    $productsql = "SELECT tab1.id as pid , tab2.id as sid ,main.id as mainid, main.pro_name, main.pro_details, main.pro_img, main.pro_size, main.pro_price, main.cul_type, main.available, tab1.cat_name as pname, tab2.cat_name as sname FROM tab_product main LEFT JOIN tab_category tab1 ON main.parent_cat=tab1.id LEFT JOIN tab_category tab2 ON main.sub_cat=tab1.id WHERE main.parent_cat=$pid AND main.sub_cat=$sid";
                                } elseif(isset($_GET['pid'])) {
                                    $pid = $_GET['pid'];
                                    $productsql = "SELECT tab1.id as pid , tab2.id as sid ,main.id as mainid, main.pro_name, main.pro_details, main.pro_img, main.pro_size, main.pro_price, main.cul_type, main.available, tab1.cat_name as pname, tab2.cat_name as sname FROM tab_product main LEFT JOIN tab_category tab1 ON main.parent_cat=tab1.id LEFT JOIN tab_category tab2 ON main.sub_cat=tab1.id WHERE main.parent_cat=$pid";
                                }elseif(isset($_POST['serchbtn'])){
                                    $productsql = "SELECT tab1.id as pid , tab2.id as sid ,main.id as mainid, main.pro_name, main.pro_details, main.pro_img, main.pro_size, main.pro_price, main.cul_type, main.available, tab1.cat_name as pname, tab2.cat_name as sname FROM tab_product main LEFT JOIN tab_category tab1 ON main.parent_cat=tab1.id LEFT JOIN tab_category tab2 ON main.sub_cat=tab1.id WHERE main.pro_name LIKE '%".$_POST['serc']."%' "; 
                                } 
                                else {
                                    $productsql = "SELECT main.id as mainid, main.pro_name, main.pro_details, main.pro_img, main.pro_size, main.pro_price, main.cul_type, main.available, tab1.cat_name as pname, tab2.cat_name as sname FROM tab_product main LEFT JOIN tab_category tab1 ON main.parent_cat=tab1.id LEFT JOIN tab_category tab2 ON main.sub_cat=tab1.id";
                                }

                                $productres =mysqli_query($con,$productsql);
                                while($prow=mysqli_fetch_array($productres)){
                                    echo ' <div class="col-lg-4 col-sm-6">
                                    <div class="single-product-item text-center">
                                    <figure class="product-thumb">
                                    <a href="single-product.php?pid='.$prow["pid"].'&sid='.$prow["sid"].'&id='.$prow['mainid'].'"><img src="admin/Screenshots/'.$prow['pro_img'].'" alt="Products" class="img-fluid"></a>
                                    </figure>

                                    <div class="product-details">
                                    <h2><a href="single-product.php?pid='.$prow["pid"].'&sid='.$prow["sid"].'&id='.$prow['mainid'].'">'.$prow['pro_name'].'</a></h2>
                                    <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half"></i>
                                    <i class="fa fa-star-o"></i>
                                    </div>
                                    <span class="price">&#8377; '.$prow['pro_price'].'</span>
                                    <p class="products-desc">'.$prow['pro_details'].'</p>
                                    <a href="single-product.php?pid='.$prow["pid"].'&sid='.$prow["sid"].'&id='.$prow['mainid'].'" class="btn btn-add-to-cart">+ Product Details</a>
                                    <a href="single-product.php" class="btn btn-add-to-cart btn-whislist">+
                                    Wishlist</a>

                                    </div>

                                    <div class="product-meta">
                                    <button type="button" data-toggle="modal" data-target="#quickView-'.$prow["mainid"].'">
                                    <span data-toggle="tooltip" data-placement="left" title="Quick View"><i
                                    class="fa fa-compress"></i></span>
                                    </button>
                                     
                                    <button type="button" onclick="wishlist('.$prow["mainid"].');" data-toggle="tooltip" data-placement="left"
                                    title="Add to Wishlist"><i
                                    class="fa fa-heart-o" style="margin-top:10px;"></i></button>
                                    
                                    </div>
                                    <span class="product-bedge">New</span>
                                    </div>
                                    </div>

                                    <!--== Product Quick View Modal Area Wrap ==-->
<div class="modal fade" id="quickView-'.$prow["mainid"].'" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><img src="assets/img/cancel.png" alt="Close" class="img-fluid"/></span>
            </button>
            <div class="modal-body">
                <div class="quick-view-content single-product-page-content">
                    <div class="row">
                        <!-- Product Thumbnail Start -->
                        <div class="col-lg-5 col-md-6">
                            <div class="product-thumbnail-wrap">
                                <div class="product-thumb-carousel owl-carousel">
                                    <div class="single-thumb-item">
                                        <a href="single-product.php?pid='.$prow["pid"].'&sid='.$prow["sid"].'&id='.$prow['mainid'].'"><img class="img-fluid"
                                        src="admin/Screenshots/'.$prow['pro_img'].'" alt="Product"/></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Product Thumbnail End -->

                        <!-- Product Details Start -->
                        <div class="col-lg-7 col-md-6 mt-5 mt-md-0">
                            <div class="product-details">
                                <h2><a href="single-product.php?pid='.$prow["pid"].'&sid='.$prow["sid"].'&id='.$prow['mainid'].'">'.$prow['pro_name'].'</a></h2>

                                

                                <span class="price">&#8377; '.$prow['pro_price'].'</span>

                                <div class="product-info-stock-sku">
                                    <span class="product-stock-status">In Stock</span>
                                    <span class="product-sku-status ml-5"><strong>SKU</strong> MH03</span>
                                </div>
                                <p class="products-desc"><strong>TYPE:</strong>'.$prow['pname'].'</p>
                                <p class="products-desc">'.$prow['pro_details'].'</p>
                                <div class="product-quantity d-flex align-items-center">    
                                </div>
                            </div>
                        </div>
                        <!-- Product Details End -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    
#quickView-'.$prow["mainid"].' .modal-dialog {
    max-width: 900px;
}

#quickView-'.$prow["mainid"].' .modal-dialog .close {
    background-color: #d82e2e;
    -webkit-border-radius: 50%;
    -moz-border-radius: 50%;
    border-radius: 50%;
    -webkit-transition: all 0.4s ease-out;
    -moz-transition: all 0.4s ease-out;
    -o-transition: all 0.4s ease-out;
    transition: all 0.4s ease-out;
    position: absolute;
    right: 10px;
    top: 10px;
    z-index: 9;
    width: 25px;
}

#quickView-'.$prow["mainid"].' .modal-dialog .close span {
    display: block;
    padding: 4px;
}

#quickView-'.$prow["mainid"].' .quick-view-content {
    padding: 20px;
}

#quickView-'.$prow["mainid"].' .quick-view-content .product-thumbnail-wrap .owl-thumbs .owl-thumb-item {
    height: 70px;
    width: 70px;
}

</style>
';
                                }

                                ?>






                            </div>
                        </div>
                    </div>

                   <!--  <div class="products-settings-option d-block d-md-flex">
                        <nav class="page-pagination">
                            <ul class="pagination">
                                <li><a href="#" aria-label="Previous">&laquo;</a></li>
                                <li><a class="current" href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#" aria-label="Next">&raquo;</a></li>
                            </ul>
                        </nav>

                        <div class="product-per-page d-flex align-items-center mt-3 mt-md-0">
                            <label for="show-per-page">Show Per Page</label>
                            <select name="sort" id="show-per-page">
                                <option value="9">9</option>
                                <option value="15">15</option>
                                <option value="21">21</option>
                                <option value="6">27</option>
                            </select>
                        </div>
                    </div> -->
                </div>
            </div>
            <!-- Shop Page Content End -->
        </div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->
<?php
include "footer.php";
?>