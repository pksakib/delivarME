<?php
	session_start();
	$host = 'localhost';
	$username= 'root';
	$pass = '';
	$db = 'deliverme';
	
	$cons=new mysqli($host, $username, $pass, $db) or die("not connected");

			$check=$_SESSION["email"];
			
		if(!empty($check)){
			$sql = "SELECT password FROM `admin` WHERE email LIKE \"$check\"";
			$sql1=$cons->query($sql);
			$row=$sql1->fetch_assoc();
			$f_l=$row["password"];
			if(isset($f_l)){
				$cons->close();
			}
		}else{
				header("location: adminLogin.php");
				$cons->close();
			}
?>