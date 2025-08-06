<?php
$con= mysqli_connect("localhost","root","","artificial_jewellery");
// server name,db username, db name
//check connection
if(mysqli_connect_errno())
{
	echo "Failed to connection to Mysqli:",mysqli_connect_error();
}
?>