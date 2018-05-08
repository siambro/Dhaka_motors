<?php 
 include 'layout/head.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Sale parts
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Sale Parts List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-xs-2"></div>
        <div class="col-xs-8">
     
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Sale Parts List</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 
						<?php
									
									//Booking 
										$query="select *
                    from sale_info s, parts_sale ps, parts_info p 
                    
                    where s.saleID=ps.sale_id
                    and ps.parts_id= p.parts_id
                    
										and ps.sale_id > 0
										group by s.saleID";
											

									//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
									$result=mysqli_query($connection,$query);
									if(mysqli_num_rows($result)>0){
										echo "<table id='example1' class=table table-dark table-hover>";
										echo "<thead>";
										
										echo "<tr>";
										
										echo "<th>Sale ID</th>";
										// echo "<th>Customer Name</th>";
									
										echo "<th>Purchase Date</th>";
										echo "<th>Details</th>";

										echo "</tr>";
										echo "</thead>";
										echo"<tbody>";
										while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
										
											echo "<tr>";
											echo "<td>".$row['saleID']."</td>";
											// echo "<td>".$row['name']."</td>";
											echo "<td>".$row['sale_date']."</td>";
										
											echo "<td><a href='invoice_parts_details.php?saleID=".$row['saleID']."'><span class='fa fa-ellipsis-h'></span></a></td>";
										
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