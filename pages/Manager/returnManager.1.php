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
			from parts_info p,parts_sale ps, sale_info s
			where ps.parts_id=p.parts_id
			and ps.sale_id = s.saleID
			
			and p.parts_id='$parts_id'";
		$result=mysqli_query($connection,$query);
		if(mysqli_num_rows($result)>0){
			$price = 0;
			$total = $row['amount'];
			

				while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
					$p=$row['price'];
					$total = $row['amount'];
					$currentstore=$row['quantity'];
					$currentstore += $quantity[$parts_id];
					
					$qnt[$parts_id] -= $quantity[$parts_id];
					
					$tp += $p*$quantity[$parts_id];

					$total -=$tp;

					$query1="UPDATE parts_info set quantity ='$currentstore' where parts_id='$parts_id'";
					$query2="UPDATE parts_sale set qnt ='$qnt[$parts_id]' where parts_id='$parts_id' and sale_id= '$saleID'";
					$query3="UPDATE sale_info set amount ='$total' where saleID= '$saleID'";
					
					$result1=mysqli_query($connection,$query1);
					$result2=mysqli_query($connection,$query2);
					$result3=mysqli_query($connection,$query3);
					if($result1 & $result2 & $result3){
						header("location: invoice_parts_details.php?saleID=$saleID&returned");
					}else{
						echo mysqli_error($connection);
					}
				}
				
		
				
		}else{
			echo mysqli_error($connection);
		}
		
		
	}	
		
}else if((isset($_POST['return'])) && (!isset($_POST['num']))){
	$saleID=$_POST['saleID'];
	header("location: invoice_parts_details.php?saleID=$saleID&error");
}			
?>