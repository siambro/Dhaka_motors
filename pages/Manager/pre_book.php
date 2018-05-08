<?php 
 include 'layout/head.php';

?>

<script type="text/javascript">
	function validate(form)
	{
    fail = validatephone(form.phone.value)
    fail += validatemodel(form.model.value)
	 fail += validateprice(form.fee.value)
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
	function validatemodel(field){
		if (field == "") {
			return "Enter Model\n";
		}else if (isNaN(field)) {
			return "Enter numeric value in Model\n";
		}else if (field.length < 4 || field.length > 4) {
			return "Phone number must be 4 character\n";
		}else if (((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9@_-]/.test(field)){
			return "The Phone No is invalid\n";
			
		}
		return "";
	}
	function validateprice(field) {
		if(field==""){
			return "Enter payment\n";
		}
		else if (isNaN(field)) {
			return "Enter Numeric value\n";
			}
		else if(field.length < 6 || field.length > 6 )	{
			return "Payment is not accurate\n";
		}else if (((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) ||/[^0-9]/.test(field)){
			return "The Payment is invalid\n";
			
		}
		return "";
	}

</script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pre-Booking
        <small>Motorcycle</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Pre-Book Confirm</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
	  <form role="form" action="pre_bookManager.php" method="POST" onsubmit="return validate(this)">
        <div class="col-xs-6">
     
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Customer Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<div class="form-group">
				  <label>Customer Phone</label>
				  <input class="form-control" placeholder="Phone" id="phone" name="phone" type="text"  autofocus required>
					
					<input type="checkbox" id="check" name="checked" style="display:none">
                </div>
			<div id="hide">
				<div class="form-group">
                  <label>Customer Name</label>
                  <input class="form-control" placeholder="Name" id="name" name="name" type="text" autofocus >
                </div>
				<div class="form-group">
                  <label>Email</label>
                  <input class="form-control" placeholder="E-mail" id="email" name="email" type="email" autofocus >
                </div>
				<div class="form-group">
                  <label>NID </label>
                  <input class="form-control" placeholder="National ID" id="nid" name="nid" type="number"  autofocus >
                </div>
			</div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
		<div class="col-xs-6">
     
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Motorcycle Details</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
				<div class="form-group" >
					<select class="form-control" name="motorcycle" required>
					<option value="">Select Motorcycle</option>
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
					<input class="form-control" placeholder="Model" id="model" name="model" type="text" autofocus required >
				</div>
				<div class="form-group">
				
					<label></label>
					

				</div>
				<div class="form-group">
					<input class="form-control" placeholder="Booking fees (Tk)" id="fee" name="fee" type="text" autofocus required >
				</div>
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
					
				<div class="form-group">
					<!-- <input type="hidden" name="mID" value="<?php echo $row['mID'] ?>"/>		 -->
					<button type="submit" class="btn btn-lg btn-success btn-block" onclick="return confirm('Are you sure want to book?')" name= "book">Book Now</button>
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
<script>  
 $(document).ready(function(){  
   $('#phone').blur(function(){

	 var phone = $(this).val();

	 $.ajax({
	  url:'check.php',
	  method:"POST",
	  data:{phone_no:phone},
	  success:function(data)
	  {
	   if(data != '0')
	   {
		  //onCheckboxChanged(checked);
		//$('#availability').html('<span class="text-danger">User Exist</span>');
		//$('#name').html('<span class="text-danger">User Exist</span>');
		$("#hide").fadeOut();
		//$("#open").fadeIn();
		 $('#check').attr("checked", true);
	   }
	   else
	   {
		//$('#availability').html('<span class="text-success">User Not Available</span>');
		//$('#register').attr("disabled", false);
		$("#hide").fadeIn();
		 $('#check').attr("checked", false);
	   }
	  }
	 })

  });
 });  
</script>

  
<?php 
 include 'layout/foot.php';
?>