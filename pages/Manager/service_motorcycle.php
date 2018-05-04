<?php 
include 'layout/head.php';


date_default_timezone_set('Asia/Dhaka');
		$connection=mysqli_connect("localhost","root","","dhaka_motors");
		$mID=$_GET['mID'];
		$query="select * 
				from motorcycle_info m, customer c, sale_info s
				where m.cID=c.cID 
				and m.saleID=s.saleID
				
				and m.mID='$mID'";

		//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
		$result=mysqli_query($connection,$query);
		if($result){
			
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
			$mID=$row['mID'];
			$mType=$row['mType'];
			$mName=$row['mName'];
			$model=$row['model'];
			$engineNo=$row['engineNo'];
			$chassisNo=$row['chassisNo'];
			$cc=$row['cc'];
			$color=$row['color'];
			$price=$row['price'];
			$warranty=$row['warranty'];
			
			
			$name=$row['name'];
			$email=$row['email'];
			$phone=$row['phone'];
			
			$amount = $row['amount'];
			
		//	$percentage = $row['percentage'];
			
			$sale_date= $row['sale_date'];
			$sale_time= $row['sale_time'];
		
		}else{
			echo mysqli_error($connection);
		}

?>
 

  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Service
        <small>Motorcycle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Service</a></li>
        
      </ol>
    </section>


    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Dhaka Motors
            <small class="pull-right"><?php echo  date('d-M-Y');?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          
          <address>
            <strong>Dhaka Motors</strong><br>
            Address: Panthapat<br>
            Phone: 1234567890<br>
            Email: dhaka_motors@gmail.com
          </address>


         <?php 
            $query = "SELECT count(mID) serve from service where mID='$mID'";
                $result=mysqli_query($connection,$query);
                if(mysqli_num_rows($result)>0){
                  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
                  $serve=$row['serve'];
                  $service = 5- $serve;
                }else{
                  $service = 5;
                }
          ?>
          Service Taken : <b> <?php echo 5 - $service?></b><br>
          Service remaining :<b> <?php echo $service?></b>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
         Owner
          <address>
            <strong><?php echo $name;?></strong><br>
            <?php echo $email;?><br>
            <?php echo $phone;?><br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Motorcycle</b><br>
          <br>
          <b>Motorcycle Name: </b> <?php echo $mName. ' ' .$model?><br>
          <b>ID: </b> <?php echo $mID?><br>
          <b>Engine: </b> <?php echo $engineNo?><br>
		  <b>Chassis: </b> <?php echo $chassisNo?><br>
			<b>CC: </b> <?php echo $cc?><br>
			<b>Color: </b> <?php echo $color?><br>
			<br>
			<b>Issue Date : </b> <?php echo $sale_date?><br>
			<b>Issue Time : </b> <?php echo $sale_time?><br>
			<b>Warranty until : </b> <?php echo $warranty?><br>
        </div>
        <!-- /.col -->
      </div>
      

    </section>

    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
                Parts (Warranty Purpose)
          </h2>
                
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
       
        <div class="col-sm-8 invoice-col">
        <!-- <div class="box"> -->
           
            <!-- /.box-header -->
            <!-- <div class="box-body"> -->
            <form role="form" action="serviceManager.php" method="POST">
              <table id="example1" class="table table-striped">
                <thead>
                <tr>
                  <th>Select</th>
                              
                  <th>Type</th>
                  <th>Name</th>
                  <th>Unit Price</th>
                  <th>Quantity</th>
                        </tr>
                        </thead>
                        <tbody>
                  <?php
                    $con=mysqli_connect('localhost','root','','dhaka_motors');
                    $query="select * 
                        from parts_info 
                        ";


                      //$query="select * from stock where branch='Dhaka' and motorcycle_status=0";
                      $result=mysqli_query($con,$query);
                      if(mysqli_num_rows($result)>0){
                        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                        echo "<tr>";
                        echo "<td> <input value='".$row['parts_id']."' type='checkbox' name='num[]'> </td>";												
                        echo "<td>".$row['parts_type']."</td>";
                        echo "<td>".$row['parts_name']."</td>";
                        echo "<td>".$row['price']."</td>";
                        echo "<td><input type='number' name='quantity[".$row['parts_id']."]' max='".$row['quantity']."' min='0'></td>";
                        
                        echo "</tr>";
                            }
                      }
                    ?>
                </tbody>
				
              </table>
            
            <!-- </div> -->
        </div>
        <!-- /.col -->
          <div class="col-sm-4 invoice-col">
            <div class="form-group">
              <input type="hidden" name="mID" value="<?php echo $mID ?>"/>		
              <button type="submit" class="btn btn-lg btn-success btn-block" onclick="return confirm('Are you sure want to Confirm SERVICE?')" name= "service">Service Confirm</button>
            </div>
          </div>
        </div>
      </form>

    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  
 
<?php 
 include 'layout/foot.php';
?>