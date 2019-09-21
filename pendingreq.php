<!DOCTYPE html>
<?php

		include("databaseconnect.php");	
		include("session.php");		



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
				echo "<script>location.href='adminLogin.php';</script>";
			}
			if (isset($_POST['adminhome']))
			{
				
				//session_destroy();
				echo "<script>location.href='adminFront.php';</script>";
			}
			
			
			/* if (isset($_REQUEST['cancel']))
			{
				
				$orderid2 = $_POST['cancel'];
				echo $orderid2;
				$a=$orderid2;
				
				$sql2= "DELETE FROM orderlist WHERE order_id = '".$a."'  ";
				echo $a;
				if (mysqli_query($mysqli_conn, $sql2)) {
					
					unset($orderid2);
					echo '<script language="javascript">';
					echo 'alert("ORDER DELETED")';
					echo '</script>';
					//session_destroy();
					echo "<script>location.href='pendingreq.php';</script>";
				} else {
					echo '<script language="javascript">';
					echo 'alert("Something Might Be Happened")';
					echo '</script>';
				}
				
			} */
			if (isset($_REQUEST['deliver']))
			{
				$orderid = $_POST['deliver'];
				 
				//$oid=$orderid;
				$sql= "UPDATE orderlist SET status = 'delivered' WHERE order_id = '".$orderid."'  ";
				if (mysqli_query($mysqli_conn, $sql)) {
					
					unset($orderid);
					echo '<script language="javascript">';
					
					echo '<script language="javascript">';
					echo 'alert("DELIVERED")';
					echo '</script>';
					//session_destroy();
					echo "<script>location.href='pendingreq.php';</script>";
				} else {
					echo '<script language="javascript">';
					echo 'alert("Something Might Be Happened")';
					echo '</script>';
				}
				
			} 
		 	/* if (isset($_POST['cancel']))
			{
				
				$orderid2 = $_POST['cancel'];
				echo $orderid2;
				$a=$orderid2;
				
				$sql2= "DELETE FROM orderlist WHERE order_id = '".$a."'  ";
				echo $a;
				if (mysqli_query($mysqli_conn, $sql2)) {
					
					unset($orderid2);
					echo '<script language="javascript">';
					echo 'alert("ORDER DELETED")';
					echo '</script>';
					//session_destroy();
					echo "<script>location.href='pendingreq.php';</script>";
				} else {
					echo '<script language="javascript">';
					echo 'alert("Something Might Be Happened")';
					echo '</script>';
				}
				
			} */ 
			
			
				

					
					
			

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
	
<script>
 /* function myFunction() {
	var val = "<?php echo $bb ?>";
    var x = document.getElementById("val");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
	console.log("Hello world!");
}  */
</script>
<script>

