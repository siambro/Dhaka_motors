<?php 
 include 'layout/head.php';

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pre-Book List
        <small>Booking</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pre-Book</li>
      </ol>
    </section>
    

    <!-- Main content -->
    <section class="content">
    <?php if(isset($_GET['error']) == true){?>
					<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
										<h4><i class="icon fa fa-ban"></i> Alert!</h4>
										Choose Motorcycle first
					</div>
        <?php }?>
      <div class="row">
	  
        <div class="col-xs-12">
     
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Bookings</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 
              <table class="table table-bordered table-striped">
                <thead>
                <tr>
					<th>Booking ID</th>
					<th>Motorcycle Name</th>
					<th>Customer Name</th>
					
					<th>Date</th>
					<th>Advance payment</th>
					<th >Sale</th>
					<th >Details</th>
                </tr>
                </thead>
                <tbody>
					<?php
						 $con=mysqli_connect('localhost','root','','dhaka_motors');
						 $query="select * 
								from pre_booking p, customer c, sale_info s 
								where p.cID=c.cID 
								and p.id= s.pre_book_status 
								and p.status='1'
								";


							//$query="select * from stock where branch='Dhaka' and motorcycle_status=0";
							$result=mysqli_query($con,$query);
							if(mysqli_num_rows($result)>0){
								while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
									echo "<tr>";
									//echo "<td> <input value='".$row['id']."' type='radio' name='num[]' </td>";
									//echo "<td>".$row['id']."</td>";
									//echo "<td><img height='100px' width='100px' src=".$row['photo']."></td>";
									
									echo "<td>".$row['id']."</td>";
									echo "<td>".$row['m_name']."</td>";
									
									echo "<td>".$row['name']."</td>";
									echo "<td>".$row['book_date']."</td>";
									echo "<td>".$row['amount']."</td>";
									echo "<td><a href='pre_book_sale.php?cID=".$row['cID']." && id=".$row['id']."'><span class='fa  fa-chevron-right'></span></a></td>";
									echo "<td><a href='invoice_pre_book_details.php?id=".$row['id']."'><span class='fa fa-ellipsis-h'></span></a></td>";
									//echo "<td>".$row['chassisNo']."</td>";
									//echo "<td>".$row['color']."</td>";
									//echo "<td>".$row['stock_date']."</td>";
									//echo "<td>".$row['stock_time']."</td>";
									//echo "<td>".$row['branch']."</td>";
									
								   echo "</tr>";
								}
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
	
    </section>
	
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<?php 
 include 'layout/foot.php';
?>