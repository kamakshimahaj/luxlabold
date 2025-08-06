<!DOCTYPE html>
<html lang="en">
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Example of Bootstrap Four Column Convertible Layout</title>
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
<style type="text/css">

label
{
font-weight: bold;
}
body
    {
      background-color: silver;
    }
</style>
</head>

<body>


<?php
$hin=null;
$eng=null;
$pun=null;
$mth=null;
$sci=null;
$sst=null;
$tot=null;
$per=null;
$grd=null;


if(isset($_POST['btnshow']))
{
$hin= $_POST['txthin'];
$eng= $_POST['txteng'];
$pun= $_POST['txtpun'];
$mth= $_POST['txtmth'];
$sci= $_POST['txtsci'];
$sst= $_POST['txtsst'];

$tot=$hin+$eng+$pun+$mth+$sci+$sst;

$per= $tot/6;

if($per<=100)
{
  if($per>=40)
  {
    if($per>=50)
    {
      if($per>=60)
      {
        if($per>=80)
        {
          $grd="O";
        }
        else
        {
          $grd="A";
        }
    }
    else
      $grd="B";
  }
  else
  $grd="C";
}
else
$grd="F";
}
else
$grd="Invalid Marks";

// per  80- 100    O
//      60- <80    A
//      50- <60    B 
//      40- <50    C 
//      <40        F


// if($per>=80 && $per<=100)
//   $grd="O";
// 
// else if($per>=60)
//   $grd="A";
// else if($per>=50)
//   $grd="B";
// else if($per>=40)
//   $grd="C";
// else if($per>0)
//   $grd="Fail";
// else
//   $grd="Invalid Marks";


}

?>


<div class="container">
<div class="row">
<div class="col-sm-2">
</div>

<div class="col-sm-8 center ">

  <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  method="post">
    <div class="row">
      <div class="col-sm-3">
      	
      </div>
      
      <div class="col-sm-6">
      <h1> MARKS SHEET </h1>
      </div>
      
      <div class="col-sm-3">
      	
      </div>
    </div>

    <div class="row mb-2">
      <div class="col-sm-2">
        <label for="txthin">Hindi </label>
      </div>
      <div class="col-sm-2">
        <input type="text" class="form-control" name="txthin" id="txthin" value="<?php echo $hin; ?>" />
      </div>

      <div class="col-sm-2">
        <label for="txteng">English </label>
      </div>
      <div class="col-sm-2">
        <input type="text" class="form-control" name="txteng" id="txteng" value="<?php echo $eng; ?>" />
      </div>

      <div class="col-sm-2">
        <label for="txtpun">Punjabi </label>
      </div>
      <div class="col-sm-2">
        <input type="text" class="form-control" name="txtpun" id="txtpun"  value="<?php echo $pun; ?>" />
      </div>
    </div>

    <div class="row mb-2">
      <div class="col-sm-1">
        <label for="txtmth">Math </label>
      </div>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="txtmth" id="txtmth" value="<?php echo $mth; ?>" />
      </div>

      <div class="col-sm-1">
        <label for="txtsci">Science </label>
      </div>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="txtsci" id="txtsci" value="<?php echo $sci; ?>" />
      </div>

      <div class="col-sm-1">
        <label for="txtsst">S.St. </label>
      </div>
      <div class="col-sm-3">
        <input type="text" class="form-control" name="txtsst" id="txtsst" value="<?php echo $sst; ?>" />
      </div>
    </div>



    <div class="row mb-2">
      <div class="col-sm-4"> </div>
       <div class="col-sm-4">
        <button type="submit" name="btnshow" class="btn btn-danger btn-block" >SHOW</button>
        </div>
        <div class="col-sm-4"> </div>


        </div>


        <div class="row mb-2">
            <div class="col-sm-2"></div>
            <div class="col-sm-1">
            <label for="txttot">Total</label>
          </div>

            <div class="col-sm-3">
        <input type="text" name="txttot" id="txttot" class="form-control" value="<?php echo $tot; ?>" />
      </div>
      <div class="col-sm-2">
            <label for="txtper">Percentage</label>
          </div>

            <div class="col-sm-2">
        <input type="text" name="txtper" id="txtper" class="form-control" value="<?php echo $per; ?>" />
      </div>


        </div>

        <div class="row mb-2">

          <div class="col-sm-4"></div>

          <div class="col-sm-1">
           <label for="txtgrd"> Grade</label>

          </div>

          <div class="col-sm-3">
        <input type="text" name="txtgrd" id="txtgrd" class="form-control" value="<?php echo $grd; ?>" />
          </div>

          <div class="col-sm-4"></div>

        </div>



  </form>

</div>
<div class="col-sm-2">
</div>


</div>
</div>
</body>
</html>