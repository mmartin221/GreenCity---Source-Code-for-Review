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
<?php //echo "<pre>";print_r($result);?>

			<section class="ls section_padding_top_100 section_padding_bottom_75 columns_padding_25">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-8 col-lg-9 col-sm-push-5 col-md-push-4 col-lg-push-3">

							<div class="table-responsive">
								<table class="table shop_table cart cart-table">
									<thead>
										<tr>
											<td class="product-info">No of products</td>
											<td class="product-info">Order Number</td>
											<td class="product-info">Order Type</td>
											<td class="product-quantity">Status</td>
											<td class="product-quantity">Order date & time</td>
											
										</tr>
									</thead>
									<tbody>
										<?php $i=1; if(!empty($result)) {
											foreach ($result as $key => $value) { ?>
												<tr class="cart_item">
													<td class="product-info">
														<?= $i++;?>
													</td>
													<td class="product-info">
														<div class="media">
															<div class="media-body">
																<h4 class="media-heading" style="padding-top: 15px;">
																	<a href="<?php echo base_url(); ?>myorder-details/<?= $value['id']; ?>"><?= $value['orderNumber']; ?></a>
																</h4>
																
															</div>
														</div>
													</td>
														<td class="product-info">
														<div class="media">
															<div class="media-body">
																<h4 class="media-heading" style="padding-top: 15px;">
																	<?php if($value['orderDeliverredCollected']==1){?>
																	<a href="javascript:void(0);">Order To Be Delivered</a>
																<?php }else{ ?>
																	<a href="javascript:void(0);">Order To be Collected</a>
																<?php } ?>
																</h4>
																
															</div>
														</div>
													</td>
													
													<td class="product-quantity">
														<span class="label label-<?php if($value['status'] == 1) { 
															echo 'success';
														} else {
															echo 'warning';
														} ?>">
														<?php if($value['status'] == 1) { 
															echo 'New';
														} else {
															echo 'Inactive';
														} ?>
													</span>
													</td>
													
													<td class="product-remove">
														<div class="media-body">
																<h4 class="media-heading" style="padding-top: 15px;">
																	<a href="javascript:void(0)"><?= $value['created']; ?></a>
																</h4>
																
															</div>
													</td>
												
												</tr>
											<?php }

										}else { ?>
											<tr class="cart_item">
												<td class="product-info" colspan="5">
													
																<h4 class="media-heading text-center" style="padding-top: 15px;">
																	Your order is empty
																</h4>
																
															
												</td>

											</tr>
										<?php } ?>
										
									</tbody>
								</table>
							</div>

							
							</div>

						</div>
						<!--eof .col-sm-8 (main content)-->

						<!-- sidebar -->
						<aside class="col-sm-5 col-md-4 col-lg-3 col-sm-pull-7 col-md-pull-8 col-lg-pull-9">

						
							<

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