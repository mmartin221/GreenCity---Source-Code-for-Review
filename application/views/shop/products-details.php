<?php $user_data = $this->session->userdata('userLogin'); ?>
<section class="page_breadcrumbs ds parallax section_padding_top_65 section_padding_bottom_65">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="highlight">Single Product</h2>
							<ol class="breadcrumb darklinks">
								<li>
									<a href="index.html">
							Home
						</a>
								</li>
								<li>
									<a href="#">Shop</a>
								</li>
								<li class="active">Single Product</li>
							</ol>
						</div>
					</div>
				</div>
			</section>
			<?php //echo "<pre>";print_r($images);?>

			<section class="ls section_padding_top_100 section_padding_bottom_75 columns_padding_25">
				<div class="container">
					<div class="row">

						<div class="col-sm-7 col-md-8 col-lg-9 col-sm-push-5 col-md-push-4 col-lg-push-3">

							<div class="with_background with_padding rounded">


								<div itemscope="" itemtype="http://schema.org/Product" class="product type-product row">

									<div class="col-sm-6">
										<div class="images">

											<span class="newproduct">New</span>

											
											<?php //echo "<pre>";print_r($images);?>
											<a href="<?php echo base_url(); ?>product-details/<?= $images[0]['productId']; ?>" itemprop="image" class="woocommerce-main-image zoom" data-rel="prettyPhoto[product-gallery]">
												<img src="<?php echo base_url(); ?>uploads/<?= $images[0]['image']; ?>" class="attachment-shop_single wp-post-image" alt="" title="">
											</a>
										</div>
										
										<div class="thumbnails-wrap text-center">
											<div id="product-thumbnails" class="owl-carousel thumbnails product-thumbnails" data-loop="true" data-center="true" data-margin="10" data-nav="false" data-dots="true" data-items="3" data-responsive-lg="3" data-responsive-md="3" data-responsive-sm="2"
											    data-responsive-xs="2">

											    <?php foreach ($images as $key => $value) {

											     ?>
											    	<a href="<?php echo base_url(); ?>uploads/<?= $value['image']; ?>" class="zoom first" title="" data-gal="prettyPhoto[product-gallery]">
														<img src="<?php echo base_url(); ?>uploads/<?= $value['image']; ?>" class="attachment-shop_thumbnail" alt="">
													</a>
											    <?php } ?>
											</div>

										</div>
										<!-- eof .images -->
									</div>

									<div class="summary entry-summary col-sm-6">

										<h1 itemprop="name" class="product_title entry-title"><?= $detail['name']; ?></h1>
<!-- 

													
												</li>
											</ul>

											<form class="cart" method="post" enctype="multipart/form-data">
												
													<?php  //print_r($cartDetails);exit();?>
													<?php if(!empty($cartDetails)) { ?>
														<a class="theme_button" href="<?php echo base_url(); ?>add-remove-cart/<?= $cartDetails['productId']; ?>/2">Remove from Cart</a>
													<?php } else { ?>
														<a href="<?php echo base_url(); ?>add-remove-cart/<?=$detail['id']; ?>/1" class="theme_button color1">Add to cart</a>
													<?php } ?>
													<?php if(!empty($cartDetails)) { ?>
												<label class="grey" for="product_quantity">Qty:</label>

												<span class="quantity form-group">
													<input type="button" value="-" class="minus" data-cartid="<?= $cartDetails['id']; ?>">
													<input type="number" step="1" min="0" name="product_quantity"value="<?php if(!empty($cartDetails)){ echo $cartDetails['quantity']; }else{ echo '1';} ?>" title="Qty" id="product_quantity_<?php echo $cartDetails['id']?>" class="form-control ">
													<input type="button" value="+" class="plus" data-cartid="<?= $cartDetails['id']; ?>">
												</span>
											<?php } ?>

											</form>
										</div>


									</div>
									<!-- .summary.col- -->

								</div>
								<!-- .product.row -->


							</div>
							<!-- .with_background -->

								<?php if(!empty($detail['descriptionLong'])) { ?>
							<div class="woocommerce-tabs">


								<!-- Nav tabs -->
								<ul class="nav nav-tabs wc-tabs" role="tablist">
									<li class="active"><a href="#details_tab" role="tab" data-toggle="tab">Details</a></li>
								</ul>

								<!-- Tab panes -->
								<div class="tab-content top-color-border">
									<div class="tab-pane fade in active" id="details_tab">

										<p><?= $detail['descriptionLong']; ?></p>
									</div>
								</div>
								<!-- eof .tab-content -->
							</div>
							<!-- .woocommerce-tabs -->
						<?php } ?>


						</div>
						<!--eof .col-sm-8 (main content)-->


						<!-- sidebar -->
						<aside class="col-sm-5 col-md-4 col-lg-3 col-sm-pull-7 col-md-pull-8 col-lg-pull-9">

						

							<div class="widget widget_shopping_cart">

								<h3 class="widget-title poppins">Your Cart</h3>
								<div class="widget_shopping_cart_content">

									<ul class="cart_list product_list_widget media-list darklinks">
										<?php if(!empty($productslist)){foreach ($productslist as $key => $value) {
										 ?>
										<li class="media">
											<div class="media-left media-middle">
												<a href="<?php echo base_url(); ?>product-details/<?= $value['id']; ?>">
													<img src="<?php echo base_url(); ?>uploads/<?= $value['image']; ?>" class="with_background" alt="">
												</a>
											</div>

											<div class="media-body media-middle">
												<h4>
													<a href="javascript:void(0);"><?= $value['name'];?></a>
												</h4>
												<span class="quantity bold"  >Quantity <span id="productQuantity"><?= $value['cartQuantity'];?></span> </span>
											</div>
										</li>
									<?php } } ?>

									

									</ul>
									<!-- end product list -->

									<p class="buttons topmargin_40">
					<a href="<?php echo base_url();?>cart" class="theme_button color1 margin_0">View cart</a>
					<!-- <a href="shop-checkout-right.html" class="theme_button">Checkout</a> -->
				</p>

								</div>
							</div>

							<div class="widget widget_categories">

								<h3 class="widget-title poppins">All Categories</h3>
								<ul class="greylinks">
									<?php foreach ($categoryList as $key => $value) { ?>
										<li>
											<a href="javascript:void(0)" title=""><?= $value['name']; ?></a>
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
												<?php if(!empty($leftRecentimages)){foreach($leftRecentimages as $key => $value) {
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
			// alert(quantity);
			$("#productQuantity").text(quantity);

		   $.ajax({
			    url:"<?= base_url('Shop/updateQuantity');?>",
			    type:'POST',
			    data:{'quantity':quantity,'cartid':cartid},
			    success:function() {
			    }
		   })
		});
	</script>
