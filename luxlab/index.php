<?php
include "topbar.php";
?>


<style type="text/css">
    .products-wrapper .single-product-item .product-thumb img {

        width: 204px;
        height: 330px;
    }
    section .a1
{
    margin-top:50px ;
  padding:4%;
  background:#7e8890;
}
/*h2,h6
{
  color:#e6e6e6;
}*/
.form-subscribe1
{
  max-width:600px;
  margin:0 auto
}
.form-subscribe1 .form-control1
{
  background-color:hsla(0,0%,100%,.8);
  padding-left:24px;
  padding-right:24px;
  letter-spacing:1px;
  border:none;
  border-top-left-radius:36px;
  border-bottom-left-radius:36px
}
.form-subscribe1 .form-control1.focus,.form-subscribe1 .form-control1:focus
{
  z-index:2;
  background-color:hsla(0,0%,100%,.8)
}
.form-subscribe1 .btn
{
  border-top-right-radius:36px;
  border-bottom-right-radius:36px;
  background:#7ec855;
  border-color:#7ec855;
  height:46.5px;
}
</style>        

<!--== Banner // Slider Area Start ==-->
<section id="banner-area">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-12">
                <div id="banner-carousel" class="owl-carousel">
                    <!-- Banner Single Carousel Start -->
                    <div class="single-carousel-wrap slide-item-1">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>Luxaura-The artificial jewels</h4>
                            <h2>Where elegance meets heritage</h2>
                            <p>Captures the essence of blending contemporary elegance with traditional heritage with timeless traditions to appreciate both aesthetics with traditions.  </p>
                            <a href="shop.php?pid=6" class="btn-long-arrow">Shop Now</a>
                        </div>
                    </div>
                    <!-- Banner Single Carousel End -->
                    <!-- Banner Single Carousel Start -->
                    <div class="single-carousel-wrap slide-item-2">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>New Collection 2024</h4>
                            <h2>Crafted to perfection,worn with pride</h2>
                            <p>Emphasizes the meticulous craftsmanship behind each piece of jewelry and the pride that comes with wearing.</p>
                            <a href="shop.php?pid=6&sid=10" class="btn-long-arrow">Shop Now</a>
                        </div>
                    </div>
                    <!-- Banner Single Carousel End -->
                    <div class="single-carousel-wrap slide-item-3">
                        <div class="banner-caption text-center text-lg-left">
                            <h4>New Collection 2024</h4>
                            <h2>Perfect Earrings for Every Occasion</h2>
                            <p>earrings that complements every outfit to enhance the wearer’s style</p>
                            <a href="shop.php?pid=33" class="btn-long-arrow">Shop Now</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<!--== Banner Slider End ==-->

<!--== About Us Area Start ==-->
<section id="aboutUs-area" class="pt-9">
    <div class="ruby-container">
        <div class="row">
            <div class="col-lg-6 mt-5 align-self-center">
                <!-- About Image Area Start -->
                <div class="about-image-wrap ">
                    <a href="about.php"><img src="assets/img/about_us.jpg" alt="About Us" class="ethnic india"/></a>
                </div>
                <!-- About Image Area End -->
            </div>

            <div class="col-lg-6 m-auto">
                <!-- About Text Area Start -->
                <div class="about-content-wrap ml-0 ml-lg-5 mt-5 mt-lg-0">
                <h2><a href="aboutus.php">About Us</a></h2>
                    
                    <h3>WE ARE MAKING INDIA ETHNIC</h3>
                    <div class="about-text">
                        <p>Welcome to Luxaura,The Artificial Jewels where every piece tells a story of tradition, elegance, and cultural heritage reimagined for the modern world.

Step into a realm where ancient craftsmanship meets contemporary style. At Luxaura,The Artificial Jewels, we're passionate about celebrating the richness and diversity of cultures through our curated collection of artificial jewellery.

