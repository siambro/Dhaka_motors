<?php 
 include 'layout/head.php';
 
	if(logged_in()==TRUE){
		$conn=mysqli_connect("localhost", "root", "" , "dhaka_motors");	
		$query = "select * from customer where cID = '".$_GET['cID']."'";
		$result=mysqli_query($conn, $query);
		if($result){
			$row=mysqli_fetch_array($result,MYSQLI_ASSOC);	
			$cID=$row['cID'];
			
			$name=$row['name'];
			$phone=$row['phone'];
			$email=$row['email'];
			$nid=$row['nid'];
		
		}
		
	}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Update
        <small>Customer</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Update Customer</li>
      </ol>
    </section>

    <!-- Main content -->
	
	<section class="content">
      <div class="row">
       <!-- /.col -->
       <div class="col-md-4"></div>
        <div class="col-md-4">
        <div class="box box-success">
            <!-- <div class="box-header with-border">
              <h3 class="box-title">General Elements</h3>
            </div> -->
            <!-- /.box-header -->
            <div class="box-body">
              <form role="form" action="update_customerManager.php" method="POST">
               
                <div class="form-group">
                  <label>Name</label>
                  <input type="text" class="form-control" name="name" value="<?php echo $name ?>" placeholder="" required>
                </div><div class="form-group">
                  <label>Phone</label>
                  <input type="text" class="form-control" name="phone" value="<?php echo $phone ?>" placeholder="" required>
                </div><div class="form-group">
                  <label>Email</label>
                  <input type="text" class="form-control" name="email" placeholder="" value="<?php echo $email ?>" required>
                </div><div class="form-group">
                  <label>NID </label>
                  <input type="text" class="form-control" name="nid" placeholder="" value="<?php echo $nid ?>" required>
                
                <div class="form-group">
                  
                  <input type="hidden" class="form-control" name="cID" value="<?php echo $cID ?>" placeholder="" required>
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