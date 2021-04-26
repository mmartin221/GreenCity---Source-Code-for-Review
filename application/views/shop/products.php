<?php $user_data = $this->session->userdata('userLogin'); ?>
<section class="page_breadcrumbs ds parallax section_padding_top_65 section_padding_bottom_65">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="highlight">Products</h2>
							<ol class="breadcrumb darklinks">
								<li>
									<a href="index.html">
							Home
						</a>
								</li>
								<li>
									<a href="#">Shop</a>
								</li>
								<li class="active">Products</li>
							</ol>
						</div>
					</div>
				</div>
			</section>
<style type="text/css">
	.highlightlinks strong{ 
	padding: 12px 9px;
	display: inline;
    margin-right: 6px; 
    background-color: #9cc026;
    color: #ffffff;
    margin-left: 6px;
}
	.highlightlinks a{ text-align: center;
    padding: 12px 9px;
    border: none;
    color: #323232;
    background-color: #f7f7f7;
    font-weight: 400;
    margin-left: 9px;
    min-width: 46px!important;
    border-radius: 0;
    text-transform: uppercase;}
</style>
<?php //print_r($total_rows);?>
			<section class="ls section_padding_top_100 section_padding_bottom_100 columns_padding_25">
				<div class="container">
					<div class="row">

						<div class="col-sm-12">

							<div class="shop-sorting">

								<form class="form-inline content-justify vertical-center content-margins">

									<div class="fontsize_20">
										<?= (!empty($per_page)?$per_page:'1'); ?> - <?= (!empty($per_page)?($per_page+count(@$productslist)):'12'); ?>  of <?= $total_rows; ?> Product
									</div>


									<div class="form-group select-group">
										<select aria-required="true" id="date" name="date" class="choice empty form-control">
											<option value="" disabled selected data-default>Default Sorting</option>
											<option value="value">by Value</option>
											<option value="date">by Date</option>
											<option value="popular">by Popularity</option>
										</select>
										<i class="fa fa-angle-down theme_button" aria-hidden="true"></i>
									</div>

								</form>

							</div>


							<div class="columns-3">

								<ul id="products" class="products list-unstyled">

									<?php foreach ($productslist as $key => $value) { 
										$checkIfProductAdded = $this->user->getDataById('cart', array('productId' => $value['id'], 'userId' => $user_data['id']));
									?>
										<li class="product type-product">
											<div class="vertical-item">
												<div class="item-media with_background bottommargin_30">
													<img src="<?php echo base_url(); ?>uploads/<?= $value['image']; ?>" alt=""  style="height: 200px"/>
												</div>
												<div class="item-content">
													<h4 class="poppins bottommargin_10">
														<a href="<?php echo base_url(); ?>product-details/<?= $value['id']; ?>"><?= $value['name']; ?></a>
													</h4>
													<p class="stock"><span class="grey">Availability:</span> In Stock (<?= $value['quantity']; ?>)</p>
													<?php if(!empty($checkIfProductAdded)) { ?>
														<a class="theme_button" href="<?php echo base_url(); ?>add-remove-cart/<?= $value['id']; ?>/2">Remove from Cart</a>
													<?php } else { ?>
														<a href="<?php echo base_url(); ?>add-remove-cart/<?= $value['id']; ?>/1" class="theme_button color1">Add to cart</a>
													<?php } ?>
													
												</div>
											</div>
										</li>
									<?php } ?>

									

									

								</ul>

							</div>
							<!-- eof .columns-* -->


							<div class="row">
								<div class="col-sm-12 text-center">
									<ul class="pagination highlightlinks">
										

										<?= @$links; ?>

									</ul>
								</div>
							</div>


						</div>

					</div>
				</div>
			</section>