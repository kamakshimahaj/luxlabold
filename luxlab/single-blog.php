<?php
include "topbar.php";
?>
<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Blog Details</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="#" class="active">Single Blog</a></li>
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
            <!-- Single Blog Page Content Start -->

          




            <div class="col-lg-8">
    <?php

    $id="";
            if (isset($_GET['id'])) {
                                $id = $_GET['id'];
                                $prosql = "SELECT * FROM tab_blog WHERE id=".$id;
                                $proresult = mysqli_query($con, $prosql);
                                while ($prorow = mysqli_fetch_array($proresult)) {

          echo'      <article class="single-blog-content-wrap">
                    <div class="post-header">
                        <figure class="post-thumbnail">
                            <img src="admin/Screenshots/' . $prorow['blog_image'] . '" class="img-fluid" alt="Blog"/>
                        </figure>

                        <div class="post-meta">
                            <h2>' . $prorow['blog_title'] . '</h2>
                            <div class="post-info">
                                <a href="#"><i class="fa fa-user"></i>  ' . $prorow['blog_by'] .'</a>
                                <a href="#"><i class="fa fa-calendar"></i>  ' . $prorow['blog_date'] .'</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="post-content">
                        <p>
                       ' . $prorow['blog_description'] .'
                        </p>
                    </div>

                    <div class="post-footer d-block d-sm-flex justify-content-sm-between align-items-center">
                        <ul class="tags">
                            <li><a href="#">Fashion</a></li>
                            <li><a href="#">Sale</a></li>
                            <li><a href="#">Investment</a></li>
                        </ul>

                        <div class="post-share mt-3 mt-sm-0">
                        <a href="#"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-thumbs-down"></i></a>
                             
                        </div>
                    </div>
                </article>';
                                }
                            }
                            ?>
                <!-- Comment Area Start -->
                <?php 
               $sql="Select * from tab_comment where blog_id=".$id;
                $res=mysqli_query($con,$sql);
                $count=mysqli_num_rows($res);
                 ?>
                <div class="comment-area-wrapper">
                    <div class="comments-preview-area comment-single-item">
                        <h2>Comments (<?php echo $count; ?>)</h2>
                        <?php 
                        while ($rcomm=mysqli_fetch_array($res)) {
                            echo '<div class="single-comment d-block d-md-flex">
                            <div class="comment-author">
                                <a href="#"></a>
                            </div>
                            <div class="comment-info mt-3 mt-md-0">
                                <div class="comment-info-top d-flex justify-content-between">
                                    <h3>'.$rcomm["name"].'</h3>
                                    
                                   
                                </div>
                                <a href="#" class="comment-date">'.$rcomm["datetime"].'</a>
                                <p>'.$rcomm["comment"].'</p>
                            </div>
                        </div>';
                        }
                         ?>
                        

                       <!--  <div class="single-comment reply d-block d-md-flex">
                            <div class="comment-author">
                                <a href="#"><img src="assets/img/author-2.jpg" class="img-fluid"
                                                 alt="Comment User"/></a>
                            </div>
                            <div class="comment-info mt-3 mt-md-0">
                                <div class="comment-info-top d-flex justify-content-between">
                                    <h3>Alex Tuntuni</h3>
                                    <a href="#" class="btn-add-to-cart"><i class="fa fa-reply"></i> Reply</a>
                                </div>
                                <a href="#" class="comment-date">19 JULY 2017, 10:05 PM</a>
                                <p>On the other hand indignation and dislike men ware sobeguil andlo demized by the
                                    charms of pleasure of the moment.</p>
                            </div>
                        </div> -->

                        <!-- <div class="single-comment d-block d-md-flex">
                            <div class="comment-author">
                                <a href="#"><img src="assets/img/author-3.jpg" class="img-fluid"
                                                 alt="Comment User"/></a>
                            </div>
                            <div class="comment-info mt-3 mt-md-0">
                                <div class="comment-info-top d-flex justify-content-between">
                                    <h3>Dig Kamla</h3>
                                    <a href="#" class="btn-add-to-cart"><i class="fa fa-reply"></i> Reply</a>
                                </div>
                                <a href="#" class="comment-date">19 JULY 2017, 10:05 PM</a>
                                <p>On the other hand, we with righteous indignation and dislike men ware sobeguil andlo
                                    demized by the charms of pleasure of the moment.</p>
                            </div>
                        </div> -->
                    </div>
                
                 
                 
                 <?php
  $varcom="";
  $varnm="";
  $varem="";
  $varbid="";

  
