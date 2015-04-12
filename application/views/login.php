<!DOCTYPE html>
<html lang="en">



<body class="texture">

<div id="cl-wrapper" class="login-container">

	<div class="middle-login">
		<div class="block-flat">
			<div class="header">							
			<h4 style="color:#fff;font-weight: 300;" class="text-center"><img class="logo-img" src="<?php echo base_url('/assets/images/logo.png')?>" width="50px" alt=""/>User Login</h4> 	</div>
			<div>
			     <?php if(strlen($success)>0){
                ?>

               <div class="alert alert-success alert-white rounded">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <div class="icon"><i class="fa fa-times"></i></div>
                
                <strong style="margin-left:50px"> &nbsp;&nbsp;</strong><?php echo $success.' !'; ?>
               </div>

               <?php
                }
                ?>

				<form style="margin-bottom: 0px !important;" class="form-horizontal" <?php echo form_open('user'); ?>
					<div class="content">
						<h3 class="title">Login Access</h3>
				

							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-user"></i></span>
										<input type="text" placeholder="Username" id="username" name = "username" value = "<?php echo set_value('username'); ?>"class="form-control">
									</div>
								</div>
								<div id="username-error"> <?php echo form_error('username'); ?></div>
				
							</div>
							<div class="form-group">
								<div class="col-sm-12">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-lock"></i></span>
										<input type="password" placeholder="Password" id="password" name="password" value="<?php echo set_value("password"); ?>" class="form-control">
									</div>
								</div>

							<div id="password-error"> <?php echo form_error('password'); ?></div>
			
							</div>
							
					</div>
					<div class="foot">
						<a href="<?php echo base_url('index.php/user/register')?>"><button class="btn btn-default" data-dismiss="modal" type="button">Register</button></a>
						<a href="<?php echo base_url('index.php/user/register')?>"><button class="btn btn-success" data-dismiss="modal" type="button">Forgot Password</button></a>
					
						<button class="btn btn-primary" data-dismiss="modal" type="submit">Log me in</button>
					</div>
				</form>
			</div>
		</div>
       	 <div id="copy"><small ><a  style="color:#fff" href="<?php echo base_url(); ?>">ICRAF Intern Management & Capacity Building Information System </a> </small> &nbsp; &copy; <?php echo date('Y'); ?> </div>
		
	</div> 

</div>

