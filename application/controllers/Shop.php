<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Shop extends CI_Controller {

	public function __construct(){
	    parent::__construct();
	    $this->load->model('UserModel','user');
		$this->load->library('ciqrcode');
        $this->load->library('zip');
	    is_user_not_logged_in();
	    $this->load->library('pagination');
	}

	public function index()
	{
		$data['active'] = 'products';
		$this->load->view('header', $data);
		$this->load->view('shop/products');
		$this->load->view('footer');
	}

	public function products()
	{
		$data['active'] = 'products';


		$this->db->select('productmaster.*,productimage.image');
        $this->db->join('productimage', 'productimage.productId=productmaster.id', 'left');
        $this->db->order_by('productmaster.id', 'desc');
        $this->db->group_by('productimage.productId');
		$totalProduct = $this->db->get_where($this->db->dbprefix('productmaster'), array('productmaster.status' => 1))->num_rows();

		$config['base_url'] = base_url('shop-products');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $totalProduct;
		$data['total_rows'] = $totalProduct;
		$config['per_page'] = 12;
		$this->pagination->initialize($config);
		$data["links"]     = $this->pagination->create_links(); 
		$page              = ($this->input->get('per_page')) ? $this->input->get('per_page') : 0;

		$data['per_page']  = $page;

		$this->db->select('productmaster.*,productimage.image');
        $this->db->join('productimage', 'productimage.productId=productmaster.id', 'left');
        $this->db->order_by('productmaster.id', 'desc');
        $this->db->group_by('productimage.productId');
        $this->db->limit($config["per_page"],$page);
        $data['productslist'] = $this->db->get_where($this->db->dbprefix('productmaster'), array('productmaster.status' => 1))->result_array();

       
        
		

		$this->load->view('header', $data);
		$this->load->view('shop/products');
		$this->load->view('footer');
	}


	public function productDetails($id)
	{
		$data['active'] = 'products';
		$data['detail'] = $this->user->getDataById('productmaster', array('id' => $id));
		$data['category'] = $this->user->getDataById('categorymaster', array('id' => $data['detail']['categoryId']));
		$data['images'] = $this->user->getData('productimage', array('productId' => $id));
		$userId = $this->session->userdata('userLogin')['id'];
		$this->db->select('productmaster.*,productimage.image, cart.quantity as cartQuantity');
        $this->db->join('productimage', 'productimage.productId=productmaster.id', 'left');
        $this->db->join('cart', 'cart.productId=productmaster.id', 'left');
        $this->db->order_by('productmaster.id', 'desc');
        $this->db->group_by('productimage.productId');
        $data['productslist'] = $this->db->get_where($this->db->dbprefix('productmaster'), array('cart.userId' => $userId))->result_array();
		$data['cartDetails'] = $this->user->CartList($id,$userId);
		$data['leftpopularimages'] = $this->user->leftpopularimages();
        $data['leftRecentimages'] = $this->user->leftRecentimages();
		$data['categoryList'] = $this->user->getData('categorymaster', array('status' => 1));
		$this->load->view('header', $data);
		$this->load->view('shop/products-details');
		$this->load->view('footer');
	}


	public function addRemoveCart($product_id, $page)
	{  
		$userId = $this->session->userdata('userLogin')['id'];
		$checkIfProductAdded = $this->user->getDataById('cart', array('productId' => $product_id, 'userId' => $userId));
		if(!empty($checkIfProductAdded)){
			$this->user->deleteData('cart', array('id' => $checkIfProductAdded['id']));
		} else {
			$arr =  array(   'userId'        => $userId,
                  	  		'productId'     => $product_id,
                      	  	'quantity'      => 1,
                  	  		'addDate' 		=> date('Y-m-d H:i:s')
                 	);

        	$this->user->insertData($arr, 'cart');
		}
		if($page == 1){
			redirect(base_url('cart'), 'refresh');
		} else {
			redirect(base_url('shop-products'), 'refresh');
		}
	}


	public function userCart()
	{
		$data['active'] = 'cart';
		$userId = $this->session->userdata('userLogin')['id'];
		$this->db->select('productmaster.*,productimage.image, cart.quantity as cartQuantity,cart.id as cartid');
        $this->db->join('productimage', 'productimage.productId=productmaster.id', 'left');
        $this->db->join('cart', 'cart.productId=productmaster.id', 'left');
        $this->db->order_by('productmaster.id', 'desc');
        $this->db->group_by('productimage.productId');
        $data['productslist'] = $this->db->get_where($this->db->dbprefix('productmaster'), array('cart.userId' => $userId))->result_array();
        
        $data['categoryList'] = $this->user->getData('categorymaster', array('status' => 1));
        $data['leftpopularimages'] = $this->user->leftpopularimages();
        $data['leftRecentimages'] = $this->user->leftRecentimages();
		$this->load->view('header', $data);
		$this->load->view('shop/cart-list');
		$this->load->view('footer');
	}
	public function updateQuantity()
	{	
		  $userId = $this->session->userdata('userLogin')['id'];
    	  $cartid  = $this->input->post('cartid');
		  $quantity = $this->input->post('quantity');
    	   $this->db->where('id',$cartid)->update('cart',array('quantity'=>$quantity));
	}
	public function checkout()
	{
		$userId = $this->session->userdata('userLogin')['id'];
		$data['active'] = 'checkout';
		$data['cartList'] =  $this->user->getCartDetails($userId);
		$data['OrderToCollected'] =  $this->user->getOrderToCollectedAddress();
		// print_r($data['OrderToCollected']);
		$this->load->view('header', $data);
		$this->load->view('shop/checkout');
		$this->load->view('footer');
	}

	public function OrderPlace()
	{
		$orderNumber = 100101;

		$last_ord = $this->db->select('orderNumber')->order_by('id','DESC')->limit(1)->get('orders')->row_array();
		if (!empty($last_ord)) {
			$orderNumber = $last_ord['orderNumber']+1;
		}

		$userId = $this->session->userdata('userLogin')['id'];
		$cartList =  $this->user->getCartDetails($userId);
		if(!empty($cartList)){
		 $data = array(
        'name' 						=> $this->input->post('name'),
        'email' 					=> $this->input->post('email'),
        'phone' 					=> $this->input->post('phone'),
        'address' 					=> $this->input->post('address'),
        'country' 					=> $this->input->post('country'),
        'townCity' 					=> $this->input->post('townCity'),
        'orderDeliverredCollected' 	=> $this->input->post('orderDeliverredCollected'),
        'postcode'				  	=> $this->input->post('postcode'),
        'orderComments' 		   	=> $this->input->post('orderComments'),
        'orderNumber'				=>$orderNumber,
        'userId'					=>$userId
        );
		$this->db->insert('orders',$data);
        $orderId=$this->db->insert_id();
        foreach ($cartList as $key => $value) {
		$orderProduct =array(
		'orderId' => $orderId,
		'userId' => $userId,
		'productId' => $value['productId'],
		'productQuantity' => $value['quantity']
		);
           $productQuan = $this->db->select('quantity')->get_where('productmaster',array('id'=>$value['productId']))->row_array();
           $getQun = $productQuan['quantity']-$value['quantity'];
           $this->db->where('id',$value['productId'])->update('productmaster',array('quantity'=>$getQun));
           $this->db->insert('ordersproducts',$orderProduct);
           $this->db->where('id',$value['id']);
           $this->db->delete('cart');
        }

        if($orderId>0){
        	if ($data['orderDeliverredCollected']==2) {
        		$this->generateQR(array('order_id'=>$orderId,'orderNumber'=>$orderNumber));
        	}
           
           $this->session->set_flashdata('success','Order Succcessfully done.');
            redirect('checkout');
        }else{
          echo "Error";
        }

		}else{
        echo "error";
      	}
	}

	public function myOrderList()
	{
		$data['active'] = 'My Orders';
		$userId = $this->session->userdata('userLogin')['id'];
        $data['categoryList'] = $this->user->getData('categorymaster', array('status' => 1));
        $data['leftpopularimages'] = $this->user->leftpopularimages();
        $data['leftRecentimages'] = $this->user->leftRecentimages();
        $data['result'] = $this->user->getMyOrder($userId);
		$this->load->view('header', $data);
		$this->load->view('shop/myorder');
		$this->load->view('footer');
	}

	public function myorderDetails($orderId)
	{
		$data['active'] = 'My Orders';
		$userId = $this->session->userdata('userLogin')['id'];
	    $data['categoryList'] = $this->user->getData('categorymaster', array('status' => 1));
	    $data['leftpopularimages'] = $this->user->leftpopularimages();
	    $data['leftRecentimages'] = $this->user->leftRecentimages();
	   	$data['result'] = $this->user->getMyOrderDetails($orderId);
	   	// echo "<pre>";print_r($data['result']);exit();

	   	$data['getMyOrderId'] = $this->user->getMyOrderId($orderId);
	   	$data['settingAddress'] = $this->db->get('setting')->row_array();
		$this->load->view('header', $data);
		$this->load->view('shop/myorderDetails');
		$this->load->view('footer');
	}

	public function generateQR($params){
		$time 	  = time();
	    $qr_image = 'order_number='.$params['orderNumber'].'_'.$time.'.png';
	    $params['data']     = $params['orderNumber'];
	    $params['level']    = 'H';
	    $params['size']     = 8;
	    $params['savename'] = FCPATH."uploads/my_qr/".$qr_image;
	    if($this->ciqrcode->generate($params)){
	        chmod("uploads/my_qr/".$qr_image, 0777);
	    }

	   $this->db->where('id',$params['order_id'])->update('orders',array('orderQr'=>$qr_image));
  	   return 1;
    }

    public function timetable()
    {
   		$data['active'] = 'Schedule Class';
   		// $orderby 		= $this->input->post('orderby');
   		// $data['orderby']=$orderby;
   		$data['timetableList'] = $this->user->timetableList();

   		 // echo '<pre>'; print_r($data['timetableList']);  die();


   		$maxRow = array_column($data['timetableList'],'num');
   		$data['no_rows'] =  max($maxRow);
		$this->load->view('header', $data);
		$this->load->view('shop/timetable');
		$this->load->view('footer');
    }
    public function UpcyclingSessionDetails($id='',$dd='')
    {
    	$date =  $this->uri->segment(3);
    	$data['active'] 	   = 'Upcycling Session Details';
    	$data['bookingDate']   = base64_decode($date);
    	$userId 			   = $this->session->userdata('userLogin')['id'];
   		$data['UpcyclingList'] = $this->user->UpcyclingDetails($id);
   		$data['bookPeople']    = $this->db->get_where('bookingmaster',array('UpcyclingId'=>$id,'bookingDate'=>$data['bookingDate']))->num_rows();
   		$data['bookdetails']   = $this->db->get_where('bookingmaster',array('UpcyclingId'=>$id,'bookingDate'=>$data['bookingDate'],'userId'=>$userId))->row_array();

   		// echo '<pre>'; print_r($data); die();

		$this->load->view('header', $data);
		$this->load->view('shop/UpcyclingSessionDetails');
		$this->load->view('footer');
    }
    public function SaveUpcycling()
    {
    	if($this->input->post()){ 

    		    $userId = $this->session->userdata('userLogin')['id'];
				$UpcyclingId 		= $this->input->post('UpcyclingId');
				$session_booking_on_date 		= $this->input->post('session_booking_on_date');

				$UpcyclingList = $this->user->UpcyclingDetails($UpcyclingId);
				$bookPeople    = $this->db->get_where('bookingmaster',array('UpcyclingId'=>$UpcyclingId,'bookingDate'=>$session_booking_on_date))->num_rows();

			
				
				$book_btn 		    = $this->input->post('book_btn');
				if ($book_btn=='Book Class') {
					  if ($UpcyclingList['maxnoPeopleInSession']>$bookPeople){
							$insertArr = array(	'UpcyclingId' => $UpcyclingId, 
												'userId' => $userId,
												'bookingDate' => $session_booking_on_date,
												'status' => 1
											);
							$res = $this->user->insertData($insertArr, 'bookingmaster');
							$this->session->set_flashdata('message',generateAdminAlert('S',35));
						}else{
							$this->session->set_flashdata('message',generateAdminAlert('W',37));
						}

					}else{
						$condition = array(	'UpcyclingId' => $UpcyclingId, 
											'userId' => $userId,
											'bookingDate'=>$session_booking_on_date
										);
						$this->db->where($condition)->delete('bookingmaster');
						$this->session->set_flashdata('message',generateAdminAlert('S',36));
					}

				

          	redirect(base_url('Upcycling-Session-Details/'.$UpcyclingId.'/'.base64_encode($session_booking_on_date)), 'refresh');

		}
    }
    public function Viewlocationmap()
    {
    	$data['active'] = 'View location map';
    	$data['settingAddress'] = $this->db->get('setting')->row_array();
		$this->load->view('header', $data);
		$this->load->view('shop/Viewlocationmap');
		$this->load->view('footer');
    }

 
    

    

	
}
