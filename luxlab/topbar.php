<?php
session_start();
ob_start();
?>
<!DOCTYPE php>
<php class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="meta description">

    <title>Ruby :: - Jewelry Store e-Commerce </title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon"/>

    <!--== Google Fonts ==-->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Droid+Serif:400,400i,700,700i"/>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:400,700"/>
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i"/>

    <!--=== Bootstrap CSS ===-->
    <link href="assets/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!--=== Font-Awesome CSS ===-->
    <link href="assets/css/vendor/font-awesome.css" rel="stylesheet">
    <!--=== Plugins CSS ===-->
    <link href="assets/css/plugins.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/php5shiv/3.7.2/php5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<style>
  .float{
  position:fixed;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  /* //background-color:#25d366; */
  color:#FFF;
  border-radius:50px;
  text-align:center;
  font-size:30px;
  /* box-shadow: 2px 2px 3px #999; */
  z-index:100;
}

.my-float{
  margin-top:16px;
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
<!--== Header Area Start ==-->
<header id="header-area" class="header__3">
    <div class="ruby-container">
        <div class="row">
            <!-- Logo Area Start -->
            <div class="col-3 col-lg-1 col-xl-2 m-auto">
                <a href="index.php" class="logo-area">
                    <!-- <img src="assets/img/logo-black.png" alt="Logo" class="img-fluid"/> -->
                    <img src="assets\img\logo-black.png" alt="Logo" class="img-fluid"/>
                </a>
            </div>
            <!-- Logo Area End -->

            <!-- Navigation Area Start -->
            <div class="col-3 col-lg-9 col-md-9 col-xl-8">
                <div class="main-menu-wrap">
                    <nav id="mainmenu">
                        <ul>
                            <li><a href="index.php">Home</a></li>
                            <?php
                            include "admin/function.php";

                            include 'admin/connection.php';
                            $navsql ="SELECT * FROM tab_category WHERE parent_cat is null and sub_cat is null";
                            $navresult =mysqli_query($con,$navsql);
                            while($navrow=mysqli_fetch_array($navresult)){
                                echo ' <li class="dropdown-show"><a href="index.php">'.$navrow['cat_name'].'</a>
                                <ul class="dropdown-nav sub-dropdown">';
                                $subsql='SELECT * FROM tab_category WHERE parent_cat='.$navrow['id'].' and sub_cat is null';
                                $subresult =mysqli_query($con,$subsql);
                                while($subrow=mysqli_fetch_array($subresult)){
                                    echo '<li><a href="shop.php?pid='.$navrow['id'].'&sid='.$subrow['id'].'">'.$subrow['cat_name'].'</a></li>';
                                }
                                    
                                    
                                echo '</ul>
                            </li>';
                            }
                            ?>
                           
                            <!-- <li class="dropdown-show"><a href="#">Shop</a>
                                <ul class="mega-menu-wrap dropdown-nav">
                                    <li class="mega-menu-item"><a href="shop.php" class="mega-item-title">Shop
                                        Layout</a>
                                        <ul>
                                            <li><a href="shop.php">Shop Left Sidebar</a></li>
                                            <li><a href="shop-right-sidebar.php">Shop Right Sidebar</a></li>
                                            <li><a href="shop-left-full-wide.php">Shop Left Full Wide</a></li>
                                            <li><a href="shop-right-full-wide.php">Shop Right Full Wide</a></li>
                                            <li><a href="shop-full-wide.php">Shop Without Sidebar</a></li>
                                        </ul>
                                    </li>

                                    <li class="mega-menu-item"><a href="single-product.php" class="mega-item-title">Single
                                        Products</a>
                                        <ul>
                                            <li><a href="single-product.php">Single Product</a></li>
                                            <li><a href="single-product-normal.php">Single Product Normal</a></li>
                                            <li><a href="single-product-group.php">Single Product Group</a></li>
                                            <li><a href="single-product-external.php">Single Product External</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-show"><a href="#">Pages</a>
                                <ul class="dropdown-nav">
                                    <li><a href="cart.php">Shopping Cart</a></li>
                                    <li><a href="checkout.php">Checkout</a></li>
                                    <li><a href="compare.php">Compare</a></li>
                                    <li><a href="wishlist.php">Wishlist</a></li>
                                    <li><a href="login-register.php">Login & Register</a></li>
                                    <li><a href="my-account.php">My Account</a></li>
                                    <li><a href="404.php">404 Error</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-show"><a href="#">Men</a>
                                <ul class="mega-menu-wrap dropdown-nav">
                                    <li class="mega-menu-item"><a href="shop-left-full-wide.php"
                                                                  class="mega-item-title">Shirt</a>
                                        <ul>
                                            <li><a href="shop.php">Tops & Tees</a></li>
                                            <li><a href="shop.php">Polo Short Sleeve</a></li>
                                            <li><a href="shop.php">Graphic T-Shirts</a></li>
                                            <li><a href="shop.php">Jackets & Coats</a></li>
                                            <li><a href="shop.php">Fashion Jackets</a></li>
                                        </ul>
                                    </li>

                                    <li class="mega-menu-item"><a href="shop-left-full-wide.php"
                                                                  class="mega-item-title">Jeans</a>
                                        <ul>
                                            <li><a href="shop.php">Crochet</a></li>
                                            <li><a href="shop.php">Sleeveless</a></li>
                                            <li><a href="shop.php">Stripes</a></li>
                                            <li><a href="shop.php">Sweaters</a></li>
                                            <li><a href="shop.php">Hoodies</a></li>
                                        </ul>
                                    </li>

                                    <li class="mega-menu-item"><a href="shop-left-full-wide.php"
                                                                  class="mega-item-title">Shoes</a>
                                        <ul>
                                            <li><a href="shop.php">Tops & Tees</a></li>
                                            <li><a href="shop.php">Polo Short Sleeve</a></li>
                                            <li><a href="shop.php">Graphic T-Shirts</a></li>
                                            <li><a href="shop.php">Jackets & Coats</a></li>
                                            <li><a href="shop.php">Fashion Jackets</a></li>
                                        </ul>
                                    </li>

                                    <li class="mega-menu-item"><a href="shop-left-full-wide.php"
                                                                  class="mega-item-title">Watches</a>
                                        <ul>
                                            <li><a href="shop.php">Crochet</a></li>
                                            <li><a href="shop.php">Sleeveless</a></li>
                                            <li><a href="shop.php">Stripes</a></li>
                                            <li><a href="shop.php">Sweaters</a></li>
                                            <li><a href="shop.php">Hoodies</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-show"><a href="shop-left-full-wide.php">Women</a>
                                <ul class="mega-menu-wrap dropdown-nav">
                                    <li class="mega-menu-item"><a href="shop-left-full-wide.php"
                                                                  class="mega-item-title">Kamiz</a>
                                        <ul>
                                            <li><a href="shop.php">Tops & Tees</a></li>
                                            <li><a href="shop.php">Polo Short Sleeve</a></li>
                                            <li><a href="shop.php">Graphic T-Shirts</a></li>
                                            <li><a href="shop.php">Jackets & Coats</a></li>
                                            <li><a href="shop.php">Fashion Jackets</a></li>
                                        </ul>
                                    </li>

                                    <li class="mega-menu-item"><a href="shop-left-full-wide.php"
                                                                  class="mega-item-title">Life Style</a>
                                        <ul>
                                            <li><a href="shop.php">Crochet</a></li>
                                            <li><a href="shop.php">Sleeveless</a></li>
                                            <li><a href="shop.php">Stripes</a></li>
                                            <li><a href="shop.php">Sweaters</a></li>
                                            <li><a href="shop.php">Hoodies</a></li>
                                        </ul>
                                    </li>

                                    <li class="mega-menu-item"><a href="shop-left-full-wide.php"
                                                                  class="mega-item-title">Shoes</a>
                                        <ul>
                                            <li><a href="shop.php">Tops & Tees</a></li>
                                            <li><a href="shop.php">Polo Short Sleeve</a></li>
                                            <li><a href="shop.php">Graphic T-Shirts</a></li>
                                            <li><a href="shop.php">Jackets & Coats</a></li>
                                            <li><a href="shop.php">Fashion Jackets</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-show"><a href="#">Blog</a>
                                <ul class="dropdown-nav">
                                    <li><a href="blog.php">Blog Right Sidebar</a></li>
                                    <li><a href="blog-left-sidebar.php">Blog Left Sidebar</a></li>
                                    <li><a href="blog-grid.php">Blog Grid Layout</a></li>
                                    <li><a href="single-blog.php">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <li><a href="contact.php">Contact Us</a></li>
                            <li><a href="blog-grid.php">Blog</a></li>
                            <?php
                            
                            if(isset($_SESSION['cid'])){
                                echo '<li class="dropdown-show"><a href="#">'.$_SESSION['cname'].'</a>
                                <ul class="dropdown-nav">';
                                if ($_SESSION['cbulk']==1) {
                                    echo '<li><a href="cmpprofile.php">Company Profile</a></li>';
                                }
                                echo '
                                <li><a href="changepass.php">Change Password</a></li>
                                <li><a href="logout.php">Log Out</a></li>
                                <li><a href="orders.php">My Orders</a></li>
                                </ul>
                                </li>';
                            }else{
                                echo '<li><a href="login-register.php">Sign In / Sign Up</a></li>';
                            }
                            ?>
                           
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Navigation Area End -->
            
            <!-- Header Right Meta Start -->
            <div class="col-6 col-lg-2 col-md-2 m-auto">
                <div class="header-right-meta text-right">
                    <ul>
                        
                        <li><a href="#" class="modal-active"><i class="fa fa-search"></i></a></li>
                        <li><a href="wishlist.php" title="wishlist"><i class="fa fa-heart"></i></a></li>
                        
                        <li class="shop-cart">
                           <!--  <a href="#"><i class="fa fa-shopping-bag"></i> <span
                                class="count">3</span></a> -->
                            <div class="mini-cart">
                                <div class="mini-cart-body">
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img class="img-fluid" src="assets/img/product-1.jpg"
                                                             alt="Products"/></a>
                                        </figure>

                                        <div class="product-details">
                                            <h2><a href="#">Sprite Yoga Companion</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">3</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$77.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img class="img-fluid" src="assets/img/product-2.jpg"
                                                             alt="Products"/></a>
                                        </figure>
                                        <div class="product-details">
                                            <h2><a href="#">Yoga Companion Kit</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">2</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$6.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                    <div class="single-cart-item d-flex">
                                        <figure class="product-thumb">
                                            <a href="#"><img class="img-fluid" src="assets/img/product-3.jpg"
                                                             alt="Products"/></a>
                                        </figure>
                                        <div class="product-details">
                                            <h2><a href="#">Sprite Yoga Companion Kit</a></h2>
                                            <div class="cal d-flex align-items-center">
                                                <span class="quantity">1</span>
                                                <span class="multiplication">X</span>
                                                <span class="price">$116.00</span>
                                            </div>
                                        </div>
                                        <a href="#" class="remove-icon"><i class="fa fa-trash-o"></i></a>
                                    </div>
                                </div>
                                <div class="mini-cart-footer">
                                    <a href="checkout.php" class="btn-add-to-cart">Checkout</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header Right Meta End -->
        </div>
    </div>
</header>
<!--== Header Area End ==-->

<!--== Search Box Area Start ==-->
<div class="body-popup-modal-area">
    <span class="modal-close"><img src="assets/img/cancel.png" alt="Close" class="img-fluid"/></span>
    <div class="modal-container d-flex">
        <div class="search-box-area">
            <div class="search-box-form">
                <form action="shop.php" method="post">
                    <input type="search" name="serc" placeholder="type keyword and hit enter"/>
                    <button class="btn" name="serchbtn" type="submit"><i class="fa fa-search"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>
<!--== Search Box Area End ==-->

<?php /*if(isset($_POST['btnwish']))
{
   if (!isset($_SESSION['cid'])) 
   {
      echo "<script> alert('Please login'); </script>";
      header('location:index.php');

  }
  else
  {
   $varprodid=$_POST['txtprodid'];
   $dt=date("y-m-d");
   $sqlselect= "Select * from tab_wishlist where customer_id='".$_SESSION['cid']."'  and product_id='".$varprodid."' and  status=0";
   $resultselect=mysqli_query($con,$sqlselect);
   $count=mysqli_num_rows($resultselect);
   if($count==0)   
   {
    $dt=date("y-m-d");

    $sqlins="INSERT INTO tab_wishlist(customer_id,product_id,quantity,status,creation_date) Values('$_SESSION[cid]', '$varprodid','1',  '0','$dt')";
        if(!mysqli_query($con,$sqlins))
        {
            die('error:'.mysqli_error($con));
        }
          header('location:wishlist.php');
    }

else {

   echo "<script> alert('Product Already Added in Wishlist');
   window.location.href='index.php'; </script>";
    
    }
  }
}*/
 ?>
     <div class="float whatsapp-icon">
         <a href="https://api.whatsapp.com/send?phone=9815228537&text=Hello" class="float" target="_blank">
            <img src="Screenshots/icon.png"  class="test-float" height="50px" width="50px" alt="" />
        </a>
     </div>
<!-- <i class="fa fa-whatsapp my-float"></i> -->

<script type="text/javascript">
function wishcount()
{ 

   // var varcid=document.getElementById("wishcount").value;
 //alert(id);
    // if(varcid=="")
    // {
    //     document.getElementById("error").innerHTML="";
    //     return;
    // }
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


// document.getElementById("wishcount").innerHTML=xmlhttp.responseText;
        }
}
xmlhttp.open("GET", "countwishlist.php",true);
xmlhttp.send();
}

// wishcount();



// function wishlist(id)
// { 
//  //alert(id);
//     if(id=="")
//     {
//         document.getElementById("error").innerHTML="";
//         return;
//     }
//     if(window.XMLHttpRequest)
//     {
//         xmlhttp=new XMLHttpRequest();
//     }
//     else
//     {
//         xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//     }
//     xmlhttp.onreadystatechange=function()
//     {
//         if(xmlhttp.readyState==4 && xmlhttp.status==200)
//         {

//             // alert(xmlhttp.responseText);
//             if (xmlhttp.responseText==1) {
//                  alert('Please Login');

//             }
//             else if (xmlhttp.responseText==2)
//             {
//                 alert('Product Already Added in Wishlist');
//             }
//              else if (xmlhttp.responseText==3){
//                 wishcount();
//                 alert('Sucessfully Added in Wishlist');

//             }

// //document.getElementById("error").innerHTML=xmlhttp.responseText;
//         }
// }
// xmlhttp.open("GET", "addtowishlist.php?pid="+ id,true);
// xmlhttp.send();
// }
</script>

