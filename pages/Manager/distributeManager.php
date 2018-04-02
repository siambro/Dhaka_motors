<?php

$connect = mysqli_connect("localhost", "root", "", "dhaka_motors");
//$query="update stock set branch='$branch' where mID='$val'"
if(isset($_POST['num']))
	{
		$selected=$_POST['num'];
		$branch=$_POST['branch'];
		
		$query="SELECT * FROM `dealers` WHERE dealerName='$branch'";
		$result = mysqli_query($connect,$query);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				$dealer_id= $row['ID'];
			}
				$query1 = "INSERT INTO distribution values('',NOW(),'$dealer_id')";
				mysqli_query($connect,$query1);
				$query5="SELECT MAX(distribution_id) as id FROM distribution";
				$result5=mysqli_query($connect,$query5);
					if($result5){
					$row=mysqli_fetch_array($result5,MYSQLI_ASSOC);
					$id=$row['id'];
				
			
					while(list($key,$val)=@each($selected))
					{   
					
						$query="UPDATE stock_info s, motorcycle_info m
								SET s.dealer_id='$dealer_id'
								where s.sID=m.sID
								and m.mID='$val'
								";
						mysqli_query($connect,$query);
						
						header("location:invoice_distribution.php?distribution_id=$id");
					
					}
				}
		}else{
			echo mysqli_error($connect);
		}
		
	}else{
		//echo "<script>alert('No Vehicle Selected For Move')</script>";
		header('location: distribute.php?error=1');
	}
	
	

	
	
?>