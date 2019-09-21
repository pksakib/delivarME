<!DOCTYPE html>
<?php
	session_start();
	//$_SESSION['login'] = true;
	if(isset($_SESSION['login'])){
		header("Location:index2.php");
		exit(); 
}

?>

<?php

	$host = 'localhost';
	$username= 'root';
	$pass = '';
	$db = 'deliverme';
					
							
	
		$con=new mysqli($host, $username, $pass, $db) or die("not connected");
				if (isset($_POST['login']))
				{
					
						/*	$email= $_POST['email1'];
							$password= $_POST['password1'];
							//$username = stripslashes($username);
							//$password = stripslashes($password);
							//$username = mysql_real_escape_string($username);
							//$password = mysql_real_escape_string($password);
							$sql="SELECT * FROM user WHERE email='".$email."' and password='".$password."'";
							$result=mysqli_query($con,$sql);
									echo "<script>location.href='index2.php';</script>";
									echo '<script language="javascript">';
									echo 'alert("LOGIN COMPLETE")';
									
									echo '</script>';
							
							$count=mysqli_num_rows($con,$result);

							// If result matched $email and $password, table row must be 1 row
							if($count==1){
								session_start();
								$_SESSION['loggedin'] = true;
								$_SESSION['email'] = $email;
							}
						*/
						
						
						
						$email= $_POST['email'];
						$password= $_POST['password'];
						
						$sql="select email from user where email = '".$email."' && password = '".$password."'";
						$resultlogin=mysqli_query($con,$sql);
						$username_db='';
						while($arr=mysqli_fetch_array($resultlogin))
						{
							
							$username_db=$arr[0];	
							
							
							
						}
						if($username_db==$email)
						{
							$field = 'email';
							$sql2="select $field from user WHERE email = '".$email."' && password = '".$password."'";
							$email_id = mysqli_query($con,$sql2);
							$_SESSION["emailid"] = mysqli_fetch_object($email_id)->$field;
							

							//$_SESSION["u_id"];
							
							$_SESSION['login'] = $email;
							
							echo '<script language="javascript">';
							echo 'alert("Login Success")';
							echo '</script>';
							echo "<script>location.href='index2.php';</script>";
							
							
						}
						else
						{
							echo '<script language="javascript">';
							echo 'alert("Username and Password Does not match!")';
							echo '</script>';
							
						} 
							/*
							//$username = stripslashes($username);
							//$password = stripslashes($password);
							//$username = mysql_real_escape_string($username);
							//$password = mysql_real_escape_string($password);
							$sql="SELECT * FROM user WHERE email='$email' and password='$password'";
							$result=mysqli_query($con,$sql);
							
									echo '<script language="javascript">';
									echo 'alert("LOGIN COMPLETE")';
									
									echo '</script>';
							
							$count=mysqli_num_rows($con,$result);

							// If result matched $email and $password, table row must be 1 row
							if($count==1){
								session_start();
								$_SESSION['loggedin'] = true;
								$_SESSION['email'] = $email;
							} */
					
				}
			
			
		
				if (isset($_POST['product_code']))
				
				{
					if (isset($_SESSION['login']) && $_SESSION['login'] == true) 
					{
						echo '<script language="javascript">';
						echo 'alert("wellcome")';
						
						echo '</script>';
						//echo "Welcome to the member's area, " . $_SESSION['email'] . "";
					} else {
						echo '<script language="javascript">';
						echo 'alert("Login First")';
						echo '</script>';
					}
					
						/*
						$_SESSION['user'] = $user_id;
						//$sqlAddUser= "INSERT INTO `user`(`name`, `username`, `password`, `address` ,`email`,`phone_number`) VALUES ('".$name."','".$uname."','".$pass."','".$address."','".$email."','".$mobile."')";
						if (isset($_SESSION['user'])) 
						{
							echo '<script language="javascript">';
							echo 'alert("Login First")';
							echo '</script>';
						   
						} 
						else 
						{
							echo '<script language="javascript">';
							echo 'alert("Login First")';
							echo '</script>';
						} */
					
					
				}
				
				if (isset($_POST['register']))
				
				{
					$name=$_POST['name'];
					$uname=$_POST['uname'];
					$email=$_POST['email'];
					$mobile=$_POST['mobile'];
					
					$pass=$_POST['password'];
					$address=$_POST['address'];
					
					
					
					
					
					$sqlAddUser= "INSERT INTO `user`(`name`, `username`, `password`, `address` ,`email`,`phone_number`) VALUES ('".$name."','".$uname."','".$pass."','".$address."','".$email."','".$mobile."')";
					
						if(!empty($name) &&  !empty($uname) && !empty($pass) &&  !empty($email) &&  !empty($mobile) &&  !empty($address) )
						{
							if (mysqli_query($con, $sqlAddUser)) {
								echo '<script language="javascript">';
								echo 'alert("Registration Successful")';
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
	<!-- restaurant selection ajax -->
	<script type="text/javascript">
		$(document).ready(function(){
			$('#cityforRest').on('change',function(){
				var cityID = $(this).val();
				if(cityID){
					$.ajax({
						type:'POST',
						url:'SelectCityAjaxForRest.php',
						data:'city_id='+cityID,
						success:function(html){
							$('#areaforrest').html(html);
							
						}
					}); 
				}else{
					$('#areaforrest').html('<option value="">Select City firsas</option>');
					
				}
			});
			
			
		});
	</script>
	
	
	
	<body >
		<section class="header ">
			<!--<header class="d-flex justify-content-center flex-column " style="background-image: url(images/10.jpg);  max-height: 400px;   min-height: 100px; max-width:10000px; min-width:500px;"> -->
			<div class="container ">
				<div class="row ">
					<div class="col-md-10">
						<div class="logo">
						<!-- Logo/Title -->
						<a href="index.php"><img src="images/logo.png"> </img></a>
							
						</div>
					</div>
					<div class="col-md-2">
						<div class="sign-up">
						<!-- Sign up button 
							<a class="btn btn-primary" href="sign-up.html">Sign Up</a>
							<a class="btn btn-primary" href="sign-up.html">Log In</a>
						</div> -->
						
						<button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Login Signup</button>
							<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
								aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											
											<h4 class="modal-title" id="myModalLabel">
												 &nbsp; &nbsp; &nbsp;DeliverMe <br>Login/Registration </h4>
										</div>
										<div class="modal-body">
											<div class="row">
												<div class="col-md-8" style="border-right: 1px dotted #C2C2C2;padding-right: 30px;">
													<!-- Nav tabs -->
													<ul class="nav nav-tabs">
														<li class="active"><a href="#Login" data-toggle="tab">Login</a></li>
														<li> &nbsp; &nbsp;<a href="#Registration" data-toggle="tab">Registration</a></li>
													</ul>
													<!-- Tab panes -->
													<div class="tab-content">
														<div class="tab-pane active" id="Login">
															<form method="post" role="form" class="form-horizontal">
															
															
															<div class="form-group">
																<label for="email" class="col-sm-2 control-label">
																	Email</label>
																<div class="col-sm-10">
																	<input type="email" class="form-control" id="email" name="email" placeholder="Email" />
																</div>
															</div>
															
															
															<div class="form-group">
																<label for="password" class="col-sm-2 control-label">
																	Password</label>
																<div class="col-sm-10">
																	<input type="password" class="form-control" id="password" name="password" placeholder="Password" />
																</div>
															</div>
															<div class="row">
																<div class="col-sm-2">
																</div>
																<div class="col-sm-10">
																	<button  type="Submit" class="btn btn-primary" value="Submit" name="login" >Login</button>
																	<button type="button" class="btn btn-default" class="close" data-dismiss="modal">Cancel</button>
																</div>
															</div>
															</form>
														</div>
														<div class="tab-pane" id="Registration">
															<form method="post" role="form" class="form-horizontal">
															<div class="form-group">
																<label for="username" class="col-sm-2 control-label">
																	Username</label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" id="uname" name="uname" placeholder="Username" />
																</div>
															</div>
															<div class="form-group">
																<label for="name" class="col-sm-2 control-label">
																	Name</label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" id="name" name="name" placeholder="Name" />
																</div>
															</div>
															<div class="form-group">
																<label for="email" class="col-sm-2 control-label">
																	Email</label>
																<div class="col-sm-10">
																	<input type="email" class="form-control" id="email1" name="email" placeholder="Email" />
																</div>
															</div>
															<div class="form-group">
																<label for="mobile" class="col-sm-2 control-label">
																	Mobile</label>
																<div class="col-sm-10">
																	<input type="tel" class="form-control" id="mobile" name="mobile" placeholder="Mobile" />
																</div>
															</div>
															<div class="form-group">
																<label for="address" class="col-sm-2 control-label">
																	Address</label>
																<div class="col-sm-10">
																	<input type="text" class="form-control" id="address" name="address" placeholder="Address" />
																</div>
															</div>
															<div class="form-group">
																<label for="password" class="col-sm-2 control-label">
																	Password</label>
																<div class="col-sm-10">
																	<input type="password" class="form-control" id="password1" name="password" placeholder="Password" />
																</div>
															</div>
															<div class="row">
																<div class="col-sm-2">
																</div>
																<div class="col-sm-10">
																	<button  type="Submit" class="btn btn-primary" value="Submit" name="register" >Resgister</button>
																	<button type="button" class="btn btn-default" class="close" data-dismiss="modal">Cancel</button>
																</div>
															</div>
															</form>
														</div>
													</div>
													<!--
													<div id="OR" class="hidden-xs">
														OR</div>
												</div>
												 <div class="col-md-4">
													<div class="row text-center sign-with">
														<div class="col-md-12">
															<h3>
																Sign in with</h3>
														</div>
														<div class="col-md-12">
															<div class="btn-group btn-group-justified">
																<a href="#" class="btn btn-primary">Facebook</a> <a href="#" class="btn btn-danger">
																	Google</a>
															</div>
														</div>
													</div>
												</div> -->
											</div>
										</div>
									</div>
								</div>
							</div>


						
							
						</div>
					</div>	
					
				</div>
			</div>
			 <!--</header> --> 
			
		</section>
		
		<section class="main">
			
			<div class="container search d-flex justify-content-center flex-column " style="background-image: url(images/back1.jpg);  max-height: 400px;   min-height: 320px; max-width:10000px; min-width:200px;">
			
			<!-- Search form start -->
			 
			
				<form method="post" target="index.php"> 
					<p>Type Restaurant name or Food Name to search foods. </p>
					<div class="row ">
					
						<div class="col-md-3 form-group wow swing" data-wow-duration="2s" data-wow-delay="">
							<input class="form-control" type="text" name="searchbar" value="" placeholder="Search Food or Restaurant">
						</div>
						<div class="col-md-3 form-group wow swing" data-wow-duration="2s" data-wow-delay="">
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
											<select class ="form-control" name="citySelect" id="city">
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

							


						</div>					
							<div class=" col-md-2 form-group wow swing" data-wow-duration="2s" data-wow-delay=""> 
							<select class="form-control" name="areaSelect" id="area">
												<option value="" disabled selected>Select city first</option>
											</select>
							</div>
									
												
							
							<!-- CITY & AREA SELCET END-->
						
						
						<div class="col-md-2 form-group">
							<select class="form-control wow swing" data-wow-duration="2s" data-wow-delay="" name="ResOrFood" id="">
								<option value="Restaurant">Restaurant</option>
								<option value="Food">Food</option>
								
							</select>
						</div>
						<div class="col-md-2 form-group">
							<button type="Submit" class="btn btn-primary" value="Submit" Name="Search" onclick="switchVisible()" ><i class="fa fa-search"></i></button>
						</div>
					</div>
				</form>
				<!-- Search form end -->
			
			</div>
			
			<div class="container">
				<div class="row">
				
				<!-- Right sidebar start -->
					<div class="col-md-3">
					
					<!-- Restaurent list -->
					<form method="post">
						<div class="">
						
							<div class="rest-list-inner">
								<h4>ALL FOOD</h4>
								
								<div id="">
									<div class=" form-group wow swing" data-wow-duration="2s" data-wow-delay="">
											<!-- CITY & RESTAURANT SELECT-->
								
									
										
										  
											  
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
												<select class ="form-control" name="citySelectAllFood" id="">
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

							


									</div>					
									
									<div class="arr">
										<p align="center"><button type="Submit" class="btn btn-primary" value="Submit" Name="allfoodbutton" id="thing1" onclick="localStorage.setItem('thing1', '0')" >GO</button></p>
									</div>
										
								</div>
							</div>
						</div>
						<!--  restaurant select only-->
						<div class="rest-list">
							<div class="rest-list-inner">
								<h2>Restaurents</h2>
								
								<div id="">
									<div class=" form-group wow swing" data-wow-duration="2s" data-wow-delay="">
											<!-- CITY & RESTAURANT SELECT-->
								
									
										
										  
											  
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
												<select class ="form-control" name="citySelect" id="cityforRest">
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

							


									</div>					
									<div class="  form-group wow swing" data-wow-duration="2s" data-wow-delay=""> 
										<select class="form-control" name="RESSelect" id="areaforrest">
											<option value="" disabled selected>Select city first</option>
										</select>
									</div>
									<div class="arr">
										<p align="center"><button type="Submit" class="btn btn-primary" value="Submit" Name="SearchRESTAURANT" onclick="switchVisible()" >GO</button></p>
									</div>
										
								</div>
							</div>
						</div>
					</form>	
						
					<!-- Food list -->
						<div class="food-list">
							<!--<div class="food-list-inner">
								<h2>Food Items</h2>
									<div id="carousel-food" class="carousel slide" data-ride="carousel">
									 
									<div id="slides2">
											<a href="#">Mixed Salad</a>
											<a href="#">Biryani</a>
											<a href="#">Tandoori chicken</a>
											<a href="#">Fried Rice</a>
											<a href="#">Pakora</a>
										<div class="arr">
											<a class="left" href=""><i class="fa fa-arrow-left"></i></a>
											<a class="right" href=""><i class="fa fa-arrow-right"></i></a>
										</div>
										<div class="item">
											<a href="#">Fried Rice</a>
											<a href="#">Biryani</a>
											<a href="#">Tandoori chicken</a>
											<a href="#">Pakora</a>
											<a href="#">Mixed Salad</a>
										</div>
										<div class="item">
											<a href="#">Pakora</a>
											<a href="#">Biryani</a>
											<a href="#">Tandoori chicken</a>
											<a href="#">Fried Rice</a>
											<a href="#">Mixed Salad</a>
										</div>
									</div>

									
									<a class="left carousel-control" href="#carousel-food" role="button" data-slide="prev">
										<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
										<span class="sr-only">Previous</span>
									</a>
									<a class="right carousel-control" href="#carousel-food" role="button" data-slide="next">
										<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
										<span class="sr-only">Next</span>
									</a>
								</div>
							</div> -->
						</div> 
					</div>
				<!-- Right sidebar end -->
				
	
					<div class="col-md-9 main-content ">
					<form method="post" role="" class="">
						<div name="allfoodshow" id="allfoodshow1" class="row " style ="" >
								
								
					
							

<?php
	
												
	
												
												
									$host = 'localhost';
									$username= 'root';
									$pass = '';
									$db = 'deliverme';
									
									$con=new mysqli($host, $username, $pass, $db) or die("not connected");			
									
									
									
									if (isset($_REQUEST['allfoodbutton']))
									{
										
										if(isset($_POST['citySelectAllFood'])) {

											
											//$Retaurant = 'Restaurant';
											//$Food = 'Food';
											//$searchbar = $_POST['searchbar'];
											$citySelect = $_POST['citySelectAllFood'];
											//$areaSelect = $_POST['areaSelect'];
											//$ResOrFood = $_POST['ResOrFood'];
											if(!empty($citySelect) ) // && !empty($areaSelect) &&  !empty($ResOrFood) )
											{
												
												//if($searchbar == 'allfood')
													
												//{
														
													$sqlAREA = "SELECT area_id FROM area WHERE (`city_id` = ".$citySelect." )  ";
											
											
													$result1=mysqli_query($con, $sqlAREA); 
												
													while($row1 = mysqli_fetch_array($result1))
													{
																
														$sqlRR = "SELECT restaurant_id FROM restaurant WHERE ( `area_id` = ".$row1['area_id'].")  ";
														
														$resultRR = mysqli_query($con, $sqlRR);
														
														while($row2 = mysqli_fetch_array($resultRR))
														{
														
																$sqlFOOD = "SELECT * FROM food WHERE (`restaurant_id` = ".$row2['restaurant_id'].") ";
															
															
																$result=mysqli_query($con, $sqlFOOD); 
															
																while($row = mysqli_fetch_array($result))
																{
																	$sqlRes = "SELECT restaurant_name FROM restaurant WHERE restaurant_id = ".$row['restaurant_id']." ";
																	$result2 = mysqli_query($con, $sqlRes); 
																	while($row2 = mysqli_fetch_array($result2))
																	{	
																		
																		
																		//$image_link = $row['image_link'];
																		$image_path = "upload/";
																		//echo "<img src='<?php echo $image_src;  ' 
																		//echo '<img src="/loop-images/".$info['photo'] .">;
																		//echo <img src=".$info['photo'] .">
																		$images=$image_path.$row['image_link'];
																		$product_code=$row['product_code'];
																		$details=$row['details'];
																		$restaurantName=$row2['restaurant_name'];
																		$product_price = $row['product_price'];
																		$name = $row['product_name'];
																		
																		echo "<div id='allfood1' class='col-md-4 wow bounceInUp' style=''>";
																		echo '<form method="post" class="form-item">';
																		echo "<br>";
																		
																		echo '<img class = "img-responsive" src="' . $images. '" height="160px"> ';
																		echo "<br>";
																		echo '' . $restaurantName. '';
																		echo "<br>";
																		echo '' . $name. '';
																		echo "<br>";
																		echo "product_price: " . $product_price. ' BDT';
																		echo "<br>";
																		echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
																		//echo "<p></p>";
																		//echo '<button  type="Submit" class="btn btn-primary" value="Submit" name="buy" >Add</button> ';
																		?>
																		
																	    <!--	<input class="btn btn-primary" type="submit" onclick="addtocart('<?php //echo $foodid; ?>')" value="Buy">
																		-->
																		<div>
																		Qty :
																		<select name="product_qty">
																		<option value="1">1</option>
																		<option value="2">2</option>
																		<option value="3">3</option>
																		<option value="4">4</option>
																		<option value="5">5</option>
																		</select>
																		</div>
																		<?php
																		
																		echo "<button name='product_code'  class='btn btn-primary' type='submit'>Add to Cart</button>";
																		echo "<br>";
																		echo "<br>";
																		echo '</form>';
																		echo "</div>";
																		
																	}
																	
																}
														}		
													}	
												//}
												

												
												
												
											}
										}
									}
					
					mysqli_close($con);
									
									
									
?>   
	</div>
	
	
	
	<div name="allfoodshow" id="allfoodshow" class="row" style="">
<?php
	
												
	
												
												
									$host = 'localhost';
									$username= 'root';
									$pass = '';
									$db = 'deliverme';
									
									$con=new mysqli($host, $username, $pass, $db) or die("not connected");								
									if (isset($_REQUEST['SearchRESTAURANT']))
									{
										$RESSelect = $_POST['RESSelect'];
										
										/* $sqlRES2 = "select * from restaurant WHERE restaurant_id = ".$RESSelect." ";
																	
																	
										$resultRR=mysqli_query($con, $sqlRES2);
										$resultRESname = mysqli_fetch_array($resultRR);
										$RESNAME=$resultRESname['restaurant_name'];
										echo '<p align="center">';
										echo "RSETAURANT NAME: " . $RESNAME. '';
										
										echo '</p>'; */
										
										
										$sqlFOOD2 = "select * from food WHERE restaurant_id = ".$RESSelect." ";
																	
																	
										$result2=mysqli_query($con, $sqlFOOD2); 
										
										while($row2 = mysqli_fetch_array($result2))
										{
											$sqlRes2 = "SELECT restaurant_name FROM restaurant WHERE restaurant_id = ".$RESSelect." ";
											$result3 = mysqli_query($con, $sqlRes2); 
											while($row3 = mysqli_fetch_array($result3))
											{
												//$image_link = $row['image_link'];
												$image_path = "upload/";
												//echo "<img src='<?php echo $image_src;  ' 
												//echo '<img src="/loop-images/".$info['photo'] .">;
												//echo <img src=".$info['photo'] .">
												$images=$image_path.$row2['image_link'];
												$product_code=$row2['product_code'];
												$details=$row2['details'];
												$restaurantName=$row3['restaurant_name'];
												$product_price = $row2['product_price'];
												$name = $row2['product_name'];
												
												echo "<div id='allfood' class='col-md-4 wow fadeInUp' data-wow-duration='2s' data-wow-delay=''>";
												echo '<form method="post" class="form-item">';
												echo "<br>";
												
												echo '<img class = "img-responsive" src="' . $images. '" height="160px"> ';
												echo "<br>";
												echo '' . $restaurantName. '';
												echo "<br>";
												echo '' . $name. '';
												echo "<br>";
												echo "product_price: " . $product_price. ' BDT';
												echo "<br>";
												echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
												//echo "<p></p>";
												//echo '<button  type="Submit" class="btn btn-primary" value="Submit" name="buy" >Add</button> ';
												?>
												
												<!--	<input class="btn btn-primary" type="submit" onclick="addtocart('<?php //echo $foodid; ?>')" value="Buy">
												-->
												<div>
												Qty :
												<select name="product_qty">
												<option value="1">1</option>
												<option value="2">2</option>
												<option value="3">3</option>
												<option value="4">4</option>
												<option value="5">5</option>
												</select>
												</div>
												<?php
												
												echo "<input name='product_code' type='hidden' value='$product_code'><button class='btn btn-primary' type='submit'>Add to Cart</button>";
												echo "<br>";
												echo "<br>";
												echo "</form>";
												echo "</div>";
											}
										}
									}
									if (isset($_REQUEST['Search']))
									{
										
										if(isset($_POST['searchbar']) && isset($_POST['areaSelect']) && isset($_POST['citySelect'])) {
											

											
											//$Retaurant = 'Restaurant';
											//$Food = 'Food';
											$searchbar = $_POST['searchbar'];
											$citySelect = $_POST['citySelect'];
											$areaSelect = $_POST['areaSelect'];
											$ResOrFood = $_POST['ResOrFood'];
											
											//echo '<script type="text/javascript">alert("'.$areaSelect.'" );</script>';
											if(!empty($searchbar) &&  !empty($areaSelect) && !empty($citySelect) ) // && !empty($areaSelect) &&  !empty($ResOrFood) )
											{
												
												
												if($ResOrFood == 'Restaurant')
												{
													
														$sqlResT = "SELECT restaurant_id FROM restaurant WHERE (`restaurant_name` LIKE '%".$searchbar."%'  and `area_id` = ".$areaSelect.")  ";
													
													
														$result1=mysqli_query($con, $sqlResT); 
												
														while($row1 = mysqli_fetch_array($result1))
														{
													
																	//WHERE (`restaurant_name` LIKE '%".$searchbar."%')
																	$sqlFOOD2 = "select * from food WHERE restaurant_id = ".$row1['restaurant_id']." ";
																	
																	
																	$result2=mysqli_query($con, $sqlFOOD2); 
																	
																	while($row2 = mysqli_fetch_array($result2))
																	{
																		$sqlRes2 = "SELECT restaurant_name FROM restaurant WHERE restaurant_id = ".$row1['restaurant_id']." ";
																		$result3 = mysqli_query($con, $sqlRes2); 
																		while($row3 = mysqli_fetch_array($result3))
																		{
																			//$image_link = $row['image_link'];
																			$image_path = "upload/";
																			//echo "<img src='<?php echo $image_src;  ' 
																			//echo '<img src="/loop-images/".$info['photo'] .">;
																			//echo <img src=".$info['photo'] .">
																			$images=$image_path.$row2['image_link'];
																			$product_code=$row2['product_code'];
																			$details=$row2['details'];
																			$restaurantName=$row3['restaurant_name'];
																			$product_price = $row2['product_price'];
																			$name = $row2['product_name'];
																			
																			echo "<div id='allfood' class='col-md-4 wow fadeInUp' data-wow-duration='2s' data-wow-delay=''>";
																			echo '<form method="post" class="form-item">';
																			echo "<br>";
																			
																			echo '<img class = "img-responsive" src="' . $images. '" height="160px"> ';
																			echo "<br>";
																			echo '' . $restaurantName. '';
																			echo "<br>";
																			echo '' . $name. '';
																			echo "<br>";
																			echo "product_price: " . $product_price. ' BDT';
																			echo "<br>";
																			echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
																			//echo "<p></p>";
																			//echo '<button  type="Submit" class="btn btn-primary" value="Submit" name="buy" >Add</button> ';
																			?>
																			
																			<!--	<input class="btn btn-primary" type="submit" onclick="addtocart('<?php //echo $foodid; ?>')" value="Buy">
																			-->
																			<div>
																			Qty :
																			<select name="product_qty">
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>
																			</select>
																			</div>
																			<?php
																			
																			echo "<input name='product_code' type='hidden' value='$product_code'><button class='btn btn-primary' type='submit'>Add to Cart</button>";
																			echo "<br>";
																			echo "<br>";
																			echo "<form>";
																			echo "</div>";
																		}
																	}
														}
														
												}
												
												if($ResOrFood == 'Food')
												{
													$sqlResT = "SELECT restaurant_id FROM restaurant WHERE (`area_id` = ".$areaSelect.")  ";
													
													
													$resultR=mysqli_query($con, $sqlResT); 
											
													while($rowRR = mysqli_fetch_array($resultR))
													{
													
														$sqlResT = "SELECT * FROM food WHERE (`product_name` LIKE '%".$searchbar."%' and `restaurant_id` = ".$rowRR['restaurant_id'].") ";
													
													
														$result1=mysqli_query($con, $sqlResT); 
												
														while($row1 = mysqli_fetch_array($result1))
														{
													
																	//WHERE (`restaurant_name` LIKE '%".$searchbar."%')
																	$sqlFOOD2 = "select * from food WHERE product_code = ".$row1['product_code']." ";
																	
																	
																	$result2=mysqli_query($con, $sqlFOOD2); 
																	
																	while($row2 = mysqli_fetch_array($result2))
																	{
																		$sqlRes2 = "SELECT restaurant_name FROM restaurant WHERE restaurant_id = ".$row1['restaurant_id']." ";
																		$result3 = mysqli_query($con, $sqlRes2); 
																		while($row3 = mysqli_fetch_array($result3))
																		{
																			//$image_link = $row['image_link'];
																			$image_path = "upload/";
																			//echo "<img src='<?php echo $image_src;  ' 
																			//echo '<img src="/loop-images/".$info['photo'] .">;
																			//echo <img src=".$info['photo'] .">
																			$images=$image_path.$row2['image_link'];
																			$product_code=$row2['product_code'];
																			$details=$row2['details'];
																			$restaurantName=$row3['restaurant_name'];
																			$product_price = $row2['product_price'];
																			$name = $row2['product_name'];
																			echo "<div id='allfood' class='col-md-4 wow fadeInUp' data-wow-duration='2s' data-wow-delay=''>";
																			echo '<form method="post" class="form-item">';
																			echo "<br>";
																			
																			echo '<img class = "img-responsive" src="' . $images. '" height="160px"> ';
																			echo "<br>";
																			echo '' . $restaurantName. '';
																			echo "<br>";
																			echo '' . $name. '';
																			echo "<br>";
																			echo "product_price: " . $product_price. ' BDT';
																			echo "<br>";
																			echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
																			//echo "<p></p>";
																			//echo '<button  type="Submit" class="btn btn-primary" value="Submit" name="buy" >Add</button> ';
																			?>
																			
																			<!--	<input class="btn btn-primary" type="submit" onclick="addtocart('<?php //echo $foodid; ?>')" value="Buy">
																			-->
																			<div>
																			Qty :
																			<select name="product_qty">
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																			<option value="4">4</option>
																			<option value="5">5</option>
																			</select>
																			</div>
																			<?php
																			
																			echo "<input name='product_code' type='hidden' value='$product_code'><button class='btn btn-primary' type='submit'>Add to Cart</button>";
																			echo "<br>";
																			echo "<br>";
																			echo "</form>";
																			echo "</div>";
																		}
																	}
														
														}
													}
												}
											  
											}
										}
									}
					
					mysqli_close($con);
									
									
									
?> 
							
									
	</form>						
							
					</div>
				 <!--Main Content end -->
				</div>
			</div>
		</section>
		
		<section class="footer">
			<div class="container">
				<div class="col-md-12">
					<p>&copy </p>
				</div>
			</div>
		</section>
		
		<script type="text/javascript"  src="js/bootstrap.min.js"></script>
		<script type="text/javascript"  src="js/wow.min.js"></script>
		<script type="text/javascript"  src="js/script.js"></script>
		
		<script type="text/javascript">
			new WOW().init();
			function switchVisible() {
                    document.getElementById('allfoodshow1').style.display = 'none';
                    document.getElementById('allfoodshow').style.display = 'block';
            }
		</script>
	</body>
</html>	