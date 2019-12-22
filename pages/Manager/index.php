<?php
include 'layout/head.php';

?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Dashboard</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3>

                                <?php

                                $con=mysqli_connect('localhost','root','','dhaka_motors');
                                $query="select count(p.id) 
                  from pre_booking p, sale_info s
                  where s.pre_book_status=p.status 	
                  and s.pre_book_status=1
                     ";

                                //$query="select count(mID) from motorcycle_info where branch ='Dhaka' and motorcycle_status=0";
                                $result=mysqli_query($con,$query);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        $total=$row['count(p.id)'];
                                        echo "$total";
                                    }

                                }else{
                                    echo "no";
                                }
                                ?>

                            </h3>

                            <p>Total Booking</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="pre_book_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3>

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
                                        echo "$total";
                                    }

                                }else{
                                    echo "no";
                                }
                                ?>

                            </h3>

                            <p>Total Stock</p>

                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="total_stock.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>
                                <?php

                                $con=mysqli_connect('localhost','root','','dhaka_motors');

                                $query="select count(Distinct(c.cID)) as count
                          from motorcycle_info m, customer c 
                          where m.cID= c.cID";

                                $query="select count(c.cID) as count
                          from motorcycle_info m, customer c 
                          where m.cID= c.cID
                          and m.cID > 0

                        ";

                                //$query="select count(mID) from motorcycle_info where branch ='Dhaka' and motorcycle_status=0";
                                $result=mysqli_query($con,$query);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        $total=$row['count'];
                                        echo "$total";
                                    }

                                }else{
                                    echo "no";
                                }
                                ?>
                            </h3>

                            <p>Total Customer</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="customer_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3>
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
                                        echo "$total";
                                    }

                                }else{
                                    echo "no";
                                }
                                ?>


                            </h3>

                            <p>Total Sale: <?php echo $month?></p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-pie-graph"></i>
                        </div>
                        <a href="month_list.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
            <!-- /.row -->

        </section>
        <!-- /.content -->

        <!-- New content  -->
        <section class="content-header">
            <h1>
                Dealers Account
                <small>Branches</small>
            </h1>
        </section>

        <section class="content">

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="fa fa-motorcycle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Chittagong</span>
                            <span class="info-box-number">
              <?php

              $con=mysqli_connect('localhost','root','','dhaka_motors');
              $query="select count(mID) 
                      from motorcycle_info m, stock_info s
                      where m.sID=s.sID 	
                      and s.dealer_id=2
                      and m.saleID=0";

              //$query="select count(mID) from motorcycle_info where branch ='Dhaka' and motorcycle_status=0";
              $result=mysqli_query($con,$query);
              if(mysqli_num_rows($result)>0){
                  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      $total=$row['count(mID)'];
                      echo "$total";
                  }

              }else{
                  echo "no";
              }
              ?>

              
              </span>
                            <a href="branch2.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="fa fa-motorcycle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Khulna</span>
                            <span class="info-box-number"><?php

                                $con=mysqli_connect('localhost','root','','dhaka_motors');
                                $query="select count(mID) 
                      from motorcycle_info m, stock_info s
                      where m.sID=s.sID 	
                      and s.dealer_id=5
                      and m.saleID=0";

                                //$query="select count(mID) from motorcycle_info where branch ='Dhaka' and motorcycle_status=0";
                                $result=mysqli_query($con,$query);
                                if(mysqli_num_rows($result)>0){
                                    while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        $total=$row['count(mID)'];
                                        echo "$total";
                                    }

                                }else{
                                    echo "no";
                                }
                                ?>
              </span>
                            <a href="branch5.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>

                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix visible-sm-block"></div>

                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-motorcycle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Comilla</span>
                            <span class="info-box-number">
              <?php

              $con=mysqli_connect('localhost','root','','dhaka_motors');
              $query="select count(mID) 
                      from motorcycle_info m, stock_info s
                      where m.sID=s.sID 	
                      and s.dealer_id=3
                      and m.saleID=0";

              //$query="select count(mID) from motorcycle_info where branch ='Dhaka' and motorcycle_status=0";
              $result=mysqli_query($con,$query);
              if(mysqli_num_rows($result)>0){
                  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      $total=$row['count(mID)'];
                      echo "$total";
                  }

              }else{
                  echo "no";
              }
              ?>

              
              </span>
                            <a href="branch3.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow"><i class="fa fa-motorcycle"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Rajshahi</span>
                            <span class="info-box-number">
              <?php

              $con=mysqli_connect('localhost','root','','dhaka_motors');
              $query="select count(mID) 
                      from motorcycle_info m, stock_info s
                      where m.sID=s.sID 	
                      and s.dealer_id=4
                      and m.saleID=0";

              //$query="select count(mID) from motorcycle_info where branch ='Dhaka' and motorcycle_status=0";
              $result=mysqli_query($con,$query);
              if(mysqli_num_rows($result)>0){
                  while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                      $total=$row['count(mID)'];
                      echo "$total";
                  }

              }else{
                  echo "no";
              }
              ?>

              
              </span>
                            <a href="branch4.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

        </section>



    </div>
    <!-- /.content-wrapper -->

<?php
include 'layout/foot.php';
?>