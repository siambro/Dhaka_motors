<?php
session_start();

$connection=mysqli_connect("localhost", "root", "", "dhaka_motors");

if(isset($_POST['confirm'])){			
		$name=$_POST['name'];
		$phone=$_POST['phone'];
		
		$quan=$_POST['quantity'];
		
		$selected=$_POST['num'];
		$finalTotal = $_POST['finalTotal'];
		
		// var_dump($selected);
		// exit;
	// $FinalTotal = 0;
		$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
		$result0=mysqli_query($connection,$query0);
		if($result0){
			$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
			$staffID=$row['staff_ID'];

			$query = "SELECT * FROM customer WHERE phone = '".$phone."'";
			$result = mysqli_query($connection, $query);
			if(mysqli_num_rows($result)> 0){
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$cid = $row['cID'];

			}else{
				$query4="INSERT into customer values('','$name','$phone','','','','')";
				$result4=mysqli_query($connection,$query4);
				$query5="SELECT * FROM customer where cID= LAST_INSERT_ID()";
				$result5=mysqli_query($connection,$query5);
					if($result5){
					$row=mysqli_fetch_array($result5,MYSQLI_ASSOC);
					$cid=$row['cID'];
				}
			}

			$query2="insert into sale_info values('',NOW(),NOW(),'$finalTotal','$staffID','','')";
			$result2=mysqli_query($connection,$query2);

			$query5="SELECT MAX(saleID) FROM sale_info";
			$result5=mysqli_query($connection,$query5);
				if($result5){
				$row=mysqli_fetch_array($result5,MYSQLI_ASSOC);
				$id=$row['MAX(saleID)'];
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
											
							$query3="insert into parts_sale values('', '$parts_id', '$id','$quan[$parts_id]','$cid','')";
							
							$temp = mysqli_query($connection,$query);
							$result3=mysqli_query($connection,$query3);
							if($temp & $result3){
								header("location: invoice_parts.php?saleID=$id");
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
		echo mysqli_error($connection);
	}

	?>
              