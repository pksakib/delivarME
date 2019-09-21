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
					$cityId=$_POST['citySelect'];
					
					if(!empty($cityId)){
					
					
					$sql = mysqli_query($con,"DELETE FROM city WHERE city_id ='$cityId'");
					}

						
				}
			

			
		
			if (isset($_REQUEST['Edit']))
				
				{
					//session_start();
					$_SESSION['citySelect']= $_POST['citySelect'];
					if(!empty($_SESSION['citySelect']) ){
					
					
					echo "<script>location.href='editCity.php';</script>";
					
					
					}
					
					/*$sql2= "INSERT INTO `area` (`area_name`) VALUES ('".$a_name."')";*/
					
					

					
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
						<div class="" style="" >
		<h3 align="center">DELETE CITY</h3>
		
			<div class="" >
			 
			 <p align="center">
			 
		
      
									<?php 
											$host = 'localhost';
											$username= 'root';
											$pass = '';
											$db = 'deliverme';
																							
											$con=new mysqli($host, $username, $pass, $db) or die("not connected");

											//Fetch all the country data
											$query = $con->query("SELECT * FROM city ORDER BY city_name ASC");

											//Count total number of rows
											$rowCount = $query->num_rows;
											?>
											<select class ="form-control" name="citySelect" id="city" STYLE="width: 200px">
											<option value="">Select City</option>
											<?php
											if($rowCount > 0){
												while($row = $query->fetch_assoc()){ 
													echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
												}
											}else{
												echo '<option value="">City not available</option>';
											}
											mysqli_close($con);
											?>
										</select>
	




					
				
			
			 </p>
			 
			</div>
		
		</div>
							<p align="center"><button  type="Submit" class="btn btn-primary" value="Submit" name="Submit" >Delete</button>
							<p align="center"><button  type="Submit" class="btn btn-primary" value="Edit" name="Edit" >Edit</button>
							<br><br><p align ="center"><a class="btn btn-primary" name="include("session.php");" href="addCityandArea.php">Back</a></p>
							
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