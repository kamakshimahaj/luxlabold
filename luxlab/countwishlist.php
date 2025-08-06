 <?php 
 session_start();
 ob_start();
$varcid=(isset($_SESSION['cid']) ? $_SESSION['cid']: "" );

    include 'connection.php';
     if (!isset($varcid)) 

  {
   echo '0';
}
     else {
      $sql="SELECT count(id) as count from tab_wishlist WHERE status='0' and customer_id='$varcid'";


     $result=mysqli_query($con,$sql);
     while($row = mysqli_fetch_array($result)){
        echo $row['count'];
     }

 }
?>