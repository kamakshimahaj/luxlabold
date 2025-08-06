<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer"/>
<style type="text/css">
	

@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');
::placeholder {
  color: black;
  opacity: 0.5; 
}

* {
	box-sizing: border-box;
	margin: 0;
	padding: 0;	
	font-family: Raleway, sans-serif;
}


.container {
	display: flex;
	align-items: center;
	justify-content: center;
	min-height: 100vh;
}



.login {
	width: 320px;
	padding: 30px;
	padding-top: 20px;
}

.login__field {
	padding: 20px 0px;	
	position: relative;	
}

div.card {
  width: 350px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  }
.login__input {
	border: none;
	border-bottom: 2px solid #D1D1D4;
	background: none;
	padding: 10px;
	padding-left: 24px;
	font-weight: 700;
	width: 75%;
	transition: .2s;
}

/.login__input:active,/
/.login__input:focus,/
.login__input:hover { 
	outline: none;
	border-bottom-color: #6A679E;
}

.login__submit {
	background-color: blue;
	background: #fff;
	font-size: 14px;
	margin-top: 20px;
	/padding: 16px 20px;/
	border-radius: 26px;
	border: 1px solid #D4D3E8;
	text-transform: uppercase;
	font-weight: 700;
	display: inline;
	align-items: center;
	width: 100%;
	height: 50px;
	color: #4C489D;
	box-shadow: 0px 2px 2px #5C5696;
	cursor: pointer;
	transition: .2s;
}

a{
		text-align: center;
		text-decoration: none;
		/text-decoration: bold;/

}

.button__icon {
	font-size: 20px;
		color: #7875B5;}

a:hover{
	color: red;
}
</style>
</head>
<body>
<?php
    session_start();
    include_once 'function.php';
        $id="";
        $password="";
        $obj1= new utilfunction();  
        include_once 'newconnection.php';
        if(isset($_POST['btn']))
        {
            $id=$_POST['Login'];
      $pass= $obj1->encrypt($_POST['password']);
     $sqllogin="SELECT * FROM tab_deliverypartner where login_id='".$id."' and password='".$pass."'";
            $result=mysqli_query($con,$sqllogin);
            $rowcount= mysqli_num_rows($result);
            if($rowcount==1)
            {
                if($row=mysqli_fetch_array($result))
                {
                    $_SESSION['aid']=$row['login_id'];
                    $_SESSION['aname']=$row['name'];
                    $_SESSION['password']=$row['password'];
					$_SESSION['aimg']=$row['image'];
                    $_SESSION['active']=$row['active'];
                     header('location:delpartner_welcome.php');
                }
            }
            else
            {
                header('location:auth.php');
            }
       }
?> 

<div class="container">
	
		<div class="card" style="width: 20rem;">
  <div class="card-body" style="background-color:whitesmoke ">
				<form class="login"id="form1" method="post" action="<?php echo $_SERVER['PHP_SELF'] ;?>" >
					<h3><b>DELIVERY PARTNER LOGIN</b></h3>

				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" name="Login" class="login__input" placeholder="User name / Email">
				</div>

				<div class="login__field">
					<i class="login__icon fas fa-lock"></i>
					<input type="password" name="password" id="password" class="login__input" placeholder="Password"><i class="far fa-eye" id="togglePassword" 
   style="cursor: pointer; margin-left: -30px; z-index: 100;"></i>
				</div>
				<div class="row">
				<div class="col-sm-8">
				<button class="btn login__submit" name="btn">
					<!-- <button type="button" class="btn btn-primary">Primary</button> -->
					<span class="button__text">Log In</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button><br><br>
				<h5 class="hr-lines"></h5>
				<center><a href="delpartner_forgetpass.php">Forgot password?</a></center>
				<div>
			   <br>Dont have an account?<a href="delpartner_signup.php">
				Sign up</a></div>
				<br>
				
			</div>	
			</form>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
         togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.setAttribute('title',"Hide..");
        this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>
</html>