<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/eonasdan-bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker-standalone.min.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<style type="text/css">

  #ui-datepicker{
  	    position: absolute!important;
    top: 234px!important;
    left: 489.156px!important;
    z-index: 4!important;
    display: block!important;
}
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
						<div class="col-sm-12">
							<h3>Edit Timetable
								
							</h3>
						</div>
					</div>
					<!-- .row -->

					<?php $message = $this->session->flashdata('message'); echo (!empty($message) ? $message :''); ?>
					<form class="form-horizontal" method="post" action="<?php echo base_url('update-timetable/'.$timetableDetails['id']); ?>">

						<div class="row">
							<div class="col-md-8">
								<div class="with_border with_padding">

									<h4>
									 Timetable
										

									</h4>

									<hr>


									<div class="row form-group">
										<label class="col-lg-3 control-label">Upcycling Session Event Name: </label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="sessionEventName" required="" value="<?= $timetableDetails['sessionEventName'];?>">
										</div>
									</div>
									

									<div class="row form-group">
										<label class="col-lg-3 control-label">Start Date: </label>
										<div class="col-lg-9">
								<!-- 			<input type="text" id="from" name="from" /> -->
											 <input type="text" class="form-control"  id="from" name="startDate" required="" value="<?= $timetableDetails['startDate'];?>"/>
											<span class="form-error required" id="err_email"></span>
										</div>
									</div>
									<div class="row form-group">
										<label class="col-lg-3 control-label">End Date: </label>
										<div class="col-lg-9">
											<!-- <input type="text" id="to" name="to" /> -->
											<input type="text" class="form-control"  id="to" name="endDate" required="" value="<?= $timetableDetails['endDate'];?>"/>
											<span class="form-error required" id="err_email"></span>
										</div>
									</div>
						           <div class="row form-group">
								    <label class="col-lg-3 control-label">Start Time: </label>
								      <div class='col-lg-9 input-group date' id='starttime'>
								        <input type='text' class="form-control" id="Start_Time" name="startTime" value="<?= $timetableDetails['startTime'];?>"/>
								        <span class="input-group-addon">
								            <span class="glyphicon glyphicon-time"></span>
								        </span>
								      </div>
								    </div>
						          <div class="row form-group">
							    	<label class="col-lg-3 control-label">End  Time: </label>
							      <div class='col-lg-9 input-group date' id='starttime'>
							        <input type='text' class="form-control" id="End_Time" name="endTime" value="<?= $timetableDetails['endTime'];?>"/>
							        <span class="input-group-addon">
							            <span class="glyphicon glyphicon-time"></span>
							        </span>
							      </div>
							    </div>
   
								

									<div class="row form-group">
										<label class="col-lg-3 control-label">Max Number of people in session: </label>
										<div class="col-lg-9">
											<input type="text" step="0.01" name="maxnoPeopleInSession" class="form-control num_only" required value="<?= $timetableDetails['maxnoPeopleInSession'];?>">
										</div>
									</div>

									<div class="row form-group">
										<label class="col-lg-3 control-label">Recycling Center Name: </label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="recyclingCenterName" required="" value="<?= $timetableDetails['recyclingCenterName'];?>">
										</div>
									</div>
									<div class="row form-group">
										<label class="col-lg-3 control-label">Recycling Center Address: </label>
										<div class="col-lg-9">
											<input type="text" class="form-control" name="recyclingCenterAddress" required="" value="<?= $timetableDetails['recyclingCenterAddress'];?>">
										</div>
									</div>
										<div class="row form-group">
										<label class="col-lg-3 control-label">Description: </label>
										<div class="col-lg-9">
											<textarea rows="3" name="description" class="form-control" required><?= $timetableDetails['description'];?></textarea>
										</div>
									</div>

									<div class="row">
										<div class="col-sm-12 text-right">
											<button type="submit" class="theme_button wide_button">Update Timetable</button>
											<a href="<?php echo base_url(); ?>admin-timetable" class="theme_button inverse wide_button">Cancel</a>
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

		<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
		<script type="text/javascript">
	
        $('#from').datepicker({
			  minDate: 0,
			  beforeShow: function() {
			    $(this).datepicker('option', 'maxDate', $('#to').val());
			  }
			});
			$('#to').datepicker({
			  defaultDate: "+1w",
			  minDate: 0,
			  beforeShow: function() {
			    $(this).datepicker('option', 'minDate', $('#from').val());
			    if ($('#from').val() === '') $(this).datepicker('option', 'minDate', 0);
			  }
			});
	</script>


<script type="text/javascript">
  $('#starttime,#endtime').datetimepicker({
  format: 'HH:mm'
});

var start_time = $('#Start_Time').val();

var end_time = $('#End_Time').val();

if (Date.parse(start_time) > Date.parse(end_time)) {
  alert('start time should be smaller');
}


</script>
