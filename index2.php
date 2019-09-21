<!DOCTYPE html>
<?php
session_start();
				
if(!isset($_SESSION['login'])){
    header("Location:index.php");
    exit(); 
}


?>

<?php

	$host = 'localhost';
	$username= 'root';
	$pass = '';
	$db = 'deliverme';
					
							
	
		$con=new mysqli($host, $username, $pass, $db) or die("not connected");
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
			if (isset($_POST['profile']))
			{
				
				
				echo "<script>location.href='profile.php';</script>";
			}
			if (isset($_POST['buy']))
				
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
		<link rel="stylesheet" type="text/css" href="css/style22.css"/>
		<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
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
	
	<!-- CART AJAX -->
	<script>
$(document).ready(function(){	
		$(".form-item").submit(function(e){
			var form_data = $(this).serialize();
			var button_content = $(this).find('button[type=submit]');
			button_content.html('Adding...'); //Loading button text 
			//await sleep(1000);
			button_content.html('Added');
			
			$.ajax({ //make ajax request to cart_process.php
				url: "cart_process.php",
				type: "POST",
				dataType:"json", //expect json value from server
				data: form_data
			}).done(function(data){ //on Ajax success
				$("#cart-info").html(data.items); //total items in cart-info element
				button_content.html('Add to Cart'); //reset button text to original text
				//alert("Item added to Cart!"); //alert user
				if($(".shopping-cart-box").css("display") == "block"){ //if cart box is still visible
					$(".cart-box").trigger( "click" ); //trigger click to update the cart box.
				}
			})
			e.preventDefault();
		});

	//Show Items in Cart
	$( ".cart-box").click(function(e) { //when user clicks on cart box
		e.preventDefault(); 
		$(".shopping-cart-box").fadeIn(); //display cart box
		$("#shopping-cart-results").html('<img src="images/ajax-loader.gif">'); //show loading image
		$("#shopping-cart-results" ).load( "cart_process.php", {"load_cart":"1"}); //Make ajax request using jQuery Load() & update results
	});
	
	//Close Cart
	$( ".close-shopping-cart-box").click(function(e){ //user click on cart box close link
		e.preventDefault(); 
		$(".shopping-cart-box").fadeOut(); //close cart-box
	});
	
	//Remove items from cart
	$("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
		e.preventDefault(); 
		var pcode = $(this).attr("data-code"); //get product code
		$(this).parent().fadeOut(); //remove item element from box
		$.getJSON( "cart_process.php", {"remove_code":pcode} , function(data){ //get Item count from Server
			$("#cart-info").html(data.items); //update Item count in cart-info
			$(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
		});
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
					<div class="">
						
						<form method="post">
							<button class="btn btn-primary" name="logout" >Logout</button>
							<button class="btn btn-primary" name="profile" >Profile</button>
								
						</form>	
						
						
					</div>	
					
				</div>
			</div>
			<!--Cart Box -->
			<!--
			<div class="row">
					<div class="col-md-8" align="">
					</div>   
					<div class="col-md-4">				
						
							<a href="#"  class="cart-box" id="cart-info" title="View Cart">
							<?php 
							if(isset($_SESSION["products"])){
								echo count($_SESSION["products"]); 
							}else{
								echo 0; 
							}
							?>
							</a>

							<div class="shopping-cart-box">
							<a href="#" class="close-shopping-cart-box" >Close</a>
							<h3>Your Shopping Cart</h3>
								<div id="shopping-cart-results">
								</div>
							</div>
					</div>
			</div>
			-->
			 <!--</header> --> 
			
		</section>
		
		<section class="main">
			<!--
			<div class="col-md-11">
				<div class="">
					<p align="right"><a  class="" type="" data-toggle="collapse" data-target="#cart" aria-expanded="false" aria-controls="cart" ><img src="images/cart/cart1.png"> </img></a></p>
				</div>
				
			</div> -->
			<div class="row" >
					<div class="col-md-8" align="">
					</div>   
					 
					<div class="col-md-2" >				
						
							<a href="#"  class="cart-box" id="cart-info" title="View Cart" >
							
							<?php 
							if(isset($_SESSION["products"])){
								echo count($_SESSION["products"]); 
							}else{
								echo 0; 
							}
							?>
							
							</a>
							

							<div class="shopping-cart-box" >
							<a href="#" class="close-shopping-cart-box" >Close</a>
							<h3>Your Shopping Cart</h3>
								<div id="shopping-cart-results">
								</div>
							</div>
					</div>
			</div>
			
			<div class="container search d-flex justify-content-center flex-column " style="background-image: url(images/back1.jpg);  max-height: 400px;   min-height: 320px; max-width:10000px; min-width:200px;">
			
			<!-- Search form start -->
			 
				
				<form method="post" target="index2.php"> 
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
				
				<!-- Main content start -->
	<script>
	
		function switchVisible1() {
			localStorage.setItem("visited", "true");
			if(localStorage.getItem("visited") == null){
            if (document.getElementById('test')) {
				
                if (document.getElementById('test').style.display == 'block') {
                    document.getElementById('test').style.display = 'none';
                    document.getElementById('test').style.display = 'none';
                }
                else {
                    document.getElementById('test').style.display = 'block';
                    document.getElementById('test').style.display = 'none';
                }
            }
		}	
}
	</script>	

	
					<div class="col-md-9 main-content ">
					<!--<form method="post" role="" class=""> -->
					<div name="test" id="test" class="row " style ="display:block;" >
					 
					</div>
					
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
																		echo '<form class="form-item">';
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
												echo '<form class="form-item">';
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
																			echo '<form class="form-item">';
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
																			echo '<form class="form-item">';
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
							
								
<!--	</form>	-->					
							
					</div>
				 <!--Main Content end -->
				</div>
			</div>
		</section>
		
		<section class="footer">
			<div class="container">
				<div class="col-md-12">
				 <!--	<p>&copy </p> -->
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