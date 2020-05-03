<?php include('server.php'); 
include('includes/header.php');?>
<div class="text-center">
    <div class="login_background_images">
        <div class="col-md-12 ">
    <div class="container">
	<div class="d-flex justify-content-center h-100 d-flex-head">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
			</div>
			<div class="card-body">
				<form method="post" action="login.php">
					<?php include('errors.php'); ?>
					<div class="input-group form-group mr-auto">
						<div class="input-group-prepend">
							<span class="input-group-text">Email Address</span>
						</div>
						<input type="text" class="form-control" name="emailid" required placeholder="username">
					</div>
					<div class="input-group form-group mr-auto">
						<div class="input-group-prepend">
							<span class="input-group-text">Password</span>
						</div>
						<input type="password" class="form-control " name="password" required placeholder="password">
                    </div>

					<div class="form-group login-button">
						<input type="submit" value="Login" name="login_user" class="btn float-right login_btn">
					</div>
                    
                    <div class="input-group form-group mr-auto">
                        <div class="login-bottom-text">
							<span class="input-group-text">Don't have an account? <a href="register.php">Sign Up</a></span>
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
