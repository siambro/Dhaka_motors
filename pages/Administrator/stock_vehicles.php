<?php 
 include 'layout/head.php';
 
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

<style>
    .example-modal .modal {
      position: relative;
      top: auto;
      bottom: auto;
      right: auto;
      left: auto;
      display: block;
      z-index: 1;
    }

    .example-modal .modal {
      background: transparent !important;
    }
  </style>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

			<div class="modal modal-success fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Success Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-outline">Save changes</button>
              </div>
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

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
        <div class="col-xs-8">
          

          <div class="box">
            <!-- <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-striped">
                <thead>
                <tr>
                  <th>Type</th>
                  <th>Name</th>
                  <th>Model</th>
                  <th>Engine</th>
                  <th>Chassis</th>
                  <th>CC</th>
                  <th>Color</th>
                  <th>Price</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
                </thead>
                <tbody>
				<script>
					function confirmationDelete(anchor)
					{
					   var conf = confirm('Are you sure want to delete this record?');
					   if(conf)
						  window.location=anchor.attr("href");
					}
				</script>	
					<?php
					 $con=mysqli_connect('localhost','root','','dhaka_motors');


						$query="select * 
						from motorcycle_info m, stock_info s 
						where m.sID=s.sID 
						and s.dealer_id=1
						and m.saleID = 0";
						$result=mysqli_query($con,$query);
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
							echo "<tr>";
							
							
							echo "<td>".$row['mType']."</td>";
							echo "<td>".$row['mName']."</td>";
							echo "<td>".$row['model']."</td>";
							echo "<td>".$row['engineNo']."</td>";
							
							echo "<td>".$row['chassisNo']."</td>";
							echo "<td>".$row['cc']."</td>";
							echo "<td>".$row['color']."</td>";
							echo "<td>".$row['price']."</td>";
							//echo "<td>".$row['stock_date']."</td>";
							//echo "<td>".$row['stock_time']."</td>";
							//echo "<td>".$row['branch']."</td>";
							echo "<td><a href='stockEdit.php?mID=".$row['mID']."'><span class='fa fa-edit'></span></a></td>";
							// <a class='btn btn-app'>
              //   <i class='fa fa-edit' data-toggle='modal' data-target='#modal-success'></i> Edit
							// </a>
							
							// echo "<td><a><span class='fa fa-edit' data-toggle='modal' data-target='#modal-success'></span></a></td>";
							echo "<td><a onclick='javascript:confirmationDelete($(this));return false;' href='stockDelete.php?mID=".$row['mID']."'><span class='fa fa-minus-circle'></span></a></td>";
						   
							
							echo "</tr>";
							}
						}else{
							echo "No Motorcycle Available";
							echo "<br></br>";
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
		<div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="vehicleStockManager.php" method="POST" onsubmit="return validate(this)">
                
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
							echo "<option value='".$row['miType']."'>".$row['miType']."</option>";
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
							echo "<option value='".$row['miName']."'>".$row['miName']."</option>";
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
							echo "<option value='".$row['miModel']."'>".$row['miModel']."</option>";
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
                  <input type="text" class="form-control" name="engineNo" required placeholder="" >
                </div><div class="form-group">
                  <label>Chassis No</label>
                  <input type="text" class="form-control" name="chassisNo" required placeholder="ABC123">
                </div><div class="form-group">
                  <label>CC</label>
                  <input type="text" class="form-control" name="cc" required  placeholder="">
                </div><div class="form-group">
                  <label>Body Color </label>
                  <input type="text" class="form-control" name="color" required  placeholder="">
                </div><div class="form-group">
                  <label>Price</label>
                  <input type="number" class="form-control" name="price" required placeholder="">
                </div>
				
				<div class="form-group">
                  
                  <input type="submit" class="btn btn-flat btn-block btn-success" onclick="return confirm('Are you sure want to add?')" name="add" value="Add">
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