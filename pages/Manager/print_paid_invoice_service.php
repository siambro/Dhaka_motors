<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dhaka Motors | Manager</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  
  <!-- JQuery for fade -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  
  
  
<?php
	session_start();
	$connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
	include '../functions.php';
	protect_page();
?>
  
  
</head>
<body onload="window.print();">

<?php 


               
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
<div class="wrapper">
     <!-- Main content -->

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
          echo 'No Parts Included';
        }
        
          
      ?>
        </div>      
      </div>

    </section>
    <!-- /.content -->

</div>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="../../bower_components/raphael/raphael.min.js"></script>
<script src="../../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../../bower_components/moment/min/moment.min.js"></script>
<script src="../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>

</body>
</html>
