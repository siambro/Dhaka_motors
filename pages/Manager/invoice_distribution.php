<?php 
include 'layout/head.php';

date_default_timezone_set('Asia/Dhaka');

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
        <li><a href="#">Distribution</a></li>
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
              <th>Engin</th>
              <th >Colour</th>
              
            </tr>
            </thead>
            <tbody>
               
                <?php 
                
                $id=$_GET['distribution_id'];
                // var_dump($id);
                //  exit;
                $connection=mysqli_connect("localhost","root","","dhaka_motors");

               // , count(distribution_id) as id
                $query="SELECT *, count(m.mID) as id
                    from motorcycle_info m, stock_info s, distribution d, dealers de 
                    where m.sID=s.sID
                    and s.dealer_id=de.ID
                    and de.ID=d.dealer_id
                    and d.distribution_id='".$id."'
                    group by m.mID
                    ";
            
                //$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
                $result=mysqli_query($connection,$query);
                if($result){

                  $q = 0;
                  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){	
                    $branch = $row['dealerName'];   
                    $id=$row['id'];
                    $did=$row['distribution_id'];
                    $mID=$row['mID'];
                   // $qnt = $row['id'];
                    //$phone=$row['phone'];
                    
                    echo "<tr>";
                    echo "<td>".$row['mName']."</td>";												
                    echo "<td>".$row['engineNo']."</td>";
                    echo "<td>".$row['color']."</td>";
                   

                   // echo "<td><input type='number' name='quantity[".$row['parts_id']."]' max='".$row['quantity']."' min='0'></td>";
                   
                    echo "</tr>";
                   $q += $id;
                  }

                }else{
                  echo mysqli_error($connection);
                }
                
                ?>
                
            </tbody>
            
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class = "row" align="center" style="background-color:#33B8FF; color:#33B8FF">  </div>
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
          To
          <address>
            <strong><?php  echo $branch?></strong><br>
            Address: Chittagong<br>
              Phone: 01730176622<br>
              Email: dhaka_motors.ctg@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          Details
          <address>
          Total Vehicle: <strong><?php  echo $q?></strong><br>
           
          </address>
        </div>
        <!-- /.col -->
      </div>
      
     
      <!-- /.row -->
      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
        <?php echo "<a href=print_invoice_distribution.php?distribution_id=$did target=_blank class='btn btn-default'><i class='fa fa-print'></i> Print</a>"?>
         
        </div>
      </div>
    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  
 
<?php 
 include 'layout/foot.php';
?>