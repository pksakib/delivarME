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
					$foodName=$_POST['foodName'];
					$price=$_POST['price'];
					$details=$_POST['details'];
					
					$resId=$_POST['resSelect'];
					
					
					$name = $_FILES['pic']['name'];
					$target_dir = "upload/";
					$target_file = $target_dir . basename($_FILES["pic"]["name"]);

					 // Select file type
					$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

					 // Valid file extensions
					$extensions_arr = array("jpg","jpeg","png","gif");

					if(in_array($imageFileType,$extensions_arr ))
					{
					$sqlAddFOOD= "INSERT INTO `food`(`product_name`, `product_price`, `details`, `restaurant_id`,`image_link`) VALUES ('".$foodName."','".$price."','".$details."','".$resId."','".$name."')";
					if(!empty($resId)){
						if(!empty($foodName) &&  !empty($details) )
						{
							 
							if (mysqli_query($con, $sqlAddFOOD)) 
							{
								move_uploaded_file($_FILES['pic']['tmp_name'],$target_dir.$name);
								echo '<script language="javascript">';
								echo 'alert("Submitted")';
								echo '</script>';
							}
							else {
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
					}
					else
					{
						echo '<script language="javascript">';
						echo 'alert("Please Select Restaurant Name")';
						echo '</script>';
					}
					mysqli_close($con);

				 }	
				}
				
					
				
				if (isset($_REQUEST['Back']))
				
				{
					echo "<script>location.href='AddFood2.php';</script>";
					//session_unset(); 
					//session_destroy();
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
				<form method="post" target="#" enctype="multipart/form-data">
				
					<div class="row">
					
					<div class="col-lg-4"></div>
					
					<div class="col-md-4 center-block ">
					
							<P>Restaurant Name: 
							
								<select class="form-control" id="" name="resSelect">
									<?php
	
												session_start();
	
												$AreaID= $_SESSION['AreaSelect'];
												
												$host = 'localhost';
												$username= 'root';
												$pass = '';
												$db = 'deliverme';
												
												$con=new mysqli($host, $username, $pass, $db) or die("not connected");
												
												$sqlAreaName = "SELECT * FROM restaurant WHERE area_id= '".$AreaID."'  ";
												
												//$sqlAreaId = "SELECT restaurant_id FROM restaurant WHERE area_id= '".$AreaID."'  ";
												
												
												$result=mysqli_query($con, $sqlAreaName); 
												//$result2=mysqli_query($con, $sqlAreaId); 
												while (($row = mysqli_fetch_array($result))){ //&& ($row2 = mysqli_fetch_array($result2))) {
												echo "<option value='" . $row['restaurant_id'] ."'>" . $row['restaurant_name'] ."</option>";
												
									}
									//echo "</select>";
									
									
										mysqli_close($con);
									
									?>
									
								</select>
							
							</P>
						
						
						
							<P>Food Name: <input class="form-control" type="text" value="" placeholder="Food Name" name="foodName"> </P>
						
							<P>Price: <input class="form-control" type="text" value="" placeholder="Price" name="price"> </P>
						
							<P>Picture: <input type="file" name="pic" > </P>
						
							<P>Details: <textarea rows="4" cols="30" class="form-control" type="text" value="" placeholder="Details" name="details"></textarea> </P>
							
						
							<p align="center"><button  type="Submit" class="btn btn-primary" value="Submit" name="Submit" >Add</button>
							<p align="center"><button class="btn btn-primary" name="Back" href="AddFood2.php">Back</button>
						
						
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