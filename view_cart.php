<?php
session_start(); //start session
include("databaseconnect.php");

?>
<!DOCTYPE HTML>
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
<body>
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
			
			
			
		</section>
<h3 style="text-align:center">Review Your Cart Before Buying</h3>
<?php
$email=$_SESSION['login'];
$field = 'user_id';
$sql2="select $field from user WHERE email = '".$email."' ";
$user_id = mysqli_query($mysqli_conn,$sql2);
$uid = mysqli_fetch_object($user_id)->$field;
$status = "queue";


$now = date('Y-m-d H:i:s');


if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
	$total 			= 0;
	$list_tax 		= '';
	$cart_box 		= '<ul class="view-cart">';

	foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
		$product_name = $product["product_name"];
		$product_qty = $product["product_qty"];
		$product_price = $product["product_price"];
		$product_code = $product["product_code"];
		
		
		$item_price 	= sprintf("%01.2f",($product_price * $product_qty));  // price x qty = total item price
		
		$cart_box 		.=  "<li>  $product_name (Qty : $product_qty ) <span>  $item_price </span></li>";
		
		$subtotal 		= ($product_price * $product_qty); //Multiply item quantity * price
		$total 			= ($total + $subtotal); //Add up to total price
	}
	
	$grand_total = $total; //grand total
	
	
	
	$cart_box .= "<li class=\"view-cart-total\"><hr>Payable Amount : ".sprintf("%01.2f", $grand_total)."</li>";
	$cart_box .= "</ul>";
	
	echo $cart_box;
}else{
	echo "Your Cart is empty";
}
	
	if (isset($_REQUEST['checkout']))
		{
			
			$address = isset($_POST['address']) ? $_POST['address'] : '';
			if(!empty($address))
			{	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){
					$total 			= 0;
					$list_tax 		= '';
					$cart_box 		= '<ul class="view-cart">';
					
					//insert into orderlist table
						$query = "INSERT INTO `orderlist`(`user_id`,`date`, `status`,`address`) VALUES ('$uid','$now','$status','$address')";
						$result = mysqli_query($mysqli_conn,$query);

					foreach($_SESSION["products"] as $product){ //Print each item, quantity and price.
						$product_name = $product["product_name"];
						$product_qty = $product["product_qty"];
						$product_price = $product["product_price"];
						$product_code = $product["product_code"];
						
						
						$item_price 	= sprintf("%01.2f",($product_price * $product_qty));
						
						//retrive the order id
						$order_id = 'order_id';
						$query2="select $order_id from `orderlist` where date = '".$now."' ";
						$result2 = mysqli_query($mysqli_conn,$query2);
						$orderID = mysqli_fetch_object($result2)->$order_id;
						
						//insert into cart
						$query3 = "INSERT INTO `cart`(`order_id`,`food_id`, `quantity`,`price`) VALUES ('$orderID','$product_code','$product_qty','$product_price')";
						$result3 = mysqli_query($mysqli_conn,$query3);
						
						
					}
				}
				echo '<script language="javascript">';
				echo 'alert("SUCCESSFULLY CHECKOUT")';
				echo '</script>';
			}
			else{
				echo '<script language="javascript">';
				echo 'alert("Type Delivery Address")';
				echo '</script>';
			}
			unset($_SESSION["products"]);
			
			
			echo "<script>location.href='index.php';</script>";
			//session_destroy();
			
		}
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
?>
<form method="post">
	<p align="center">Delivery Address <input id="address" name="address" type="text" size="50" placeholder="Address" /></p>
	<p align="center"><button class="btn btn-primary" type="submit"  name="checkout" >Checkout</button></p>
</form>
</body>
</html>