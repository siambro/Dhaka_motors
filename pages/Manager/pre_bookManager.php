<?php
session_start();

if((isset($_POST['book'])) && (!isset($_POST['checked']))){
	$ownerName=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$nid=$_POST['nid'];
	$fee=$_POST['fee'];
	
	$mName=$_POST['motorcycle'];
	$model=$_POST['model'];
	
	$book_date= date('d/m/Y');
	$book_time= time();
	
	$month=date('m')+1;
	$date=date('d');
	$year = date('Y');
	$h_date = $date.'/'.$month.'/'.$year;
	
	$connection=mysqli_connect("localhost","root","","dhaka_motors");
	$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
	$result0=mysqli_query($connection,$query0);
	if($result0){
		$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
		$staffID=$row['staff_ID'];
		
		//$connection=mysqli_connect("localhost","root","","dhaka_motors");
		$query="insert into customer values('','$ownerName','$phone','$email', '$nid','$ownerName','123456')";
		//$query1="update motorcycle_info set cID= LAST_INSERT_ID(), warranty='$warranty' where mID= '$mID'";
		
		
		$query2="insert into pre_booking values('','$mName','$model',NOW(),NOW(),'$h_date',LAST_INSERT_ID(),'1')";
		
		$query4="SELECT MAX(id) as id FROM pre_booking";
		$result4=mysqli_query($connection,$query4);
			if($result4){
			$row=mysqli_fetch_array($result4,MYSQLI_ASSOC);
			$id=$row['id'];
		}
		
		$query3="insert into sale_info values('','','','$fee','$staffID',LAST_INSERT_ID(),'')";
		
		//$query3="update motorcycle_info set saleID= LAST_INSERT_ID() where mID= '$mID'";
		
		$result=mysqli_query($connection,$query);
		
		$result2=mysqli_query($connection,$query2);
		$result3=mysqli_query($connection,$query3);
		
		if($result & $result2 & $result3){
			
			header("location: invoice_pre_book_details.php?id=$id");
			//header 'location:invoice_pre_book_details.php?id="'.$id.'"';
		}
		
	}else{
			mysqli_error($connection);
	}
	
}else if((isset($_POST['book'])) && (isset($_POST['checked']))){
	
	$phone=$_POST['phone'];
	
	$fee=$_POST['fee'];
	
	$mName=$_POST['motorcycle'];
	$model=$_POST['model'];
	
	$book_date= date('d/m/Y');
	$book_time= time();
	
	$month=date('m')+1;
	$date=date('d');
	$year = date('Y');
	$h_date = $date.'/'.$month.'/'.$year;
	
	$connection=mysqli_connect("localhost","root","","dhaka_motors");
	$query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
	$result0=mysqli_query($connection,$query0);
	if($result0){
		$row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
		$staffID=$row['staff_ID'];
		
		$connection=mysqli_connect("localhost","root","","dhaka_motors");
		$query="select * from customer where phone = '$phone'";
			$result=mysqli_query($connection,$query);
			if($result){
				$row=mysqli_fetch_array($result,MYSQLI_ASSOC);
				$cID=$row['cID'];
				$ownerName=$row['name'];
				$email=$row['email'];
				$phone=$row['phone'];
				$nid=$row['nid'];
				
					$query2="insert into pre_booking values('','$mName','$model',NOW(),NOW(),'$h_date','$cID','1')";
					
					$query3="insert into sale_info values('','','','$fee','$staffID',LAST_INSERT_ID(),'')";
					
					$result2=mysqli_query($connection,$query2);
					$result3=mysqli_query($connection,$query3);
					
				$query4="SELECT MAX(id) as id FROM pre_booking";
				$result4=mysqli_query($connection,$query4);
				if($result4){
					$row=mysqli_fetch_array($result4,MYSQLI_ASSOC);
					$id=$row['id'];
				
					if($result2 & $result3){
						header("location: invoice_pre_book_details.php?id=$id");
					}else{
						mysqli_error($connection);
					}
				}else{
					mysqli_error($connection);
				}
			}else{
				mysqli_error($connection);
			}
	}else{
			mysqli_error($connection);
	}
}else{
	mysqli_error($connection);
}			
?>