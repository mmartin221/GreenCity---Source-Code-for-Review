<section class="ls with_bottom_border">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ol class="breadcrumb darklinks">
								<li>
									<a href="#">Dashboard</a>
								</li>
								<li class="active">Order Details</li>
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
						<div class="col-md-12">
							<h3>Order Details</h3>
						</div>
						<!-- .col-* -->
					</div>
					<!-- .row -->
					<?php $message = $this->session->flashdata('message'); echo (!empty($message) ? $message :''); ?>

							<table style="width: 100">
                                <tbody>
                                  <tr>
                                    <td style="width:30%">User&nbsp;Name</td><td> <?= $getOrderId['name']; ?> </td>
                                  </tr>
                                   <tr>
                                    <td style="width:30%">Order&nbsp;Id</td><td> <?= $getOrderId['orderNumber']; ?> </td>
                                  </tr>
                                  <tr>
                                      <td>Order&nbsp;Date&nbsp;&&nbsp;Time</td><td> <?= $getOrderId['created']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Status:</td><td><span class="label label-success">New</span> </td>
                                  </tr>  
                                  	<?php if($getOrderId['orderDeliverredCollected']==1){?>
                                  <tr>
                                    <td>Order Type:</td><td> Order To Be Delivered</td>
                                  </tr>
                              <?php }else{ ?>
                              	  <tr>
                                    <td>Order Type:</td><td>Order To be Collected</td>
                                  </tr>
                              <?php } ?>
                                  <?php if($getOrderId['orderDeliverredCollected']==2){?>
                                  <tr>
                                    <td>Order Qr:</td><td><a href="<?php echo base_url(); ?>uploads/my_qr/<?= $getOrderId['orderQr']; ?>" download><img src="<?php echo base_url(); ?>uploads/my_qr/<?= $getOrderId['orderQr']; ?>" style="height: 100px"></a></td>
                                  </tr>
                                <?php } ?>

                                 <tr>

                                <?php if($getOrderId['orderDeliverredCollected']==1) {
                                 ?>
                                 <td>Delivery Address</td>
                                   <td><?= $getOrderId['address'];?>,<?= $getOrderId['country'];?>,<?= $getOrderId['townCity'];?>,<?= $getOrderId['postcode'];?></td>
                              <?php } else{?>
                              	 <td>Collection Address</td>
                                   <td><?= $settingAddress['address'];?></td>
                              <?php } ?>
                                  </tr>
                             </tbody>
                         </table>

					<div class="row">
						<div class="col-xs-12">
							<div class="with_border with_padding">

								<div class="row admin-table-filters">
									<div class="col-lg-9">

										<form action="http://webdesign-finder.com/html/gogreen/" class="form-inline filters-form">
											<span>
												<label class="grey" for="with-selected">With Selected:</label>
												<select class="form-control with-selected" name="with-selected" id="with-selected">
													<option value="">-</option>
													<option value="publish">Publish</option>
													<option value="delete">Delete</option>
												</select>
											</span>
											<span>
												<label class="grey" for="orderby">Sort By:</label>
												<select class="form-control orderby" name="orderby" id="orderby">
													<option value="date" selected>Date</option>
													<option value="price">Price</option>
													<option value="title">Title</option>
													<option value="status">Status</option>
												</select>
											</span>

											<span>
												<label class="grey" for="showcount">Show:</label>
												<select class="form-control showcount" name="showcount" id="showcount">
													<option value="10" selected>10</option>
													<option value="20">20</option>
													<option value="30">30</option>
													<option value="50">50</option>
													<option value="100">100</option>
												</select>
											</span>
										</form>

									</div>
									<!-- .col-* -->
									<div class="col-lg-3 text-lg-right">
										<div class="widget widget_search">

											<form method="get" class="searchform" action="http://webdesign-finder.com/html/gogreen/">
												<!-- <div class="form-group-wrap"> -->
												<div class="form-group">
													<label class="sr-only" for="widget-search">Search for:</label>
													<input id="widget-search" type="text" value="" name="search" class="form-control" placeholder="Search Keyword">
												</div>
												<button type="submit" class="theme_button color1">Search</button>
												<!-- </div> -->
											</form>
										</div>

									</div>
									<!-- .col-* -->
								</div>
								<!-- .row -->

								<div class="table-responsive">
									<table class="table table-striped table-bordered">
										<tr>
											<td class="media-middle text-center">
												<input type="checkbox">
											</td>
											
											<th>Product Name:</th>
											<!-- <?php if(!empty($getOrderId['orderDeliverredCollected']==2)){?>
											<th>Collection Address</th>
										<?php } ?> -->

											<th>Quantity:</th>
											<th>Date:</th>
										</tr>

										<?php foreach ($result as $key => $value) { ?>
											<tr class="item-editable">
												<td class="media-middle text-center">
													<input type="checkbox">
												</td>
											<!-- 	<td>
													<div class="media">
														
														<div class="media-body media-middle">
															<h5>
																<a href="javascript:void(0);"><?= $value['user_name']; ?></a>
															</h5>
														</div>
													</div>
												</td> -->

												<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['prodct_name']; ?></time>
												</td>
												<!-- <?php if(!empty($getOrderId['orderDeliverredCollected']==2)){?>
											<td><?= $value['recycleCenterName'];?>,<?= $value['address'];?>,<?= $value['country'];?>,<?= $value['townCity'];?>,<?= $value['postcode'];?></td>
												<?php } ?> -->
												<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['productQuantity']; ?></time>
												</td>
													<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['created']; ?></time>
												</td>
											
												

											</tr>
										<?php } ?>
										

										

									</table>
								</div>
								<!-- .table-responsive -->
							</div>
							<!-- .with_border -->
						</div>
						<!-- .col-* -->
					</div>
					<!-- .row -->
					<div class="row">
						<div class="col-sm-12">
							<div class="row">
								<div class="col-md-6">
									<ul class="pagination highlightlinks">
										<li class="disabled">
											<a href="#">
												<span class="sr-only">Prev</span>
												<i class="fa fa-angle-left" aria-hidden="true"></i>
											</a>
										</li>
										<li class="active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li>
											<a href="#">
												<span class="sr-only">Next</span>
												<i class="fa fa-angle-right" aria-hidden="true"></i>
											</a>
										</li>
									</ul>
								</div>
								<div class="col-md-6 text-md-right">
									Showing 1 to 6 of 12 items
								</div>
							</div>
						</div>
					</div>
					<!-- .row main columns -->
				</div>
				<!-- .container -->
			</section>