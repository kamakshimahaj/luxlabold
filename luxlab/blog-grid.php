<?php
include "topbar.php";
?>

<!--== Page Title Area Start ==-->
<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Blog</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="blog.php" class="active">Blog</a></li>
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
            <!-- Blog Page Content Start -->
            <div class="col-lg-12">
                <div class="blog-content-wrap">
                    <div class="row">
                        <?php
                            $sql="Select * from tab_blog limit 4";
                            $result=mysqli_query($con,$sql);
                            while ($row=mysqli_fetch_array($result)) {
                                $blog_description = $row["blog_description"];
                                // $blog_by = $row["blog_by"];
                                $words = str_word_count($blog_description, 1);
                                $limited_description = implode(' ', array_slice($words, 0, 80));
                                echo '<div class="col-md-3">
                                <!-- Single Blog Item Start -->
                                <div class="single-blog-wrap">
                                    <figure class="blog-thumb">
                                        <a href="single-blog.php?id='.$row["id"].'"><img img src="Admin/Screenshots/'.$row["blog_image"].'" alt="blog"
                                        class="img-fluid"   /></a>
                                        <figcaption class="blog-icon">
                                            <a href="single-blog.php"><i class="fa fa-file-image-o"></i></a>
                                        </figcaption>
                                    </figure>
    
                                    <div class="blog-details">
                                        <h3>'.$row["blog_title"].'</h3>
                                        <span class="post-date">'.$row["blog_date"].'</span>
                                        <p>'.$limited_description.'...<br>-- By <small>'.$row["blog_by"].'</small></p>
                                        <a href="single-blog.php?id='.$row["id"].'" class="btn-long-arrow">Read More</a>
                                    </div>
                                </div>
                                <!-- Single Blog Item End -->
                            </div>';
                            }
                        ?>
                        

                        
                    </div>
                </div>

                <!--  Pagination Area Start -->
                <!-- <div class="page-pagination mt-5 pt-5">
                    <ul class="pagination justify-content-center">
                        <li><a href="#" aria-label="Previous">«</a></li>
                        <li><a class="current" href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">....</a></li>
                        <li><a href="#">88</a></li>
                        <li><a href="#" aria-label="Next">»</a></li>
                    </ul>
                </div> -->
                <!--  Pagination Area End -->
            </div>
            <!-- Blog Page Content End -->
        </div>
    </div>
</div>
<!--== Page Content Wrapper End ==-->
<?php
include "footer.php";
?>