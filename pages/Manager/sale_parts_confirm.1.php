<?php
include 'layout/head.php';


?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Confirmation
                <small>Sale Parts</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Sale Parts Confirm</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form role="form" action="sale_parts_confirmManager.php" method="POST">
                    <div class="col-xs-12">

                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Parts</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <?php
                                    if (!isset($_POST['num'])){
                                        header('Location: ../');
                                    }
                                ?>
                                <table class="table table-bordered table-striped">
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



                                    if((isset($_POST['sale'])) && (isset($_POST['num']))){

                                        $quan=$_POST['quantity'];
                                        $selected=$_POST['num'];

                                        for($i=0; $i<count($selected); $i++){
                                            echo "<input type='hidden'  value='". $selected[$i] ."'  name='num[]'>";
                                        }

                                        $FinalTotal = 0;

                                        while(list($key,$val)=@each($selected)){

                                            $parts_id=$val;

                                            $connection=mysqli_connect("localhost", "root", "", "dhaka_motors");
                                            $query="SELECT * FROM parts_info WHERE parts_id='$parts_id'";
                                            $result=mysqli_query($connection,$query);


                                            if(mysqli_num_rows($result)>0){

                                                while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                                    $parts_id=$row['parts_id'];
                                                    $price=$row['price'];
                                                    //$quantity=$row['quantity'];

                                                    echo "<tr>";

                                                    echo "<td><input type='text' style='border:none' readonly value='".$row['parts_name']."'  name='pname'></td>";
                                                    echo "<td><input type='text' style='border:none' readonly value='".$quan[$parts_id]."'  name='quantity[$parts_id]'></td>";

                                                    $subTotal= $price * $quan[$parts_id];

                                                    echo "<td><input type='text' style='border:none' readonly value='$price'  name='price' ></td>";
                                                    echo "<td><input type='number' style='border:none' value='$subTotal' name='subTotal' readonly></td>";
                                                    $FinalTotal += $subTotal;


                                                    echo "<input type='hidden'  value='$FinalTotal' name='finalTotal'>";
                                                    echo " </tr>";
                                                    //$total = array_sum('sub');

                                                }
                                            }
                                        }

                                    }
                                    else if((isset($_POST['sale'])) && (!isset($_POST['num']))){
                                        header('Location: ../');
                                    }
                                    else{
                                        header('Location: ../');
                                    } ?>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td> <?php echo 'Total - <b>'.$FinalTotal. 'Tk</b>'?></td>
                                    </tr>
                                    </tbody>

                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
            </div>

            <div class="row">
                <div class="col-md-12">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <button type="submit" class="btn btn-lg btn-success btn-block" onclick="return confirm('Are you sure want to Confirm?')" name= "confirm">Confirm</button>
                    </div>

                </div>

                <!-- /.box-body -->
            </div>
    </div>
    </form>
    </div>
    <!-- /.row -->
    </section>

    <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

<?php
include 'layout/foot.php';
?>