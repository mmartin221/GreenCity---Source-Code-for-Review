

			<section class="page_breadcrumbs ds parallax section_padding_top_65 section_padding_bottom_65">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="highlight">View location map</h2>
							<ol class="breadcrumb darklinks">
								<li>
									<a href="<?= base_url();?>">
							Home
						</a>
								</li>
								<li>
									<a href="#">Shop</a>
								</li>
								<li class="active">View location map</li>
							</ol>
						</div>
					</div>
				</div>
			</section>

			<section class="ls section_padding_top_100 section_padding_bottom_75">
				<div class="container">
					<div class="row">
						
						<div class="col-sm-12">
								<div class="map_marker_description">
                        <h4><span class="grey">Recycle Center Name:</span> <?= $settingAddress['recyclingCenterName'];?></h4>
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2312.3262572768886!2d-5.92004028411468!3d54.580625080256254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486108e185bc32ed%3A0x22d018bc40d94557!2sOrmeau%20Road%20Recycling%20Centre!5e0!3m2!1sen!2sin!4v1614342287862!5m2!1sen!2sin" width="1200" height="500" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
								</div>
						
						</div>
					</div>

					<div class="row topmargin_40">
						<div class="col-sm-12 to_animate" data-animation="pullDown">
							<div class="teaser text-center">
								<div class="teaser_icon highlight size_normal">
									<i class="rt-icon2-location2"></i>
								</div>

								<p>
                        <span class="grey">Address:</span> <?= $settingAddress['address'];?><br>
                        
                    </p>

							</div>
						</div>
					
					

					</div>

				
				</div>
			</section>
