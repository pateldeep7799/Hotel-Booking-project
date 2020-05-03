<?php include('server.php');
include('includes/header.php');
     ?>
<div class="text-center">
	
    <div class="login_background_images" style="height:600px">

        <div class="col-md-12 ">
    <div class="container">
	<div class="d-flex justify-content-center d-flex-head">
<?php include('errors.php'); ?>
		<div class="card" style="height:400px">
			<div class="card-header">
				<h3>Sign Up</h3>
			</div>
			<div class="card-body">
				<form method="post" action="register.php">
                    
					<div class="input-group form-group mr-auto">
						<div class="input-group-prepend">
							<span class="input-group-text">Username</span>
						</div>
                        <input type="text" name="username" style="width:320px" required value="<?php echo $username; ?>">
						
					</div>
                    <div class="input-group form-group mr-auto">
						<div class="input-group-prepend">
							<span class="input-group-text">Email Address</span>
						</div>
                        <input type="email"style="width:320px" name="email" required value="<?php echo $email; ?>">
					</div>
					<div class="input-group form-group mr-auto">
						<div class="input-group-prepend">
							<span class="input-group-text">Password</span>
						</div>
						<input type="password" style="width:320px" name="password_1" required>
                    </div>
                    <div class="input-group form-group mr-auto">
						<div class="input-group-prepend">
							<span class="input-group-text">Confirm password</span>
						</div>
						<input type="password" style="width:320px"name="password_2" required>
                    </div>
							<div class="form-group login-button">
						<input type="submit" style=""value="Register" name="reg_user" class="btn float-right login_btn">
                    </div>
                    <div class="input-group form-group mr-auto">
                        <div class="login-bottom-text">
							<span class="input-group-text">Already a member? <a href="login.php">Sign In</a></span>
						</div>
                    </div>
                    <div class="input-group form-group mr-auto">
                        
                    </div>
                    
                  
         </form>
	</div>
			</div>
			
            <div class="clear">&nbsp;</div>
		</div>
	</div>
</div>   

            </div>
    </div>









