<?php
session_start();

if((isset($_POST['return'])) && (isset($_POST['num'])))
{
	$selected=$_POST['num'];
	$quantity=$_POST['quantity'];
	$saleID=$_POST['saleID'];
	$qnt=$_POST['qnt'];

	while(list($key,$val)=@each($selected))
	{
		$parts_id = $val;
			//discount check
		
		$connection=mysqli_connect("localhost","root","","dhaka_motors");
		$query="select * 
			from parts_info 
			where parts_id='$parts_id'";
		$result=mysqli_query($connection,$query);
		if(mysqli_num_rows($result)>0){

			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
			
				$currentstore=$row['quantity'];
				$currentstore += $quantity[$parts_id];
				
				$qnt[$parts_id] -= $quantity[$parts_id];

				$query1="UPDATE parts_info set quantity ='$currentstore' where parts_id='$parts_id'";
				$query2="UPDATE parts_sale set qnt ='$qnt[$parts_id]' where parts_id='$parts_id' and sale_id= '$saleID'";
				$result1=mysqli_query($connection,$query1);
				$result2=mysqli_query($connection,$query2);
				if($result1 & $result2){
					header("location: invoice_parts_details.php?saleID=$saleID&returned");
				}else{
					echo mysqli_error($connection);
				}
			}
			
		}else{
			echo mysqli_error($connection);
		}
		
		//$percent = $percentage*($percentage/100);
		//echo $percent;
		//exit;
		
	}	
		
}else if((isset($_POST['return'])) && (!isset($_POST['num']))){
	$saleID=$_POST['saleID'];
	header("location: invoice_parts_details.php?saleID=$saleID&error");
}			
?>