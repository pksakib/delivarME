<!DOCTYPE html>
<?php
	include("session.php");
?>
<?php
				
				if (isset($_REQUEST['addCity']))
				{
					echo "<script>location.href='addCity.php.php';</script>";
					session_unset(); 
					session_destroy();
				}
				if (isset($_REQUEST['addArea']))
				{
					echo "<script>location.href='addArea.php';</script>";
					session_unset(); 
					session_destroy();
				}
				if (isset($_REQUEST['include("session.php");']))
				{
					echo "<script>location.href='adminFront.php';</script>";
					session_unset(); 
					session_destroy();
				}
	
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Web Development</title>
		<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" name="viewport"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/animate.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		
		<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
	</head>
	<body>
		<section class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="logo">
						<!-- Logo/Title -->
							<a href="index.php"><img src="images/logo.png"> </img></a>
						</div>
					</div>
					<div class="col-md-2">
						<div class="sign-up">
						<!-- Sign up button -->
							
							<a class="btn btn-primary btn-sm" href="Logout.php">Log Out</a>
							<a class="btn btn-primary btn-sm" href="home.php">Home</a>
						</div>
					</div>
				</div>
			</div>
		</section>
		
		<section class="main">
			<div class="container adminPanel">
					<div class="col-md-20">
						<div class="adminText">
							<h2><P align="center" >ADMIN PANEL</p></h2>
						</div>
					</div>
			<!-- admin form start -->
				<form method="post" target="#">
					<div class="">
						<p align="center">
							<a class="btn btn-primary" name="addCity" href="addCity.php">Add City</a>
							<br><br><a class="btn btn-primary" name="addArea" href="addArea.php">Add Area</a>
							<br><br><a class="btn btn-primary" name="viewCity" href="deleteCity.php">Delete & Edit City</a>
							<br><br><a class="btn btn-primary" name="viewArea" href="deleteArea.php">Delete & Edit Area</a>
							<br><br><a class="btn btn-primary" name="adminFront" href="adminFront.php">Back</a>
						</p>
					</div>
				</form>
				<!-- admin form end -->
			</div>
			
		</section>
		
		<section class="footer">
			<div class="container">
				<div class="col-md-12">
					<!--<p>&copy 2018 All rights reserved</p> -->
				</div>
			</div>
		</section>
		
		<script type="text/javascript"  src="js/bootstrap.min.js"></script>
		<script type="text/javascript"  src="js/wow.min.js"></script>
		<script type="text/javascript"  src="js/script.js"></script>
		
		<script type="text/javascript">
			new WOW().init();
		</script>
	</body>
</html>