<?php 
include 'layout/head.php';

$connection=mysqli_connect("localhost","root","","dhaka_motors");
		$id=$_GET['id'];
		$query="select * 
				from motorcycle_info m, customer c, sale_info s, pre_booking p 
				where m.cID=c.cID 
				and m.saleID= s.saleID
				and p.id= s.pre_book_status
				and id='$id'";

		//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
		$result=mysqli_query($connection,$query);
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
			$warranty=$row['warranty'];
			
			$amount = $row['amount'];
			$a = $price-$amount;
			
			$name=$row['name'];
			$email=$row['email'];
			$phone=$row['phone'];
			
			$book_date=$row['book_date'];
			
			$sale_date= $row['sale_date'];
			//$sale_time= date('H:i:s a');
		
		}else{
			echo mysqli_error($connection);
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
			<b>Motorcycle Name: </b><?php echo $mName. ' ' .$model.' '. $cc. 'cc'?><br>
			<b>ID: </b> <?php echo $mID?><br/>
			<b>Engine: </b> <?php echo $engineNo?><br>
			<b>Chassis: </b> <?php echo $chassisNo?><br>
		
			<b>Color: </b> <?php echo $color?><br>
			<br>
			<b>Issue Date : </b> <?php echo $sale_date?><br>
			<b>Booked Date : </b> <?php echo $book_date?><br>
			<b></b> <?php //echo $sale_time?><br>
			<b>Warranty until : </b> <?php echo $warranty?><br>
			
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
				<th>Total price</th>
				<th>Payment</th>
				
            </tr>
            </thead>
            <tbody>
				<tr>
					<td> <?php echo $mName?> </td>
					<td> 1 </td>
					<td><?php echo $a. ' Tk'?></td>
					<td><?php echo $price. ' Tk'?></td>
					<td><?php echo $amount. ' Tk'?></td>
														
					
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