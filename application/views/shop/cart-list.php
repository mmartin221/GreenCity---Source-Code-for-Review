<section class="page_breadcrumbs ds parallax section_padding_top_65 section_padding_bottom_65">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="highlight">Cart</h2>
							<ol class="breadcrumb darklinks">
								<li>
									<a href="index.html">
							Home
						</a>
								</li>
								<li>
									<a href="#">Shop</a>
								</li>
								<li class="active">Cart</li>
							</ol>
						</div>
					</div>
				</div>
			</section>


			<section class="ls section_padding_top_100 section_padding_bottom_75 columns_padding_25">
				<div class="container">
					<div class="row">
						<div class="col-sm-7 col-md-8 col-lg-9 col-sm-push-5 col-md-push-4 col-lg-push-3">

							<div class="table-responsive">
								<table class="table shop_table cart cart-table">
									<thead>
										<tr>
											<td class="product-info">Product</td>
											
											<td class="product-quantity">Quantity</td>
										
											<td class="product-remove">&nbsp;</td>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($productslist)) {
											foreach ($productslist as $key => $value) { ?>
												<tr class="cart_item">
													<td class="product-info">
														<div class="media">
															<div class="media-left">
																<a href="<?php echo base_url(); ?>product-details/<?= $value['id']; ?>">
																	<img class="media-object cart-product-image" src="<?php echo base_url(); ?>uploads/<?= $value['image']; ?>" alt="">
																</a>
															</div>
															<div class="media-body">
																<h4 class="media-heading" style="padding-top: 15px;">
																	<a href="javascript:void(0)"><?= $value['name']; ?></a>
																</h4>
																
															</div>
														</div>
													</td>
													
													<td class="product-quantity">
														<div class="quantity">
															<input type="button" value="-" class="minus" data-cartid="<?= $value['cartid']; ?>">
													<input type="number" step="1" min="0" name="product_quantity"value="<?php if(!empty($value)){ echo $value['cartQuantity']; }else{ echo '1';} ?>" title="Qty" id="product_quantity_<?php echo $value['cartid']?>" class="form-control ">
													<input type="button" value="+" class="plus" data-cartid="<?= $value['cartid']; ?>">
														</div>
													</td>
													
													<td class="product-remove">
														<a href="<?php echo base_url(); ?>add-remove-cart/<?= $value['id']; ?>/1" class=" fontsize_20" title="Remove this item">
															<i class="fa fa-trash-o"></i>
														</a>
													</td>
												</tr>
											<?php }

										} else { ?>
											<tr class="cart_item">
												<td class="product-info" colspan="3">
													
																<h4 class="media-heading text-center" style="padding-top: 15px;">
																	Your cart is empty
																</h4>
																
															
												</td>
											</tr>
										<?php } ?>
										

										
									</tbody>
								</table>
							</div>

							<div class="cart-buttons">
								<a class="theme_button" href="<?php echo base_url(); ?>shop-products">Countinue Shopping</a>

								
								<?php if(!empty($productslist)){?>
								<a class="theme_button color2" href="<?php echo base_url(); ?>checkout">Proceed to Checkout</a>
							<?php }else{ ?>
									<a class="theme_button color2" href="javascript:void(0);">Proceed to Checkout</a>
							<?php } ?>
							</div>

						

							<div class="row">
						
							</div>

						</div>
						<!--eof .col-sm-8 (main content)-->

						<!-- sidebar -->
						<aside class="col-sm-5 col-md-4 col-lg-3 col-sm-pull-7 col-md-pull-8 col-lg-pull-9">


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
										
													</span>
												</div>
											</li> -->
										</ul>
									</div>
									<!-- eof tab -->


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