<?php
session_start();
ob_start();
$varprod=$_GET["pid"];
// echo $_GET['pid'];
include_once 'admin/connection.php';
  // $sql="select * from tab_wishlist where customer_id='".$_SESSION['cid']."'";
  //   $res=mysqli_query($con,$sql);
  //    $count1=mysqli_num_rows($res);

   if (!isset($_SESSION['cid'])) 
   {
      echo "1";
    //  header('location:index.php');

  }
  else
  {
   //$varprodid=$_POST['txtprodid'];
   $dt=date("y-m-d");
   $sqlselect= "Select * from tab_wishlist where customer_id='".$_SESSION['cid']."'  and product_id='".$varprod."' and  status=0";
   $resultselect=mysqli_query($con,$sqlselect);
   $count=mysqli_num_rows($resultselect);
   if($count==0)   
   {
    $dt=date("y-m-d");

    $sqlins="INSERT INTO tab_wishlist(customer_id,product_id,quantity,status,creation_date) Values('$_SESSION[cid]', '$varprod','1',  '0','$dt')";
    if(!mysqli_query($con,$sqlins))
    {
        die('error:'.mysqli_error($con));
    }
   

    echo '3';
    //  header('location:wishlist.php');
}

else {

   echo "2";
    
}
}



	
?>