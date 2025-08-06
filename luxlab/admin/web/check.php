<!DOCTYPE html >
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php  
session_start();
$_SESSION['uid']=$_POST['txtuid'];
$pass=$_POST['txtpass'];
if($pass=='admin')
{
	header('location:Welcomesession.php'); //  page redirect 
}
else
{
	header('location:NotAuthorized.php');
}

?>
</body>
</html>