<section class="ls section_padding_top_25 section_padding_bottom_75 columns_padding_25">
				<div class="container">

					<div class="row">

						<div class="col-sm-10 col-md-10 col-lg-10 col-sm-push-1 col-md-push-1 col-lg-push-1">

							<div class="shop-info">Not Registered?
								<a  href="<?php echo base_url(); ?>register" >Click here to Register</a>
							</div>

							<div  id="registeredForm">
								<form class="checkout with_border with_padding form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>login-post" onsubmit="return validateLogin()">
									<p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>

									<?php $message = $this->session->flashdata('message'); echo (!empty($message) ? $message :''); ?>

									<div class="form-group">
										<label for="username" class="col-sm-3 control-label">
											<span class="grey">Email:</span>
											<span class="required">*</span>
										</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" name="email" id="email">
											<span class="form-error required" id="err_email"></span>
										</div>
									</div>
									<div class="form-group">
										<label for="password" class="col-sm-3 control-label">
											<span class="grey">Password:</span>
											<span class="required">*</span>
										</label>
										<div class="col-sm-9">
											<input class="form-control" type="password" name="password" id="password">
											<span class="form-error required" id="err_password"></span>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-3 col-sm-9">
											
											<input type="submit" class="theme_button color1 topmargin_20" name="login" value="Login">
											<div class="lost_password">
												<a href="#">Lost your password?</a>
											</div>
										</div>
									</div>
								</form>
							</div>

							
						</div>
						<!--eof .col-sm-8 (main content)-->


						


					</div>
				</div>
			</section>

<script type="text/javascript">
	function validateLogin(){ 
		var chk = 1;
		var email 	= $('#email').val();
		
		var password = $('#password').val();
		

		if(email == ''){
			$('#err_email').html('This field is required').show();
			chk = 0;
		} 

		

		if(password == ''){
			$('#err_password').html('This field is required').show();
			chk = 0;
		} 

		
		if(chk == 0){ 
			return false;
		}
		
	}

</script>