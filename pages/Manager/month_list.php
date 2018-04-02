<?php 
 include 'layout/head.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sale List 
        <small>Monthly</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Sale List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
	  
        <div class="col-xs-8">
     
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Monthly Sale List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 
						<?php
									date_default_timezone_set('Asia/Dhaka');
									$date=date('m');
									$month=date('M-Y');
									// $con=mysqli_connect('localhost','root','','dhaka_motors');
										//Booking 
									$query="select count(DISTINCT s.saleID) as count, MONTH(s.sale_date) as month
													from motorcycle_info m, sale_info s 
													where m.saleID= s.saleID
													
													group by s.saleID
													";
											

									//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
									$result=mysqli_query($connection,$query);
									if(mysqli_num_rows($result)>0){
										echo "<table id='example1' class=table table-dark table-hover>";
										echo "<thead>";
										
										echo "<tr>";
										
										echo "<th>Sale Month</th>";
										echo "<th>Total (quantity)</th>";
										// echo "<th>Model</th>";
										// echo "<th>Engine</th>";
										
										// echo "<th>Purchase Date</th>";
										echo "<th>Details</th>";

										echo "</tr>";
										echo "</thead>";
										echo"<tbody>";
										while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
										
											echo "<tr>";
											echo "<td>Month ".$row['month']."</td>";
											echo "<td>".$row['count']."</td>";
											// echo "<td>".$row['model']."</td>";
											// echo "<td>".$row['engineNo']."</td>";
											// echo "<td>".$row['sale_date']."</td>";
											echo "<td><a href='month_motorcycle_list.php?sale_date=".$row['month']."'><span class='fa fa-ellipsis-h'></span></a></td>";
										
											echo "</tr>";
											
										}
										echo "</tbody>";
										echo "</table>";
									}else{
										echo 'No Sold Motorcycle';
									}
									
										
								?>
				
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
				<div class="col-xs-4">
     
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">Yearly Sale List</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
			
					<?php
								date_default_timezone_set('Asia/Dhaka');
								$date=date('Y');
								$month=date('M-Y');
								// $con=mysqli_connect('localhost','root','','dhaka_motors');
									//Booking 
								$query="select count(DISTINCT s.saleID) as count, YEAR(s.sale_date) as year
												from motorcycle_info m, sale_info s 
												where m.saleID= s.saleID
												
												group by s.saleID
												";
										

								//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
								$result=mysqli_query($connection,$query);
								if(mysqli_num_rows($result)>0){
									echo "<table class=table table-dark table-hover>";
									echo "<thead>";
									
									echo "<tr>";
									
									echo "<th>Sale Year</th>";
									echo "<th>Total Sale</th>";
									// echo "<th>Model</th>";
									// echo "<th>Engine</th>";
									
									// echo "<th>Purchase Date</th>";
									// echo "<th>Details</th>";

									echo "</tr>";
									echo "</thead>";
									echo"<tbody>";
									while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
									
										echo "<tr>";
										echo "<td>".$row['year']."</td>";
										echo "<td>".$row['count']."</td>";
										// echo "<td>".$row['model']."</td>";
										// echo "<td>".$row['engineNo']."</td>";
										// echo "<td>".$row['sale_date']."</td>";
										// echo "<td><a href='month_motorcycle_list.php?sale_date=".$row['year']."'><span class='fa fa-ellipsis-h'></span></a></td>";
									
										echo "</tr>";
										
									}
									echo "</tbody>";
									echo "</table>";
								}else{
									echo 'No Sold Motorcycle';
								}
								
									
							?>
			
					</div>
					<!-- /.box-body -->
				</div>
				<!-- /.box -->
			</div>
    </div>
	
    </section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php 
 include 'layout/foot.php';
?>