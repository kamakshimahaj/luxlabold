<?php
  include 'admin/connection.php';

  if(isset($_GET['id']))
  {
 mysqli_query($con,"DELETE FROM tab_wishlist WHERE id='$_GET[id]'");
 }	
 mysqli_close($con);
 header('location:wishlist.php');
 ?>