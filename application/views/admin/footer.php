<section class="page_copyright ds darkblue_bg_color">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            <p class="grey">&copy; Copyrights <?= date('Y')?></p>
                        </div>
                        <div class="col-sm-6 text-sm-right">
                            
                        </div>
                    </div>
                </div>
            </section>

        </div>
        
    </div>
   


    

    <!-- template init -->
    <script src="<?php echo base_url(); ?>assets/js/compressed.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>

    <!-- dashboard libs -->

    <!-- events calendar -->
    <script src="<?php echo base_url(); ?>assets/js/admin/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/admin/fullcalendar.min.js"></script>
    <!-- range picker -->
    <script src="<?php echo base_url(); ?>assets/js/admin/daterangepicker.js"></script>

    <!-- charts -->
    <script src="<?php echo base_url(); ?>assets/js/admin/Chart.bundle.min.js"></script>
    <!-- vector map -->
    <script src="<?php echo base_url(); ?>assets/js/admin/jquery-jvectormap-2.0.3.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/admin/jquery-jvectormap-world-mill.js"></script>
    <!-- small charts -->
    <script src="<?php echo base_url(); ?>assets/js/admin/jquery.sparkline.min.js"></script>

    <!-- dashboard init -->
    <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>

    <script type="text/javascript">
  $(document).ready(function() { 
    if($("#pro-image" + name).length != 0) {
        document.getElementById('pro-image').addEventListener('change', readImage, false);
        
        $( ".preview-images-zone" ).sortable();
        
        $(document).on('click', '.image-delete', function() {
            let no = $(this).data('no');
            $(".preview-image.preview-show-"+no).remove();
        });
    }

    $(".num_only").keypress(function (e) {
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            
            return false;
        }
    });
});





var num = 4;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");

        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;
            
            var picReader = new FileReader();
            
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel image-delete" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
        // $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}


function deleteImage(id, num){
    var url = '<?php echo base_url('delete-product-image') ?>';
    $.ajax({
        url: url,
        type: 'post',
        data: {'id': id},
        success: function(res) { 
            $(".preview-image.preview-show-"+num).remove();
              
        }
    });
}


function isValidEmailAddress(email01) {
        var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
        return pattern.test(email01);
    }

    function checkMail() { 
        var email       = $('#email').val();
        
        var url = '<?php echo base_url('check-user-email') ?>';
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


    function validateUser(){
        chk = 1;
        if($('#err_email').text().length != 0) { 
           chk = 0;
        } else {
          $('#err_email').html('').hide();
        }

        if(chk == 0){ 
            return false;
        }
    }


  </script>
  

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

</body>


</html>