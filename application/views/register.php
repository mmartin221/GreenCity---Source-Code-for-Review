<section class="ls section_padding_top_25 section_padding_bottom_75 columns_padding_25">

				<div class="container">



					<div class="row">



						<div class="col-sm-10 col-md-10 col-lg-10 col-sm-push-1 col-md-push-1 col-lg-push-1">



							<div class="shop-info">Returning customer?

								<a  href="<?php echo base_url(); ?>login" >Click here to login</a>

							</div>



							<div  id="registeredForm">

								<form class="checkout with_border with_padding form-horizontal" role="form" method="post" action="<?php echo base_url(); ?>register-post" onsubmit="return validateRegister()">

									<p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing &amp; Shipping section.</p>



									<div class="form-group">

										<label for="name" class="col-sm-3 control-label">

											<span class="grey">Full Name:</span>

											<span class="required">*</span>

										</label>

										<div class="col-sm-9">

											<input type="text" class="form-control" name="name" id="name">

											<span class="form-error required" id="err_name"></span>

										</div>

									</div>

									<div class="form-group">

										<label for="email" class="col-sm-3 control-label">

											<span class="grey">Email:</span>

											<span class="required">*</span>

										</label>

										<div class="col-sm-9">

											<input type="text" class="form-control" name="email" id="email" onblur="checkMail()">

											<span class="form-error required" id="err_email"></span>

										</div>

									</div>

									<div class="form-group">

										<label for="phone" class="col-sm-3 control-label">

											<span class="grey">Phone:</span>

											<span class="required">*</span>

										</label>

										<div class="col-sm-9">

											<input type="text" class="form-control" name="phone" id="phone" minlength="1" maxlength="15" onblur="checkMobile()">

											<span class="form-error required" id="err_phone"></span>

										</div>

									</div>

									<div class="form-group">

										<label for="password" class="col-sm-3 control-label">

											<span class="grey">Password:</span>

											<span class="required">*</span>

										</label>

										<div class="col-sm-9">

											<input class="form-control" type="password" name="password" id="password">

											<span class="form-error required" id="err_password"></span>

										</div>

									</div>

									<div class="form-group">

										<label for="confirm_password" class="col-sm-3 control-label">

											<span class="grey">Confirm Password:</span>

											<span class="required">*</span>

										</label>

										<div class="col-sm-9">

											<input class="form-control" type="password" name="confirm_password" id="confirm_password">

											<span class="form-error required" id="err_confirm_password"></span>

										</div>

									</div>



									<div class="form-group">

										<div class="col-sm-offset-3 col-sm-9">

											

											<input type="submit" class="theme_button color1 topmargin_20" name="login" value="register">

											

										</div>

									</div>

								</form>

							</div>



							

						</div>

						
					</div>

				</div>

			</section>



	<script type="text/javascript">

		function validateRegister(){ 

			var chk = 1;

			var name 	= $('#name').val();

			var email 	= $('#email').val();

			var phone 	= $('#phone').val();

			var password = $('#password').val();

			var confirm_password = $('#confirm_password').val();



			if(name == ''){

				$('#err_name').html('This field is required').show();

				chk = 0;

			} else {

		      $('#err_name').html('').hide();

		    }



			if(email == ''){

				$('#err_email').html('This field is required').show();

				chk = 0;

			} else if($('#err_email').text().length != 0) { 

		       chk = 0;

		    } else {

		      $('#err_email').html('').hide();

		    }



			if(phone == ''){

				$('#err_phone').html('This field is required').show();

				chk = 0;

			} else if($('#err_phone').text().length != 0) { 

		       chk = 0;

		    } else {

		      $('#err_phone').html('').hide();

		    }



			if(password == ''){

				$('#err_password').html('This field is required').show();

				chk = 0;

			} else if(password.length < 8) {

			   $('#err_password').html('Minimun password length is 8').show(); 

		       chk = 0;

		    } else {

		      $('#err_password').html('').hide();

		    }



			if(confirm_password == ''){

				$('#err_confirm_password').html('This field is required').show();

				chk = 0;

			} else if(confirm_password != password) {

			   $('#err_confirm_password').html('Password mis-matched.').show(); 

		       chk = 0;

		    } else {

		      $('#err_confirm_password').html('').hide();

		    }

			

			if(chk == 0){ 

				return false;

			}

			

		}



	$(document).ready(function(){

	    $("#phone").keypress(function (e) {

	        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {

	            

	            return false;

	        }

	    });

	});



	function isValidEmailAddress(email01) {

        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;

        return pattern.test(email01);

  	}



  	function checkMail() { 

        var email       = $('#email').val();

        

        var url = '<?php echo base_url('check-email') ?>';

        if (email == '') {

            $('#err_email').text('This field is required').show();

            

            return false;

        } else {

            var email2 = isValidEmailAddress(email);

            if(!email2) {

                $('#err_email').text('Invalid Email').show();

                

                return false;

            } else {

                $.ajax({

                    url: url,

                    type: 'post',

                    data: {'email': email},

                    success: function(data) {

                        if (data != '0') {

                            $('#err_email').text('Email already registered.').show();

                            

                            return false;

                        } else {

                            $('#err_email').text('').hide();

                        }

                    }

                });

            }

        }

  	}





  	function checkMobile() { 

        var phone       = $('#phone').val();

        

        var url = '<?php echo base_url('check-phone') ?>';

        if (phone == '') {

            $('#err_phone').text('This field is required').show();

            

            return false;

        } else {

            

            if(phone.length<1) {

                $('#err_phone').text('Invalid Phone').show();

                

                return false;

            } else {

                  

                $.ajax({

                    url: url,

                    type: 'post',

                    data: {'phone': phone},

                    success: function(data) {

                        if (data != '0') {

                            $('#err_phone').text('Phone already registered.').show();

                            

                            return false;

                        } else {

                            $('#err_phone').text('').hide();

                        }

                    }

                });

            }

        }

    }

	</script>