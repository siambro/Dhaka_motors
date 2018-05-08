<?php
	
if((isset($_POST['sale'])) && (isset($_POST['num'])))
{
	$selected=$_POST['num'];
		
	while(list($key,$val)=@each($selected))
	{
	 
			//$cID=$_GET['cID'];
			$phone=$_POST['phone'];

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
				$query="select * from customer c, sale_info s, pre_booking p
				
						where c.cID=p.cID
						and s.pre_book_status=p.id
						and phone = '$phone'";
						
				$result=mysqli_query($connection,$query);
				if($result){
					$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
					$cID=$row['cID'];
					$id=$row['id'];
					$saleID=$row['saleID'];
					$a=$row['amount'];
					
					$amount = $price - $a;
					//echo $cID;
					$date=date('m/d');
					$year = date('Y')+2;
					$warranty = $year.'/'.$date;
					
						
					$query1="update motorcycle_info set cID= '$cID', warranty='$warranty' where mID= '$mID'";
					
					$query2="update sale_info set sale_date=NOW(), sale_time=NOW(), amount='$amount'";
					$query3="update pre_booking set status='0'";
					
					$query4="update motorcycle_info set saleID= '$saleID' where mID= '$mID'";
					

					//$result=mysqli_query($connection,$query);
					$result1=mysqli_query($connection,$query1);
					$result2=mysqli_query($connection,$query2);
					$result3=mysqli_query($connection,$query3);
					$result4=mysqli_query($connection,$query4);
					if($result1 & $result2 & $result3 & $result4){
						header("location: invoice_pre_booked_sale_details.php?id=$id");
					}else{
						mysqli_error($connection);
					}
				}else{
					mysqli_error($connection);
				}
			}
			
		
		
	
		
	}	
		
}else if((isset($_POST['sale'])) && (!isset($_POST['num']))){
	// $phone=$_POST['phone'];
	// $connection=mysqli_connect("localhost","root","","dhaka_motors");
	// $query="select * from customer c, sale_info s, pre_booking p
				
	// 					where c.cID=p.cID
	// 					and s.pre_book_status=p.id
	// 					and phone = '$phone'";
						
	// 			$result=mysqli_query($connection,$query);
	// 			if($result){
	// 				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	// 				$cID=$row['cID'];
	// 				$saleID=$row['saleID'];
				

	header("location: pre_book_list.php?error");
				// }
}			
?>