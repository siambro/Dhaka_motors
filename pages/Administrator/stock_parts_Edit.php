<?php 
 include 'layout/head.php';
 
	if(logged_in()==TRUE){
		$conn=mysqli_connect("localhost", "root", "" , "dhaka_motors");	
		$query = "select * from motorcycle_info where mID = '".$_GET['mID']."'";
		$result=mysqli_query($conn, $query);
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
		}
		
	}
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
       <!-- /.col -->
		<div class="col-md-4">
		<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="stockUpdate.php" method="POST">
                
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
							echo "<option value='".$row['miType']."' if($mType =='".$row['miType']."') echo selected>".$row['miType']."</option>";
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
							echo "<option value='".$row['miName']."' if($mName =='".$row['miName']."') echo 'selected'>".$row['miName']."</option>";
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
							echo "<option value='".$row['miModel']."' if($model =='".$row['miModel']."') echo selected>".$row['miModel']."</option>";
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
                  <input type="text" class="form-control" name="engineNo" value="<?php echo $engineNo ?>" placeholder="" required>
                </div><div class="form-group">
                  <label>Chassis No</label>
                  <input type="text" class="form-control" name="chassisNo" value="<?php echo $chassisNo ?>" placeholder="" required>
                </div><div class="form-group">
                  <label>CC</label>
                  <input type="text" class="form-control" name="cc" placeholder="" value="<?php echo $cc ?>" required>
                </div><div class="form-group">
                  <label>Body Color </label>
                  <input type="text" class="form-control" name="color" placeholder="" value="<?php echo $color ?>" required>
                </div><div class="form-group">
                  <label>Price</label>
                  <input type="number" class="form-control" name="price" placeholder="" value="<?php echo $price ?>" required>
                </div>
				
				<div class="form-group">
                  
                  <input type="submit" class="btn btn-flat btn-block btn-success" name="update" value="Update">
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