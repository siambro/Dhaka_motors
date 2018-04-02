<?php 
 include 'layout/head.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Paid Service
        <small>Motorcycle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Service</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
	  		<form role="form" action="paid_serviceManager.php" method="POST">
       		<div class="col-xs-6">
     
						<div class="box box-primary">
							<div class="box-header with-border">
								<h3 class="box-title">Customer Details</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<div class="form-group">
									<label>Customer Phone</label>
									<input class="form-control" placeholder="Phone" id="phone" name="phone" type="text"  autofocus required>
									
									<input type="checkbox" id="check" name="checked" style="display:none">
								</div>
							
									<div class="form-group">
										<label>Customer Name</label>
										<input class="form-control" placeholder="Name" id="name" name="name" type="text" autofocus >
									</div>
									
							
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>


				<div class="col-xs-6">
				
				<div class="box box-warning">
					<div class="box-header with-border">
						<h3 class="box-title">General Elements</h3>
					</div>
					<!-- /.box-header -->
					<div class="box-body">
            
						<div class="form-group">
							<label>Motorcycle Type</label>
							<select class="form-control" name="mType">
								<?php 
											$connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
											$query = "select miType from motorcycle_type" ;	
											$result = mysqli_query($connection, $query);
											if(mysqli_num_rows($result)>0){
												while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
													echo "<option value='".$row['miType']."'>".$row['miType']."</option>";
												}
											}else{
												echo 'No Data';
											}
									?>
							</select>
						</div>
						<div class="form-group">
							<label>Motorcycle Name</label>
							<select class="form-control" name="mName">
								<?php 
										$connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
										$query = "select miName from motorcycle_name" ;	
										$result = mysqli_query($connection, $query);
										if(mysqli_num_rows($result)>0){
											while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
												echo "<option value='".$row['miName']."'>".$row['miName']."</option>";
											}
										}else{
											echo 'No Data';
										}
								?>
							</select>
						</div>
						<div class="form-group">
							<label>Motorcycle Model</label>
							<select class="form-control" name="model">
								<?php 
									$connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
									$query = "select miModel from motorcycle_model" ;	
									$result = mysqli_query($connection, $query);
									if(mysqli_num_rows($result)>0){
										while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
											echo "<option value='".$row['miModel']."'>".$row['miModel']."</option>";
										}
									}else{
										echo 'No Data';
									}
								?>
							</select>
						</div>
				
                <div class="form-group">
                  <label>Engine No</label>
                  <input type="text" class="form-control" name="engineNo" placeholder="" required>
                </div><div class="form-group">
                  <label>Chassis No</label>
                  <input type="text" class="form-control" name="chassisNo" placeholder="" required>
                </div><div class="form-group">
                  <label>CC</label>
                  <input type="text" class="form-control" name="cc" placeholder="" required>
                </div><div class="form-group">
                  <label>Body Color </label>
                  <input type="text" class="form-control" name="color" placeholder="" required>
                </div><div class="form-group">
                  <label>Registration Number </label>
                  <input type="text" class="form-control" name="reg" placeholder="Dhaka Metro LA-12-3456" required>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
		
    </div>
		
	<div class="row">
		<div class="col-md-12">
			 <div class="box-body">	
					
				<div class="form-group">
					<!-- <input type="hidden" name="mID" value="<?php echo $row['mID'] ?>"/>		 -->
					<button type="submit" class="btn btn-lg btn-success btn-block" onclick="return confirm('Are you sure want to Register?')" name="confirm">Confirm</button>
				</div>
											
				</div>
							<!-- /.box-body -->
			</div>
		</div>
		
	</div>
	</form>
</section>
	
	<section class="content-header">
		<h1>
			Paid Service List
			<small>Motorcycle</small>
		</h1>
		
	</section>
	<section class="content">
	<div class="row">
	  
		<div class="col-xs-12">
 
			<div class="box box-primary">
			
				<div class="box-body">
	 
				<?php
			
								//Booking 
							$query="select * 
											from motorcycle_info m, customer c
											
											where m.cID = c.cID 
											and sID = 0
											";
								
							$result=mysqli_query($connection,$query);
							if(mysqli_num_rows($result)>0){
								
								echo "<table id='example1' class=table table-dark table-hover>";
								echo "<thead>";
								
								echo "<tr>";
								
								echo "<th>#</th>";
								echo "<th>Name</th>";
								echo "<th>Model</th>";
								echo "<th>Engine</th>";
								
								echo "<th>Owner Name</th>";
								echo "<th>Service</th>";

								echo "</tr>";
								echo "</thead>";
								echo"<tbody>";

								// $query = "select count(mID) as serve from service where mID='".$row['mID']."'";
								// $result=mysqli_query($connection,$query);
								// if(mysqli_num_rows($result)>0){
								// 	$serve=$row['serve'];
								// 	$service = 5- $serve;
								// }else{
								// 	$service = 0;
								// }

								while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
								
									echo "<tr>";
									echo "<td>".$row['mID']."</td>";
									echo "<td>".$row['mName']."</td>";
									echo "<td>".$row['model']."</td>";
									echo "<td>".$row['engineNo']."</td>";
									echo "<td>".$row['name']."</td>";
									echo "<td><a href='paid_service_motorcycle.php?mID=".$row['mID']."'> Take Service >> </a></td>";
								
									echo "</tr>";
									
								}
								echo "</tbody>";
								echo "</table>";
							}else{
								echo 'No Motorcycle';
							}
							
								
						?>
		
				</div>
				<!-- /.box-body -->
			</div>
			<!-- /.box -->
		</div>
		<!-- /.col -->

</div>
	</section>

</div>
  <!-- /.content-wrapper -->

  
<?php 
 include 'layout/foot.php';
?>