<p>From the vibrant colors of Indian meenakari to the intricate patterns of rajasthani culture, each piece in our collection is a nod to the timeless beauty of traditional adornments. Whether you're looking for a statement piece to elevate your ensemble or a subtle accent to express your individuality, we have something for every taste and occasion.

But our dedication goes beyond aesthetics. We strive to honor the skilled artisans behind each creation, supporting fair trade practices and sustainable production methods. With every purchase, you're not just acquiring a beautiful piece of jewellery – you're also contributing to the preservation of cultural heritage and the empowerment of communities worldwide.

Join us on a journey of discovery and appreciation as we explore the intersection of culture and creativity through the art of artificial jewellery. Embrace the past, adorn the present, and celebrate the beauty of diversity with Luxaura.</p>

                       

                        <!-- <a href="about.php" class="btn btn-long-arrow">Learn More</a> -->


                        <!-- <h4 class="vertical-text">WHO WE ARE?</h4> -->
                    </div>
                </div>
                <!-- About Text Area End -->
            </div>
        </div>
    </div>
</section>
<!--== About Us Area End ==-->

<br><br>


<!--== Products by Category Area Start ==-->
<div id="product-categories-area">
    <div class="ruby-container">
        <div class="row">
            <!-- <div class="col-lg-6">
                <div class="large-size-cate">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="#"><img src="assets/img/women-cat.jpg" alt="The Royal Bride"
                                                     class="img-fluid"/></a>

                                    <figcaption class="category-name">
                                        <a href="#">The Royal Bride</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="#"><img src="assets/img/men-cat.jpg" alt="PARTY JEWEL" class="img-fluid"/></a>

                                    <figcaption class="category-name">
                                        <a href="#">Star of the Party </a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
             <div class="col-lg-12">
                <center><h1>Shop by Category</h1></center>
             </div> 
<script>
    function redr(val){
        window.location.href="single-product.php?id="+val;
    }
</script>
            <div class="col-lg-12">
                <div class="small-size-cate">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="shop.php?pid=15"><img src="assets/img/jewellery-cat.jpg" alt="bangles" class="img-fluid"/></a>
                             <figcaption class="category-name">
                                        <a href="shop.php?pid=15">Bangels</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div> 

                        <div class="col-sm-3">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="shop.php?pid=33"><img src="assets/img/women-cat2.jpg" alt="earings"
                                                     class="img-fluid"/></a>
                                    <figcaption class="category-name">
                                        <a href="shop.php?pid=33">Earings</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>

                         <div class="col-sm-3">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="shop.php?pid=6"><img src="assets/img/watch-cat.jpg" alt="Men Category"
                                                     class="img-fluid"/></a>

                                    <figcaption class="category-name">
                                        <a href="shop.php?pid=6">Necklace Set</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div> 

                        

                        <div class="col-sm-3">
                            <div class="single-cat-item">
                                <figure class="category-thumb">
                                    <a href="shop.php?pid=25"><img src="assets/img/suit-cat.jpg" alt="Rings"
                                                     class="img-fluid"/></a>
                             <figcaption class="category-name">
                                        <a href="shop.php?pid=25">Rings</a>
                                    </figcaption>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== Products by Category Area End ==-->


<!--== New Products Area Start ==-->
<section id="new-products-area" class="p-9">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>New Products</h2>
                    <p>Trending stunning Unique</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="products-wrapper">
                    <div class="new-products-carousel owl-carousel">
                         <!-- Single Product Item -->

<?php  

                    $productsql="select * from tab_product  order by  id desc limit 10