// include_once "connection.php";
if(isset($_GET['btnsub']))
{
	$varcom= $_GET['comment'];
	$varnm=$_GET['txt'];
    $varem= $_GET['mail'];
	$bid= $_GET['id'];
	$dt= date("y-m-d h:i:s");
	 echo $sqlins="INSERT INTO tab_comment (name,comment,user_login_id,blog_id,status,datetime)
VALUES('$varnm','$varcom','$varem',$bid,1,'$dt')";

if (mysqli_query($con,$sqlins))
{
// echo "1 record added";
   header("location:single-blog.php?id=".$bid);
}
else
{
  die('Error: ' . mysqli_error($con));
}
// mysqli_close($con);
}
?>


                    <div class="leave-comment-area comment-single-item">
                        <h2>Leave a Comment</h2>
                        <?php if (!isset($_SESSION["cid"])) {
                            echo "<strong>First you have to login then you can leave a comment</strong>";
                        } ?>
                        <div class="comment-form-wrap <?php if (!isset($_SESSION["cid"])) {
                            echo "d-none";
                        } ?>">
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="Get" enctype="multipart/form-data">
                                <div class="single-input-item">
                                    <textarea name="comment" id="comment" cols="30" rows="6"
                                              placeholder="Write your Comment"></textarea>
                                </div>

                                <!-- <div class="single-input-item">
                                    <input type="url" placeholder="Website" required/>
                                </div> -->

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input type="text" name="txt" placeholder="Name" required value="<?php if (isset($_SESSION["cid"])) {
                            echo $_SESSION['cname'];
                        } ?>" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="single-input-item">
                                            <input type="email"  name="mail" placeholder="Email Address" required value="<?php if (isset($_SESSION["cid"])) {
                            echo $_SESSION['cid'];
                        } ?>" />
                                            <input type="hidden" id="id" name="id" value="<?php echo $_GET['id']; ?>" />
                                        </div>
                                    </div>
                                </div>

                                <div class="single-input-item">
                                    <button type="submit" name="btnsub" class="btn-add-to-cart">Submit Comment</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>





            <!-- Single Blog Page Content End -->

            <!-- Sidebar Area Start -->
            <div class="col-lg-4 mt-5 mt-lg-0">
                <div id="sidebar-area-wrap">
                    <!-- Single Sidebar Item Start -->
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Search</h2>
                        <div class="sidebar-body">
                            <div class="sidebar-search">
                                <form action="#">
                                    <input type="search" placeholder="type keyword"/>
                                    <button type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Single Sidebar Item End -->

                    <!-- Single Sidebar Item Start -->
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Recent Posts</h2>
                        <div class="sidebar-body">
                            <div class="small-product-list recent-post">
                                <div class="single-product-item">
                                    <figure class="product-thumb">
                                        <a href="#"><img class="img-fluid" src="assets/img/product-2.jpg"
                                                         alt="Products"/></a>
                                    </figure>
                                    <div class="product-details">
                                        <h2><a href="single-blog.php">Lorem ipsum is dolor sit amet, consectetur
                                            adipisicing elit.</a></h2>
                                        <span class="price">20, Aug 2018</span>
                                        <a href="#" class="btn-add-to-cart">Read More <i
                                                class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>

                                <div class="single-product-item">
                                    <figure class="product-thumb">
                                        <a href="#"><img class="img-fluid" src="assets/img/product-3.jpg"
                                                         alt="Products"/></a>
                                    </figure>
                                    <div class="product-details">
                                        <h2><a href="#">Set of Sprite Yoga Lorem ipsum dolor sit Straps</a></h2>
                                        <span class="price">20, Aug 2018</span>
                                        <a href="#" class="btn-add-to-cart">Read More <i
                                                class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>

                                <div class="single-product-item">
                                    <figure class="product-thumb">
                                        <a href="#"><img class="img-fluid" src="assets/img/product-4.jpg"
                                                         alt="Products"/></a>
                                    </figure>
                                    <div class="product-details">
                                        <h2><a href="single-blog.php">Lorem ipsum is dolor sit amet, consectetur
                                            adipisicing elit.</a></h2>
                                        <span class="price">20, Aug 2018</span>
                                        <a href="#" class="btn-add-to-cart">Read More <i
                                                class="fa fa-long-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Single Sidebar Item End -->

                    <!-- Single Sidebar Item Start -->
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Categories</h2>
                        <div class="sidebar-body">
                            <ul class="sidebar-list">
                                <li><a href="#">Tops &amp; Tees</a></li>
                                <li><a href="#">Polo Short Sleeve</a></li>
                                <li><a href="#">Graphic T-Shirts</a></li>
                                <li><a href="#">Jackets &amp; Coats</a></li>
                                <li><a href="#">Fashion Jackets</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Sidebar Item End -->

                    <!-- Single Sidebar Item Start -->
                    <div class="single-sidebar-wrap">
                        <h2 class="sidebar-title">Popular Tags</h2>
                        <div class="sidebar-body">
                            <ul class="tags">
                                <li><a href="#">Tops</a></li>
                                <li><a href="#">Tees</a></li>
                                <li><a href="#">Polo</a></li>
                                <li><a href="#">T-Shirts</a></li>
                                <li><a href="#">Fashion</a></li>
                                <li><a href="#">Jeans</a></li>
                                <li><a href="#">Pants</a></li>
                                <li><a href="#">Necessitatibus</a></li>
                                <li><a href="#">Jackets</a></li>
                                <li><a href="#">Coats</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Single Sidebar Item End -->
                </div>
            </div>
            <!-- Sidebar Area End -->
        </div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->
<?php
include "footer.php";
?>