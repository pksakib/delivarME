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
					
					
					$areaId=$_POST['areaSelect'];
					
					
					$sql = mysqli_query($con,"DELETE FROM area WHERE area_id ='$areaId'");
					
					

						
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
	<script type="text/javascript">
		$(document).ready(function(){
			$('#city').on('change',function(){
				var cityID = $(this).val();
				if(cityID){
					$.ajax({
						type:'POST',
						url:'SelectCityAjax.php',
						data:'city_id='+cityID,
						success:function(html){
							$('#area').html(html);
							
						}
					}); 
				}else{
					$('#area').html('<option value="">Select City first</option>');
					
				}
			});
			
			
		});
	</script>
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
					<div class="">
						<div class="adminText">
							<h2><P align="center" >ADMIN PANEL</p></h2>
						</div>
					</div>
					<h2><P align="center" >DELETE AREA</p></h2>
			<!-- admin form start -->
				<form method="post" target="deleteArea.php">
					<p align="center">
						
						<!-- CITY & AREA SELECT-->
							
								
									
									  
										  
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
											<select class ="form-control" name="citySelect" id="city" style="width:200px">
											<option value="">Select City</option>
											<?php
											if($rowCount > 0){
												while($row = $query->fetch_assoc()){ 
													echo '<option value="'.$row['city_id'].'">'.$row['city_name'].'</option>';
												}
											}else{
												echo '<option value="">City not available</option>';
											}
											?>
										</select>

							


						
						 <br>
							
							<select class="form-control" name="areaSelect" id="area" style="width:200px">
												<option value="" disabled selected>Select city first</option>
											</select>
							
									
												
							
							<!-- CITY & AREA SELCET END-->
		
							<p align="center"><button  type="Submit" class="btn btn-primary" value="Submit" name="Submit" >Delete</button></p>
							<br><p align ="center"><a class="btn btn-primary" name="adminFront" href="addCityandArea.php">Back</a></p>
							
						</p>
					
				</form>
				<!-- admin form end -->
			
			
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