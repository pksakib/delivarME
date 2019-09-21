<?php
 session_start();
?>
<?php
	$host = 'localhost';
	$username= 'root';
	$pass = '';
	$db = 'deliverme';
	
	$con=new mysqli($host, $username, $pass, $db) or die("not connected");
	
	if(isset($_POST["Login"])){

		$email = $_POST["email"];
		$password = $_POST["password"];

		if(!empty($email) && !empty($password)){
				$sql = "SELECT password FROM `admin` WHERE email LIKE \"$email\"";
				
				$result = $con->query($sql) or die($con->error);
				while($row = $result->fetch_assoc()){
					if($row["password"] == $password){
						$_SESSION["email"]=$_POST["email"];
						
						echo "<script>location.href='adminFront.php';</script>";
						$_SESSION["loggedin"]=true;
					}else{
						echo "<h3>email/Password Wrong<h3>";
						echo "<script>location.href='adminLogin.php';</script>";
					}
				}
			}else{
				echo "All field must be filled up";
			}
		$con->close();
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
							<h2><P align="center" >ADMIN PANEL LOGIN</p></h2>
						</div>
					</div>
			<!-- admin login -->
				<form method="post" action="adminLogin.php">
					<div class="row">
					<div class="col-lg-4"></div>
					<div class="col-md-4 center-block ">
						
						<p>
							Email: <input class="form-control" type="text" value="" placeholder="Email" name="email"> 
							
						</p>
						<p>
							Password: <input class="form-control" type="password" value="" placeholder="Password" name="password">
						</p>
					
						
						<p align="center"><input type="Submit" class="btn btn-primary" value="Login" name="Login">
						
						
					</div>
					
					
				</form>
				<!-- login form end -->
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