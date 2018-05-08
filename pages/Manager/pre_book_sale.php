<?php 
 include 'layout/head.php';
 
if(isset($_GET['error'])){
	echo "<script>alert('No Motorcycle Selected For Sale')</script>";
}
if(isset($_GET['cID'])&& ($_GET['id'])){
	$conn=mysqli_connect("localhost", "root", "" , "dhaka_motors");	
	$query = "select * from customer where cID = '".$_GET['cID']."'";
	$result=mysqli_query($conn, $query);
	if($result){
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
		$name1=$row['name'];
		$phone1=$row['phone'];
		//$email1=$row['email'];
		//$nid1=$row['nid'];
		
	}
	
}

$conn=mysqli_connect("localhost", "root", "" , "dhaka_motors");	
	$query = "select * from pre_booking where id = '".$_GET['id']."'";
	$result=mysqli_query($conn, $query);
	if($result){
		$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
		
		$m_name=$row['m_name'];
		
	}	
						

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Sale Motorcycle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Sale Motorcycle</li>
      </ol>
    </section>
	
	<?php if($_GET){?>
		<div class="pad margin no-print">
		  <div class="callout callout-info" style="margin-bottom: 0!important;">
			<h4><i class="fa fa-info"></i> Information:</h4>
				Motorcycle : <?php echo $m_name?><br>
				Customer : <?php echo $name1?>
		  </div>
		</div>
	<?php
	}
	?>
    <!-- Main content -->
    <section class="content">
      <div class="row">
	  <form role="form" action="sale_pre_book_motorcycleManager.php" method="POST">
        <div class="col-xs-8">
          
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Motorcycle</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Select</th>
					<th>Engin</th>
					<th>Name</th>
					<th>Model</th>
					<th>Color</th>
                </tr>
                </thead>
                <tbody>
					
					<?php
					
					
					
					
					 $con=mysqli_connect('localhost','root','','dhaka_motors');
					 $query="select * 
							from motorcycle_info m, stock_info s 
							where m.sID=s.sID 
							and s.dealer_id=1
							and m.saleID = 0
							and m.mName = '$m_name'";


						//$query="select * from stock where branch='Dhaka' and motorcycle_status=0";
						$result=mysqli_query($con,$query);
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							echo "<tr>";
							echo "<td> <input value='".$row['mID']."' type='radio' name='num[]' required</td>";
							//echo "<td>".$row['id']."</td>";
							//echo "<td><img height='100px' width='100px' src=".$row['photo']."></td>";
							
							echo "<td>".$row['engineNo']."</td>";
							echo "<td>".$row['mName']."</td>";
							echo "<td>".$row['model']."</td>";
							//echo "<td>".$row['engineNo']."</td>";
							
							//echo "<td>".$row['chassisNo']."</td>";
							echo "<td>".$row['color']."</td>";
							//echo "<td>".$row['stock_date']."</td>";
							//echo "<td>".$row['stock_time']."</td>";
							//echo "<td>".$row['branch']."</td>";
							
						   echo "</tr>";
									}
						}
					
					?>
				</tbody>
				
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
		<div class="col-md-4">
		<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

				<!-- text input -->
                <div class="form-group">
                  <label>Customer Phone</label>
                  <input class="form-control" placeholder="Phone" id="phone" name="phone" type="text" value="<?php if($_GET) {echo $phone1;} else {echo '';}?>" autofocus required>
                </div>
			
				<div class="form-group">
					<input type="hidden" name="mID" value="<?php echo $row['mID'] ?>"/>		
					<button type="submit" class="btn btn-lg btn-success btn-block" onclick="return confirm('Are you sure want to SALE?')" name= "sale">Sale</button>
				</div>
			
   
                
              
            </div>
			
            <!-- /.box-body -->
          </div>
        </div>
        </form>
      </div>
      <!-- /.row -->
    </section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<?php 
 include 'layout/foot.php';
?>