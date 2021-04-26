<!DOCTYPE html>
<html class="no-js">
<head>
	<title>GoGreen</title>
	<meta charset="utf-8">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">



	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/animations.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/fonts.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/main.css" class="color-switcher-link">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/dashboard.css" class="color-switcher-link">
	

	<script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2.min.js"></script>
	<style type="text/css">
		select.form-control {
			padding-top: 10px!important;
			padding-bottom: 10px!important;
		}
	</style>

</head>
<?php $user_data = $this->session->userdata('adminLogin'); ?>
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
			<form method="get" class="searchform search-form form-inline" action="http://webdesign-finder.com/html/gogreen/">
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

	<div class="modal fade" tabindex="-1" role="dialog" id="admin_contact_modal">
		<!-- <div class="ls with_padding"> -->
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<form class="with_padding contact-form" >
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

			<!-- template sections -->

			<header class="page_header_side page_header_side_sticked active-slide-side-header ds">
				<div class="side_header_logo ds ms">
					<a href="admin_index.html">
						<span class="logo_text playfair margin_0">
							Green City
						</span>
					</a>
				</div>
				<span class="toggle_menu_side toggler_light header-slide">
					<span></span>
				</span>
				<div class="scrollbar-macosx">
					<div class="side_header_inner">

						<!-- user -->

						<div class="user-menu">


							<ul class="menu-click">
								<li>
									<a href="#">
										<div class="media">
											<div class="media-left media-middle">
												<img src="images/team/01.jpg" alt="">
											</div>
											<div class="media-body media-middle">
												<?php if($user_data['userType'] == 1){ ?>
													<h4>Admin</h4>
													Administrator
												<?php } else { ?>
													<h4><?= $user_data['name']; ?></h4>
													User
												<?php } ?>
												

											</div>

										</div>
									</a>
									<ul>
										
										<li>
											<a href="<?php echo base_url(); ?>admin-logout">
												<i class="fa fa-sign-out"></i>
												Log Out
											</a>
										</li>
									</ul>
								</li>
							</ul>

						</div>

						<!-- main side nav start -->
						<nav class="mainmenu_side_wrapper">
							<h3 class="dark_bg_color">Dashboard</h3>
							<ul class="menu-click">
								<li>
									<a href="<?php echo base_url(); ?>admin-dashboard">
										<i class="fa fa-th-large"></i>
										Dashboard
									</a>

								</li>
							</ul>

							
							<ul class="menu-click">
								

								<?php if($user_data['userType'] == 1){ ?>
									<li>
										<a href="<?php echo base_url(); ?>admin-staff">
											<i class="fa fa-suitcase"></i>
											staff
										</a>
										<ul>
											<li>
												<a href="<?php echo base_url(); ?>admin-staff">
													staff
												</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>add-staff">
													Add staff
												</a>
											</li>

										</ul>
									</li>
										<li>
										<a href="<?php echo base_url(); ?>end-user">
											<i class="fa fa-suitcase"></i>
											User
										</a>
										<ul>
											<li>
												<a href="<?php echo base_url(); ?>end-user">
													User
												</a>
											</li>
											<!-- <li>
												<a href="<?php echo base_url(); ?>add-staff">
													Add User
												</a>
											</li> -->

										</ul>
									</li>

									<li>
										<a href="<?php echo base_url(); ?>order">
											<i class="fa fa-suitcase"></i>
											Order 
										</a>
										<ul>
											<li>
												<a href="<?php echo base_url(); ?>order">
													Order 
												</a>
											</li>
											<!-- <li>
												<a href="<?php echo base_url(); ?>add-user">
													Add User
												</a>
											</li> -->

										</ul>
									</li>
										<li>
										<a href="<?php echo base_url(); ?>admin-timetable">
											<i class="fa fa-suitcase"></i>
											Timetable 
										</a>
										<ul>
											<li>
												<a href="<?php echo base_url(); ?>timetable-List">
													 Timetable
												</a>
											</li>
											<li>
												<a href="<?php echo base_url(); ?>admin-timetable">
													 Add Timetable 
												</a>
											</li>
											

										</ul>
									</li>



								<?php } ?>
								<li>
									<a href="<?php echo base_url(); ?>admin-category">
										<i class="fa fa-suitcase"></i>
										Category
									</a>
									<ul>
										<li>
											<a href="<?php echo base_url(); ?>admin-category">
												Category
											</a>
										</li>
										<li>
											<a href="<?php echo base_url(); ?>add-category">
												Add Category
											</a>
										</li>

									</ul>
								</li>
								<li>
									<a href="">
										<i class="fa fa-suitcase"></i>
										Products
									</a>
									<ul>
										<li>
											<a href="<?php echo base_url(); ?>admin-products">
												Products
											</a>
										</li>
										<li>
											<a href="<?php echo base_url(); ?>add-product">
												Add Product
											</a>
										</li>

									</ul>
								</li>

								
								<li>
									<a href="">
										<i class="fa fa-suitcase"></i>
										Setting
									</a>
									<ul>
										<li>
											<a href="<?php echo base_url(); ?>admin-setting">
												Setting
											</a>
										</li>
										

									</ul>
								</li>
								
									<ul>
										<li>
											<a href="admin_comments.html">
												Comments
											</a>
										</li>
										<li>
											<a href="admin_comment.html">
												Single Comment
											</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="admin_faq.html">
										<i class="fa fa-support"></i>
										FAQ
									</a>
								</li> -->
							</ul>

						</nav>
					

						

					</div>
				</div>
			</header>

			<header class="page_header header_darkgrey">

				<div class="widget widget_search">
					
				</div>


				<div class="pull-right big-header-buttons">
					<ul class="inline-dropdown inline-block">



						<li class="dropdown visible-xs-inline-block">
							<a href="#" class="search_modal_button header-button">
								<i class="fa fa-search grey"></i>
								<span class="header-button-text">Search</span>
							</a>
						</li>
					</ul>
				</div>
				<!-- eof .header_right_buttons -->
			</header>