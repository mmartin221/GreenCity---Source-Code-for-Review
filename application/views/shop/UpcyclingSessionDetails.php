
			<section class="page_breadcrumbs ds parallax section_padding_top_65 section_padding_bottom_65">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 text-center">
							<h2 class="highlight">Upcycling Session Details</h2>
							<ol class="breadcrumb darklinks">
								<li>
									<a href="index.html">
							Home
						</a>
								</li>
								<li>
									<a href="#">Events</a>
								</li>
								<li class="active">Upcycling Session Details</li>
							</ol>
						</div>
					</div>
				</div>
			</section>
<style type="text/css">
	.cnf_btn{
		font-size: 12px;
    text-transform: uppercase;
    letter-spacing: 0.2em;
    font-weight: 500;
    padding: 23px 30px 21px;
    margin-bottom: 4px;
    line-height: 1;
    display: inline-block;
    text-align: center;
    color: #ffffff;
    border: 2px solid #323232;
    background-color: #323232;
    border-radius: 30px;
    position: relative;
    transition: all 0.4s linear 0s;
	}
</style>

			<section class="ls section_padding_top_100 section_padding_bottom_100 columns_padding_25">
				<div class="container">
					<div class="row">

						<div class="col-sm-10 col-sm-push-1">
								<?php $message = $this->session->flashdata('message'); echo (!empty($message) ? $message :''); ?>

							<article class="post side-item content-padding with_background rounded">

								<div class="row">

									<div class="col-md-12">
										<form id="booking_form" action="<?= base_url();?>UpcyclingList" method="post">
										<div class="item-content">
											 <h4>
												<a href="javascript:void(0);"><?= $UpcyclingList['sessionEventName'];?></a>
											</h4> <h5>
												<a href="javascript:void(0);"><?= $UpcyclingList['recyclingCenterName'];?></a>
											</h5> 
											<input type="hidden" name="UpcyclingId" value="<?= $UpcyclingList['id'];?>">
											<input type="hidden" name="session_booking_on_date" value="<?= $bookingDate;?>">

											<p class=" grey darklinks">
											<span class="rightpadding_20"><i class="fa fa-calendar highlight"></i> <?= $bookingDate;?> <?= substr($UpcyclingList['startTime'],0,5)?> <?= substr($UpcyclingList['startTime'],0,2)>12?' PM':' AM';?> - <?= substr($UpcyclingList['endTime'],0,5)?> <?= substr($UpcyclingList['endTime'],0,2)>12?' PM':' AM';?></span>
											<i class="fa fa-map-marker highlight"></i> <?= $UpcyclingList['recyclingCenterAddress'];?>
										</p>
											<p><?= $UpcyclingList['description'];?></p>

										<?php
										if (!empty($bookdetails)){
											echo '<input type="button" class="cnf_btn" name="book_btn" onclick="booking_confirmation();"  data-toggle="modal" data-target="#exampleModal"  value="Cancel Class">';
											echo '<input type="submit" name="book_btn" id="hidden_submit_btn" style="display:none;" value="Cancel Class">';
										}else{

										 if ($UpcyclingList['maxnoPeopleInSession']>$bookPeople) { ?>
										   <input type="button" class="cnf_btn" name="book_btn"  onclick="booking_confirmation(' book the session');" data-toggle="modal" data-target="#exampleModal"  value="Book Class">
										   <input type="submit" name="book_btn" data-toggle="modal" id="hidden_submit_btn"  data-target="#exampleModal" style="display:none;" value="Book Class">
										  <?php }else{ ?>
										  
										  	 <button type="button">Unavailable</button>
										  <?php } 
										}
										  ?>

										</div>
									</form>
									</div>

								</div>
							</article>

						</div>
						<!--eof .col-sm-* (main content)-->

					</div>
				</div>
			</section>

		<script type="text/javascript">
		function booking_confirmation(txt=''){
			if (txt=='') { var txt = 'cancel the booking'; }


			$("#booking_confirmation").text('Are you sure want to '+txt+'?');
			return false;
		}
		function submit_form() {
			$("#hidden_submit_btn").click();
		}
		</script>
		
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Booking</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 id="booking_confirmation"></h5>
      </div>
      <div class="modal-footer">
        <button type="button"  data-dismiss="modal">Close</button>
        <button type="button" onclick="submit_form()" style="background
        :#9cc026">Ok</button>
      </div>
    </div>
  </div>
</div>