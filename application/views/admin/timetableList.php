<section class="ls with_bottom_border">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-6">
							<ol class="breadcrumb darklinks">
								<li>
									<a href="#">Dashboard</a>
								</li>
								<li class="active">Timetable</li>
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
							<h3>Timetable</h3>
						</div>
						<!-- .col-* -->
					</div>
					<!-- .row -->

					<?php $message = $this->session->flashdata('message'); echo (!empty($message) ? $message :''); ?>

					<div class="row">
						<div class="col-xs-12">
							<div class="with_border with_padding">

								<div class="row admin-table-filters">
									<div class="col-lg-9">

										
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
											<th>Session Event Name :</th>
											<th>Start Date:</th>
											<th>End Date:</th>
											<th>Start Time:</th>
											<th>End Time:</th>
											<th>Max Number of people in session:</th>
											<th>Number of people booked in session:</th>
											<th>Recycling Center Name</th>
											<th>Recycling Center Address</th>
											<th>Description</th>
											<th>Status</th>
											<th>Action</th>
										</tr>

										<?php foreach ($timetableList as $key => $value) {
                                                 $get_no_people =    $this->db->get_where('bookingmaster',array('UpcyclingId'=>$value['id']))->num_rows();
										 ?>
											<tr class="item-editable">
												<td class="media-middle text-center">
													<input type="checkbox">
												</td>
												<td>
													<div class="media">
														
														<div class="media-body media-middle">
															<h5>
																<a href="javscript:void(0);"><?= $value['sessionEventName']; ?></a>
															</h5>
														</div>
													</div>
												</td>
												<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['startDate']; ?></time>
												</td>
												<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['endDate']; ?></time>
												</td>
												<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['startTime']; ?></time>
												</td>
												<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['endTime']; ?></time>
												</td>
												<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['maxnoPeopleInSession']; ?></time>
												</td>
												<td>
													<?php if(!empty($get_no_people)){?>
													<a href="<?= base_url('user-details/'.$value['id']);?>"><?= @$get_no_people; ?></a>
												<?php }else{ ?>
													<a href="javscript:void(0);"><?= @$get_no_people; ?></a>
												<?php } ?>

												</td>
												<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['recyclingCenterName']; ?></time>
												</td>
												<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['recyclingCenterAddress']; ?></time>
												</td>
												<td class="media-middle">
													<time datetime="2017-02-08T20:25:23+00:00" class="entry-date"><?php echo $value['description']; ?></time>
												</td>
											
												<td class="media-middle">
													<span class="label label-<?php if($value['status'] == 1) { 
															echo 'success';
														} else {
															echo 'warning';
														} ?>">
														<?php if($value['status'] == 1) { 
															echo 'Active';
														} else {
															echo 'Inactive';
														} ?>
													</span>
												</td>
												<td class="media-middle">
													<a class="theme_button wide_button " href="<?php echo base_url(); ?>edit-timetable/<?= $value['id']; ?>">Edit</a>
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