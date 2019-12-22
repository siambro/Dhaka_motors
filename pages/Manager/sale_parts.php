<?php
include 'layout/head.php';

if(isset($_GET['error'])){
    echo "<script>alert('No Motorcycle Selected For Sale')</script>";
}
?>
    <script type="text/javascript">
        function validate(form)
        {
            var num = form.num.value;

            console.log(num);

            fail = validatephone(form.phone.value)
            fail += validatename(form.name.value)

            // fail += validatenum(form.num.value)
            // fail += validatenid(form.nid.value)

            if (fail == "") {
                return true;
            }
            else {
                alert(fail);
            }
            return false ;
        }

        function validatephone(field){
            if (field == "") {
                return "Enter Phone\n";
            }else if (isNaN(field)) {
                return "Enter numeric value in PHONE\n";
            }else if (field.length < 11 || field.length > 11) {
                return "Phone number must be 11 character\n";
            }else if (((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^0-9]/.test(field)){
                return "The Phone No is invalid\n";

            }
            return "";
        }
        function validatename(field) {
            if (field == "") {
                return "Enter Name\n";
            }else if (field.length < 3 || field.length > 10) {
                return "Name length minimum more than 3 character long\n";

            }else if (((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z]/.test(field)){
                return "Name No is invalid\n";

            }
            return "";
        }

        // function validatenum(field) {
        // 	if (field == "") {
        // 		return "Enter Num\n";
        // 	}
        // 	return "";
        // }

    </script>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Dashboard
                <small>Sale Parts</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li class="active">Sale Parts</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <form role="form" action="sale_parts_confirm.1.php" method="POST" onsubmit="return validate(this)">
                    <div class="col-xs-8">


                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Parts</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Select</th>

                                        <th>Type</th>
                                        <th>Name</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $con=mysqli_connect('localhost','root','','dhaka_motors');
                                    $query="select * 
								from parts_info 
								";


                                    //$query="select * from stock where branch='Dhaka' and motorcycle_status=0";
                                    $result=mysqli_query($con,$query);
                                    if(mysqli_num_rows($result)>0){
                                        while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                            echo "<tr>";
                                            echo "<td> <input type='checkbox' name='num[]' class='flat-red' value='".$row['parts_id']."'> </td>";
                                            echo "<td>".$row['parts_type']."</td>";
                                            echo "<td>".$row['parts_name']."</td>";
                                            echo "<td>".$row['price']."</td>";
                                            echo "<td><input type='number' name='quantity[".$row['parts_id']."]' max='".$row['quantity']."' min='1' value='1'></td>";

                                            echo "</tr>";
                                        }
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
                    <div class="col-md-4">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Sale Parts</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">

                                <!-- text input -->
                                <!-- <div class="form-group">
                                  <label>Customer Phone</label>
                                  <input class="form-control" placeholder="Phone" id="phone" name="phone" type="text"  autofocus required>
                                </div>

                                        <div class="form-group">
                                  <label>Customer Name</label>
                                  <input class="form-control" placeholder="Name" id="name" name="name" type="text" autofocus  required>
                                </div> -->


                                <div class="form-group">
                                    <input type="hidden" name="pID" value="<?php echo $row['pID'] ?>"/>
                                    <button type="submit" class="btn btn-lg btn-success btn-block" onclick="return confirm('Are you sure want to Sale?')" name= "sale">Sale</button>
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