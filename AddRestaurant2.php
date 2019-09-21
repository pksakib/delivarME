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
					$resName=$_POST['restaurantName'];
					$resAddress=$_POST['restaurantAddress'];
					$resPhone=$_POST['restaurantContact'];
					$resWebsite=$_POST['restaurantWebsite'];
					$resAreaId=$_POST['AreaSelect'];
					
					
					
					
					
					$sqlAddRestaurant= "INSERT INTO `restaurant`(`restaurant_name`, `address`, `phone`, `website`, `area_id`) VALUES ('".$resName."','".$resAddress."','".$resPhone."','".$resWebsite."','".$resAreaId."')";
					
					if(!empty($resName) && !empty($resAddress) && !empty($resPhone) && !empty($resAreaId) )
					{
						if (mysqli_query($con, $sqlAddRestaurant)) {
							echo '<script language="javascript">';
							echo 'alert("Submitted")';
							echo '</script>';
							
						} else {
							echo '<script language="javascript">';
							echo 'alert("TRY AGAIN ")';
							echo '</script>';
						}
					
					}
					else
					{
						echo '<script language="javascript">';
						echo 'alert("Please Fill All Field")';
						echo '</script>';
					}
					
					mysqli_close($con);

					
				}
				if (isset($_REQUEST['Back']))
				{
					echo "<script>location.href='AddRestaurant1.php';</script>";
					session_unset(); 
					session_destroy();
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
				<form method="post" target="#" >
				
					<div class="row">
					
					<div class="col-lg-4"></div>
					
					<div class="col-md-4 center-block ">
					
							<P>Area Name: 
							
								<select class="form-control" id="" name="AreaSelect">
									<?php
	
												session_start();
	
												$CityID= $_SESSION['cityselect'];
												
												$host = 'localhost';
												$username= 'root';
												$pass = '';
												$db = 'deliverme';
												
												$con=new mysqli($host, $username, $pass, $db) or die("not connected");
												
												$sqlAreaName = "SELECT * FROM area WHERE city_id= '".$CityID."'  ";
												
												//$sqlAreaId = "SELECT area_id FROM area WHERE city_id= '".$CityID."'  ";
												
												
												$result=mysqli_query($con, $sqlAreaName); 
												//$result2=mysqli_query($con, $sqlAreaId); 
												while (($row = mysqli_fetch_array($result))){// && ($row2 = mysqli_fetch_array($result2))) {
												echo "<option value='" . $row['area_id'] ."'>" . $row['area_name'] ."</option>";
												
									}
									echo "</select>";
									
									
										mysqli_close($con);
									
									?>
									
								</select>
							
							</P>
						
						
						
							<P>Restaurant Name: <input class="form-control" type="text" value="" placeholder="Restaurant Name" name="restaurantName"> </P>
						
							<P>Address: <input class="form-control" type="text" value="" placeholder="Address" name="restaurantAddress"> </P>
						
							<P>Contact: <input class="form-control" type="text" value="" placeholder="Contact" name="restaurantContact"> </P>
						
							<P>Website: <input class="form-control" type="text" value="" placeholder="Website" name="restaurantWebsite"> </P>
							
						
							<p align="center"><button  type="Submit" class="btn btn-primary" value="Submit" name="Submit" >Add</button>
							<p align="center"><button class="btn btn-primary" name="Back" href="adminRestaurant.php">Back</button>
						
						
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