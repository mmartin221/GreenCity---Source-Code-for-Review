<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('UserModel','user');
	}

	// website home page
	public function index()
	{   
		$data['active'] = 'home';
		$this->load->view('header', $data);
		$this->load->view('home');
		$this->load->view('footer');
	}

	// website user login page
	public function login()
	{
		is_user_logged_in();
		$data['active'] = 'login';
		$this->load->view('header', $data);
		$this->load->view('login');
		$this->load->view('footer');
	}

	// user logout function
	public function logout()
	{
	    $this->session->unset_userdata('userLogin');
	    $this->session->set_flashdata('message',generateAdminAlert('S',3));
	    redirect('login');
	}

	// user register page
	public function register()
	{	
		is_user_logged_in();
		$data['active'] = 'register';
		$this->load->view('header', $data);
		$this->load->view('register');
		$this->load->view('footer');
	}

	// user login post function
	public function loginPost()
	{
		if($this->input->post()){
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			$cond = array(	
							'email' 	=> $email, 
							
							'password' 	=> md5($password)
							
						);

			$user = $this->user->getDataById('usermaster', $cond);
			if(!empty($user)) {
				$this->session->set_userdata('userLogin',$user);
	            is_user_logged_in();
	        } else {
	        	$this->session->set_flashdata('message',generateAdminAlert('D',1));
              	redirect(base_url('login'), 'refresh');
	        }
		}
	}

	// user register post function
	public function registerPost()
	{	
		if($this->input->post()){
			$name 		= $this->input->post('name');
			$email 		= $this->input->post('email');
			$phone 		= $this->input->post('phone');
			$password 	= $this->input->post('password');

			$insertArr = array(	'name' 		=> $name, 
								'email' 	=> $email, 
								'phone' 	=> $phone, 
								'password' 	=> md5($password), 
								'status' 	=> 1, 
								'addDate' 	=> date('Y-m-d H:i:s'), 
								'modifyDate' 	=> date('Y-m-d H:i:s')
							);

			$user_id = $this->user->insertData($insertArr, 'usermaster');
			$user = $this->user->getDataById('usermaster', array('id' => $user_id));
			$this->session->set_userdata('userLogin',$user);
            is_user_logged_in();

		}
	}

	// check registering user email uniqueness
	public function checkEmail()
    {
        if($this->input->post()){
            if($this->input->post('id')){
                $email = $this->input->post('email');
                $id = $this->input->post('id');
                $chk = $this->db->get_where('usermaster', array('email' => $email, 'id != ' => $id))->num_rows();
            } else {
                $email = $this->input->post('email');
                $chk = $this->db->get_where('usermaster', array('email' => $email))->num_rows();
            }
            echo $chk;die;
        }
    }

    // check registering user phone uniqueness
    public function checkPhone()
    {
        if($this->input->post()){
            if($this->input->post('id')){
                $phone = $this->input->post('phone');
                $id = $this->input->post('id');
                $chk = $this->db->get_where('usermaster', array('phone' => $phone, 'id != ' => $id))->num_rows();
            } else {
                $phone = $this->input->post('phone');
                $chk = $this->db->get_where('usermaster', array('phone' => $phone))->num_rows();
            }
            echo $chk;die;
        }
    }

    // tips & tricks page
    public function tipsandtricks()
    {
    	$data['active'] = 'Tips and tricks';
		$this->load->view('header', $data);
		$this->load->view('shop/tips-and-tricks');
		$this->load->view('footer');
    }
}