";
                        $productres =mysqli_query($con,$productsql);
                        while($prow=mysqli_fetch_array($productres)){

                       
                 echo'       <div class="single-product-item text-center">
                            <figure class="product-thumb">
                                <a href="single-product.php?id='.$prow['id'].'"><img src="admin/Screenshots/'.$prow['pro_img'].'"  alt="Products"
                                class="img-fluid"></a>
                            </figure>

                            <div class="product-details">
                                <h2><a href="single-product.php?id='.$prow['id'].'">'.$prow['pro_name'].'</a></h2>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <span class="price">&#8377;'.$prow['pro_price'].'</span>
                                <a  href="single-product.php?id='.$prow['id'].'" class="btn btn-add-to-cart">+ Product Details</a>
                                <span class="product-bedge">New</span>
                            </div>

                            <div class="product-meta">
                            <button type="button" onclick="redr('.$prow['id'].')">
                            <span data-toggle="tooltip" data-placement="left" title="Quick View"><i
                            class="fa fa-compress"></i></span>
                            </button>
                             
                            <button type="button" onclick="wishlist('.$prow["id"].');" data-toggle="tooltip" data-placement="left"
                            title="Add to Wishlist"><i
                            class="fa fa-heart-o" style="margin-top:10px;"></i></button>
                               
                            </div>
                        </div>';
                    }

?>

                  
                        </div>
                        <!-- Single Product Item -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== New Products Area End ==-->

<!--== Testimonial Area Start ==-->
<!--== Testimonial Area Start ==-->
<section id="testimonial-area">
    <div class="ruby-container">
        <div class="testimonial-wrapper">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <!-- Section Title Start -->
                    <div class="section-title">
                        <h2>What People Say</h2>
                        <p>Testimonials</p>
                    </div>
                    <!-- Section Title End -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-7 m-auto text-center">
                    <div class="testimonial-content-wrap">
                        <div id="testimonialCarousel" class="owl-carousel">
                            <div class="nonloop-block-3 no-direction owl-carousel">
                            <div class="single-testimonial-item">
                                <p>They have absolutely outstanding products. I needed for my wedding functions and i come to buy from them .They have absolutely stunning variety ,i loved their collection. 
                                    </p>

                                <h3 class="client-name">Sidhana kapoor</h3>
                                <span class="client-email">sid12@email.here</span>
                            </div>
                </br>
                            <div class="single-testimonial-item">
                                <p>Best collection of the year award dedicated to Luxaura.</p>
                
                                <h3 class="client-name">Devika mahajan</h3>
                                <span class="client-email">devi@email.here</span>
                            </div>
                </br>
                            <div class="single-testimonial-item">
                                <p>elegancy and beauty lies here </p>

                                <h3 class="client-name">kareena khan</h3>
                                <span class="client-email">kareena2@email.here</span>
                                
                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Testimonial Area End ==-->

  <?php 
    if (isset($_POST['subs'])) {
      $obj = new function1(); // creating class object 
      $msg = "Dear User,<br><br>
      We hope this email finds you well! As valued members of our community, we're excited to share the latest updates, insights, and happenings with you through our monthly newsletter.
<br>
Here's a glimpse of what you'll find in this edition:
<br>
Feature Story: Dive into our exclusive feature article, where we explore. Discover valuable insights, tips, and perspectives to enrich your understanding.
<br>
<b>Product Updates</b>: Stay up-to-date with the latest developments and enhancements to our products/services. We're constantly striving to improve your experience, and we can't wait to share our latest innovations with you.
<br>
<b>Tips & Tricks</b>: Discover handy tips, tricks, and hacks to make the most out of our offerings. From productivity hacks to expert advice, we've got you covered.
<br>
<b>Exclusive Offers</b>: As a token of our appreciation for your continued support, enjoy exclusive offers and discounts available only to our newsletter subscribers.
<br>
Don't forget to spread the word and invite your friends to subscribe to our newsletter for a dose of inspiration, knowledge, and exclusive perks!

Thank you for being a part of our journey. Together, we're building a vibrant and thriving community.

Warm regards.";
        $obj->email_send($_POST['email'], "Stay in the Loop with Our Latest Newsletter!", $msg);
    }
     ?>
 
