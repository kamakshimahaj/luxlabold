<?php
//session_start();
include "topbar.php";

//session_start();
include 'admin/connection.php';
//include 'function.php';
	
?>

<div id="page-title-area">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <div class="page-title-content">
                    <h1>Checkout</h1>
                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#">Payment</a></li>
                        <li><a href="#" class="active">Payment</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php

	if(isset($_GET['payid']) && isset($_GET['ordid']))
	{
		 $sqlship="Update tab_shipment set status=0 where customer_id='".$_SESSION['cid']."' and status=1";
            unset($_SESSION['shipm']);
             if(!mysqli_query($con,$sqlship))
              {
                die('error:'.mysqli_error($con));
              }

		 $obj1= new function1();
		 $varname= $_SESSION['cname'];
		$varloginid= $_SESSION['cid'];
			$payid= $_GET['payid'];
		$dt=date("y-m-d");
	$sqlins="INSERT INTO tab_payment(order_id,customer_id,payment_mode,amount,status,creation_date)Values('$_GET[ordid]', '$_SESSION[cid]', 'Online', '$_SESSION[total]', 'Paid','$dt')";
	if(!mysqli_query($con,$sqlins))
	{
		die('error:'.mysqli_error($con));
	}
	
	$sql11= "update tab_order set status='paid' where customer_id='".$_SESSION['cid']."'  and status='In process'";
    if(!mysqli_query($con,$sql11))
	{
		die('ERROR:'.mysqli_error($con));
	}
		$sql11= "update tab_order_item set status='paid' where order_id='".$_GET['ordid']."'  and status='In process'";
    if(!mysqli_query($con,$sql11))
	{
		die('ERROR:'.mysqli_error($con));
	}
		echo "<br><br> <h1> Your Payment is Successfully paid  </h1><br><br> <hr>";
		echo "<h4> Your order will be delivered with in 5 working days. For  further query mail at Luxaurajewels.com</h4> ";

		$msg1= " Hello $varname,<br/><br/> Thanks for Purchasing from The Ruby ,  <br/><br/>Your Payment is Successfully paid <br/><br/> Payment ID is : $payid <br/><br/>Your order will be delivered with in 5 working days. <br/><br/>For  further query mail at order@ruby.com ";
               $obj1->email_send($varloginid,"Order  Payment Confirmation ", $msg1);
		
	}
	


?>



<?php
include "footer.php";
?>