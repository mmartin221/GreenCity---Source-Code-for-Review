<!DOCTYPE html>
<html class="no-js">
<head>
	<title>GreenCity</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	

	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animations.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashboard.css" class="color-switcher-link">
	<script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2.min.js"></script>


</head>

<body class="admin">

	<div class="preloader">
		<div class="preloader_image"></div>
	</div>

	<!-- search modal -->
	<div class="modal" tabindex="-1" role="dialog" aria-labelledby="search_modal" id="search_modal">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">
				<i class="rt-icon2-cross2"></i>
			</span>
		</button>
		<div class="widget widget_search">
			<form method="get" class="searchform search-form form-inline" >
				<div class="form-group">
					<input type="text" value="" name="search" class="form-control" placeholder="Search keyword" id="modal-search-input">
				</div>
				<button type="submit" class="theme_button">Search</button>
			</form>
		</div>
	</div>

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="messages_modal">
		<div class="fw-messages-wrap ls with_padding">
			
		</div>
	</div>
	<!-- eof .modal -->

	<!-- Unyson messages modal -->
	<div class="modal fade" tabindex="-1" role="dialog" id="admin_contact_modal">
		<!-- <div class="ls with_padding"> -->
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<form class="with_padding contact-form" method="post">
					<div class="row">
						<div class="col-sm-12">
							<h3>Contact Admin</h3>
							<div class="contact-form-name">
								<label for="name">Full Name
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Full Name">
							</div>
						</div>
						<div class="col-sm-12">
							<div class="contact-form-subject">
								<label for="subject">Subject
									<span class="required">*</span>
								</label>
								<input type="text" aria-required="true" size="30" value="" name="subject" id="subject" class="form-control" placeholder="Subject">
							</div>
						</div>

						<div class="col-sm-12">

							<div class="contact-form-message">
								<label for="message">Message</label>
								<textarea aria-required="true" rows="6" cols="45" name="message" id="message" class="form-control" placeholder="Message"></textarea>
							</div>
						</div>

						<div class="col-sm-12 text-center">
							<div class="contact-form-submit">
								<button type="submit" id="contact_form_submit" name="contact_submit" class="theme_button wide_button color1">Send Message</button>
								<button type="reset" id="contact_form_reset" name="contact_reset" class="theme_button wide_button">Clear Form</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	<div id="canvas">
		<div id="box_wrapper">

		
			<section class="ls section_padding_top_100 section_padding_bottom_100 section_full_height">
				<div class="container">
					<div class="row">
						<div class="col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4 to_animate">
							<div class="with_border with_padding">

								<h4 class="text-center">
									Admin Log In
								</h4>
								<hr class="bottommargin_30">
								<?php $message = $this->session->flashdata('message'); echo (!empty($message) ? $message :''); ?>
								<div class="wrap-forms">
									<form method="post" action="<?php echo base_url(); ?>admin-login-post">
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group has-placeholder">
													<label for="login-email">Email address</label>
													<i class="grey fa fa-envelope-o"></i>
													<input type="email" class="form-control" id="login-email" name="email" placeholder="Email Address">
												</div>

											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="form-group has-placeholder">
													<label for="login-password">Password</label>
													<i class="grey fa fa-pencil-square-o"></i>
													<input type="password" class="form-control" id="login-password" name="password" placeholder="Password">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-sm-12">
												<div class="checkbox">
													<input type="checkbox" id="remember_me_checkbox">
													<label for="remember_me_checkbox">Remember Me
													</label>
												</div>
											</div>
										</div>
										<button type="submit" class="theme_button block_button color1">Log In</button>
									</form>
								</div>

								<div class="darklinks text-center topmargin_20">

									<a role="button" data-toggle="collapse" href="#signin-resend-password" aria-expanded="false" aria-controls="signin-resend-password">
							Forgot your password?
						</a>

								</div>
								<div class="collapse form-inline-button" id="signin-resend-password">
									<form class="form-inline topmargin_20">
										<div class="form-group">
											<label class="sr-only">Enter your e-mail</label>
											<input type="email" class="form-control" placeholder="E-mail">
										</div>
										<button type="submit" class="theme_button with_icon">
											<i class="fa fa-share"></i>
										</button>
									</form>
								</div>


							</div>
							<!-- .with_border -->

							<p class="divider_20 text-center">
					<!-- Not registered? <a href="admin_signup.html">Create an account</a>.<br> -->
					visit <a href="<?php echo base_url(); ?>">Website</a>
				</p>

						</div>
						<!-- .col-* -->
					</div>
					<!-- .row -->
				</div>
				<!-- .container -->
			</section>
		</div>
		<!-- eof #box_wrapper -->
	</div>
	<!-- eof #canvas -->


	


	<!-- template init -->
	<script src="<?php echo base_url(); ?>assets/js/compressed.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/main.js"></script>

	
	<script src="<?php echo base_url(); ?>assets/js/admin/moment.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/admin/fullcalendar.min.js"></script>
	<!-- range picker -->
	<script src="<?php echo base_url(); ?>assets/js/admin/daterangepicker.js"></script>

	<!-- charts -->
	<script src="<?php echo base_url(); ?>assets/js/admin/Chart.bundle.min.js"></script>
	<!-- vector map -->
	<script src="<?php echo base_url(); ?>assets/js/admin/jquery-jvectormap-2.0.3.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/admin/jquery-jvectormap-world-mill.js"></script>
	<!-- small charts -->
	<script src="<?php echo base_url(); ?>assets/js/admin/jquery.sparkline.min.js"></script>

	<!-- dashboard init -->
	<script src="<?php echo base_url(); ?>assets/js/admin.js"></script>

</body>
</html>