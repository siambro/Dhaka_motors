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
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Stock Motorcycle</li>
      </ol>
    </section>

    <!-- Main content -->
	
	<section class="content">
      <div class="row">
        <div class="col-xs-8">
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Type</th>
					<th>Name</th>
					<th>Model</th>
					<th>Engine</th>
					<th>Chassis</th>
					<th>CC</th>
					<th>Color</th>
					<th>Price</th>
					<th>Edit</th>
					<th>Delete</th>
                </tr>
                </thead>
                <tbody>
				<script>
					function confirmationDelete(anchor)
					{
					   var conf = confirm('Are you sure want to delete this record?');
					   if(conf)
						  window.location=anchor.attr("href");
					}
				</script>	
					<?php
					 $con=mysqli_connect('localhost','root','','dhaka_motors');


						$query="select * 
						from motorcycle_info m, stock_info s 
						where m.sID=s.sID 
						and s.dealer_id=1
						and m.saleID = 0";
						$result=mysqli_query($con,$query);
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							echo "<tr>";
							
							
							echo "<td>".$row['mType']."</td>";
							echo "<td>".$row['mName']."</td>";
							echo "<td>".$row['model']."</td>";
							echo "<td>".$row['engineNo']."</td>";
							
							echo "<td>".$row['chassisNo']."</td>";
							echo "<td>".$row['cc']."</td>";
							echo "<td>".$row['color']."</td>";
							echo "<td>".$row['price']."</td>";
							//echo "<td>".$row['stock_date']."</td>";
							//echo "<td>".$row['stock_time']."</td>";
							//echo "<td>".$row['branch']."</td>";
							echo "<td><a href='stockEdit.php?mID=".$row['mID']."'><span class='fa fa-edit'></span></a></td>";
							echo "<td><a onclick='javascript:confirmationDelete($(this));return false;' href='stockDelete.php?mID=".$row['mID']."'><span class='fa fa-minus-circle'></span></a></td>";
						   
							
							echo "</tr>";
							}
						}else{
							echo "No Motorcycle Available";
							echo "<br></br>";
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
              <form role="form" action="vehicleStockManager.php" method="POST">
                
                <!-- select -->
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
				<!-- text input -->
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
                  <label>Price</label>
                  <input type="number" class="form-control" name="price" placeholder="" required>
                </div>
				
				<div class="form-group">
                  
                  <input type="submit" class="btn btn-flat btn-block btn-success" onclick="return confirm('Are you sure want to add?')" name="add" value="Add">
                </div>
   
                
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        
      </div>
      <!-- /.row -->
    </section>
	
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php 
 include 'layout/foot.php';
?>