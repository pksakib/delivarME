<!DOCTYPE html>
<?php
error_reporting(0);
session_start();
include("databaseconnect.php");
?>
<?php

	
			if (isset($_POST['logout']))
			{
				session_unset();
				session_destroy();
				echo '<script language="javascript">';
				echo 'alert("LOG OUT SUCCESSFULLY")';
				echo '</script>';
				//session_destroy();
				echo "<script>location.href='index.php';</script>";
			}
			if (isset($_POST['back']))
			{
				
			
				//session_destroy();
				echo "<script>location.href='index.php';</script>";
			}
			if (isset($_POST['edit']))
			{
				
			
				//session_destroy();
				echo "<script>location.href='edit_profile.php';</script>";
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
		
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
		<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
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
					<form method="post">
						<div class="sign-up">
						<!-- Sign up button -->
							
							<button class="btn btn-primary btn-sm" name="logout" type="submit">Log Out</button>
						
						</div>
					</form>
					</div>
				</div>
			</div>
		</section>
		
		<section class="main">
			<div class="container adminPanel">
					
			<!-- add restaurant -->
				<form method="post" target="#" >
				
					<div class="row">
					
					<div class="col-lg-4">
					</div>
					
					<div class="col-md-4 center-block ">
							<p align="center">
							<h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Your Profile</h3>
									<!--Use a while loop to make a table row for every DB row-->
									<?php
										include("databaseconnect.php");
										// Check connection
										if (mysqli_connect_errno())
										{
											echo "Failed to connect to MySQL: " . mysqli_connect_error();
										}
										
										
											$result = mysqli_query($mysqli_conn,"SELECT * FROM `user` WHERE email = '".$_SESSION['login']."'");
										
											

											while($row = mysqli_fetch_array($result))
											{
												$image_path = "userphoto/";
																			
												$images=$image_path.$row['image_link'];
												
												echo "<h6>";
												echo '<p align="center"><img class = "img-responsive"  src="' . $images. '" height="160px"> </p>';
												echo "<br>";
												echo "NAME:  " . $row['name'] . " <br>";
												echo "Username:  " . $row['username'] ."<br> ";
												echo "Password:  " . $row['password'] . "<br>";
												echo "Email:  " . $row['email'] . "<br>";
												echo "Email:  " . $row['phone_number'] . "<br>";
												echo "Address:  " . $row['address'] . "";
												echo "</h6>";
											}
											
											
										mysqli_close($mysqli_conn);
										
							?>
								
							<br>
						
							<p align="center"><button  type="Submit" class="btn btn-primary" value="Submit" name="edit" >Edit</button></p>
							<p align="center"><button class="btn btn-primary" name="back" type="submit">Back</button></p>
						</p>
						
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