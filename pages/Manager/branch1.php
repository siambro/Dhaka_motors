<?php 
 include 'layout/head.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Stock
        <small>Motorcycle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Stock Motorcycle</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
	  
        <div class="col-xs-8">
          
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Stock</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
				
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
											and m.saleID = 0";


										//$query="select * from stock where branch='Dhaka' and motorcycle_status=0";
										$result=mysqli_query($con,$query);
										if(mysqli_num_rows($result)>0){
											while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
											echo "<tr>";
											//echo "<td> <input value='".$row['mID']."' type='radio' name='num[]' required</td>";
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
				<div class="col-xs-4">
          
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Motorcycle</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 
              <table class="table table-striped">
                <thead>
                <tr>
				
									<th>Name</th>
									
									<th>Quantity</th>
                </tr>
                </thead>
                <tbody>
					
								<?php 
												$connection=mysqli_connect("localhost","root","","dhaka_motors");
												$query="select mName, count(mID) 
														from motorcycle_info m, stock_info s
														 
														where m.sID=s.sID
														and s.dealer_id=1
														and saleID='0'
														group by mName";
														

												//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
												$result=mysqli_query($connection,$query);
												if(mysqli_num_rows($result)>0){
													while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
													echo "<tr>";
													
																									
													//echo "<td>".$row['mType']."</td>";
													echo "<td><a href=#>".$row['mName']."</a></td>";
													echo "<td> <a href=#>".$row['count(mID)']."</a></td>";
											
													
												   echo "</tr>";
															}
												}else{
													echo mysqli_error($connection);
												}
										
											
											?>
								</tbody>
				
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
	</section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  
<?php 
 include 'layout/foot.php';
?>