<?php 
 include 'layout/head.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sale 
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Sale List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
	  
        <div class="col-xs-12">
     
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sale List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 
						<?php
										//Booking 
									$query="select * 
													from motorcycle_info m, stock_info s, sale_info si, customer c
													
													where m.sID=s.sID 
													and m.cID=c.cID
													and m.saleID=si.saleID
													
													and s.dealer_id=0
													and m.saleID >= 0
													";
											

									//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
									$result=mysqli_query($connection,$query);
									if(mysqli_num_rows($result)>0){
										echo "<table id='example1' class=table table-dark table-hover>";
										echo "<thead>";
										
										echo "<tr>";
										
										echo "<th>ID</th>";
										echo "<th>Name</th>";
										echo "<th>Model</th>";
										echo "<th>Engine</th>";
										
										echo "<th>Purchase Date</th>";
										echo "<th>Details</th>";

										echo "</tr>";
										echo "</thead>";
										echo"<tbody>";
										while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
										
											echo "<tr>";
											echo "<td>".$row['mID']."</td>";
											echo "<td>".$row['mName']."</td>";
											echo "<td>".$row['model']."</td>";
											echo "<td>".$row['engineNo']."</td>";
											echo "<td>".$row['sale_date']."</td>";
											echo "<td><a href='invoice.php?mID=".$row['mID']."'><span class='fa fa-ellipsis-h'></span></a></td>";
										
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
		
    </div>
	
    </section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php 
 include 'layout/foot.php';
?>