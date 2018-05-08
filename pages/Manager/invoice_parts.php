<?php 
include 'layout/head.php';



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
               
                <?php 
                
                date_default_timezone_set('Asia/Dhaka');
                $connection=mysqli_connect("localhost","root","","dhaka_motors");
                $saleID=$_GET['saleID'];
                $query="select *
                    from parts_sale ps, parts_info p, sale_info s,  customer c 
                    where ps.parts_id=p.parts_id
                    and ps.sale_id=s.saleID
                    and ps.customer_id= c.cID
                    and ps.sale_id='$saleID'";
            
                //$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
                $result=mysqli_query($connection,$query);
                if($result){
                  $FinalTotal = 0;
                  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){	
                        
                    $name=$row['name'];
                    $phone=$row['phone'];
                    
                    echo "<tr>";
                    echo "<td>".$row['parts_name']."</td>";												
                    echo "<td>".$row['qnt']."</td>";
                    echo "<td>".$row['price']."</td>";
                    $subTotal = $row['qnt']*$row['price'];
                    echo "<td>".$subTotal."</td>";
                    // echo "<td><input type='number' name='quantity[".$row['parts_id']."]' max='".$row['quantity']."' min='0'></td>";
                    $FinalTotal += $subTotal;
                    echo "</tr>";
                  }
                }else{
                  echo mysqli_error($connection);
                }
                
                ?>

            </tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td> <?php echo'<b>Total- </b>' .$FinalTotal; ?></td>

        
          </tr>
         
          </table>
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
        <!-- <div class="col-sm-4 invoice-col">
         
        </div> -->
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <!-- <b>Customer</b>
          <br>
			Name : <?php echo $name?><br>
			Phone : <?php echo $phone?><br>
        </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
   
      <!-- /.row -->
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
        <?php echo "<a href=print_invoice_parts.php?saleID=$saleID target=_blank class='btn btn-default'><i class='fa fa-print'></i> Print</a>"?>
         
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  
 
<?php 
 include 'layout/foot.php';
?>