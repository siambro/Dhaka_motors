<?php
session_start();

if(isset($_POST['num']))
{
	$selected=$_POST['num'];
		
	while(list($key,$val)=@each($selected))
	{

			//discount check
		$todate = date('Y-m-d');		
		$today= date('Y-m-d', strtotime($todate));
		$connection=mysqli_connect("localhost","root","","dhaka_motors");
		$query="select * 
			from discount 
			where status='Active'";
		$result=mysqli_query($connection,$query);
		if($result){
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
			$d_id=$row['discount_id'];
			$d_from=$row['d_from'];
			$d_to=$row['d_to'];
			$percentage=$row['percentage'];
		
		}else{
			echo mysqli_error($connection);
		}
		
		//$percent = $percentage*($percentage/100);
		//echo $percent;
		//exit;
		
		$from = date('Y-m-d', strtotime($d_from));
		$to = date('Y-m-d', strtotime($d_to));
		
		//echo "<script>alert('$from')</script>";
		
		if (($today > $from) && ($today < $to))
		{
		
			if((isset($_POST['sale'])) && (!isset($_POST['checked']))){
				$ownerName=$_POST['name'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$nid=$_POST['nid'];
				
				$mID=$_POST['mID'];
				//$price=$_POST['price'];
				$connection=mysqli_connect("localhost","root","","dhaka_motors");
				$query="select * 
						from motorcycle_info 
						where mID='$val'";

				//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
				$result=mysqli_query($connection,$query);
				if($result){
					
					$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
					$mID=$row['mID'];
					
					$p=$row['price'];
					
					
				}else{
					echo mysqli_error($connection);
				}
				$percent = $p*($percentage/100);
				
				$price = $p - $percent;
				
				//$connection=mysqli_connect("localhost","root","","dhaka_motors");
				$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
				$result0=mysqli_query($connection,$query0);
				if($result0){
					$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
					$staffID=$row['staff_ID'];
					
					$date=date('m/d');
					$year = date('Y')+2;
					$warranty = $year.'/'.$date;
					
				//echo"<script>alert('Ballllll');</script>";
					//$connection=mysqli_connect("localhost","root","","dhaka_motors");
					$query="insert into customer values('','$ownerName','$phone','$email', '$nid','$ownerName','123456')";
					$query1="update motorcycle_info set cID= LAST_INSERT_ID(), warranty='$warranty' where mID= '$mID'";
					
					$query2="insert into sale_info values('',NOW(),NOW(),'$price','$staffID','','$d_id')";
					$query3="update motorcycle_info set saleID= LAST_INSERT_ID() where mID= '$mID'";
					
					$result=mysqli_query($connection,$query);
					$result1=mysqli_query($connection,$query1);
					$result2=mysqli_query($connection,$query2);
					$result3=mysqli_query($connection,$query3);
					if($result & $result1 & $result2 & $result3){
						header("location: invoice.php?mID=$mID");
					}else{
						mysqli_error($connection);
					}
				}
				
			}else if((isset($_POST['sale'])) && (isset($_POST['checked']))){
				
				$phone=$_POST['phone'];
				
				$mID=$_POST['mID'];
				
				$connection=mysqli_connect("localhost","root","","dhaka_motors");
				$query="select * 
						from motorcycle_info 
						where mID='$val'";

				//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
				$result=mysqli_query($connection,$query);
				if($result){
					
					$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
					$mID=$row['mID'];
					
					$p=$row['price'];
					
					//$price = $p - $percent;
							
				
				}else{
					echo mysqli_error($connection);
				}
				$percent = $p*($percentage/100);
				
				$price = $p - $percent;
				
				
				//$connection=mysqli_connect("localhost","root","","dhaka_motors");
				$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
				$result0=mysqli_query($connection,$query0);
				if($result0){
					$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
					$staffID=$row['staff_ID'];
				
				
					//$connection=mysqli_connect("localhost","root","","dhaka_motors");
					$query="select * from customer where phone = '$phone'";
					$result=mysqli_query($connection,$query);
					if($result){
						$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
						$cID=$row['cID'];
						//echo $cID;
						$date=date('m/d');
						$year = date('Y')+2;
						$warranty = $year.'/'.$date;
						//echo $warranty;
						//echo"<script>alert('$warranty');</script>";
						$query1="update motorcycle_info set cID= '$cID', warranty='$warranty' where mID= '$mID'";
						
						$query2="insert into sale_info values('',NOW(),NOW(),'$price','$staffID','','$d_id')";
						$query3="update motorcycle_info set saleID= LAST_INSERT_ID() where mID= '$mID'";
						
						//$result=mysqli_query($connection,$query);
						$result1=mysqli_query($connection,$query1);
						$result2=mysqli_query($connection,$query2);
						$result3=mysqli_query($connection,$query3);
						if($result1 & $result2 & $result3){
							header("location: invoice.php?mID=$mID");
						}else{
							mysqli_error($connection);
						}
					}
				}
				
			}else{
				mysqli_error($connection);
			}
			
			
			
			//$percent = $row['price']*($percentage/100);
		 //$price= $price - $percent;
		}else{
			
			if((isset($_POST['sale'])) && (!isset($_POST['checked']))){
				$ownerName=$_POST['name'];
				$email=$_POST['email'];
				$phone=$_POST['phone'];
				$nid=$_POST['nid'];
				
				$mID=$_POST['mID'];
				//$price=$_POST['price'];
				$connection=mysqli_connect("localhost","root","","dhaka_motors");
				$query="select * 
						from motorcycle_info 
						where mID='$val'";

				//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
				$result=mysqli_query($connection,$query);
				if($result){
					
					$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
					$mID=$row['mID'];
					
					$price=$row['price'];
				
				}else{
					echo mysqli_error($connection);
				}
				
				
				
				//$connection=mysqli_connect("localhost","root","","dhaka_motors");
				$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
				$result0=mysqli_query($connection,$query0);
				if($result0){
					$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
					$staffID=$row['staff_ID'];
					
					$date=date('m/d');
					$year = date('Y')+2;
					$warranty = $year.'/'.$date;
					
				//echo"<script>alert('Ballllll');</script>";
					//$connection=mysqli_connect("localhost","root","","dhaka_motors");
					$query="insert into customer values('','$ownerName','$phone','$email', '$nid','$ownerName','123456')";
					$query1="update motorcycle_info set cID= LAST_INSERT_ID(), warranty='$warranty' where mID= '$mID'";
					
					$query2="insert into sale_info values('',NOW(),NOW(),'$price','$staffID','','')";
					$query3="update motorcycle_info set saleID= LAST_INSERT_ID() where mID= '$mID'";
					
					$result=mysqli_query($connection,$query);
					$result1=mysqli_query($connection,$query1);
					$result2=mysqli_query($connection,$query2);
					$result3=mysqli_query($connection,$query3);
					if($result & $result1 & $result2 & $result3){
						header("location: invoice.php?mID=$mID");
					}else{
						mysqli_error($connection);
					}
				}
				
			}else if((isset($_POST['sale'])) && (isset($_POST['checked']))){
				
				$phone=$_POST['phone'];
				
				$mID=$_POST['mID'];
				
				$connection=mysqli_connect("localhost","root","","dhaka_motors");
				$query="select * 
						from motorcycle_info 
						where mID='$val'";

				//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
				$result=mysqli_query($connection,$query);
				if($result){
					
					$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
					$mID=$row['mID'];
					
					$price=$row['price'];
							
				
				}else{
					echo mysqli_error($connection);
				}
				
				
				
				//$connection=mysqli_connect("localhost","root","","dhaka_motors");
				$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
				$result0=mysqli_query($connection,$query0);
				if($result0){
					$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
					$staffID=$row['staff_ID'];
				
				
					//$connection=mysqli_connect("localhost","root","","dhaka_motors");
					$query="select * from customer where phone = '$phone'";
					$result=mysqli_query($connection,$query);
					if($result){
						$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
						$cID=$row['cID'];
						//echo $cID;
						$date=date('m/d');
						$year = date('Y')+2;
						$warranty = $year.'/'.$date;
						//echo $warranty;
						//echo"<script>alert('$warranty');</script>";
						$query1="update motorcycle_info set cID= '$cID', warranty='$warranty' where mID= '$mID'";
						
						$query2="insert into sale_info values('',NOW(),NOW(),'$price','$staffID','','')";
						$query3="update motorcycle_info set saleID= LAST_INSERT_ID() where mID= '$mID'";
						
						//$result=mysqli_query($connection,$query);
						$result1=mysqli_query($connection,$query1);
						$result2=mysqli_query($connection,$query2);
						$result3=mysqli_query($connection,$query3);
						if($result1 & $result2 & $result3){
							header("location: invoice.php?mID=$mID");
						}else{
							mysqli_error($connection);
						}
					}
				}
				
			}else{
				mysqli_error($connection);
			}
		
		}
		
	}	
		
}else{
	header('location: sale_motorcycle.php?error');
}			
?>