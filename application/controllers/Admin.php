<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('UserModel','user');
	}

	//admin login page with default function
	public function index()
	{   
		is_logged_in();
		
		$this->load->view('admin/login');
		
	}

	//admin login page with login function
	public function login()
	{
		is_logged_in();
		
		$this->load->view('admin/login');
		
	}

	////admin logout page 
	public function logout()
	{
	    $this->session->unset_userdata('adminLogin');
	    $this->session->set_flashdata('message',generateAdminAlert('S',3));
	    redirect('admin-login');
	}

	
	// admin login post function
	public function loginPost()
	{
		if($this->input->post()){
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			$cond = array(	
							'email' 	=> $email, 
							
							'password' 	=> md5($password)
							
						);

			$admin = $this->user->getDataById('admin', $cond);
			if(!empty($admin)) {
				$this->session->set_userdata('adminLogin',$admin);
	            is_logged_in();
	        } else {
	        	$this->session->set_flashdata('message',generateAdminAlert('D',1));
              	redirect(base_url('admin-login'), 'refresh');
	        }
		}
	}

	// admin dashboard page after login
	public function dashboard()
	{
		is_not_logged_in();

		$data['getallOrder'] = $this->user->getAllOrder();
		$data['getallTimetable'] = $this->user->getallTimetable();
		// echo "<pre>";print_r($data['getallTimetable'] );exit;
		$this->load->view('admin/header',$data);
		$this->load->view('admin/dashboard');
		$this->load->view('admin/footer');
	}

	// product listing page
	public function products()
	{
		is_not_logged_in();

		$data['result'] = $this->user->getData('productmaster', array('status!=' => 3));

		$this->load->view('admin/header', $data);
		$this->load->view('admin/products');
		$this->load->view('admin/footer');
	}

	// add product page with post function
	public function addProduct()
	{
		is_not_logged_in();

		$data['category'] = $this->user->getData('categorymaster', array('status' => 1));

		if($this->input->post()){
			$name 					= $this->input->post('name');
			$category 				= $this->input->post('category');
			$quantity 				= $this->input->post('quantity');
			$description 			= $this->input->post('description');
			$descriptionLong 		= $this->input->post('descriptionLong');

			$insertArr = array(	'name' 						=> $name, 
								'categoryId' 				=> $category, 
								'quantity' 					=> $quantity, 
								'description' 				=> $description, 
								'descriptionLong' 			=> $descriptionLong, 
								'status' 					=> 1,
								'addedBy'       			=> $this->session->userdata('adminLogin')['id'],
								'addDate' 					=> date('Y-m-d H:i:s'), 
								'modifyDate' 				=> date('Y-m-d H:i:s')
							);

			$product_id = $this->user->insertData($insertArr, 'productmaster');

			$countfiles = count($_FILES['image']['name']); 
       
	         // Looping all files
	        for($i=0;$i<$countfiles;$i++){
	           $filename = $_FILES['image']['name'][$i]; 
	           // $path = $_SERVER['DOCUMENT_ROOT'].'/greencity/uploads/'; 
	            $path = 'greencity/uploads/'; 


	          // die();
	           
	           // Upload file
	            move_uploaded_file($_FILES['image']['tmp_name'][$i],$path.$filename); 

	           $arrImg = array( 'image'        	=> $_FILES['image']['name'][$i],
                      	  		'productId'     => $product_id,
                      	  
                      	  		'addDate' 		=> date('Y-m-d H:i:s')
                 	);

        		$this->user->insertData($arrImg, 'productimage');
	           
	            
	        }

	        $this->session->set_flashdata('message',generateAdminAlert('S',20));
          	redirect(base_url('admin-products'), 'refresh');

		}

		$this->load->view('admin/header', $data);
		$this->load->view('admin/product-add');
		$this->load->view('admin/footer');
	}

	// edit product page with post function
	public function editProduct($id)
	{
		is_not_logged_in();

		$data['category'] = $this->user->getData('categorymaster', array('status' => 1));
		$data['result'] = $this->user->getDataById('productmaster', array('id' => $id));
		$data['images'] = $this->user->getData('productimage', array('productId' => $id));

		if($this->input->post()){
			$name 					= $this->input->post('name');
			$category 				= $this->input->post('category');
			$quantity 				= $this->input->post('quantity');
			$description 			= $this->input->post('description');
			$descriptionLong 		= $this->input->post('descriptionLong');

			$updateArr = array(	'name' 						=> $name, 
								'categoryId' 				=> $category, 
								'quantity' 					=> $quantity, 
								'description' 				=> $description, 
								'descriptionLong' 			=> $descriptionLong, 
								'status' 					=> 1,
								'addedBy'       			=> $this->session->userdata('adminLogin')['id'],
								'addDate' 					=> date('Y-m-d H:i:s'), 
								'modifyDate' 				=> date('Y-m-d H:i:s')
							);
			$this->user->updateData($updateArr, 'productmaster', array('id' => $id));
			
			$countfiles = count($_FILES['image']['name']); 
       
       		if($countfiles > 0) {
		         // Looping all files
		        for($i=0;$i<$countfiles;$i++){
		           $filename = $_FILES['image']['name'][$i];
		           if(!empty($filename)) {
			           // $path = $_SERVER['DOCUMENT_ROOT'].'/greencity/uploads/'; 
		           	 $path = 'greencity/uploads/'; 
			           
			           // Upload file
			            move_uploaded_file($_FILES['image']['tmp_name'][$i],$path.$filename); 

			           $arrImg = array( 'image'        	=> $_FILES['image']['name'][$i],
                      	  		'productId'     => $id,
                      	  
                      	  		'addDate' 		=> date('Y-m-d H:i:s')
                 		);

		        		$this->user->insertData($arrImg, 'productimage');
		           
		            }
		        }
		    }

	        $this->session->set_flashdata('message',generateAdminAlert('S',20));
          	redirect(base_url('admin-products'), 'refresh');

		}

		$this->load->view('admin/header', $data);
		$this->load->view('admin/product-edit');
		$this->load->view('admin/footer');
	}

	// product category listing page
	public function category()
	{
		is_not_logged_in();

		$data['result'] = $this->user->getData('categorymaster', array('status!=' => 3));

		$this->load->view('admin/header', $data);
		$this->load->view('admin/category');
		$this->load->view('admin/footer');
	}

	// add product category page with post function
	public function addCategory()
	{
		is_not_logged_in();

		if($this->input->post()){
			$name 		= $this->input->post('name');

			$insertArr = array('name' => $name, 
								'status' => 1,
								'addedBy'       => $this->session->userdata('adminLogin')['id'],
								'addDate' => date('Y-m-d H:i:s'), 
								'modifyDate' => date('Y-m-d H:i:s')
							);

			$res = $this->user->insertData($insertArr, 'categorymaster');

			$this->session->set_flashdata('message',generateAdminAlert('S',20));
          	redirect(base_url('admin-category'), 'refresh');

		}

		$this->load->view('admin/header');
		$this->load->view('admin/category-add');
		$this->load->view('admin/footer');
	}

	// edit product category page with post function
	public function editCategory($id)
	{
		is_not_logged_in();

		if($this->input->post()){
			$name 		= $this->input->post('name');
			$status 		= $this->input->post('status');

			$updateArr = array('name' => $name, 
								'status' => $status,
								
								'modifyDate' => date('Y-m-d H:i:s')
							);

			$res = $this->user->updateData($updateArr, 'categorymaster', array('id' => $id));

			$this->session->set_flashdata('message',generateAdminAlert('S',7));
          	redirect(base_url('admin-category'), 'refresh');

		}

		$data['result'] = $this->user->getDataById('categorymaster', array('id' => $id));

		$this->load->view('admin/header', $data);
		$this->load->view('admin/category-edit');
		$this->load->view('admin/footer');
	}

	// admin users or staff listing page
	public function users()
	{
		is_not_logged_in();

		$data['result'] = $this->user->getData('admin', array('status!=' => 3, 'userType' => 2));

		$this->load->view('admin/header', $data);
		$this->load->view('admin/users');
		$this->load->view('admin/footer');
	}

	// add admin staff page with post
	public function addUser()
	{
		is_not_logged_in();

		if($this->input->post()){ 
			$name 		= $this->input->post('name');
			$email 		= $this->input->post('email');
			$phone 		= $this->input->post('phone');
			$password 		= $this->input->post('password');

			$insertArr = array(	'name' => $name, 
								'email' => $email, 
								'phone' => $phone, 
								'password' => md5($password), 
								'userType' => 2,
								'status' => 1,
								'addDate' => date('Y-m-d H:i:s'), 
								'modifyDate' => date('Y-m-d H:i:s')
							);

			$res = $this->user->insertData($insertArr, 'admin');

			$this->session->set_flashdata('message',generateAdminAlert('S',20));
          	redirect(base_url('add-staff'), 'refresh');

		}

		$this->load->view('admin/header');
		$this->load->view('admin/user-add');
		$this->load->view('admin/footer');
	}

	// edit admin staff page with post
	public function editUser($id)
	{
		is_not_logged_in();

		if($this->input->post()){ 
			$name 		= $this->input->post('name');
			$email 		= $this->input->post('email');
			$phone 		= $this->input->post('phone');
			$status 		= $this->input->post('status');

			if($this->input->post('password')){
				$password 		= $this->input->post('password');

				$updateArr = array(	'name' => $name, 
									'email' => $email, 
									'phone' => $phone, 
									'password' => md5($password), 
									
									'status' => $status,
									
									'modifyDate' => date('Y-m-d H:i:s')
								);
			} else {
				$updateArr = array(	'name' => $name, 
									'email' => $email, 
									'phone' => $phone, 
									
									
									'status' => $status,
									
									'modifyDate' => date('Y-m-d H:i:s')
								);
			}

			$res = $this->user->updateData($updateArr, 'admin', array('id' => $id));

			$this->session->set_flashdata('message',generateAdminAlert('S',7));
          	redirect(base_url('admin-staff'), 'refresh');

		}
		$data['result'] = $this->user->getDataById('admin', array('id' => $id));
		$this->load->view('admin/header', $data);
		$this->load->view('admin/user-edit');
		$this->load->view('admin/footer');
	}

	//delete product image 
	public function deleteProductImage()
	{
		if($this->input->post()){
			$id   = $this->input->post('id');

			$product_images = $this->user->getDataById('productimage', array('id'   	=> $id));

			unlink("uploads/".$product_images['image']);

			$this->db->where('id', $id);
    		$this->db->delete('productimage');

    		echo 1;die;
		}
	}

	// check admin staff email uniqueness
	public function checkEmail()
    {
        if($this->input->post()){
            if($this->input->post('id')){
                $email = $this->input->post('email');
                $id = $this->input->post('id');
                $chk = $this->db->get_where('admin', array('email' => $email, 'id != ' => $id))->num_rows();
            } else {
                $email = $this->input->post('email');
                $chk = $this->db->get_where('admin', array('email' => $email))->num_rows();
            }
            echo $chk;die;
        }
    }

    // order listing page
    public function orderList()
    {
		is_not_logged_in();
		$data['result'] = $this->user->getOrder();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/order');
		$this->load->view('admin/footer');
    }

    // order details page by order id
    public function orderDetails($orderId='')
    {	
    	is_not_logged_in();
    	$data['result'] = $this->user->getOrderDetails($orderId);
    	$data['getOrderId'] = $this->user->getOrderId($orderId);
    	$data['settingAddress'] = $this->db->get('setting')->row_array();
    	$this->load->view('admin/header',$data);
		$this->load->view('admin/orderdetails');
		$this->load->view('admin/footer');
    }

    // add time table page
    public function addtimetablt()
    {
    	is_not_logged_in();
		$this->load->view('admin/header');
		$this->load->view('admin/add-timetablt');
		$this->load->view('admin/footer');
    }


    // add time table post function
   	public function saveTimetablt()
    {
    	is_not_logged_in();

		if($this->input->post()){
			$sessionEventName 					= $this->input->post('sessionEventName');
			$startDate 							= $this->input->post('startDate');
			$newstartDate 						= date("Y-m-d", strtotime($startDate));
			$endDate 							= $this->input->post('endDate');
			$newendDate 						= date("Y-m-d", strtotime($endDate));
		    $startTime 							= $this->input->post('startTime');
			$endTime 							= $this->input->post('endTime');
			$maxnoPeopleInSession 				= $this->input->post('maxnoPeopleInSession');
			$recyclingCenterName 				= $this->input->post('recyclingCenterName');
			$recyclingCenterAddress 			= $this->input->post('recyclingCenterAddress');
			$description 						= $this->input->post('description');

			$insertArr = array(	'sessionEventName' 		=> $sessionEventName, 
								'startDate' 			=> $newstartDate, 
								'endDate' 			    => $newendDate, 
								'startTime' 			=> $startTime, 
								'endTime' 				=> $endTime, 
								'maxnoPeopleInSession' 	=> $maxnoPeopleInSession, 
								'recyclingCenterName' 	=> $recyclingCenterName,
								'recyclingCenterAddress'=> $recyclingCenterAddress,
								'description' 			=> $description
							);

			$res = $this->user->insertData($insertArr, 'timetable');

	        $this->session->set_flashdata('message',generateAdminAlert('S',20));
          	redirect(base_url('admin-timetable'), 'refresh');

		}
    }

    // timetable listing page
    public function timetableList()
    {
    	is_not_logged_in();
    	$condition = array('status!='=>10);
		$data['timetableList'] = $this->user->getData('timetable',$condition);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/timetableList');
		$this->load->view('admin/footer');
    } 

    // edit timetable page
    public function editTimetable($id)
    {
    	is_not_logged_in();
		$data['timetableDetails'] = $this->user->getDataById('timetable', array('id' => $id));
		$this->load->view('admin/header', $data);
		$this->load->view('admin/edit-timetablt');
		$this->load->view('admin/footer');
    }

    // edit timetable save function
    public function updateTimetable($id='')
    {
    		if($this->input->post()){
			$sessionEventName 					= $this->input->post('sessionEventName');
			$startDate 							= $this->input->post('startDate');
			$newstartDate 						= date("Y-m-d", strtotime($startDate));
			$endDate 							= $this->input->post('endDate');
			$newendDate 						= date("Y-m-d", strtotime($endDate));
		    $startTime 							= $this->input->post('startTime');
			$endTime 							= $this->input->post('endTime');
			$maxnoPeopleInSession 				= $this->input->post('maxnoPeopleInSession');
			$recyclingCenterName 				= $this->input->post('recyclingCenterName');
			$recyclingCenterAddress 			= $this->input->post('recyclingCenterAddress');
			$description 						= $this->input->post('description');

			$updateArr = array(	'sessionEventName' 		=> $sessionEventName, 
								'startDate' 			=> $newstartDate, 
								'endDate' 			    => $newendDate, 
								'startTime' 			=> $startTime, 
								'endTime' 				=> $endTime, 
								'maxnoPeopleInSession' 	=> $maxnoPeopleInSession, 
								'recyclingCenterName' 	=> $recyclingCenterName,
								'recyclingCenterAddress'=> $recyclingCenterAddress,
								'description' 			=> $description
							);

			$this->user->updateData($updateArr, 'timetable', array('id' => $id));

	        $this->session->set_flashdata('message',generateAdminAlert('S',7));
          	redirect(base_url('timetable-List'), 'refresh');

		}
    }

    // registered user detail page by user id
    public function userDetails($id='')
    {
    	is_not_logged_in();
		$data['bookingUserDetails'] = $this->user->getbookingUser($id);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/userdetails');
		$this->load->view('admin/footer');
    }

    // register user listing page
     public function registerUser()
    {
    	is_not_logged_in();
		$data['result'] = $this->user->getregisterUser();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/register-user');
		$this->load->view('admin/footer');
    }

    // setting page
    public function adminSetting()
    {
    	is_not_logged_in();
    	$data['settingDetails']   =  $this->db->get('setting')->row_array();
		$this->load->view('admin/header',$data);
		$this->load->view('admin/admin-setting');
		$this->load->view('admin/footer');
    }


    // save setting data
    public function addsetting()
    {
    	is_not_logged_in();
		$data['settingDetails']   =  $this->db->get('setting')->row_array();
		if($this->input->post()){

			$recyclingCenterName 	= $this->input->post('recyclingCenterName');
			$address 					= $this->input->post('address');

			
			$insertArr = array(	'recyclingCenterName' 		=> $recyclingCenterName, 
								'address' 					=> $address 
								
							);

			if(empty($data['settingDetails'])){
			   $this->user->insertData($insertArr, 'setting');
			}else{
				$this->user->updateData($insertArr, 'setting',array('id'=>$data['settingDetails']['id']));
			}

	        $this->session->set_flashdata('message',generateAdminAlert('S',20));
          	redirect(base_url('admin-setting'), 'refresh');

		}
    }
   
}
