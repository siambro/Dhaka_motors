<?php 
include 'layout/head.php';

$con=mysqli_connect('localhost','root','','dhaka_motors');
$id=$_GET['id'];
	 $query="select * 
			from pre_booking p, customer c, sale_info s 
			where p.cID=c.cID 
			and p.id= s.pre_book_status 
			and p.id='$id'
			";


		//$query="select * from stock where branch='Dhaka' and motorcycle_status=0";
		$result=mysqli_query($con,$query);
		if(mysqli_num_rows($result)>0){
			while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
				
				
				$m_name = $row['m_name'];
				$model = $row['model'];
				$book_date = $row['book_date'];
				$book_time = $row['book_time'];
				$h_date = $row['h_date'];
				$fee=$row['amount'];
				$name= $row['name'];
				$phone = $row['phone'];
				$email = $row['email'];
				
			}
		}
?>
 
  <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Invoice
        <small>#007612</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="#">Pre-Book</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>

    <div class="pad margin no-print">
      <div class="callout callout-info" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-info"></i> Note:</h4>
        This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
      </div>
    </div>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Dhaka Motors
            <small class="pull-right"><?php echo  date('d-M-Y');?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Dhaka Motors</strong><br>
            Address: Panthapat<br>
			Phone: 1234567890<br>
			Email: dhaka_motors@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
			To
			<br>
			<address>
				<strong><?php echo $name;?>
				</strong><br>
					Email: <?php echo $email;?>	<br>
					Phone: <?php echo $phone;?>	

					
			</address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
			<b>Motorcycle Name: </b><?php echo $m_name?><br>
										
			<br>
			<b>Issue Date : </b> <?php echo $book_date?><br>
			<b>Issue Time : </b> <?php echo $book_time?><br>
			<h3>Handover until : <?php echo $h_date?></h3><br>
											
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
				<th>Product Name</th>
				<th>Qty</th>
				<th>Advance payment</th>
														
            </tr>
            </thead>
            <tbody>
				<tr>
					<td> <?php echo $m_name?> </td>
					<td> 1 </td>
					<td><?php echo $fee. ' Tk'?></td>
				
					
				</tr>
			</tbody>
			
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a href="invoice-print.php" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  
 
<?php 
 include 'layout/foot.php';
?>