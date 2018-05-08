<?php 
 include 'layout/head.php';
 
?>

<script type="text/javascript">
	function validate(form)
	{
    fail = validatePname(form.pName.value)
    fail += validateprice(form.price.value)
		fail += validatequantity(form.quantity.value)
		
		if (fail == "") {
			return true;
			}
		else { 
			alert(fail); 
		}	
			return false ;
	}
	
  function validatePname(field){
		if (field == "") {
			return "Enter Name\n";
		}else if (field.length < 3) {
			return "Name should be more than 5 characters\n";
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
		else if(field.length < 3 || field.length > 4 )	{
			return "Price is not accurate\n";
		}
		return "";
	}
  function validatequantity(field){
		if (field == "") {
			return "Enter Quantity\n";
		}
    else if (isNaN(field)) {
			return "Enter Numeric value\n";
		}else if (field.length < 1) {
			return "Quantity should be accurate\n";
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
        <small>Parts</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Stock Parts</li>
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
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <tr>
						<th>Edit</th>
						<th>Delete</th>
						
						
						<th>Parts Type</th>
						<th>Parts Name</th>
						<th>Unit price </th>
						<th>Quantity </th>
						
						
				
					</tr>
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
								from parts_info 
								";
						$result=mysqli_query($con,$query);
						if(mysqli_num_rows($result)>0){
							while($row=mysqli_fetch_array($result, MYSQLI_ASSOC)){
								echo "<tr>";
								echo "<td><a href='stock_parts_Edit.php?parts_id=".$row['parts_id']."'><span class='fa fa-edit'></span></a></td>";
								echo "<td><a onclick='javascript:confirmationDelete($(this));return false;' href=stock_parts_Delete.php?parts_id=".$row['parts_id']."><span class='fa fa-minus-circle'></span></a></td>";
								
								echo "<td>".$row['parts_type']."</td>";
								echo "<td>".$row['parts_name']."</td>";
								echo "<td>".$row['price']."</td>";
								echo "<td>".$row['quantity']."</td>";
								
								echo "</tr>";
							}
						}else{
							echo "No Parts Available";
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
		<div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Parts</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="partsStockManager.php" method="POST" onsubmit="return validate(this)">
                
                <!-- select -->
                <div class="form-group">
                  <label>Motorcycle Type</label>
                  <select class="form-control" name="pType" required>
                    <option value="">Select Type</option>;
										<option value="Engine">EngineParts</option>;
										<option value="Body">Body Parts</option>;
                  </select>
                </div>
				
				<!-- text input -->
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="pName" placeholder="" required>
                </div><div class="form-group">
                  <label>Unit price</label>
                  <input type="number" class="form-control" name="price" min="1" placeholder="" required>
                </div><div class="form-group">
                  <label>Quantity</label>
                  <input type="number" class="form-control" name="quantity" min="1" placeholder="" required>
                </div>
				
				<div class="form-group">
                  
                  <input type="submit" class="btn btn-flat btn-block btn-success" onclick="return confirm('Are you sure want to add?')" name="add" value="Add Parts">
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