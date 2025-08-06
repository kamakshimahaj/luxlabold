<!DOCTYPE html >
<html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>

<?php

if(isset($_POST['submit']))
{
  if ($_FILES["f1"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["f1"]["error"] . "<br>";// This condition checks if the error code is greater than 0, indicating that an error occurred during file upload. If an error occurred, it echoes out a message indicating the return code along with the error code itself. This helps in diagnosing the specific issue that occurred during the file upload process.
    }
  else
    {
	$varname=$_POST['tt'];
    $varloc=explode(".",  $_FILES["f1"]["name"]);//It retrieves the name of the uploaded file ($_FILES["f1"]["name"]) and splits it into an array using the dot (.) as the delimiter. This is done to separate the file name and its extension.
	$extension = end($varloc);//It retrieves the last element of the array, which represents the file extension.
	$varfnm=$varname.".".$extension;//It concatenates the desired file name ($varname) with the file extension to form the final file name ($varfnm).

 // move_uploaded_file($_FILES["f1"]["tmp_name"],"pics/".$_FILES["f1"]["name"]);
	  move_uploaded_file($_FILES["f1"]["tmp_name"], "pics/".$varfnm);
 echo "<img src='pics/" .$varfnm."' width=100px height=100px>";
	 }
	
	}

 ?> 
<!-- <form  action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data" > -->

<form  action="upload_file2.php" 
 method="post" enctype="multipart/form-data" >

User File Name :
<input type="text" name="tt"  />
 
<label for="f1">Upload File :</label>

<!-- <input type="file" name="f1" id="f1" > <BR/> -->
<input type="file" name="f1" id="f1" accept="image/png, image/gif, image/jpeg"><br/>
<input type="submit" name="submit" value="Submit" />
</form>

</body>
</html>