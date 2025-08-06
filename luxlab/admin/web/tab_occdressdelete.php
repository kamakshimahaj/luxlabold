<!DOCTYPE html>
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

</head>

<body>
<?php
include_once "newconnection.php";
if(isset($_GET['idd']))
{
$sqldel="DELETE from tab_occasiondress where id='$_GET[idd]'";
mysqli_query($con, $sqldel );
header('Location:tab_occdressview.php');  //page redirect 
}
?>
</body>
</html>