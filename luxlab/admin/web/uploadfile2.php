<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
$nm= $_POST['tt'];
  if ($_FILES["f1"]["error"] > 0)
    {
    echo "Error Code: " . $_FILES["f1"]["error"] . "<br>";
    }
  else
    {
      if(file_exists("pics/" . $nm.".jpg"))
      {
      echo $nm . " already exists. ";
      }
    else
      {
move_uploaded_file($_FILES["f1"]["tmp_name"], "pics/" . $nm . ".jpg");
 echo "Stored in: " . "pics/" . $nm . ".jpg";
echo "<img src=pics/" . $nm . ".jpg width=100 height=100>";
 // move_uploaded_file($_FILES["f1"]["tmp_name"], "images/".$_FILES['f1']['name']);
// 	     echo "Stored in: " . "images/" .$_FILES['f1']['name'] ;
 //       echo "<img src='images/" .$_FILES['f1']['name']. "' width=100 height=100>";
	  
      }
    }
  

?> 

</body>
</html>