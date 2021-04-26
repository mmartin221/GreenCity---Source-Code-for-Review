<section class="ls with_bottom_border">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ol class="breadcrumb darklinks">
								<li>
									<a href="#">Dashboard</a>
								</li>
								<li class="active">Setting</li>
							</ol>
						</div>
				
					</div>
					
				</div>
				
			</section>

			<section class="ls section_padding_top_50 section_padding_bottom_50 columns_padding_10">
				<div class="container-fluid">

					<div class="row">
						<div class="col-sm-12">
							<h3>Setting
								
							</h3>
						</div>
					</div>
					

					<?php $message = $this->session->flashdata('message'); echo (!empty($message) ? $message :''); ?>
					<form class="form-horizontal" method="post" action="<?php echo base_url(); ?>addsetting">

						<div class="row">
							<div class="col-md-8">
								<div class="with_border with_padding">

									<h4>
										Setting Details
										

									</h4>

									<hr>


									<div class="row form-group">
										<label class="col-lg-3 control-label">Recycling Center Name: </label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="recyclingCenterName" required="" value="<?= $settingDetails['recyclingCenterName'];?>">
										</div>
									</div>
									

									<div class="row form-group">
										<label class="col-lg-3 control-label">Address: </label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="address" id="location_txt" required=""  value="<?= $settingDetails['address'];?>">
											<span class="form-error required" id="err_email"></span>
										</div>
									</div>

								

									<div class="row">
										<div class="col-sm-12 text-right">
											<button type="submit" class="theme_button wide_button">Save Setting</button>
											<a href="<?php echo base_url(); ?>admin-setting" class="theme_button inverse wide_button">Cancel</a>
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
			</section><!-- 



