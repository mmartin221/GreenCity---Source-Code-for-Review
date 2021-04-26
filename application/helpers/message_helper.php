<?php
function getAlertMessage($code){
                 $codes = Array(
                    '1' => 'Invalid Username/Email or Password.',
                    '2' => '!Oops something went wrong.',
                    '3' => 'Account has been logout successfully',
                    '4' => 'Profile has been update successfully',
                    '5' => '!Oops old password not match. Please try again.',
                    '6' => 'Password has been changed successfully.',
                    '7' => 'Record has been updated successfully.',
                    '8' => 'Record has been deleted successfully.',
                    '9' => 'Record has been deactivated successfully.',
                    '10' =>'Record has been activated successfully.',
                    '11' =>'Please enter your name.',
                    '12' =>'Please enter email id.',
                    '13' =>'!oops this is invalid email id',
                    '14' =>'!oops this email id already exist in database.',
                    '15' =>'Welcome to join with us.Please verify your email id.',
                    '16' =>'Please enter login password.',
                    '17' =>'!Oops your Account has been blocked. Please contact with support team.',
                    '18' =>'Password has been sent to your email id.',
                    '19' =>'Location has been approved successfully',
                    '20' =>'Record has been added successfully',
                    '21' =>'Notification has been send successfully',
                    '22' =>'!Oops device not active.',
                    '23' =>'Dealer account has been added successfully',
                    '24' =>'Employee account has been added successfully',
                    '25' =>'Shop account has been added successfully',
                    '26' =>'Record has been added successfully',
                    '27' =>'Offer has been added successfully',
                    '28' =>'Customer account has been added successfully',
                    '29' =>'Defected stock has been added successfully',
                    '30' =>'User account has been blocked successfully',
                    '31' =>'User account has been unblocked successfully',
                    '32' =>'Gift sent to user successfully',
                    '33' =>'Notification sent to user successfully',
                    '34' =>'Notification sent to all user successfully',
                    '35' =>'Booking class have been successfully done.',
                    '36' =>'Booking class have been successfully canceled.',
                    '37' =>'Sorry Unavailable booking class.'
                  );
    return (isset($codes[$code])) ? $codes[$code] : '';
}
function getAlertBody($class, $message){
    $alert  =   '<div class="alert alert-'.$class.'">
                    '.$message.'
                </div>';

    return $alert;
}
function generateAdminAlert($type, $messageCode){
    if($type == 'S'){
        $flash_msg = getAlertBody("success", getAlertMessage($messageCode));
    }elseif($type == 'I'){
        $flash_msg = getAlertBody("info", getAlertMessage($messageCode));
    }elseif($type == 'W'){
        $flash_msg = getAlertBody("warning", getAlertMessage($messageCode));
    }elseif($type == 'D'){
        $flash_msg = getAlertBody("danger", getAlertMessage($messageCode));
    }

    return $flash_msg;
}
function getCustomAlert($type, $message){
    if($type == 'S'){
        $flash_msg = getAlertBody("success", $message);
    }elseif($type == 'I'){
        $flash_msg = getAlertBody("info", $message);
    }elseif($type == 'W'){
        $flash_msg = getAlertBody("warning", $message);
    }elseif($type == 'D'){
        $flash_msg = getAlertBody("danger", $message);
    }

    return $flash_msg;
}

/* login/session methods */
// Check login status if already login redirect it to dashboard
function is_logged_in() {
    $obj =& get_instance();
    $adminData = $obj->session->userdata('adminLogin');
    if (!empty($adminData)) {
        redirect('admin-dashboard');
    }
}
// Check login status if not login redirect it to login page
function is_not_logged_in() {
    $obj =& get_instance();
    $adminData = $obj->session->userdata('adminLogin');
    if (empty($adminData)) {
      redirect('admin');
    }
}
function GetPostData($perameter=false){
    $obj =& get_instance();
    if($perameter)
    return $obj->input->post($perameter);
    return $obj->input->post();
}
function GetData($perameter=false){
    $obj =& get_instance();
    if($perameter)
    return $obj->input->GET($perameter);
    return $obj->input->GET();
}
function activeAccount(){
    return array('status'=>1);
}


function is_user_logged_in() {
    $obj =& get_instance();
    $userData = $obj->session->userdata('userLogin');
    if (!empty($userData)) {
        redirect('shop-products');
    }
}
// Check login status if not login redirect it to login page
function is_user_not_logged_in() {
    $obj =& get_instance();
    $userData = $obj->session->userdata('userLogin');
    if (empty($userData)) {
      redirect('login');
    }
}

  