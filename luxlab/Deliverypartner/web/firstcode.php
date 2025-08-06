<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title> PHP COde Demo</title>
</head>
<body>
<h1> PHP code Demo </h1>
<?php
		$num1=10;   // integer
		$num2=5.8;  // float
		$num3="20"; //string

		$sum1= $num1 + $num2;   //15.8
		$sum2= $num2 + $num3;   //25.8
		$sum3= $num3 + $num1;   //30

		echo "Sum of num1 and num2 is :".$sum1;
		echo "<br/>Sum of ".$num2." and ". $num3. " is :".$sum2;
		echo "<br/> Sum of $num3 and $num1 is : $sum3";
?>

</body>
</html>