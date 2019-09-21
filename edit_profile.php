<!DOCTYPE html>
<?php
session_start();
include("databaseconnect.php");
//error_reporting(0);
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
				echo "<script>location.href='profile.php';</script>";
			}
			
			
			
			if (isset($_REQUEST['submit']))
			{
				$Fullname= $_POST['name'];
				$email=$_POST['email'];
				$oldpassword= $_POST['oldpass'];
				$password1= $_POST['pass'];
				$password2=$_POST['cnpass'];
				$address=$_POST['address'];
				$name = $_FILES['pic']['name'];
				$target_dir = "userphoto/";
				$target_file = $target_dir . basename($_FILES["pic"]["name"]);

				 // Select file type
				$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

				 // Valid file extensions
				$extensions_arr = array("jpg","jpeg","png","gif");
				if(mysqli_connect_errno())
					echo "connection_failed";
				else
					//echo "connection_successful";
				echo '</br>';
				
				if(empty($name) && empty($address))
				{
				
				
				
				
					$user = mysqli_query($mysqli_conn,"SELECT password FROM `user` WHERE email = '".$_SESSION['login']."'");
					while($row = mysqli_fetch_array($user))
					{
						$olpass=$row['password'];
					}
					if($oldpassword == $olpass )
					{
						
						$sql= "UPDATE user SET password = '".$password1."', name='".$Fullname."', email='".$email."'  WHERE `email` = '".$_SESSION["login"]."'";
						if($password1==$password2 && !empty($password1)  && !empty($email) && !empty($Fullname) )
						{
							if (mysqli_query($mysqli_conn, $sql)) {
								$_SESSION["login"]=$email;
								echo '<script language="javascript">';
								
								echo 'alert("UPDATE COMPLETE")';
								echo '</script>';
								echo "<script>location.href='profile.php';</script>";
							} else {
								echo '<script language="javascript">';
								echo 'alert("Type Again")';
								echo '</script>';
							}
						
						}
						else
						{
							echo '<script language="javascript">';
							echo 'alert("Fill All Field")';
							echo '</script>';
						}
					
					}
					else
						{
							echo '<script language="javascript">';
							echo 'alert("type old password correctly")';
							echo '</script>';
						}

						
				
				}
				if(!empty($name) && empty($address))
				{
				
				
				
				
					$user = mysqli_query($mysqli_conn,"SELECT password FROM `user` WHERE email = '".$_SESSION['login']."'");
					while($row = mysqli_fetch_array($user))
					{
						$olpass=$row['password'];
					}
					if($oldpassword == $olpass )
					{
						
						$sql= "UPDATE user SET password = '".$password1."', name='".$Fullname."', email='".$email."', image_link='".$name."'  WHERE `email` = '".$_SESSION["login"]."'";
						if($password1==$password2 && !empty($password1)  && !empty($email) && !empty($Fullname) )
						{
							if (mysqli_query($mysqli_conn, $sql)) {
								$_SESSION["login"]=$email;
								echo '<script language="javascript">';
								
								echo 'alert("UPDATE COMPLETE")';
								echo '</script>';
								echo "<script>location.href='profile.php';</script>";
							} else {
								echo '<script language="javascript">';
								echo 'alert("Type Again")';
								echo '</script>';
							}
						
						}
						else
						{
							echo '<script language="javascript">';
							echo 'alert("Fill All Field")';
							echo '</script>';
						}
					
					}
					else
						{
							echo '<script language="javascript">';
							echo 'alert("type old password correctly")';
							echo '</script>';
						}

						
				
				}
				if(empty($name) && !empty($address))
				{
				
				
				
				
					$user = mysqli_query($mysqli_conn,"SELECT password FROM `user` WHERE email = '".$_SESSION['login']."'");
					while($row = mysqli_fetch_array($user))
					{
						$olpass=$row['password'];
					}
					if($oldpassword == $olpass )
					{
						
						$sql= "UPDATE user SET password = '".$password1."', name='".$Fullname."', email='".$email."', address='".$address."'  WHERE `email` = '".$_SESSION["login"]."'";
						if($password1==$password2 && !empty($password1)  && !empty($email) && !empty($address) && !empty($Fullname) )
						{
							if (mysqli_query($mysqli_conn, $sql)) {
								$_SESSION["login"]=$email;
								echo '<script language="javascript">';
								
								echo 'alert("UPDATE COMPLETE")';
								echo '</script>';
								echo "<script>location.href='profile.php';</script>";
							} else {
								echo '<script language="javascript">';
								echo 'alert("Type Again")';
								echo '</script>';
							}
						
						}
						else
						{
							echo '<script language="javascript">';
							echo 'alert("Fill All Field")';
							echo '</script>';
						}
					
					}
					else
						{
							echo '<script language="javascript">';
							echo 'alert("type old password correctly")';
							echo '</script>';
						}

						
				
				}
				

				if(in_array($imageFileType,$extensions_arr ))
				{
				
				
				
				
					$user = mysqli_query($mysqli_conn,"SELECT password FROM `user` WHERE email = '".$_SESSION['login']."'");
					while($row = mysqli_fetch_array($user))
					{
						$olpass=$row['password'];
					}
					if($oldpassword == $olpass )
					{
						
						$sql= "UPDATE user SET password = '".$password1."', name='".$Fullname."', email='".$email."',image_link='".$name."',address='".$address."'  WHERE `email` = '".$_SESSION["login"]."'";
						if($password1==$password2 && !empty($password1)  && !empty($email) && !empty($address) && !empty($Fullname) )
						{
							if (mysqli_query($mysqli_conn, $sql)) {
								$_SESSION["login"]=$email;
								move_uploaded_file($_FILES['pic']['tmp_name'],$target_dir.$name);
								echo '<script language="javascript">';
								
								echo 'alert("UPDATE COMPLETE")';
								echo '</script>';
								echo "<script>location.href='profile.php';</script>";
							} else {
								echo '<script language="javascript">';
								echo 'alert("Type Again")';
								echo '</script>';
							}
						
						}
						else
						{
							echo '<script language="javascript">';
							echo 'alert("Fill All Field")';
							echo '</script>';
						}
					
					}
					else
						{
							echo '<script language="javascript">';
							echo 'alert("type old password correctly")';
							echo '</script>';
						}

						
				
				}
				else
					{
							echo '<script language="javascript">';
							echo 'alert("Select a profile image")';
							echo '</script>';
					}
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
				<form method="post" target="#" enctype="multipart/form-data" >
				
					<div class="row">
					<h4></h4>
					
					<div class="col-lg-4"></div>
					
					<div class="col-md-4 center-block ">
							<p align="center">
									<h3>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Your Profile</h3>
									
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
												echo "<h6>";
												echo "NAME: " . $row['name'] . " <br>";
												echo "Username: " . $row['username'] ."<br> ";
												echo "Password: " . $row['password'] . "<br>";
												echo "Email: " . $row['email'] . "";

												echo "</h6>";
											}
											
											
										mysqli_close($mysqli_conn);
										
							?>
								
							<br>
						<div > 
							
							Please Enter New Value to Edit.
							<p>Name <input id="myname" name="name" type="text" size="50" placeholder="Your Name" /></p>
							<p>Email <input id="Email" name="email" type="text" size="50" placeholder="Email" /></p>
							<p>Old Password <input id="oldpass" name="oldpass" type="password" size="47" placeholder="password" /></p>
							<p>Password <input id="pass" name="pass" type="password" size="47" placeholder="password" /></p>
							<p>Confirm Password <input id="cnpass" name="cnpass" type="password" size="40" placeholder="Confirm password" /></p>
							<p>Present Address <input id="address" name="address" type="text" size="50" placeholder="Address" /></p>
							<P>Picture: <input type="file" name="pic" > </P>
							
							
							<p align="center"><button  type="Submit" class="btn btn-primary" name="submit">Done</button></p>
							
							
						 </div>
							<p align="center"><button  type="submit" class="btn btn-primary" name="back">Back</button></p>
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