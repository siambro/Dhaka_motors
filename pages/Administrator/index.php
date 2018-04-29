<?php 
 include 'layout/head.php';
 
  $query = "select * from sale_info";
  $result = mysqli_query($connection, $query);
  $chart_data = '';
  while($row= mysqli_fetch_array($result)){
    $chart_data .= "{year:'".$row['sale_date']."', amount:".$row['amount']."},";
  }
  $chart_data = substr($chart_data, 0, -2);
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Statistics</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
       
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- <div class="row">
        <div id="chart"></div>
      </div> -->

      <div class= "row">
      <div class="col-md-12">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->

              <?php
                  date_default_timezone_set('Asia/Dhaka');
                  $date=date('m');
                  $month=date('M-Y');
                  $con=mysqli_connect('localhost','root','','dhaka_motors');
                  $query="select count(DISTINCT s.saleID) as count
                          from motorcycle_info m, sale_info s 
                          where m.saleID= s.saleID
                          and MONTH(s.sale_date) = '".$date."'
                          group by s.saleID
                        ";
                      
                  //$query="select count(mID) from motorcycle_info where branch ='Dhaka' and motorcycle_status=0";
                  $result=mysqli_query($con,$query);
                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      $total=$row['count'];
                      // echo "$total";
                    }
                  
                  }else{
                    $total="no";
                  }										
                ?>


            <div class="widget-user-header bg-green-active" align="center">
              <h3 class="widget-user-username"><?php echo "$month";?></h3>
              <!-- <h5 class="widget-user-desc"><?php echo "Total Sale: $total";?></h5> -->
            </div>
            
            <?php
									
                  $con=mysqli_connect('localhost','root','','dhaka_motors');
                  $query="select count(mID) 
                      from motorcycle_info m, stock_info s
                      where m.sID=s.sID 	
                      and s.dealer_id=1
                      and m.saleID=0";
                      
                  //$query="select count(mID) from motorcycle_info where branch ='Dhaka' and motorcycle_status=0";
                  $result=mysqli_query($con,$query);
                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      $total=$row['count(mID)'];
                      // echo "$total";
                    }
                  
                  }else{
                    echo "no";
                  }										
                ?>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo "$total";?></h5>
                    <span class="description-text">Stock</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->

                <?php
									// $date=date('m');
                  // $con=mysqli_connect('localhost','root','','dhaka_motors');
                  $query="select count(DISTINCT s.saleID) as count
                  from motorcycle_info m, sale_info s 
                  where m.saleID= s.saleID
                  and MONTH(s.sale_date) = '".$date."'
                  group by s.saleID";
                      
                  //$query="select count(mID) from motorcycle_info where branch ='Dhaka' and motorcycle_status=0";
                  $result=mysqli_query($con,$query);
                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      $totalsale=$row['count'];
                      // echo "$total";
                    }
                  
                  }else{
                    $totalsale="no";
                  }										
                ?>


                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $totalsale?></h5>
                    <span class="description-text">SALE</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->

                 <?php
									
                  $con=mysqli_connect('localhost','root','','dhaka_motors');
                  $query="select count(parts_id) 
                      from parts_info";
                      
                  //$query="select count(mID) from motorcycle_info where branch ='Dhaka' and motorcycle_status=0";
                  $result=mysqli_query($con,$query);
                  if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      $totalparts=$row['count(parts_id)'];
                      // echo "$total";
                    }
                  
                  }else{
                    echo "no";
                  }										
                ?>
                <div class="col-sm-4">
                  <div class="description-block">
                    <h5 class="description-header"><?php echo $totalparts?></h5>
                    <span class="description-text">Parts</span>
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>
        <!-- /.col -->
      <!-- </div> -->
     
      <!-- <div class="row"> -->
      
      </div>

      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
          
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Motorcycle Stock</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 
              <table class="table table-striped">
                <thead>
                <tr>
				
									<th>Name</th>
									
									<th>Quantity</th>
                </tr>
                </thead>
                <tbody>
					
								<?php 
												$connection=mysqli_connect("localhost","root","","dhaka_motors");
												$query="select mName, count(mID) 
														from motorcycle_info m, stock_info s
														 
														where m.sID=s.sID
														and s.dealer_id=1
														and saleID='0'
														group by mName";
														

												//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
												$result=mysqli_query($connection,$query);
												if(mysqli_num_rows($result)>0){
													while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
													echo "<tr>";
													
																									
													//echo "<td>".$row['mType']."</td>";
													echo "<td><a href=#>".$row['mName']."</a></td>";
													echo "<td> <a href=#>".$row['count(mID)']."</a></td>";
											
													
												   echo "</tr>";
															}
												}else{
													echo mysqli_error($connection);
												}
										
											
											?>
								</tbody>
				
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>

        <!-- <div class="col-md-1"></div> -->
        
        <div class="col-md-5">
          
		
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Parts Stock</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
			 
              <table class="table table-striped">
                <thead>
                <tr>
				
									<th>Name</th>
									
									<th>Quantity</th>
                </tr>
                </thead>
                <tbody>
					
								<?php 
												$connection=mysqli_connect("localhost","root","","dhaka_motors");
												$query="select * 
														from parts_info 
														 ";
														

												//$query="select * from motorcycle_info where branch='Dhaka' and mID='$val'";
												$result=mysqli_query($connection,$query);
												if(mysqli_num_rows($result)>0){
													while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            echo "<tr>";
                            
                                                    
                            //echo "<td>".$row['mType']."</td>";
                            echo "<td><a href=#>".$row['parts_name']."</a></td>";
                            echo "<td><a href=#>".$row['quantity']."</a></td>";
                        
													
												   echo "</tr>";
													}
												}else{
													echo mysqli_error($connection);
												}
										
											
											?>
								</tbody>
				
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      


      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php 
 include 'layout/foot.php';
?>
