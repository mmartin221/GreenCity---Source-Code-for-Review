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
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/shop.css" class="color-switcher-link">
	<script src="<?php echo base_url(); ?>assets/js/vendor/modernizr-2.6.2.min.js"></script>

	<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
</head>
<?php $user_data = $this->session->userdata('userLogin'); ?>
<body>
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

	<div id="canvas">
		<div id="box_wrapper">

			<!-- template sections -->

			<section class="page_topline cs two_color section_padding_top_5 section_padding_bottom_5 table_section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-6 text-center text-sm-left">
							<p class="divided-content">
					<span class="medium black">
						<?php if(empty($user_data)) { ?>
							
							Welcome to Belfast City Council
						<?php } ?>
						<?php if(!empty($user_data)) { ?>
							Welcome <?= $user_data['name']; ?>
						<?php } ?>
					</span>
					<a href="#">How to Find Us</a>
					
				</p>
						</div>
						<div class="col-sm-6 text-center text-sm-right">

							<div class="widget widget_search">
								
									<div class="form-group-wrap">
										<div class="form-group margin_0">
											<label class="sr-only" for="topline-search">Search for:</label>
											<input id="topline-search" type="text" value="" name="search" class="form-control" placeholder="Search Keyword">
										</div>
										<button type="submit" class="theme_button">Search</button>
									</div>
								</form>
							</div>

						</div>
					</div>
				</div>
			</section>

			<header class="page_header header_white toggler_xs_right section_padding_20">
				<div class="container-fluid">
					<div class="row">
						<div class="col-sm-12 display_table">
							<div class="header_left_logo display_table_cell">
								<a href="<?php echo base_url(); ?>" class="logo top_logo">
									<img src="<?php echo base_url(); ?>assets/images/logo.png" alt="" style="max-width: 220px;">
									
								</a>
							</div>

							<div class="header_mainmenu display_table_cell text-center">
								<!-- main nav start -->
								<nav class="mainmenu_wrapper">
									<ul class="mainmenu nav sf-menu">
										<li class="<?php if($active == 'home') { echo 'active'; } ?>">
											<a href="<?php echo base_url(); ?>">Home</a>
											
										</li>

										<?php if(!empty($user_data)) { ?>
										<li class="<?php if($active == 'products') { echo 'active'; } ?>">
											<a href="<?php echo base_url(); ?>shop-products">Products</a>
											
										</li>
										<?php } ?>
										
										<li class="<?php if($active == 'Schedule Class'){echo 'active'; } ?>">
											<a href="<?php echo base_url(); ?>timetable">Schedule Class</a>
											
										</li>

										<!-- <li>
											<a href="<?php echo base_url(); ?>/about">About</a>
											
										</li> -->

										<!-- contacts -->
									<!-- 	<li>
											<a href="<?php echo base_url(); ?>/contact">Contact</a>
											
										</li> -->
										<!-- eof contacts -->

										<?php if(!empty($user_data)) { ?>
										<li>
											<a href="javascript:void(0)">My Account</a>
											<ul>
												<li>
													<a href="<?php echo base_url(); ?>my-order">MY Order</a>
												</li>
												<li>
													<a href="<?php echo base_url(); ?>logout">Logout</a>
												</li>
												
												
											</ul>
										</li>

										<?php } ?>

									</ul>
								</nav>
								<!-- eof main nav -->
								<!-- header toggler -->
								<span class="toggle_menu">
									<span></span>
								</span>
							</div>

							

							<div class="header_right_buttons display_table_cell text-right hidden-xs">
								<div class="darklinks">
									<?php if(empty($user_data)) { ?>
										<a href="<?php echo base_url(); ?>login" class="fa fa-user border-icon rounded-icon social-icon"></a>

									<?php } ?>
									<?php if(!empty($user_data)) { 
										$cart = $this->user->getData('cart', array('userId' => $user_data['id']));
									?>
										
										<a href="<?php echo base_url(); ?>cart" class="rt-icon2-cart border-icon rounded-icon social-icon">
											<?php if( count($cart) != 0) { ?>
												<span class="cart-notification"><?php echo count($cart); ?></span>
											<?php } ?>
											
										</a>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</header>