<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>buyer Creation</title>
<link rel="stylesheet" href="/css/bootstrap.min.css" >
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
<script src="/js/jquery.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
</head>
<body>

<?php
session_start();
include 'function.php';
include 'newconnection.php';
$obj1= new utilfunction();  // creating class object 
 $varid="";
    $oldpass="";
    $newpass="";
    $conpass="";
if (isset($_POST['btn1']))
    { 
        $oldpass=$_POST['oldpass'];
        $newpass=$_POST['newpass'];
        $conpass=$_POST['conpass'];
        if(isset($_SESSION['aid']))
        {
 $sql= "SELECT * FROM tab_buyer where login_id='".$_SESSION['aid']."'";
        $result = mysqli_query($con,$sql);
        $count=mysqli_num_rows($result);
        if($count!=0)
        {
              if($row = mysqli_fetch_array($result))
                {
        //echo "$oldpass and ".decrypt($row['password']);
            if($oldpass==$obj1->decrypt($row['password']))
             {
                        if ($newpass==$conpass)
                        {
                          $newpass = $obj1->encrypt($newpass);
    $sqpupdate="update tab_buyer set password='$newpass' where login_id='".$_SESSION['aid']."'";

             mysqli_query($con,$sqpupdate);
              echo "Password Change successfully.";
                  }
                   else
                    {
                            echo "Password does not match.";
                      }
                }
                else
                    echo "Wrong Old Password";
            }
                

        
 
    }
    else
        echo "Wrong User id ";
}
}
?>

<div class="container-fluid" >


	<div class="row">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="border border-dark m-4 p-4 sm-6 style">
	<form id="f1" name="f1" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
					<div class="form-group row">
		<input type="hidden" name="txtid" value="<?php echo $varid; ?>">
						<label for="example-password-input" class="col-sm-12 col-form-label s2">Old Password</label>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<input class="form-control s1" name="oldpass" type="password" id="oldpass" required="" placeholder="Enter Old Password" />
							<i class="fa fa-lock "></i>
						</div>
					</div>
					<div class="form-group row">
						<label for="example-password-input" class="col-sm-12 col-form-label s2">New Password</label>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<input class="form-control s1" name="newpass" type="password" id="newpass" required="" placeholder="Enter New Password" value="<?php echo $newpass; ?>" />
							<i class="fa fa-lock "></i>
						</div>
					</div>
					<div class="form-group row">
						<label for="example-password-input" class="col-sm-12 col-form-label s2">Confirm Password</label>
					</div>
					<div class="form-group row">
						<div class="col-sm-12">
							<input class="form-control s1" name="conpass" type="password" id="conpass" required="" placeholder="Confirm Password" value="<?php echo $conpass; ?>" />
							<i class="fa fa-lock "></i>
						</div>
					</div><br>
					<div class="form-group row">
						<div class="col-sm-12">
							<button type="submit" class="btn btn-primary col-sm-6 s1 s2" name="btn1" style="height: 110%;width:40%; margin-left: 140px;">Change Password</button>
						</div>
					</div>	
				</form>	
			</div>
		</div>
	</div>
</div>
</body>
</html>