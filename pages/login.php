<?php 
 include 'layouts/head.php';
 protect_page_redirect();
?>
<div class="content">
	<div class="row" style="margin-top: 50px">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<!-- <div class="panel-heading">
					<h3 class="panel-title">Sign In</h3>
				</div> -->
				<h2 align="center">Sign In</h2>
				<div class="panel-body">  
				  <form role="form" action="loginManager.php" method="POST">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="userName" type="text" autofocus required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Remember Me
								</label>
							</div>
							<div class="form-group">
								<a href="signup.php">Not signed in? Signup here ... </a>
							</div>
							
							<div class="form-group">
								<div id="errorMessege">
										<?php  

											if(isset($_GET['error2']) == true){
												echo 'Login First';
											}
											else if(isset($_GET['error1']) == true){
												echo 'Wrong Username or Password';
											}
											
											
										?>
								</div>
							</div>
							<!-- Change this to a button or input when using this as a form -->
							<input class="btn btn-lg btn-success btn-block" type="submit" id="login" name="login" value="Login">
							
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