<!--== Blog Area Start ==-->
<section id="blog-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>From Our Blog</h2>
                    <p>Share your latest posts or best articles will post here.</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="blog-content-wrap">
            <div class="row">
                <?php $sql="Select * from tab_blog limit 4";
                        $result=mysqli_query($con,$sql);
                        while ($row=mysqli_fetch_array($result)) {
                            $blog_description = $row["blog_description"];
                            // $blog_by = $row["blog_by"];
                            $words = str_word_count($blog_description, 1);
                            $limited_description = implode(' ', array_slice($words, 0, 60));
                            echo '<div class="col-lg-3 col-md-6">
                    <!-- Single Blog Item Start -->
                    <div class="single-blog-wrap">
                        <figure class="blog-thumb">
                            <a href="blog-grid.php?id='.$row["id"].'"><img src="admin/Screenshots/'.$row["blog_image"].'" alt="blog" class="img-fluid"/></a>
                            <figcaption class="blog-icon">
                                <a href="#"><i class="fa fa-file-image-o"></i></a>
                            </figcaption>
                        </figure>

                        <div class="blog-details">
                            <h3><a href="blog-grid.php?id='.$row["id"].'">'.$row["blog_title"].'</a></h3>
                            <span class="post-date">'.$row["blog_date"].'</span>
                            <p>'.$limited_description.'...<br>-- By <small>'.$row["blog_by"].'</small></p>
                            <a href="blog-grid.php?id='.$row["id"].'" class="btn-long-arrow">Read More</a>
                        </div>
                    </div>
                    <!-- Single Blog Item End -->
                </div>';
                        }
                 ?>
                

                <!-- <div class="col-lg-6 col-md-6"> -->
                    <!-- Single Blog Item Start -->
                   <!--  <div class="single-blog-wrap">
                        <figure class="blog-thumb">
                            <a href="single-blog.php"><img src="assets/img/blog-thumb-2.jpg" alt="blog"
                                                            class="img-fluid"/></a>
                            <figcaption class="blog-icon">
                                <a href="single-blog.php"><i class="fa fa-file-image-o"></i></a>
                            </figcaption>
                        </figure>

                        <div class="blog-details">
                            <h3><a href="single-blog.php">Mirum est notare quam</a></h3>
                            <span class="post-date">20/June/2018</span>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                litterarum.</p>
                            <a href="single-blog.php" class="btn-long-arrow">Read More</a>
                        </div>
                    </div> -->
                    <!-- Single Blog Item End -->
                <!-- </div> -->

                <!-- <div class="col-lg-3 col-md-6"> -->
                    <!-- Single Blog Item Start -->
                    <!-- <div class="single-blog-wrap">
                        <figure class="blog-thumb">
                            <a href="single-blog.php"><img src="assets/img/blog-thumb-3.jpg" alt="blog"
                                                            class="img-fluid"/></a>
                            <figcaption class="blog-icon">
                                <a href="single-blog.php"><i class="fa fa-file-image-o"></i></a>
                            </figcaption>
                        </figure>

                        <div class="blog-details">
                            <h3><a href="single-blog.php">Mirum est notare quam</a></h3>
                            <span class="post-date">20/June/2018</span>
                            <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit
                                litterarum.</p>
                            <a href="single-blog.php" class="btn-long-arrow">Read More</a>
                        </div>
                    </div> -->
                    <!-- Single Blog Item End -->
                <!-- </div> -->
            </div>
        </div>
    </div>
</section>
<!--== Blog Area End ==-->

<!--== Newsletter Area Start ==-->
<section id="newsletter-area" class="p-9">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <!-- Section Title Start -->
                <div class="section-title">
                    <h2>Join The Newsletter</h2>
                    <p>Sign Up for Our Newsletter</p>
                </div>
                <!-- Section Title End -->
            </div>
        </div>

        <div class="row">
            <div class="col-lg-8 m-auto">
                <div class="newsletter-form-wrap">
                    <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input id="subscribe" type="email" name="email" placeholder="Enter your Email  Here" required/>
                        <button type="submit" name="subs" class="btn-long-arrow">Subscribe</button>
                        <div id="result"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== Newsletter Area End ==-->
<?php
include 'footer.php';
?>