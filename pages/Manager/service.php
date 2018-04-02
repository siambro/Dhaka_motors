<?php 
 include 'layout/head.php';

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
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Service</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
	  
        <div class="col-xs-12">
     
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Service</h3>
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
													
													and s.dealer_id=1
													and m.saleID >= 0
													";
											//important query (must be needed)***********
											
													// $query="SELECT *, COUNT(sr.mID)
													// from motorcycle_info m, stock_info s, sale_info si, customer c, service sr 
													// where m.sID=s.sID 
													// and m.cID=c.cID
													// and m.saleID=si.saleID
													// and sr.mID = m.mID
													// and s.dealer_id=0
													// and m.saleID >= 0
													
													// GROUP BY m.mID
													// HAVING COUNT(sr.mID) = 0 
													// ";
									//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
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
											echo "<td><a href='service_motorcycle.php?mID=".$row['mID']."'> Take Service >> </a></td>";
										
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
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php 
 include 'layout/foot.php';
?>