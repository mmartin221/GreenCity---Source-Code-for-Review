<?php
 $user_data = $this->session->userdata('userLogin');
?>

			<section class="page_breadcrumbs ds parallax section_padding_top_65 section_padding_bottom_65">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="highlight">Checkout</h2>
							<ol class="breadcrumb darklinks">
								<li>
									<a href="index.html">
							Home
						</a>
								</li>
								<li>
									<a href="#">Shop</a>
								</li>
								<li class="active">Checkout</li>
							</ol>
						</div>
					</div>
				</div>
			</section>
 

			<section class="ls section_padding_top_100 section_padding_bottom_75 columns_padding_25">
				<div class="container">

					<div class="row">

						<div class="col-sm-7 col-md-8 col-lg-9 col-sm-push-5 col-md-push-4 col-lg-push-3">
							 <div class="box-title">
                                <h1 class="m-0">
                                    <?php if($this->session->flashdata('success')) { ?>
                                        <div class="alert alert-success" role="alert"><?php echo $this->session->flashdata('success');?></div>
                                    <?php } ?>
                                    
                                </h1>
                            </div>
							<h2>Bill checkout details</h2>

							<form class="form-horizontal checkout shop-checkout" role="form" action="<?php echo base_url(); ?>OrderPlace" method="POST" onsubmit="return validateCheckout()">
								
								<div class="form-group validate-required" id="billing_first_name_field">
									<label for="billing_first_name" class="col-sm-3 control-label">
										<span class="grey">Name:</span>
										<span class="required">*</span>
									</label>
									<div class="col-sm-9">
										<input type="text" class="form-control " name="name" id="name" placeholder="" value="<?= $user_data['name']?>">
										<span class="form-error required" id="err_name"></span>
									</div>
								</div>
								<div class="form-group validate-required validate-email" id="billing_email_field">
									<label for="billing_email" class="col-sm-3 control-label">
										<span class="grey">Email:</span>
										<span class="required">*</span>
									</label>
									<div class="col-sm-9">
										<input type="email" class="form-control " name="email" id="email" placeholder="" value="<?= $user_data['email']?>">
										<span class="form-error required" id="err_email"></span>
									</div>
								</div>
								<div class="form-group validate-required validate-phone" id="billing_phone_field">
									<label for="billing_phone" class="col-sm-3 control-label">
										<span class="grey">Phone:</span>
										<span class="required">*</span>
									</label>
									<div class="col-sm-9">
										<input type="text" class="form-control " name="phone" id="phone" placeholder="" value="<?= $user_data['phone']?>">
										<span class="form-error required" id="err_phone"></span>
									</div>
								</div>	
								<div class="form-group validate-required validate-phone" id="billing_phone_field">
									<label for="billing_phone" class="col-sm-3 control-label">
										<span class="grey">Choose:</span>
										<span class="required">*</span>
									</label>
									<div class="col-sm-9">
									<input type="radio" name="orderDeliverredCollected" checked="" id="Collectedelivered" onchange="orederdelivered()" value="1"> Order To Be Delivered &nbsp;
									<input type="radio" name="orderDeliverredCollected" id="Collecteddiv" onchange="oredercollected()" value="2"> Order To be Collected
										<span class="form-error required" id="err_phone"></span>
									</div>
								</div>
								<div id="delivered">
								<div class="form-group address-field validate-required" id="billing_address_fields">
									<label for="billing_address_1" class="col-sm-3 control-label">
										<span class="grey">Address:</span>
										<span class="required">*</span>
									</label>
									<div class="col-sm-9">
										<input type="text" class="form-control " name="address" id="address" placeholder="" value="">
										<span class="form-error required" id="err_address"></span>
									</div>
								</div>
									<div class="form-group address-field validate-state" id="billing_state_field">
									<label for="billing_state" class="col-sm-3 control-label">
										<span class="grey">County:</span>
									</label>
									<div class="col-sm-9">
										<input type="text" class="form-control " value="" placeholder="" name="country" id="country">
										<span class="form-error required" id="err_country"></span>
									</div>
								</div>
								<div class="form-group address-field validate-required" id="billing_city_field">
									<label for="billing_city" class="col-sm-3 control-label">
										<span class="grey">Town / City:</span>
										<span class="required">*</span>
									</label>
									<div class="col-sm-9">
										<input type="text" class="form-control " name="townCity" id="townCity" placeholder="" value="">
										<span class="form-error required" id="err_townCity"></span>
									</div>
								</div>
						
							
								<div class="form-group address-field validate-required validate-postcode" id="billing_postcode_field">
									<label for="billing_postcode" class="col-sm-3 control-label">
										<span class="grey">Postcode:</span>
										<span class="required">*</span>
									</label>
									<div class="col-sm-9">
										<input type="text" class="form-control " name="postcode" id="postcode" placeholder="" value="">
										<span class="form-error required" id="err_postcode"></span>
									</div>
								</div>
									</div>
									<div id="Collected_Div" style="display: none">
										<h4 style="margin-left: 213px">Collection Location For Product</h4>
									
							
									
										<span ><?= $OrderToCollected['recyclingCenterName']; ?>,<?= $OrderToCollected['address']; ?>,</span>
									</div>
								</div> -->
									<div class="form-group address-field validate-state" id="billing_state_field">
									<label for="billing_state" class="col-sm-3 control-label">
										<span class="grey">Recycle Center Name:</span>
									</label>
									<div class="col-sm-9">
										<span ><?= $OrderToCollected['recyclingCenterName']; ?></span>
									</div>
									</div>

									<div class="form-group address-field validate-state" id="billing_state_field">
									<label for="billing_state" class="col-sm-3 control-label">
										<span class="grey">Address:</span>
									</label>
									<div class="col-sm-9">
										<span ><?= $OrderToCollected['address']; ?></span>
										<div class="place-order" style="margin-top: -9px; float: right;">
										<a href="<?= base_url();?>View-location-map" target="_blank"><input type="button" class="theme_button color1" name="checkout_place_order" id="place_order" value="View location on map">
										</a>
									</div>
									</div>
									</div>
									</div>
									
							

					

								<div class="form-group">
									<label for="order_comments" class="col-sm-3 control-label">
										<span class="grey">Order Notes:</span>
									</label>
									<div class="col-sm-9">
										<textarea name="orderComments" class="form-control" id="orderComments" placeholder="" rows="5"></textarea>
										<span class="form-error required" id="err_orderCom"></span>
									</div>
								</div>

									<div class="place-order" style="float: right;">
										<input type="submit" class="theme_button color1" name="checkout_place_order" id="place_order" value="Place order">
									</div>
							</form>

						</div>
						<!--eof .col-sm-8 (main content)-->


						<!-- sidebar -->
						<aside class="col-sm-5 col-md-4 col-lg-3 col-sm-pull-7 col-md-pull-8 col-lg-pull-9">

							<h3 class="widget-title" id="order_review_heading">Your order</h3>
							<div id="order_review" class="shop-checkout-review-order">
								<table class="table shop_table shop-checkout-review-order-table">
									<thead>
										<tr>
											<td class="product-name">Product</td>
											<td class="product-total">Quantity</td>
										</tr>
									</thead>
									<tbody>
										<?php if(!empty($cartList)){ foreach ($cartList as $key => $value) {
										 ?>
										<tr class="cart_item">
											<td class="product-name">
												<a href="<?php echo base_url(); ?>product-details/<?= $value['productId']; ?>">
														<span class="product-quantity"><?= $value['name'];?></span>
													</a>
											</td>
											<td class="product-total">
												<span class="amount grey"><?= $value['quantity'];?></span>
											</td>
										</tr>
									<?php } } ?>
									</tbody>
								
								</table>

								<div id="payment" class="shop-checkout-payment">
									

								</div>
							</div>

						</aside>
						<!-- eof aside sidebar -->


					</div>
				</div>
			</section>
			<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript">
	function validateCheckout(){ 
		var orderDeliverredCollected = $('input:radio[name="orderDeliverredCollected"]:checked').val();
		if(orderDeliverredCollected==1){
		var chk = 1;
		var name 			= $('#name').val();
		var email 			= $('#email').val();
		var phone 			= $('#phone').val();
		var address 		= $('#address').val();
		var country 		= $('#country').val();
		var townCity 		= $('#townCity').val();
		var postcode 		= $('#postcode').val();
		var orderComments 	= $('#orderComments').val();
		if(name == ''){
			$('#err_name').html('This field is required').show();
			chk = 0;
		}else{
			$('#err_name').html('').hide();
		}
		if(email == ''){
			$('#err_email').html('This field is required').show();
			chk = 0;
		}else{
			$('#err_email').html('').hide();
		} 
		if(phone == ''){
			$('#err_phone').html('This field is required').show();
			chk = 0;
		}else{
			$('#err_phone').html('').hide();
		}
		if(address == ''){
			$('#err_address').html('This field is required').show();
			chk = 0;
		}else{
			$('#err_address').html('').hide();
		}
		if(country == ''){
			$('#err_country').html('This field is required').show();
			chk = 0;
		}else{
			$('#err_country').html('').hide();
		}
		if(townCity == ''){
			$('#err_townCity').html('This field is required').show();
			chk = 0;
		}
		else{
			$('#err_townCity').html('').hide();
		}
		if(postcode == ''){
			$('#err_postcode').html('This field is required').show();
			chk = 0;
		}else{
			$('#err_postcode').html('').hide();
		}
		if(orderComments == ''){
			$('#err_orderCom').html('This field is required').show();
			chk = 0;
		}else{
			$('#err_orderCom').html('').hide();
		}

		
		if(chk == 0){ 
			return false;
		}
	}
		
	}
	function orederdelivered() {
    	$("#delivered").show();
	}
	function oredercollected() {
    	$("#delivered").hide();
	}
	$("#Collecteddiv").click(function(){
		$("#Collected_Div").show();
	});

	$("#Collectedelivered").click(function(){
		$("#Collected_Div").hide();
	});

</script>			

			