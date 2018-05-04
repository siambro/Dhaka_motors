<?php
session_start();

$connection=mysqli_connect("localhost", "root", "", "dhaka_motors");


$query="SELECT * FROM service_type";
$result=mysqli_query($connection,$query);
	if($result){
	$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	$type=$row['type_id'];
}
if(isset($_POST['num'])){			
		
		$quan=$_POST['quantity'];
		$selected=$_POST['num'];
		$mID = $_POST['mID'];
		// var_dump($selected);
		// exit;
	// $FinalTotal = 0;
		$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$staffID=$row['staff_ID'];

			$query2="insert into service values('',NOW(),NOW(),'$type', $mID','$staffID','')";
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
						// $i++;

							$query="UPDATE parts_info SET quantity='$currentStore' WHERE parts_id='$parts_id'";
											
							$query3="insert into parts_sale values('', '$parts_id', '','$quan[$parts_id]','$cID','$service_id')";
							
						// $result=mysqli_query($connection,$query);
							// $result1=mysqli_query($connection,$query1);
							$temp = mysqli_query($connection,$query);
							$result3=mysqli_query($connection,$query3);
							if($temp & $result3){
								header("location: invoice_Service.php?mID=$mID");
							}else{
								mysqli_error($connection);
							}
					}
				}else{
					mysqli_error($connection);
				}
			}

		}else{
			mysqli_error($connection);
		}
												
	}else{
		$mID = $_POST['mID'];
		
		$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$staffID=$row['staff_ID'];

			$query2="insert into service values('',NOW(),NOW(),'$type','$mID','$staffID','')";
			$result2=mysqli_query($connection,$query2);
			if($result2){
				header("Location:invoice_service.php?mID=$mID");
			}else{
				mysqli_error($connection);
			}
		}
	}

	?>
              