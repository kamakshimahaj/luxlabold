
                        <?php
                        session_start();
                        ob_start();
$order_id=$_GET["oid"];
$stat=$_GET["stat"];
include 'connection.php';
$dt= date('Y-m-d');
$dt1= date('Y-m-d H:i:s');
$sql="INSERT INTO tab_order_deliever(deliever_partner_id,order_id,delievery_date,status,creation_date)	Values('$_SESSION[dld]', '$order_id','$dt1','$stat','$dt')";
	if(!mysqli_query($con, $sql))
	{
		die('error:'.mysqli_error($con));
	}else{
		$sqlupd="Update tab_order set status='".$stat."' where id=".$order_id;
		if(!mysqli_query($con, $sqlupd))
	{
		die('error:'.mysqli_error($con));
	}

		echo $order_id."-".$stat;	
	}
	
	//mysqli_close($con);

	
?>