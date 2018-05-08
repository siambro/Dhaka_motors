<?php 
 include 'layout/head.php';
 
if(isset($_GET['error'])){
	echo "<script>alert('No Motorcycle Selected For Move')</script>";
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Distribute Motorcycle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Distribute Motorcycle</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
				<form role="form" action="distribute_confirm.php" method="POST">
						<div class="col-xs-8">
							
				
							<div class="box">
								<!-- <div class="box-header">
									<h3 class="box-title">Motorcycle</h3>
								</div> -->
								<!-- /.box-header -->
								<div class="box-body">
					
									<table id="example1" class="table table-bordered table-striped">
										<thead>
										<tr>
											<th>Select</th>
											<th>Type</th>
											<th>Name</th>
											<th>Model</th>
											<th>Engine</th>
											<th>Classis</th>
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
										and m.saleID =0";

									//$query="select * from stock where branch='Dhaka'  and motorcycle_status=0";
										$result=mysqli_query($con,$query);
										if(mysqli_num_rows($result)>0){
											while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
											echo "<tr>";
											echo "<td> <input value='".$row['mID']."' type='checkbox' name='num[]' </td>";
											//echo "<td>".$row['id']."</td>";
											//echo "<td><img height='100px' width='100px' src=".$row['photo']."></td>";
											
											echo "<td>".$row['mType']."</td>";
											echo "<td>".$row['mName']."</td>";
											echo "<td>".$row['model']."</td>";
											echo "<td>".$row['engineNo']."</td>";
											
											echo "<td>".$row['chassisNo']."</td>";
											echo "<td>".$row['color']."</td>";
											//echo "<td>".$row['stock_date']."</td>";
											//echo "<td>".$row['stock_time']."</td>";
											//echo "<td>".$row['branch']."</td>";
											
											echo "</tr>";
											}
										}else{
									
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
              <h3 class="box-title">Distribute To</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">

				<!-- text input -->
                <div class="form-group">
                  <label>Branch Name</label>
									<select class="form-control" name="branch" required>
									<option value="">Select</option>;
									<?php 
										$connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
										$query = "select dealerName from dealers where ID >1" ;	
										$result = mysqli_query($connection, $query);
										if(mysqli_num_rows($result)>0){
											while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
												
												echo "<option value='".$row['dealerName']."'>".$row['dealerName']."</option>";
											}
										}else{
											echo 'No Data';
										}
									?>
									</select>
								</div>

								<div id="hide">
									<div class="form-group">
										<input type="hidden" name="ID" value="<?php echo $row['ID'] ?>"/>		
										<button type="submit" class="btn btn-lg btn-success btn-block" onclick="return confirm('Are you sure want to Move?')" name= "move">Move</button>
									</div>
								</div>
   
                
              
            </div>
			
            <!-- /.box-body -->
          </div>
        </div>
        </form>
      </div>
      <!-- /.row -->

			<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-8">
							
				
							<div class="box" align="center">
								<div class="box-header">
									<h3 class="box-title">Distribution List</h3>
								</div>
								<!-- /.box-header -->
								<div class="box-body">
					
									<table id="example1" class="table table-striped">
										<thead>
										<tr>
											<th>#</th>
											<th>Date</th>
											<th>To</th>
											<th>Amount</th>
											<th>Details</th>
										</tr>
										</thead>
										<tbody>
									<?php
									$con=mysqli_connect('localhost','root','','dhaka_motors');
									$query="select *, count(s.sID) as amount
													from distribution d, stock_info s, dealers dl
													where d.dealer_id=dl.ID
													and s.dealer_id=dl.ID
													group by d.distribution_id 
													";

									//$query="select * from stock where branch='Dhaka'  and motorcycle_status=0";
										$result=mysqli_query($con,$query);
										if(mysqli_num_rows($result)>0){
											while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
											echo "<tr>";
											
											echo "<td>".$row['distribution_id']."</td>";
											echo "<td>".$row['date']."</td>";
											echo "<td>".$row['dealerName']."</td>";
											echo "<td>".$row['amount']."</td>";
											echo "<td><a href='invoice_distribution.php?distribution_id=".$row['distribution_id']."'><span class='fa fa-ellipsis-h'></span></a></td>";
										
										
											echo "</tr>";
											}
										}else{
									
										}
									?>
								</tbody>
				
              </table>
            </div>
            <!-- /.box-body -->
			</div>

    </section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<?php 
 include 'layout/foot.php';
?>