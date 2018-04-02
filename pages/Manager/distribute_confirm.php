<?php 
 include 'layout/head.php';
	if(isset($_POST['move'])){			
		//$quan=$_POST['quantity'];
		$selected=$_POST['num'];
		$branch=$_POST['branch'];
		$q = 0;				
				
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Confirmation
        <small>Distribution Confirmation</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Distribution Confirmation</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
		<div class="row">
		  <form role="form" action="distributeManager.php" method="POST">
			<div class="col-xs-12">
			
			  <div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Selected Items</h3>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
				 
				  <table class="table table-bordered table-striped">
					<thead>
					<tr>
						<th>Motorcycle Name</th>
						<th>Type</th>
						<th >Model</th>
						<th >Engin</th>
						<th >Chassis</th>
						<th >Color</th>
						
					</tr>
					</thead>
					<tbody>
						<?php
						
						
								
						while(list($key,$val)=@each($selected)){
							
								$m_id=$val;
								
								echo "<input type='hidden' style='border:none' readonly value='$branch'  name='branch'>";
								$connection=mysqli_connect("localhost", "root", "", "dhaka_motors");	
										$query="SELECT *, count(mID) as quantity FROM motorcycle_info WHERE mID='$m_id'";
										$result=mysqli_query($connection,$query);
										
										if(mysqli_num_rows($result)>0){
										
										while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
											
											$m_id=$row['mID'];				
											$quantity=$row['quantity'];		
															
											echo "<tr>";
											echo "<input type='hidden' style='border:none' readonly value='".$row['mID']."'  name='num[]'>";
											echo "<td><input type='text' style='border:none' readonly value='".$row['mName']."'  name='mName'></td>";
											echo "<td><input type='text' style='border:none' readonly value='".$row['mType']."'  name='mType'></td>";
											echo "<td><input type='text' style='border:none' readonly value='".$row['model']."'  name='model'></td>";
											echo "<td><input type='text' style='border:none' readonly value='".$row['engineNo']."'  name='enginNo'></td>";
											echo "<td><input type='text' style='border:none' readonly value='".$row['chassisNo']."'  name='chassisNo'></td>";
											echo "<td><input type='text' style='border:none' readonly value='".$row['color']."'  name='color'></td>";
											//echo "<td><input type='text' style='border:none' readonly value='".$row['quantity']."'  name='quantity'></td>";
											$q +=$quantity;
											echo " </tr>";
																						
									}
								}
							}
																
						}else{
							header('location: distribute.php?error=1');
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
			
		</div>
			
		<div class="row">
			<?php if($_POST){?>
				<div class="pad margin no-print">
				  <div class="callout callout-info" style="margin-bottom: 0!important;">
					<h4><i class="fa fa-info"></i> Information:</h4>
						Distributed TO : <?php echo $branch?><br>
					
						Total Motorcycle : <?php echo $q?>
				  </div>
				</div>
			<?php
			}
			?>
		</div>
		<div class="row">
			<div class="col-md-12">
				
				
				<!-- /.box-header -->
				<div class="box-body">	
						
					<div class="form-group">
						<input type="hidden" name="dID" value="<?php echo $row['dID'] ?>"/>		
						<button type="submit" class="btn btn-lg btn-success btn-block" onclick="return confirm('Are you sure want to Confirm?')" name= "confirm">Confirm</button>
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