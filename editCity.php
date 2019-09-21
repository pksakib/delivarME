<!DOCTYPE html>
<?php
error_reporting(0);
	include("session.php");
?>
<?php

	$host = 'localhost';
	$username= 'root';
	$pass = '';
	$db = 'deliverme';
	
	$con=new mysqli($host, $username, $pass, $db) or die("not connected");
			
		
			if (isset($_REQUEST['Edit']))
				
				{
					$cityID= $_SESSION['citySelect'];
					$cityName=$_POST['cityName'];
					$sql= "UPDATE city SET  city_name='".$cityName."' WHERE `city_id` = '".$cityID."'";
					
					$result=mysqli_query($con, $sql);

					
				}
			if (isset($_REQUEST['Back']))
				
				{
					unset($_SESSION['citySelect']);
					echo "<script>location.href='deleteCity.php';</script>";

					
				}
				mysqli_close($con);
	
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>DeliverMe</title>
		<meta content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0" name="viewport"/>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/animate.min.css"/>
		<link rel="stylesheet" type="text/css" href="css/animate.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-1.10.1.min.js"></script>
		
		<script type="text/javascript" src="js/myjs.js"> </script>
	</head>
	<body>
		<section class="header">
			<div class="container">
				<div class="row">
					<div class="col-md-10">
						<div class="logo">
						<!-- Logo/Title -->
							<a href="index.php">DeliverMe</a>
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
				<form method="post" target="#" enctype="multipart/form-data">
				
					<div class="row">
					
					<div class="col-lg-4"></div>
					
					<div class="col-md-4 center-block ">
					
							<P>City Name: 
							
								
									<?php
	
												//session_start();
	
												$cityID= $_SESSION['citySelect'];
												
												$host = 'localhost';
												$username= 'root';
												$pass = '';
												$db = 'deliverme';
												
												$con=new mysqli($host, $username, $pass, $db) or die("not connected");
												
												$sqlCityName = "SELECT * FROM city WHERE city_id= '".$cityID."'  ";
												
												
												
												
												$result=mysqli_query($con, $sqlCityName); 
												//$result2=mysqli_query($con, $sqlAreaId); 
												while (($row = mysqli_fetch_array($result))){ //&& ($row2 = mysqli_fetch_array($result2))) {
												echo "" . $row['city_name'] ."";
												
									}
									//echo "</select>";
									
									
										mysqli_close($con);
									
									?>
									
								
							
							</P>
						
						
						
							<P>City Name: <input class="form-control" type="text" value="" placeholder="City Name" name="cityName"> </P>
						
							
						
							<p align="center"><button  type="Submit" class="btn btn-primary" value="Submit" name="Edit" >Edit</button>
							<p align="center"><button  type="Submit" class="btn btn-primary" value="Submit" name="Back" >Back</button>
						
						
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