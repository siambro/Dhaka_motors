<?php 
 include 'layout/head.php';
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Own Motorcycle
        <small>List</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">List</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <div class="col-md-3"></div>
        <div class="col-md-6">
     
          <div class="box box-primary">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">List</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
			 
              <table class="table table-striped">
                <thead>
                <!-- <tr>
                  <th>Name</th>
                  <th>Model</th>
                  <th>Color</th>
                  <th>Details</th>
                </tr> -->
                </thead>
                <tbody>
                  <?php 
                  $connection=mysqli_connect("localhost","root","","dhaka_motors");
                  $query="select * 
                      from motorcycle_info m, customer c, sale_info s 
                      where m.cID=c.cID 
                      and m.saleID=s.saleID
                      and c.phone='".$_SESSION['userName']."'
                      ";
                      

                  //$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
                  $result=mysqli_query($connection,$query);
                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<tr>";
                    
                                            
                    //echo "<td>".$row['mType']."</td>";
                    echo "<td><a href='invoice_own.php?mID=".$row['mID']."'>".$row['mName'].'  '.$row['model']."</a></td>";
                    // echo "<td>".$row['model']."</td>";
                    echo "<td>".$row['color']."</td>";
                    // echo "<td><a href='invoice_own.php?mID=".$row['mID']."'><span class='fa fa-ellipsis-h'></span></a></td>";
                    
                    
                    
                    echo "</tr>";
                        }
                  }else{
                    echo 'No Motorcycle';
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