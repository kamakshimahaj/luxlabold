<!DOCTYPE php>
<html lang="en">
  <head>
    <title>HEAL and CARE Hospital</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">


    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <nav class="navbar py-4 navbar-expand-lg ftco_navbar navbar-light bg-light flex-row">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-3 px-md-0">
    			<div class="col-lg-2 pr-4 align-items-center">
		    		<a class="navbar-brand" href="index.php">Heal & <span>Care</span></a>
	    		</div>
	    		<div class="col-lg-10 d-none d-md-block">
		    		<div class="row d-flex">
			    		<div class="col-md-4 pr-2 d-flex topper align-items-center">
			    			<div class="icon bg-white mr-1 d-flex justify-content-center align-items-center"><span class="icon-map"></span></div>
						    <span class="text">Address: Varindavan Gardens, Amritsar, 143001</span>
					    </div>
					    <div class="col-md-4 pr-2 d-flex topper align-items-center">
					    	<div class="icon bg-white mr-1 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">Email: admin@healandcare.in</span>

					    </div>


					    <div class="col-md-4 pr-2  topper align-items-center">
					    	<?php

					    	if(isset($_GET['log']))
					    	{
					    		unset($_SESSION['pid']);
					    		session_destroy();
					    	}

					    	if(isset($_SESSION['pid']))
					    	{

					    		echo '   <p class="text">Welcome : '.$_SESSION['pname'].'</p>
						    <p class="text"><a href="patient_change_password.php" >Change Password </a> || <a href="index.php?log=out"> Sign Out</a></p>';
					    	}
					    	else
					    	{
					    		echo '   <p class="text">Welcome : Patient</p>
						    <p class="text"><a href="Patient_Register.php" >Sign Up</a> || <a href="patient_login.php"> Sign In</a></p>';
						  }




						    ?>
					    </div>


				    </div>
			    </div>
		    </div>
		  </div>
    </nav>
	  <nav class="navbar navbar-expand-lg navbar-dark bg-primary ftco-navbar-dark" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <p class="button-custom order-lg-last mb-0"><a href="doctor_login.php" class="btn btn-success py-2 px-3">Doctor Login</a></p>
	      <p class="button-custom order-lg-last mb-0"><a href="appointment.php" class="btn btn-secondary py-2 px-3">Make An Appointment</a></p>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav mr-auto">
	        	<li class="nav-item active"><a href="index.php" class="nav-link pl-0">Home</a></li>
	        	<li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
	        	<li class="nav-item"><a href="doctor.php" class="nav-link">Doctor</a></li>
	        	<li class="nav-item"><a href="department.php" class="nav-link">Departments</a></li>
	        	<?php
	        	if(isset($_SESSION['pid']))
					    	{
	       echo' 	<li class="nav-item"><a href="patient_report.php" class="nav-link">Patient Report</a></li>';
	       	}
	        	?>
	        	<li class="nav-item"><a href="schedule.php" class="nav-link">Doctor Schedule</a></li>
	          <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->