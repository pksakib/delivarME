<!DOCTYPE html>
<?php
	include("session.php");
?>
<?php

	$host = 'localhost';
	$username= 'root';
	$pass = '';
	$db = 'deliverme';
	
	$con=new mysqli($host, $username, $pass, $db) or die("not connected");
			
		
			if (isset($_REQUEST['Submit']))
				
				{
					session_start();
					
					$_SESSION['cityselect']= $_POST['cityselect'];
					
					echo "<script>location.href='AddRestaurant2.php';</script>";
					
					
					
					
					/*$sql2= "INSERT INTO `area` (`area_name`) VALUES ('".$a_name."')";*/
					
					mysqli_close($con);

					
				}
	
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>DeliverME</title>
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
			<!-- add restaurant -->
				<form method="post"  >
				
					<div class="row">
					
					<div class="col-lg-4"></div>
					
					<div class="col-md-4 center-block ">
					
							<P>City Name: 
							
								
							
								<select class="form-control" id="cityselect" onchange="" name="cityselect">
									<?php

												$host = 'localhost';
												$username= 'root';
												$pass = '';
												$db = 'deliverme';
												
												$con=new mysqli($host, $username, $pass, $db) or die("not connected");
												
												$sqlcityname = "SELECT * FROM city";
												//$sqlcityid = "SELECT city_id FROM city";
												
												$result=mysqli_query($con, $sqlcityname); 
												//$result2=mysqli_query($con, $sqlcityid); 
												while (($row = mysqli_fetch_array($result))){ //&& ($row2 = mysqli_fetch_array($result2))) {
												echo "<option value='" . $row['city_id'] ."'>" . $row['city_name'] ."</option>";
												
												
									}
									
									echo "</select>";
									
									
										mysqli_close($con);
									
									?>
									
								</select>
							
							</P>
							
						
							<p align="center"><button  type="Submit" class="btn btn-primary"  name="Submit" >Next</button></p>
							
							
							<p align="center"><a class="btn btn-primary" name="back" href="adminRestaurant.php">Back</a></p>
						
						
					</div>
					
					
				</form>
				<!-- Search form end -->
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