function myFunction(bbc) {
    var x = document.getElementById("row"+bbc);
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}
</script>
<script>
/* var toggle  = document.getElementById("toggle");
var content = document.getElementById("content");

toggle.addEventListener("click", function() {
content.style.display = (content.dataset.toggled ^= 1) ? "block" : "none";
}); */
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
					<div class="col-md-1">
						<div class="">
							
							<form method="post">
								<button class="btn btn-primary" name="logout" >Logout</button> &nbsp; &nbsp; &nbsp;<button class="btn btn-primary" name="adminhome" >Admin Home</button>
								
									
							</form>	
							
							
						</div>	
						
					</div>
				</div>
			</div>
		</section>
		<section class="main">
			
			<div class="container ">
				<div class="row ">
						<div class="col-md-2">
							
						</div>
					<div class="col-md-6">
						<div class="">
							
							
							
							<form method="post">
								
							<h4><p align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PENDING REQUEST</p><h4>
									
							</form>	
							
							
							
						</div>	
						
					</div>
				</div>
			</div>
			<div class="col-md-11 main-content ">
			
			<div/>
			
			<div class="col-md-11 main-content ">
					<!--<form method="post" role="" class=""> -->
					
						<div name="CARTALL" id="CARTALL" class="" style ="" >
						
						<?php
								$status="queue";
								$totalp=0;
								$sqlOrderID = "SELECT * FROM orderlist WHERE `status` = 'queue'   ";
						
						
								$result1=mysqli_query($mysqli_conn, $sqlOrderID); 
								if (!$result1) {
									printf("Error: %s\n", mysqli_error($mysqli_conn));
									exit();
								}
								
								while($row1 = mysqli_fetch_array($result1))
								{
									$sqlUSER = "SELECT * FROM user WHERE user_id = '".$row1['user_id']."' ";
									$resultUSER=mysqli_query($mysqli_conn, $sqlUSER); 
									
									//$orderid=$row1['order_id'];
									
									//$orderid2=$row1['order_id'];
									
									$sqlCART = "SELECT * FROM cart WHERE order_id = '".$row1['order_id']."' ";
									$result2=mysqli_query($mysqli_conn, $sqlCART); 
									//$bbc=$row1['order_id']
									//echo $row1['order_id'];
									?>
									<!--<button class="btn btn-primary dropdown-toggle" onclick="myFunction( )" ></button>  -->
									<?php
									//echo '<button class="btn btn-primary dropdown-toggle" onClick= myFunction("' . $bbc. '");> "Show"</button> ';
									//echo "<div id=$bb></div>";
									while($rowUSER= mysqli_fetch_array($resultUSER))
									{	
										$username=$rowUSER['username'];
										$address=$rowUSER['address'];
										$bb=$row1['order_id'];
										$orderid=$row1['order_id'];
										
										$bbc=$row1['order_id']
										//echo $row1['order_id'];
										?>
										<button class="btn btn-primary dropdown-toggle" onclick="myFunction(<?php echo $bbc ?>)" ></button> 
										<?php
										$orderid2=$row1['order_id'];
										//echo "<div id='cartfoods' style='display: none;'>";
										//echo "<div id='$orderid.' style='display: none;'>";
										//echo "<div id='".$orderid."' style='display: none;'></div>";
										 ?>
										 <div id="row<?php echo $bb; ?>" value="row<?php echo $bb; ?>" style="display:none">
										 <!--<div id="as" value style="display:none">-->
										<?php
										while($row2= mysqli_fetch_array($result2))
										{	
											
											$sqlFOOD = "SELECT * FROM food WHERE product_code = '".$row2['food_id']."' ";
											$result3=mysqli_query($mysqli_conn, $sqlFOOD); 
											while($row3= mysqli_fetch_array($result3))
											{	
												//echo " $username";
												$sqlRES = "SELECT * FROM restaurant WHERE restaurant_id = '".$row3['restaurant_id']."' ";
												$result4=mysqli_query($mysqli_conn, $sqlRES); 
												while($row4= mysqli_fetch_array($result4))
												{	
													
													$product_code=$row2['food_id'];
													//$details=$row['details'];
													$restaurantName=$row4['restaurant_name'];
													$product_price = $row2['price'];//*$row2['quantity'];
													$name = $row3['product_name'];
													$quantity=$row2['quantity'];
													$totalprice=$row2['price']*$row2['quantity'];;
													
													
													//echo "<div id='cartallshow' class=' ' style=''>";
													//echo '<form class="form-item">';
													//echo "<br>";
													
													//echo " $username $restaurantName $name price: $product_price quantity:$quantity ";
													//echo "<br>";
													//echo '' . $restaurantName. '';
													//echo "<br>";
													//echo '' . $name. '';
													//echo "<br>";
													//echo "product_price: " . $product_price. ' BDT';
													//echo "<br>";
													//echo "&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
													//echo "<p></p>";
													//echo '<button  type="Submit" class="btn btn-primary" value="Submit" name="buy" >Add</button> ';
													
													
													//echo "<br>";
													//echo "<br>";
													//echo '</form>';
													//echo "</div>";
													//$totalprice+=$totalprice;
													
													$totalp+=$totalprice;
												
												}
												
											//echo " $username $restaurantName $name price: $product_price quantity:$quantity ";
											}
											
											echo " Food: " .$name. '';
											echo '<br>';
											
											echo "price: " .$product_price.'';
											echo '<br>';
										
											echo "quantity: ".$quantity. '';
											echo '<br>';
											echo "Restaurant: " . $restaurantName. '';
											
											echo '<br>';
											
											
										}
										echo " Total Price:" .$totalp. '';
										$totalp=0;
										
										echo '<br>';
										echo "Delivery Address: " . $row1['address']. '';
										echo "<br>";
										echo "Username: ".$username.'';
										echo "<form method='post'>";
										//echo '<p class="btn btn-primary" ><input id="loadmore" class="btn btn-primary" type="submit" hidden value="'. $orderid .'" style=" margin-top: 20px; " >BB <input id="pages" type="hidden" value="'. $orderid .'"></p>';
										echo "<input name='deliver' type='hidden' value='$orderid'><button class='btn btn-primary' type='submit'>Deliver</button>";
										echo '<br>';
										echo '<br>';
										echo "<input name='cancel' type='hidden' value='$orderid2'><button class='btn btn-primary' type='submit'>Cancel This</button>";
										echo "</form>";
										?>
										</div>
										<?php
										//echo "</div>";
									}
									echo '<br>';
									
									echo '<br>';
								}
								
								
								
							?>
							
						</div>
			</div>			
		</section>
		

			
			
				 <!--Main Content end -->
				
		
		<section class="footer">
			<div class="container">
				<div class="col-md-12">
					<p> </p> <!-- Place here the copy right sign : &copy-->
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