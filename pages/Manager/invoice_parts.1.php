<?php 
include 'layout/head.php';

if(isset($_POST['confirm'])){			
  $name=$_POST['name'];
  $phone=$_POST['phone'];
  
  $quan=$_POST['quantity'];
  $selected=$_POST['num'];
  $finalTotal = $_POST['finalTotal'];
  
  // var_dump($quan);
  // exit;
  // $FinalTotal = 0;
  $query0= "select * from staff_info where userName='".$_SESSION['userName']."'";
  $result0=mysqli_query($connection,$query0);
  if($result0){
    $row=mysqli_fetch_array($result0,MYSQLI_ASSOC);	
    $staffID=$row['staff_ID'];
    
    $query2="insert into sale_info values('',NOW(),NOW(),'$finalTotal','$staffID','','')";
    $result2=mysqli_query($connection,$query2);

    $query5="SELECT MAX(saleID) FROM sale_info";
		$result5=mysqli_query($connection,$query5);
			if($result5){
			$row=mysqli_fetch_array($result5,MYSQLI_ASSOC);
			$id=$row['MAX(saleID)'];
		}

    while(list($key,$val)=@each($selected)){
    
    $parts_id=$val;
    // var_dump($parts_id);
    //   exit;

    //$connection=mysqli_connect("localhost", "root", "", "dhaka_motors");	
      $query="SELECT * FROM parts_info WHERE parts_id=". $parts_id;
      $result=mysqli_query($connection,$query);
      
      if(mysqli_num_rows($result)>0){
        // $i = 0;
        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
          // $parts_id=$row['parts_id'];
          $currentStore = $row['quantity'];
          $currentStore -= $quan[$parts_id];
          // $i++;

            $query="UPDATE parts_info SET quantity='$currentStore' WHERE parts_id='$parts_id'";
                    
            $query3="insert into parts_sale values('', '$parts_id', '$id')";
            
           // $result=mysqli_query($connection,$query);
            // $result1=mysqli_query($connection,$query1);
            $temp = mysqli_query($connection,$query);
           
            $result3=mysqli_query($connection,$query3);
          
        }
      }
    }

  }else{
    mysqli_error($connection);
  }
                      
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
        <li><a href="#">Parts Sale</a></li>
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
         
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #007612</b><br>
          <br>
			Name : <?php echo $_POST['name'];?><br>
			Phone : <?php echo $_POST['phone'];?><br>
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
				<th >Unit price</th>
				<th >Sub total Price</th>
            </tr>
            </thead>
            <tbody>
              <tr>
                
                
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