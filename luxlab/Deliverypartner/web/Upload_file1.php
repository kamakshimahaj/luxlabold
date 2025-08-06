<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
if ($_FILES["f1"]["error"] > 0)
  echo "Error: " . $_FILES["f1"]["error"] . "<br>";
else
  {
  echo "Upload: " . $_FILES["f1"]["name"] . "<br>";
  echo "Type: " . $_FILES["f1"]["type"] . "<br>";
  echo "Size: " . ($_FILES["f1"]["size"] / 1024) . " kB<br>";
  echo "Stored in: " . $_FILES["f1"]["tmp_name"];
  }
?> 
</body>
</html>