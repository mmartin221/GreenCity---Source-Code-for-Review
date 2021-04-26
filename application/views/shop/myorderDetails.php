<section class="page_breadcrumbs ds parallax section_padding_top_65 section_padding_bottom_65">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="highlight">My Orders</h2>
							<ol class="breadcrumb darklinks">
								<li>
									<a href="index.html">
							Home
						</a>
								</li>
								<li>
									<a href="#">Shop</a>
								</li>
								<li class="active">My Orders</li>
							</ol>
						</div>
					</div>
				</div>
			</section>

<?php //echo "<pre>";print_r($getMyOrderId);?>
<?php //echo "<pre>";print_r($result);?>
			<section class="ls section_padding_top_100 section_padding_bottom_75 columns_padding_25">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-8 col-lg-9 col-sm-push-5 col-md-push-4 col-lg-push-3">

							<table style="width: 100">
                                <tbody>
                                	<tr>
                                		 <td style="width:30%">User &nbsp;Name</td><td> <?= $getMyOrderId['name']; ?> </td> 
                                	</tr>
                                  <tr>
                                    <td style="width:30%">Order&nbsp;Id</td><td> <?= $getMyOrderId['orderNumber']; ?> </td>
                                  </tr>
                                  <tr>
                                      <td>Order&nbsp;Date&nbsp;&&nbsp;Time</td><td> <?= $getMyOrderId['created']; ?></td>
                                  </tr>
                                  <tr>
                                    <td>Status:</td><td><span class="label label-success">New</span> </td>
                                  </tr>  
                                  	<?php if($getMyOrderId['orderDeliverredCollected']==1){?>
                                  <tr>
                                    <td>Order Type:</td><td> Order To Be Delivered</td>
                                  </tr>
                              <?php }else{ ?>
                              	  <tr>
                                    <td>Order Type:</td><td>Order To be Collected</td>
                                  </tr>
                              <?php } ?>
                                  <?php if($getMyOrderId['orderDeliverredCollected']==2){?>
                                  <tr>
                                    <td>Order Qr:</td><td><a href="<?php echo base_url(); ?>uploads/my_qr/<?= $getMyOrderId['orderQr']; ?>" download><img src="<?php echo base_url(); ?>uploads/my_qr/<?= $getMyOrderId['orderQr']; ?>" style="height: 100px"></a></td>
                                  </tr>
                                <?php } ?>
                                    <tr>

                                <?php if($getMyOrderId['orderDeliverredCollected']==1) {
                                 ?>
                                 <td>Delivery Address</td>
                                   <td><?= $getMyOrderId['address'];?>,<?= $getMyOrderId['country'];?>,<?= $getMyOrderId['townCity'];?>,<?= $getMyOrderId['postcode'];?></td>
                              <?php }else{  ?>
                              	<td>Collection Address</td>
                              	<td> <?= $settingAddress['address'];?> </td>
                              <?php } ?>
                                  </tr>
                             </tbody>
                         </table>
							<div class="table-responsive">
								<table class="table shop_table cart cart-table">
									<thead>
										<tr>
											<td class="product-info">Product</td>
											
											<?php if(!empty($getMyOrderId['orderDeliverredCollected']==2)){?>
											<th>Collection Address</th>
										<?php } ?> -->
											<td class="product-quantity">Quantity</td>
											<
											
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($result)) {
											foreach ($result as $key => $value) { ?>
												<tr class="cart_item">
													<td class="product-info">
														<div class="media">
															<div class="media-left">
																<a href="javascript:void(0);">
																	<img class="media-object cart-product-image" src="<?php echo base_url(); ?>uploads/<?= $value['image']; ?>" alt="">
																</a>
															</div>
															<div class="media-body">
																<h5 class="media-heading" style="padding-top: 15px;">
																	<a href="javascript:void(0);"><?= $value['name']; ?></a>
																</h5>
																
															</div>
														</div>
													</td>
<!-- 
													
													<?php if(!empty($getMyOrderId['orderDeliverredCollected']==2)){?>
													<td class="product-remove">
														<div class="media-body">
																<h5 class="media-heading"style="padding-top: 15px;" >
																	<a href="javascript:void(0)"><?= $value['recycleCenterName'];?>,<?= $value['address'];?>,<?= $value['country'];?>,<?= $value['townCity'];?>,<?= $value['postcode'];?></a>
																</h5>
																
															</div>
													</td>
													<?php } ?> -->
													<td class="product-remove">
														<div class="media-body">
																<h5 class="media-heading" style="padding-top: 15px;">
																	<a href="javascript:void(0)"><?= $value['productQuantity']; ?></a>
																</h5>
																
															</div>
													</td>

												
												</tr>
											<?php }

										} ?>
										

										
									</tbody>
								</table>
							</div>

							

							<div class="widget widget_categories">

								<h3 class="widget-title poppins">All Categories</h3>
								<ul class="greylinks">
									<?php foreach ($categoryList as $key => $value) { ?>
										<li>
											<a href="javascript:void(0);" title=""><?= $value['name']; ?></a>
										</li>
									<?php } ?>
									
								</ul>
							</div>

							<div class="widget widget_tabs widget_theme_post_tabs half-tabs">


								<!-- Nav tabs -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="active"><a href="#widget-tab4" role="tab" data-toggle="tab">popular</a></li>
									<li><a href="#widget-tab5" role="tab" data-toggle="tab">Recent</a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content top-color-border">


									<div class="tab-pane fade in active" id="widget-tab4">
										<ul class="cart_list product_list_widget media-list darklinks">
											<?php if(!empty($leftpopularimages)){foreach ($leftpopularimages as $key => $value) {

										 ?>
											<li class="media">
												<div class="media-left media-middle">
													<a href="<?php echo base_url(); ?>product-details/<?= $value['id']; ?>">
														<img src="<?php echo base_url(); ?>uploads/<?= $value['image']; ?>" class="with_background" alt="">
													</a>
												</div>

												<div class="media-body media-middle">
													<h4>
														<a href="javascript:void(0);"><?= $value['name']; ?></a>
													</h4>
													<span class="quantity bold">
														<span class="amount highlight">Stock <?= $value['quantity']; ?></span>
													</span>
												</div>
											</li>
										<?php } } ?>
									


									<div class="tab-pane fade" id="widget-tab5">
										<ul class="cart_list product_list_widget media-list darklinks">
												<?php if(!empty($leftRecentimages)){foreach ($leftRecentimages as $key => $value) {
													
										 ?>
											<li class="media">
												<div class="media-left media-middle">
													<a href="<?php echo base_url(); ?>product-details/<?= $value['id']; ?>">
														<img src="<?php echo base_url(); ?>uploads/<?= $value['image']; ?>" class="with_background" alt="">
													</a>
												</div>

												<div class="media-body media-middle">
													<h4>
														<a href="javascript:void(0);"><?= $value['name']; ?></a>
													</h4>
													<span class="quantity bold">
														<span class="amount highlight">Stock <?= $value['quantity']; ?></span>
													</span>
												</div>
											</li>
										<?php } } ?>
											
											<li class="media">
												<div class="media-left media-middle">
													<a href="shop-product-right.html">
														<img src="<?php echo base_url(); ?>assets/images/shop/06.png" class="with_background" alt="">
													</a>
												</div>

												<div class="media-body media-middle">
													<h4>
														<a href="shop-product-right.html">Quis autem vel eum</a>
													</h4>
													<span class="quantity bold">
														<span class="amount highlight">$36.56</span>
													</span>
												</div>
											</li> -->
										</ul>
									</div>
									<!-- eof tab -->


									<div class="tab-pane fade" id="widget-tab6">
										<div class="vertical-item">
											<div class="item-media">
												<img src="<?php echo base_url(); ?>assets/images/gallery/01.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="blog-single-left.html"></a>
												</div>
											</div>
											<div class="item-content">
												<h4>
													<a href="blog-single-right.html">Consetetur elitr</a>
												</h4>
												<p class="item-meta greylinks">
									By <a href="#">Admin</a> on Jan 18, 2017
									<span class="pull-right"><i class="rt-icon2-heart-outline highlight"></i> 53</span>
								</p>

											</div>
										</div>

										<div class="vertical-item">
											<div class="item-media">
												<img src="<?php echo base_url(); ?>assets/images/gallery/03.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="blog-single-left.html"></a>
												</div>
											</div>
											<div class="item-content">
												<h4>
													<a href="blog-single-right.html">Elitr onsetetur sadip</a>
												</h4>
												<p class="item-meta greylinks">
									By <a href="#">Admin</a> on Jan 18, 2017
									<span class="pull-right"><i class="rt-icon2-heart-outline highlight"></i> 631</span>
								</p>

											</div>
										</div>


										<div class="vertical-item">
											<div class="item-media">
												<img src="<?php echo base_url(); ?>assets/images/gallery/02.jpg" alt="">
												<div class="media-links">
													<a class="abs-link" title="" href="blog-single-left.html"></a>
												</div>
											</div>
											<div class="item-content">
												<h4>
													<a href="blog-single-right.html">Lorem sadipscing elitr</a>
												</h4>
												<p class="item-meta greylinks">
									By <a href="#">Admin</a> on Jan 18, 2017
									<span class="pull-right"><i class="rt-icon2-heart-outline highlight"></i> 221</span>
								</p>

											</div>
										</div>


									</div>
									<!-- eof tab -->

								</div>
								<!-- eof tab-content -->

							</div>
							<!-- eof widget -->


						</aside>
						<!-- eof aside sidebar -->
					</div>
				</div>
			</section>
	<script type="text/javascript">
				//product counter
		jQuery('.plus, .minus').on('click', function( e ) {
	
		var numberField = jQuery(this).parent().find('[type="number"]');
		var currentVal = numberField.val();
		var sign = jQuery(this).val();
		if (sign === '-') {
			if (currentVal > 1) {
				numberField.val(parseFloat(currentVal) - 1);
			}
		} else {
			numberField.val(parseFloat(currentVal) + 1);
		}
			var cartid = $(this).attr("data-cartid");
	    	cartid = parseInt(cartid);
			var quantity  = $('#product_quantity_'+cartid).val();
			//alert(quantity);
		   $.ajax({
			    url:"<?= base_url('Shop/updateQuantity');?>",
			    type:'POST',
			    data:{'quantity':quantity,'cartid':cartid},
			    success:function() {
			    }
		   })
		});
	</script>