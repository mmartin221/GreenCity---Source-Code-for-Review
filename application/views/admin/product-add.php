<style type="text/css">
   .preview-images-zone {
    width: 100%;
    border: 1px solid #ddd;
    min-height: 180px;
    /* display: flex; */
    padding: 5px 5px 0px 5px;
    position: relative;
    overflow:auto;
}
.preview-images-zone > .preview-image:first-child {
    height: 185px;
    width: 185px;
    position: relative;
    margin-right: 5px;
}
.preview-images-zone > .preview-image {
    height: 90px;
    width: 90px;
    position: relative;
    margin-right: 5px;
    float: left;
    margin-bottom: 5px;
}
.preview-images-zone > .preview-image > .image-zone {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .image-zone > img {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .tools-edit-image {
    position: absolute;
    z-index: 100;
    color: #fff;
    bottom: 0;
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
    display: none;
}
.preview-images-zone > .preview-image > .image-cancel {
    font-size: 18px;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
    margin-right: 10px;
    cursor: pointer;
    display: none;
    z-index: 100;
}
.preview-image:hover > .image-zone {
    cursor: move;
    opacity: .5;
}
.preview-image:hover > .tools-edit-image,
.preview-image:hover > .image-cancel {
    display: block;
}
.ui-sortable-helper {
    width: 90px !important;
    height: 90px !important;
}

.container {
    padding-top: 50px;
}
.mt-2{
	margin-top: 20px;
}
</style>

<section class="ls with_bottom_border">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ol class="breadcrumb darklinks">
								<li>
									<a href="#">Dashboard</a>
								</li>
								<li class="active">Product</li>
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
						<div class="col-sm-12">
							<h3>Add product
								
							</h3>
						</div>
					</div>
					<!-- .row -->


					<form class="form-horizontal" method="post" enctype='multipart/form-data' action="<?php echo base_url(); ?>add-product">

						<div class="row">
							<div class="col-md-9">
								<div class="with_border with_padding">

									<h4>
										Product Details
										

									</h4>

									<hr>


									<div class="row form-group">
										<label class="col-lg-3 control-label">Product Name: </label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="name" required>
										</div>
									</div>
									<div class="row form-group">
										<label class="col-lg-3 control-label">Product Category: </label>
										<div class="col-lg-9">
											<select class="form-control" name="category" required="">
												<option value="">Select Product Category</option>
												<?php foreach ($category as $key => $value) { ?>
													<option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
												<?php } ?>
											</select>
										</div>
									</div>

									<div class="row form-group admin-product-price">
										<label class="col-lg-3 control-label">Product Quantity (Stock): </label>
										<div class="col-lg-9">
											<input type="text" step="0.01" name="quantity" class="form-control num_only" required>
										</div>
									</div>
								


									<div class="row form-group">
										<label class="col-lg-3 control-label">Product Short Description: </label>
										<div class="col-lg-9">
											<textarea rows="3" name="description" class="form-control"></textarea>
										</div>
									</div>

									<div class="row form-group">
										<label class="col-lg-3 control-label">Product Description: </label>
										<div class="col-lg-9">
											<textarea rows="9" name="descriptionLong" class="form-control" ></textarea>
										</div>
									</div>

									<div class="row form-group">
										<label class="col-lg-3 control-label">Product Multiple Images: </label>
										<div class="col-lg-9">
											<input type="file" class="form-control" id="pro-image" name="image[]" onclick="$('#pro-image').click()" multiple required style="padding-top: 10px; padding-bottom: 10px;">
											<div class="preview-images-zone mt-2">
								       
								            </div>
										</div>
									</div>

									

									<div class="row">
										<div class="col-sm-12 text-right">
											<button type="submit" class="theme_button wide_button">Save product</button>
											<a href="admin_products.html" class="theme_button inverse wide_button">Cancel</a>
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
			</section>