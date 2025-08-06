<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css" >
	<link rel="stylesheet" href="css/bootstrap-theme.min.css" />
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js" ></script>
    <!-- Latest compiled and minified CSS -->
   <link rel="stylesheet"href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <!-- jQuery library -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <!-- Latest compiled JavaScript -->
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<title>Bootstrap Form Demo in PHP</title>
</head>
<body>
<?php
$num1="";	// LOCAL Variables 
$num2="";
$res=""	;
if(isset($_POST['btnadd']))
{
	$num1= $_POST['txtfirst'];   // reading textbox value from post request
	$num2= $_POST['txtsec'];
	$res= $num1 + $num2;
}
elseif (isset($_POST['btnsub'])) 
{
	$num1= $_POST['txtfirst'];   // reading textbox value from post request
	$num2= $_POST['txtsec'];
	$res= $num1 - $num2;
}
elseif(isset($_POST['btnbig']))
{
	$num1= $_POST['txtfirst'];   // reading textbox value from post request
	$num2= $_POST['txtsec'];
	if($num1>=$num2)
	{
		$res="$num1 is Bigger";
	}
	else
	{
		$res="$num2 is Bigger";
	}
}

// if(isset($_GET['btnadd']))
// {
// 	$num1= $_GET['txtfirst'];   // reading textbox value from post request
// 	$num2= $_GET['txtsec'];
// 	$res= $num1 + $num2;
// }
// elseif (isset($_GET['btnsub'])) 
// {
// 	$num1= $_GET['txtfirst'];   // reading textbox value from post request
// 	$num2= $_GET['txtsec'];
// 	$res= $num1 - $num2;
// }
?>
<div class="container">
   	<div class="row">
        <div class="col-sm-2 left">
        </div>
        <div class="col-sm-8 center ">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" >
	<div class="row">
	<div class="col-sm-3">  </div>
		<div class="col-sm-6"> <h1> Calculation Form </h1> </div>
	<div class="col-sm-3">     </div>
	</div>
<div class="row mb-2">

	<div class="col-sm-6">
	<label for="txtfirst">First Number</label>
	<input type="text" class="form-control" id="abc" name="txtfirst" placeholder="Enter Any Number" required="required" value="<?php echo $num1; ?>">
	</div>

	<div class="col-sm-6">
	<label for="txtsec">Second Number</label>
	<input type="text" class="form-control" id="txtsec" name="txtsec" placeholder="Enter Any number" required="required"  value="<?php echo $num2; ?>">
	</div>

</div>

<div class="row mb-2">
	<div class="col-sm-6">
	<label for="txtres">Result</label>
	<input type="text" class="form-control" id="txtres" name="txtres"
	placeholder="Result of Calculation"  readonly  value="<?php echo $res; ?>">
	</div>

	<div class="col-sm-6">
	<button type="submit" name="btnadd" class="btn btn-primary">ADD</button>
	<button type="submit" name="btnsub" class="btn btn-info">SUBTRACT</button>
	<button type="submit" name="btnbig" class="btn btn-secondary">Bigger Number</button>
	</div>

</div>

</form>
</div>
</div>
</div>


</body>
</html>

<!-- http://localhost/2023_MorningBatch/Add_form_demo.php?txtfirst=44&txtsec=55&txtres=0&btnadd= -->