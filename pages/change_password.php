<?php 
 include 'layouts/head.php';
 protect_page();
?>
<div class="content">
	<div class="row" style="margin-top: 50px">
		<div class="col-md-4 col-md-offset-4 ">
			<div class="login-panel panel panel-default">
				<!-- <div class="panel-heading">
					<h3 class="panel-title">Change Password</h3>
				</div> -->

				<h2 align="center">Change Password</h2>
				<div class="panel-body">  
				
				  <form role="form" action="change_passwordManager.php" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Phone" name="phone" type="text" autofocus required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Old Password" name="o_password" type="password" value="" required>
							</div>

							<div class="form-group">
								<div id="errorMessege">
										<?php  

											if(isset($_GET['error1']) == true){
												echo 'Wrong Old Password entered';
											}
											
											
										?>
								</div>
							</div>


							<div class="form-group">
								<input class="form-control" placeholder="New Password" name="n_password" type="password" value="" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Confirm New Password" name="cn_password" type="password" value="" required>
							</div>
							
							
							
							<!-- Change this to a button or input when using this as a form -->
							<input class="btn btn-lg btn-success btn-block" type="submit" id="login" name="change" value="Change Password">
							
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
 include 'layouts/foot.php';
?>