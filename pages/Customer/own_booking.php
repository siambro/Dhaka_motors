<?php 
 include 'layout/head.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pre-Book 
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pre-Book</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
			<div class="col-xs-3"></div>
        <div class="col-xs-6">
     
          <div class="box box-primary">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">Booking List</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
					
			<?php
							//Booking 
						$query="select * 
								from pre_booking p, customer c 
								where p.cID=c.cID
								and status=1
								and c.phone='".$_SESSION['userName']."'
								";
								

						//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
						$result=mysqli_query($connection,$query);
						if(mysqli_num_rows($result)>0){
							echo "<table width=100 id='example1' class=table table-dark table-hover>";
							echo "<thead>";
							
							echo "<tr>";
							
							echo "<th>Name</th>";
							echo "<th>Model</th>";
							echo "<th>Delivery Date</th>";
							
							echo "<th>Details</th>";
							
							echo "</tr>";
							echo "</thead>";
							
							while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							echo"<tbody>";
							echo "<tr>";
							echo "<td>".$row['m_name']."</td>";
							echo "<td>".$row['model']."</td>";
							echo "<td>".$row['h_date']."</td>";
							//echo "<td>".$row['color']."</td>";
							echo "<td><a href='customer_pre_book_details.php?id=".$row['id']."'><span class='fa fa-ellipsis-h'></span></a></td>";
							
							
							
						   echo "</tr>";
						   echo "</tbody>";
						   echo "</table>";
							}
						}else{
							echo 'No Bookings';
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