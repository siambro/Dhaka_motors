<?php 
include 'layout/head.php';

                
  date_default_timezone_set('Asia/Dhaka');
  $connection=mysqli_connect("localhost","root","","dhaka_motors");
  $saleID=$_GET['saleID'];
  // $query="select *
  //     from parts_sale ps, parts_info p, sale_info s,  customer c 
  //     where ps.parts_id=p.parts_id
  //     and ps.sale_id=s.saleID
  //     and ps.customer_id= c.cID
  //     and ps.sale_id='$saleID'";

 $query= "select *
    from sale_info s, service sr, motorcycle_info m, customer c, service_type st 
    where s.saleID =sr.sale_id
    and sr.mID=m.mID
    and sr.type_id = st.type_id 
    and m.cID=c.cID
    and s.saleID = '$saleID'
    ";

  //$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
  $result=mysqli_query($connection,$query);
  if($result){
    // $FinalTotal = 0;
    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){	
      
      $mID = $row['mID'];
      $mName=$row['mName'];
      $model=$row['model'];
      $engineNo = $row['engineNo'];
      $chassisNo = $row['chassisNo'];
      $cc = $row['cc'];
      $color = $row['color'];
      $reg = $row['reg'];

      $name = $row['name'];
      $phone = $row['phone'];

      $fee = $row['fee'];
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
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
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
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Dhaka Motors
            <small class="pull-right">Service Invoice: <?php echo  date('d-M-Y');?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <!-- title row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Dhaka Motors</strong><br>
            Address: Panthapat<br>
			Phone: 1234567890<br>
			Email: dhaka_motors@gmail.com
          </address>

            <?php 
            $query = "SELECT count(mID) serve from service where mID='$mID'";
                $result=mysqli_query($connection,$query);
                if(mysqli_num_rows($result)>0){
                  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
                  $serve=$row['serve'];
                  
                }else{
                 mysqli_error($connection);
                }
          ?>
          Service Taken : <b> <?php echo $serve?></b><br>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        Owner
          <address>
            <strong><?php echo $name;?></strong><br>
           
            <?php echo $phone;?><br>
            
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <b>Motorcycle</b><br>
          <br>
          <b>Motorcycle Name: </b> <?php echo $mName. ' ' .$model?><br>
          
          <b>Engine: </b> <?php echo $engineNo?><br>
          <b>Chassis: </b> <?php echo $chassisNo?><br>
          <b>CC: </b> <?php echo $cc?><br>
          <b>Color: </b> <?php echo $color?><br>
          <br>
        
          <b>Registration NO : </b> <?php echo $reg?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <div class="row">
        <div class="col-xs-12 table-responsive">
        <?php
					
         
          $query="select *
              from parts_sale ps, parts_info p, sale_info s
              where ps.parts_id=p.parts_id
              and ps.sale_id=s.saleID
             
              and ps.sale_id='$saleID'";

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
        $FinalTotal =0;
        if(mysqli_num_rows($result)>0){
         
          echo "<table class=table table-dark table-hover>";
          
          echo "<thead>";
          echo "<tr>";
             
          echo "<th>Product Name</th>";
          echo "<th>Quantity</th>";
          echo "<th>Unit price</th>";
          
          echo "<th>Subtotal price</th>";
         
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
            echo "<td>".$row['parts_name']."</td>";
            echo "<td>".$row['qnt']."</td>";
            echo "<td>".$row['price']."</td>";
            $subTotal = $row['qnt']* $row['price'];
            echo "<td>".$subTotal."</td>";

            $FinalTotal += $subTotal;
           
          
            echo "</tr>";
            
          }
          
          echo "</tbody>";
          echo "<tr>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td align=right>Parts Charge-</td>";
          echo "<td>  $FinalTotal</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td align=right>Service Charge-</td>";
          echo "<td>  $fee</td>";
          echo "</tr>";
          echo "<tr>";
          echo "<td></td>";
          echo "<td></td>";
          echo "<td align=right><b>Net Total- </b></td>";
          echo "<td> ". ((int)$fee + (int)$FinalTotal)."</td>";
          echo "</tr>";
          echo "</table>";
        }else{
          
          echo "<table class=table table-dark table-hover>";
          
          echo "<thead>";
           
          echo "</thead>";
            echo"<tbody>";
              echo "<td align=right><b>Service Charge -</b></td>";
              echo "<td align=left><b>  $fee</b></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
              echo "<td></td>";
            echo "</tbody>";
          echo "</table>";
        }
        
          
      ?>
        </div>      
      </div>


      
     

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <?php echo "<a href=print_paid_invoice_service.php?saleID=$saleID target=_blank class='btn btn-default'><i class='fa fa-print'></i> Print</a>"?>
          
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  
 
<?php 
 include 'layout/foot.php';
?>