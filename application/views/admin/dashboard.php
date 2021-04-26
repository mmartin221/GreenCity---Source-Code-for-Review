

			<section class="ls with_bottom_border">

				<div class="container-fluid">

					<div class="row">

						<div class="col-md-6">

							<ol class="breadcrumb darklinks">

								<li>

									<a href="#">Homepage</a>

								</li>

								<li class="active">Dashboard</li>

							</ol>

						</div>

					</div>

					<!-- .row -->

				</div>

				<!-- .container -->

			</section>



			<section class="ls section_padding_top_50 section_padding_bottom_50 columns_padding_10">

				<div class="container-fluid">



					<div class="row">

						<div class="col-md-4">

							<h3 class="dashboard-page-title">Dashboard

								<small>main page</small>

							</h3>

						</div>




					</div>

					<!-- .row -->

					<!-- .row -->



					<div class="row">

						

						<div class="col-xs-12 col-md-6">



							<div class="with_border with_padding">

								<h4>

									Latest Orders

								</h4>
									
								<div class="admin-scroll-panel scrollbar-macosx">

									<ul class="list1 no-bullets">
									<?php if(!empty($getallOrder)){foreach ($getallOrder as $key => $value) {
										 ?>
										<li class="item-editable small-teaser">

											<div class="media">

												<div class="item-edit-controls darklinks">

													

													<a href="<?= base_url('order-details/'.$value['id']);?>">

														<i class="fa fa-edit"></i>

													</a>

												</div>

												<div class="media-left">

													<div class="teaser_icon label-success fontsize_16">

														<i class="fa fa-shopping-cart"></i>

													</div>

												</div>

												<div class="media-body">

													<h5>

														<?= $value['orderNumber'];?>

													<!-- 	<small>365$</small> -->

													</h5>

													<div>

														<h6><?= $value['name'];?></h6>

														<?= $value['created'];?>

													</div>

												</div>

											</div>

										</li>
									<?php } }else{ ?>
									

											<li>No Records found</li>

										
									<?php } ?>
									</ul>

								</div>
									

								<!-- .admin-scroll-panel -->
								<?php if(!empty($getallOrder)){ ?>
								<div class="text-right greylinks panel-view-all">

									<a href="<?= base_url();?>order">View All</a>

								</div>
							<?php } ?>

							</div>

							<!-- .with_border -->

						</div>


						<div class="col-xs-12 col-md-6">



							<div class="with_border with_padding">

								<h4>

									Latest Events

								</h4>
									
								<div class="admin-scroll-panel scrollbar-macosx">

									<ul class="list1 no-bullets">
									<?php if(!empty($getallTimetable)){foreach ($getallTimetable as $key => $value) {
										 ?>
										<li class="item-editable small-teaser">

											<div class="media">

												<div class="item-edit-controls darklinks">

													

													<a href="<?= base_url('edit-timetable/'.$value['id']);?>">

														<i class="fa fa-edit"></i>

													</a>

												</div>

												<div class="media-left">

													<div class="teaser_icon label-success fontsize_16">

														<i class="fa fa-calendar"></i>

													</div>

												</div>

												<div class="media-body">

													<h5>

														<?= $value['sessionEventName'];?>

													<!-- 	<small>365$</small> -->

													</h5>

													<div>

														<h6><?= $value['recyclingCenterName'];?></h6>

														<?= $value['startDate'];?> <?= $value['startTime'];?> - <?= $value['endDate'];?> <?= $value['endTime'];?>

													</div>

												</div>

											</div>

										</li>
										<?php } }else{ ?>
									
											<li>No Records found</li>
											

										
									<?php } ?>
									
									</ul>

								</div>
								

								<!-- .admin-scroll-panel -->
								<?php if(!empty($getallTimetable)){ ?>
								<div class="text-right greylinks panel-view-all">

									<a href="<?= base_url();?>timetable-List">View All</a>

								</div>
							<?php } ?>

							</div>



						</div>
					</div>



				</div>

				<!-- .container -->

			</section>



			