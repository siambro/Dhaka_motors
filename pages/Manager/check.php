<?php  
//check.php  
$connect = mysqli_connect("localhost", "root", "", "dhaka_motors"); 
if(isset($_POST["phone_no"]))
{
 $phone = mysqli_real_escape_string($connect, $_POST["phone_no"]);
 
 $query = "SELECT * FROM customer WHERE phone = '".$phone."'";
 $result = mysqli_query($connect, $query);
 echo mysqli_num_rows($result);
}
?>
