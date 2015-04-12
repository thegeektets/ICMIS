<!DOCTYPE html>
<html lang="en">

<body class="texture">

<div id="cl-wrapper" class="sign-up-container">

	<div class="middle-sign-up">
		<div class="block-flat">
			<div class="header">							
				<h4 class="text-center" style="color:#fff"><img class="logo-img" src="<?php echo base_url('/assets/images/logo.png')?>" alt=""/> Register User</h4>

					
			</div>
			<div>
			<h4 style="color:#B92A22"><?php echo $success ?></h4>
				<form style="margin-bottom: 0px !important;" class="form-horizontal" <?php echo form_open('user/register'); ?>
					<div class="content">
			  
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" name="username"  value="<?php echo set_value('username'); ?>" parsley-trigger="change" parsley-error-container="#nick-error" required placeholder="Username" class="form-control">

          
									</div>
                  <div id="nick-error"> <?php echo form_error('username'); ?></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-envelope"></i></span>
										<input type="email" value="<?php echo set_value('email'); ?>" name="email" parsley-trigger="change" parsley-error-container="#email-error" required placeholder="E-mail" class="form-control">
									</div>
                  <div id="email-error"> <?php echo form_error('email'); ?></div>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-6 col-xs-6">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input id="pass1" type="password" value="<?php echo set_value('password'); ?>" name="password" parsley-error-container="#password-error" placeholder="Password" required class="form-control">
									</div>
                  <div id="password-error"> <?php echo form_error('password'); ?></div>
								</div>
								<div class="col-sm-6 col-xs-6">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input parsley-equalto="#pass1"  name= "cpassword"type="password"  value="<?php echo set_value('cpassword'); ?>" parsley-error-container="#confirmation-error"required placeholder="Confirm Password" class="form-control">
									</div>
                  <div id="confirmation-error"> <?php echo form_error('cpassword'); ?></div>
								</div>
							</div>
            <button class="btn btn-block btn-success btn-rad btn-lg" type="submit">Sign Up</button>
							
					</div>
			  </form>
			</div>
		</div>
		<div id="copy"><small><a  style = "color:#fff" href="<?php echo  base_url('') ;?>"> ICRAF Intern Management and Capacity Building Information System</a></small> &nbsp; &copy; <?php echo date('Y'); ?> </div>
		
	</div> 
	
</div>



