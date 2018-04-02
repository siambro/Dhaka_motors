<?php
session_start();

$connection=mysqli_connect("localhost", "root", "", "dhaka_motors");



if(isset($_POST['num'])){			
		
		$quan=$_POST['quantity'];
		$selected=$_POST['num'];
		$mID = $_POST['mID'];

		$service_type = $_POST['serviceType'];

		$query0= "select * from service_type where type_name='$service_type'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$type_id = $row['type_id'];
			$fee = $row['fee'];
		}
		// var_dump($selected);
		// exit;
	// $FinalTotal = 0;
		$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$staffID=$row['staff_ID'];

			$query2="insert into sale_info values('',NOW(),NOW(),'$fee','$staffID','','')";
			$result2=mysqli_query($connection,$query2);

			$query5="SELECT MAX(saleID) FROM sale_info";
			$result5=mysqli_query($connection,$query5);
				if($result5){
				$row=mysqli_fetch_array($result5,MYSQLI_ASSOC);
				$id=$row['MAX(saleID)'];
				}

			$query2="insert into service values('',NOW(),NOW(),'$type_id','$mID','$staffID','$id')";
			$result2=mysqli_query($connection,$query2);

			$query5="SELECT MAX(service_id) FROM service";
			$result5=mysqli_query($connection,$query5);
				if($result5){
				$row=mysqli_fetch_array($result5,MYSQLI_ASSOC);
				$service_id=$row['MAX(service_id)'];
				}

			$query6= "select * from motorcycle_info where mID='$mID'";
			$result6=mysqli_query($connection,$query6);
			if($result6){
				$row=mysqli_fetch_array($result6,MYSQLI_ASSOC);	
				$cID=$row['cID'];
			}

			

			
			
			$total_parts_price = 0;
			while(list($key,$val)=@each($selected)){
				
				$parts_id=$val;
				
				// var_dump($parts_id);
				// exit;

				//$connection=mysqli_connect("localhost", "root", "", "dhaka_motors");	
				$query="SELECT * FROM parts_info WHERE parts_id=". $parts_id;
				$result=mysqli_query($connection,$query);
				
				if(mysqli_num_rows($result)>0){
					// $i = 0;
					while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
						$price=$row['price'];
						$currentStore = $row['quantity'];
						$currentStore -= $quan[$parts_id];
						
						$subtotal= $price * $quan[$parts_id];
						$total_parts_price +=$subtotal;

							$query="UPDATE parts_info SET quantity='$currentStore' WHERE parts_id='$parts_id'";
											
							$query3="insert into parts_sale values('', '$parts_id', '$id','$quan[$parts_id]','$cID','$service_id')";
							
							
						// $result=mysqli_query($connection,$query);
							// $result1=mysqli_query($connection,$query1);
							$temp = mysqli_query($connection,$query);
							$result3=mysqli_query($connection,$query3);
							
							
					}
					
				}else{
					mysqli_error($connection);
				}
			}
			$total = $total_parts_price + $fee;
			$query4="update sale_info set amount = '$total' where saleID= '$id'";
			$result4=mysqli_query($connection,$query4);
			if($result4){
				header("location: invoice_paid_service.php?saleID=$id");
			}else{
				mysqli_error($connection);
			}
			



		}else{
			mysqli_error($connection);
		}
												
	}else{
		$mID = $_POST['mID'];

		
		$service_type = $_POST['serviceType'];
		$query0= "select * from service_type where type_name='$service_type'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$type_id = $row['type_id'];
			$fee = $row['fee'];
		}

		$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$staffID=$row['staff_ID'];

			
			$query4="insert into sale_info values('', NOW(), NOW(),'$fee','$staffID','','')";
			$result4=mysqli_query($connection,$query4);
			$query5="SELECT MAX(saleID) FROM sale_info";
			$result5=mysqli_query($connection,$query5);
				if($result5){
				$row=mysqli_fetch_array($result5,MYSQLI_ASSOC);
				$id=$row['MAX(saleID)'];
				}

			$query2="insert into service values('',NOW(),NOW(),'$type_id','$mID','$staffID', LAST_INSERT_ID())";
			$result2=mysqli_query($connection,$query2);
			
			if($result4 & $result2){
				header("Location:invoice_paid_service.php?saleID=$id");
			}else{
				mysqli_error($connection);
			}
		}else{
			mysqli_error($connection);
		}
	}
	

	?>
              