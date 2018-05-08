<?php 
 include 'layout/head.php';
 
	if(logged_in()==TRUE){
		$conn=mysqli_connect("localhost", "root", "" , "dhaka_motors");	
		$query = "select * from motorcycle_info where mID = '".$_GET['mID']."'";
		$result=mysqli_query($conn, $query);
		if($result){
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
			$mID=$row['mID'];
			$mType=$row['mType'];
			$mName=$row['mName'];
			$model=$row['model'];
			$engineNo=$row['engineNo'];
			$chassisNo=$row['chassisNo'];
			$cc=$row['cc'];
			$color=$row['color'];
			$price=$row['price'];
		}
		
	}
?>
<script type="text/javascript">
	function validate(form)
	{
		fail  = validateengineNo(form.engineNo.value)
		fail += validatechassisNo(form.chassisNo.value)
		fail += validatecc(form.cc.value)
		fail += validatecolor(form.color.value)
		fail += validateprice(form.price.value)

    // fail = validatePname(form.pName.value)
	
		
		if (fail == "") {
			return true;
			}
		else { 
			alert(fail); 
		}	
			return false ;
	}
	
	function validateengineNo(field) {
		if (field == "") {
			return "Enter Engine No\n";
		}else if (field.length < 10 || field.length > 10) {
			return "Engine No length minimum 10 character long\n";

		}else if (((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) ||/[^a-zA-Z0-9]/.test(field)){
			return "The Engine No is invalid\n";
			
		}
		return "";
	}
	function validatechassisNo(field) {
		if (field == "") {
			return "Enter chassis No\n";
		}
		else if (field.length < 10 || field.length > 10){
			return "Chassis No length minimum 10 character long\n";
			
		}else if (((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) ||/[^a-zA-Z0-9]/.test(field)){
			return "The Chassis No is invalid\n";
			
		}
		return "";
	}
	function validatecc(field){
		if (field == ""){ 
			return "Enter CC\n";
		}else if (field.length < 3 || field.length > 3) {
			return "CC must be at least 3 characters\n";
		}
		else if (((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) ||/[^0-9]/.test(field)){
			return "The CC is invalid\n";
			
		}
		return "";
	}
	function validatecolor(field){
		if (field == "") {
			return "Enter Color\n";
		}else if (field.length < 3) {
			return "Color must be more than 3 characters\n";
		}else if (!/[a-z]/.test(field) || ! /[A-Z]/.test(field) || /[0-9]/.test(field)) {
			return "Got Numeric value in Color\n";
			}
		return "";
	}
	
	function validateprice(field) {
		if(field==""){
			return "Enter Price\n";
		}
		else if (isNaN(field)) {
			return "Enter Numeric value\n";
			}
		else if(field.length < 6 || field.length > 6 )	{
			return "Price is not accurate\n";
		}else if (((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) ||/[^0-9]/.test(field)){
			return "The Price is invalid\n";
			
		}
		return "";
	}

</script>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Stock
        <small>Motorcycle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Stock Motorcycle</li>
      </ol>
    </section>

    <!-- Main content -->
	
	<section class="content">
      <div class="row">
       <!-- /.col -->
		<div class="col-md-4">
		<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="stockUpdate.php" method="POST" onsubmit="return validate(this)">
                
                <!-- select -->
                <div class="form-group">
                  <label>Motorcycle Type</label>
                  <select class="form-control" name="mType">
                    <?php 
                        $connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
                        $query = "select miType from motorcycle_type" ;	
                        $result = mysqli_query($connection, $query);
                        if(mysqli_num_rows($result)>0){
                          while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            echo "<option value='".$row['miType']."' if('".$row['miType']."'==$mType) echo selected>".$row['miType']."</option>";
                          }
                        }else{
                          echo 'No Data';
                        }
                        ?>
                        </select>
                              </div>
                      <div class="form-group">
                                <label>Motorcycle Name</label>
                                <select class="form-control" name="mName">
                                  <?php 
                        $connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
                        $query = "select miName from motorcycle_name" ;	
                        $result = mysqli_query($connection, $query);
                        if(mysqli_num_rows($result)>0){
                          while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            echo "<option value='".$row['miName']."' if($mName =='".$row['miName']."') echo 'selected'>".$row['miName']."</option>";
                          }
                        }else{
                          echo 'No Data';
                        }
                        ?>
                  </select>
                </div>
				<div class="form-group">
                  <label>Motorcycle Model</label>
                  <select class="form-control" name="model">
                    <?php 
                        $connection = mysqli_connect("localhost", "root", "", "dhaka_motors");
                        $query = "select miModel from motorcycle_model" ;	
                        $result = mysqli_query($connection, $query);
                        if(mysqli_num_rows($result)>0){
                          while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
                            echo "<option value='".$row['miModel']."' if($model =='".$row['miModel']."') echo selected>".$row['miModel']."</option>";
                          }
                        }else{
                          echo 'No Data';
                        }
                        ?>
                                </select>
                              </div>
                      <!-- text input -->
                              <div class="form-group">
                                <label>Engine No</label>
                                <input type="text" class="form-control" name="engineNo" value="<?php echo $engineNo ?>" placeholder="" required>
                              </div><div class="form-group">
                                <label>Chassis No</label>
                                <input type="text" class="form-control" name="chassisNo" value="<?php echo $chassisNo ?>" placeholder="" required>
                              </div><div class="form-group">
                                <label>CC</label>
                                <input type="text" class="form-control" name="cc" placeholder="" value="<?php echo $cc ?>" required>
                              </div><div class="form-group">
                                <label>Body Color </label>
                                <input type="text" class="form-control" name="color" placeholder="" value="<?php echo $color ?>" required>
                              </div><div class="form-group">
                                <label>Price</label>
                                <input type="number" class="form-control" name="price" placeholder="" value="<?php echo $price ?>" required>
                </div>
                <div class="form-group">
                                
                                <input type="hidden" class="form-control" name="mID" value="<?php echo $mID ?>" placeholder="" required>
                              </div>
				<div class="form-group">
                  
                  <input type="submit" class="btn btn-flat btn-block btn-success" name="update" value="Update">
                </div>
   
                
              </form>
            </div>
            <!-- /.box-body -->
          </div>
        </div>
        
      </div>
      <!-- /.row -->
    </section>
	
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 
<?php 
 include 'layout/foot.php';
?>