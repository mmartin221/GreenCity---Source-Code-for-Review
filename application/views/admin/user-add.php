<section class="ls with_bottom_border">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ol class="breadcrumb darklinks">
								<li>
									<a href="#">Dashboard</a>
								</li>
								<li class="active">Staff</li>
							</ol>
						</div>
						<!-- .col-* -->
						
						<!-- .col-* -->
					</div>
					<!-- .row -->
				</div>
				<!-- .container -->
			</section>

			<section class="ls section_padding_top_50 section_padding_bottom_50 columns_padding_10">
				<div class="container-fluid">

					<div class="row">
						<div class="col-sm-12">
							<h3>Add Staff
								
							</h3>
						</div>
					</div>
					<!-- .row -->


					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>add-staff" onsubmit="return validateUser()">

						<div class="row">
							<div class="col-md-8">
								<div class="with_border with_padding">

									<h4>
										Staff Details
										

									</h4>

									<hr>


									<div class="row form-group">
										<label class="col-lg-3 control-label">User Name: </label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="name" required="">
										</div>
									</div>
									

									<div class="row form-group">
										<label class="col-lg-3 control-label">Email: </label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="email" id="email" required="" onblur="checkMail()">
											<span class="form-error required" id="err_email"></span>
										</div>
									</div>

									<div class="row form-group">
										<label class="col-lg-3 control-label">Phone: </label>
										<div class="col-lg-9">
											<input type="text" step="0.01" name="phone" class="form-control num_only" required>
										</div>
									</div>

									<div class="row form-group">
										<label class="col-lg-3 control-label">Password: </label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="password" required="">
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 text-right">
											<button type="submit" class="theme_button wide_button">Save Staff</button>
											<a href="<?php echo base_url(); ?>admin-category" class="theme_button inverse wide_button">Cancel</a>
										</div>
									</div>
									<!-- .row  -->

								</div>
								<!-- .with_border -->

							</div>
							<!-- .col-* -->


							


						</div>
						<!-- .row  -->


					</form>

				</div>
				<!-- .container -->
			</section>



