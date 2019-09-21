<?php
											
			$host = 'localhost';
			$username= 'root';
			$pass = '';
			$db = 'deliverme';
															
			$con=new mysqli($host, $username, $pass, $db) or die("not connected");
	

				if(!empty($_POST["city_id"])){
				//Fetch all area data
				$query = $con->query("SELECT * FROM area WHERE city_id = ".$_POST['city_id']." ORDER BY area_name ASC");
				
				//Count total number of rows
				$rowCount = $query->num_rows;
				
				
				//area option list
				if($rowCount > 0){
					
					//echo '<select class="form-control" name="areaSelect1a" id="areaa">';
					//echo '<option value="">Select area</option>';
					while($row = $query->fetch_assoc()){ 
						
						//echo '<option value="'.$row['area_id'].'">'.$row['area_name'].'</option>';
						$query2 = $con->query("SELECT * FROM restaurant WHERE area_id = ".$row['area_id']." ");
				
						//Count total number of rows
						$rowCount2 = $query2->num_rows;
						
						if($rowCount2 > 0){
							
							//echo '<select class="form-control" name="areaSelect1a" id="areaa">';
							echo '<option value="">Select Restaurant</option>';
							while($row2 = $query2->fetch_assoc()){ 
								
								echo '<option value="'.$row2['restaurant_id'].'">'.$row2['restaurant_name'].'</option>';
								
							}
							//echo '</select>';
						}
						
					}
					//echo '</select>';
				}
				else{
					echo '<option value="">Restaurant not available</option>';
				}
				
			}
?>