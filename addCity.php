<!DOCTYPE html>
<?php
// Turn off all error reporting
error_reporting(0);
?>
<?php
	include("session.php");
?>
<?php
				if (isset($_REQUEST['submit']))
				{
					
					$c_name= $_POST['city_name'];
					
					$con = mysqli_connect('localhost', 'root' , '', 'deliverme');
				
					if(mysqli_connect_errno())
						echo "connection_failed";
					else
						//echo "connection_successful";
					
					echo '</br>';
					
					$sql=  "INSERT INTO `city` (`city_name`) VALUES ('".$c_name."')";
					
					if(!empty($c_name))
					{
						if (mysqli_query($con, $sql)) {
							echo '<script language="javascript">';
							echo 'alert("Submitted")';
							echo '</script>';
						} else {
							$jmsg="The ".$c_name." is already stored";
							echo '<script language="javascript">';
							
							echo 'alert("'.$jmsg.'");';
							echo '</script>';
						}
					
					}
					else
					{
						echo '<script language="javascript">';
						echo 'alert("Please Fill The Field")';
						echo '</script>';
					}
					mysqli_close($con);

					
				}
				if (isset($_REQUEST['Back']))
				{
					echo "<script>location.href='addCityandArea.php';</script>";
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
							<h4><P align="center" >Add City</p></h4>
						</div>
					</div>
			<!-- add restaurant -->
				<form method="post" target="#" >
				
					<div class="row">
					
					<div class="col-lg-4"></div>
					
					<div class="col-md-4 center-block ">
					
						
							<P>City Name: <input class="form-control" type="text" name="city_name"  placeholder="City Name"> </P>
						
							<!--<P>Area Name: <input class="form-control" type="text" name="area_name" placeholder="Area Name"> </P> -->
									
							<p align="center"><button  type="Submit" name="submit" class="btn btn-primary" value="Submit" >Add</button>
							<p align="center"><a class="btn btn-primary" name="Back" href="addCityandArea.php">Back</a>
						
						
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