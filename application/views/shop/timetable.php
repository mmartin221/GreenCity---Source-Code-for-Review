<?php //echo "<pre>";print_r($timetableList);exit();?>

<style type="text/css">
</style>
			<section class="page_breadcrumbs ds parallax section_padding_top_65 section_padding_bottom_65">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="highlight">Timetable</h2>
							<ol class="breadcrumb darklinks">
								<li>
									<a href="index.html">
							Home
						</a>
								</li>
								<li>
									<a href="#">Pages</a>
								</li>
								<li class="active">Timetable</li>
							</ol>
						</div>
					</div>
				</div>
			</section>
<style type="text/css">
	/*a:hover*/
	.bg_bookbooked:hover{
		color:white!important;
	}
	.bg_bookfull:hover{
		color:white!important;
	}
</style>
			<section class="ls section_padding_top_100 section_padding_bottom_75">
				<div class="container">

					<div class="row">
						<div class="col-sm-12">
							<h2 class="section_header with_icon text-center">
								Our Upcycling Session
							</h2>
						</div>
					</div>

									
											<span>
												<label class="grey" for="orderby">Selected Date:</label>
												<select class="form-control orderby" name="orderby" onchange="table_pagging()" id="orderby">s
													<option value="0" <?= ($orderby==0)?'selected':''; ?> >Page1</option>
													<option value="1" <?= ($orderby==1)?'selected':''; ?> >Page2</option>
													<option value="2" <?= ($orderby==2)?'selected':''; ?> >Page3</option>
													<option value="3" <?= ($orderby==3)?'selected':''; ?> >Page4</option>
												</select>
											</span>
											<input type="submit"  name="formsubmit" style="float: right; margin-right: -118px; display: none;">

											
										</form>

									</div>
									</div>
							<div class="clearfix"></div>
						</div>
					</div> -->


					<div class="row">
						<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table_template darklinks" id="timetable">
									<thead>
									<!-- 	<tr>
										<?php  if (!empty($timetableList)) { foreach ($timetableList as $key => $dateval) {	?>
											<th><?= date('d-m-Y', strtotime($dateval['date'])); ?></th>
										<?php  } } ?>
										</tr> -->
										<tr>
										<?php $curr_date = date('Y-m-d');
										   for ($i=0; $i <=7 ; $i++) { 	?>
											<th><?= date('d-m-Y', strtotime($curr_date . ' +'.$i.' day')); ?></th>
										<?php  } ?>
										</tr>

									</thead>
									<tbody>

											<?php if(!empty($timetableList)){ 
												 for ($i=0; $i <$no_rows ; $i++) {
													?>
												<tr>
													<td> <?php if(!empty($timetableList[0]['list'][$i]['sessionEventName'])) { ?>
														<a  href="<?= base_url('Upcycling-Session-Details/'. $timetableList[0]['list'][$i]['id'].'/'.base64_encode($timetableList[0]['date'])); ?>" class="<?= ($timetableList[0]['list'][$i]['booking_id']?'bg_bookfull':'').' '.($timetableList[0]['list'][$i]['booked']?'bg_bookbooked':''); ?>" >
														<?php
														echo $timetableList[0]['list'][$i]['sessionEventName'];
														echo '<p>'.(substr($timetableList[0]['list'][$i]['startTime'],0,5)).((substr($timetableList[0]['list'][$i]['startTime'],0,2)>12)?' PM':' AM').' - ';
														echo  (substr($timetableList[0]['list'][$i]['endTime'],0,5)).((substr($timetableList[0]['list'][$i]['endTime'],0,2)>12)?' PM':' AM').'</p>';

														}  ?>
															
														</a> 
													 </td>

													<td> <?php if(!empty($timetableList[1]['list'][$i]['sessionEventName'])) { ?>
														<a href="<?= base_url('Upcycling-Session-Details/'.$timetableList[1]['list'][$i]['id'].'/'.base64_encode($timetableList[1]['date'])); ?>" class="<?= ($timetableList[1]['list'][$i]['booking_id']?'bg_bookfull':'').' '.($timetableList[1]['list'][$i]['booked']?'bg_bookbooked':'');?>">
														<?php
														echo $timetableList[1]['list'][$i]['sessionEventName'];
														echo '<p>'.(substr($timetableList[1]['list'][$i]['startTime'],0,5)).((substr($timetableList[1]['list'][$i]['startTime'],0,2)>12)?' PM':' AM').' - ';
														echo  (substr($timetableList[1]['list'][$i]['endTime'],0,5)).((substr($timetableList[1]['list'][$i]['endTime'],0,2)>12)?' PM':' AM').'</p>';
														}  ?> 
													 </td>

													<td> <?php if(!empty($timetableList[2]['list'][$i]['sessionEventName'])) { ?>
														<a href="<?= base_url('Upcycling-Session-Details/'.$timetableList[2]['list'][$i]['id'].'/'.base64_encode($timetableList[2]['date'])); ?>" class="<?= ($timetableList[2]['list'][$i]['booking_id']?'bg_bookfull':'').' '.($timetableList[2]['list'][$i]['booked']?'bg_bookbooked':'');?>">
														<?php
														echo $timetableList[2]['list'][$i]['sessionEventName'];
														echo '<p>'.(substr($timetableList[2]['list'][$i]['startTime'],0,5)).((substr($timetableList[2]['list'][$i]['startTime'],0,2)>12)?' PM':' AM').' - ';
														echo  (substr($timetableList[2]['list'][$i]['endTime'],0,5)).((substr($timetableList[2]['list'][$i]['endTime'],0,2)>12)?' PM':' AM').'</p>';
														}  ?> </a>
													 </td>
													<td> <?php if(!empty($timetableList[3]['list'][$i]['sessionEventName'])) { ?>
														<a href="<?= base_url('Upcycling-Session-Details/'.$timetableList[3]['list'][$i]['id'].'/'.base64_encode($timetableList[3]['date'])); ?>" class="<?= ($timetableList[3]['list'][$i]['booking_id']?'bg_bookfull':'').' '.($timetableList[3]['list'][$i]['booked']?'bg_bookbooked':'');?>">
															<?php
														echo $timetableList[3]['list'][$i]['sessionEventName'];
														echo '<p>'.(substr($timetableList[3]['list'][$i]['startTime'],0,5)).((substr($timetableList[3]['list'][$i]['startTime'],0,2)>12)?' PM':' AM').' - ';
														echo  (substr($timetableList[3]['list'][$i]['endTime'],0,5)).((substr($timetableList[3]['list'][$i]['endTime'],0,2)>12)?' PM':' AM').'</p>';
														}  ?> </a>
													 </td>

													<td> <?php if(!empty($timetableList[4]['list'][$i]['sessionEventName'])) { ?>
														<a href="<?= base_url('Upcycling-Session-Details/'.$timetableList[4]['list'][$i]['id'].'/'.base64_encode($timetableList[4]['date'])); ?>" class="<?= ($timetableList[4]['list'][$i]['booking_id']?'bg_bookfull':'').' '.($timetableList[4]['list'][$i]['booked']?'bg_bookbooked':'');?>">
														<?php
														echo $timetableList[4]['list'][$i]['sessionEventName'];
														echo '<p>'.(substr($timetableList[4]['list'][$i]['startTime'],0,5)).((substr($timetableList[4]['list'][$i]['startTime'],0,2)>12)?' PM':' AM').' - ';
														echo  (substr($timetableList[4]['list'][$i]['endTime'],0,5)).((substr($timetableList[4]['list'][$i]['endTime'],0,2)>12)?' PM':' AM').'</p>';
														}  ?> </a>
													 </td>

													<td> <?php if(!empty($timetableList[5]['list'][$i]['sessionEventName'])) { ?>
														<a href="<?= base_url('Upcycling-Session-Details/'.$timetableList[5]['list'][$i]['id'].'/'.base64_encode($timetableList[5]['date'])); ?>" class="<?= ($timetableList[5]['list'][$i]['booking_id']?'bg_bookfull':'').' '.($timetableList[5]['list'][$i]['booked']?'bg_bookbooked':'');?>">
															<?php
														echo $timetableList[5]['list'][$i]['sessionEventName'];
														echo '<p>'.(substr($timetableList[5]['list'][$i]['startTime'],0,5)).((substr($timetableList[5]['list'][$i]['startTime'],0,2)>12)?' PM':' AM').' - ';
														echo  (substr($timetableList[5]['list'][$i]['endTime'],0,5)).((substr($timetableList[5]['list'][$i]['endTime'],0,2)>12)?' PM':' AM').'</p>';
														}  ?> </a>
													 </td>

													<td> <?php if(!empty($timetableList[6]['list'][$i]['sessionEventName'])) { ?>
														<a href="<?= base_url('Upcycling-Session-Details/'.$timetableList[0]['list'][$i]['id'].'/'.base64_encode($timetableList[6]['date'])); ?>" class="<?= ($timetableList[6]['list'][$i]['booking_id']?'bg_bookfull':'').' '.($timetableList[6]['list'][$i]['booked']?'bg_bookbooked':'');?>">
														<?php
														echo $timetableList[6]['list'][$i]['sessionEventName'];
														echo '<p>'.(substr($timetableList[6]['list'][$i]['startTime'],0,5)).((substr($timetableList[6]['list'][$i]['startTime'],0,2)>12)?' PM':' AM').' - ';
														echo  (substr($timetableList[6]['list'][$i]['endTime'],0,5)).((substr($timetableList[6]['list'][$i]['endTime'],0,2)>12)?' PM':' AM').'</p>';
														}  ?></a> 
													 </td>

													<td> <?php if(!empty($timetableList[7]['list'][$i]['sessionEventName'])) {?>
														<a href="<?= base_url('Upcycling-Session-Details/'.$timetableList[7]['list'][$i]['id'].'/'.base64_encode($timetableList[7]['date'])); ?>" class="<?= ($timetableList[7]['list'][$i]['booking_id']?'bg_bookfull':'').' '.($timetableList[7]['list'][$i]['booked']?'bg_bookbooked':'');?>">
															<?php
														echo $timetableList[7]['list'][$i]['sessionEventName'];
														echo '<p>'.(substr($timetableList[7]['list'][$i]['startTime'],0,5)).((substr($timetableList[7]['list'][$i]['startTime'],0,2)>12)?' PM':' AM').' - ';
														echo  (substr($timetableList[7]['list'][$i]['endTime'],0,5)).((substr($timetableList[7]['list'][$i]['endTime'],0,2)>12)?' PM':' AM').'</p>';
														}  ?> 
													 </td>
												</tr>

											<?php } } ?>
										
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</section>

<script type="text/javascript">

$(function(){
	$(".bg_bookbooked").parents('td').css("background", "#9cc026");
	$(".bg_bookfull").parents('td').css("background", "red");
});


function table_pagging(){
	$("input[name='formsubmit']").click();
}
</script>