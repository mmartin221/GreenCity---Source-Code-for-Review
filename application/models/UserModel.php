<?php
class UserModel extends CI_Model{
    public function __construct(){
        parent::__construct();
        $this->status = 'status';
      }
    // Admin Account login here
     public function userAccountLogin()
     {
         $response = $this->input->post();
         // print_r($response);exit;s
         if(!empty($response)):
            //   If not empty then here if user account has been exist then it will login
             $this->db->where('email',$response['username']);
             $this->db->where('password',base64_encode($response['password']));
             $result = $this->db->get_where('admin',array($this->status => 1))->row_array();
              if(!empty($result)):
                 $this->session->set_userdata('adminLogin',$result);
                 is_logged_in();
              else:
                $this->session->set_flashdata('message',generateAdminAlert('D',1));
              return false;
              endif;
            //   Check it here login is valid or not
         else:
            $this->session->set_flashdata('message',generateAdminAlert('D',1));
            return false;
         endif;
            // Redirect on the login page
     } 
   // Return here total number of user list
   public function getDataById($table, $cond)
   {
      
      return $this->db->get_where($table,$cond)->row_array();
   }
   
   public function getData($table, $cond)
   {
      
      return $this->db->get_where($table,$cond)->result_array();

   }
   

   public function insertData($arr, $table){
      $this->db->insert($table, $arr);
      return $this->db->insert_id();
   }

   public function updateData($arr, $table, $cond){
    $this->db->where($cond);
    $this->db->update($table, $arr);
    return 1;
   }

   public function deleteData($table, $cond){
      $this->db->where($cond);
      $this->db->delete($table);
      return 1;
   }
   public function leftpopularimages()
   {
     $this->db->select('pro.*,img.image');
     $this->db->from('productmaster as pro');
     $this->db->join('productimage as img','img.productId=pro.id','left');
     $this->db->group_by('pro.id');
     $this->db->limit(3);
     $query = $this->db->get()->result_array();
     return $query;
   }
     public function leftRecentimages()
   {
     $this->db->select('pro.*,img.image');
     $this->db->from('productmaster as pro');
     $this->db->join('productimage as img','img.productId=pro.id','left');
     $this->db->group_by('pro.id');
     $this->db->limit(3);
     $this->db->order_by('id','DESC');
     $query = $this->db->get()->result_array();
     return $query;
   }
    public function CartList($id='',$userId='')
    {
       $query = $this->db->select('*')->get_where('cart',array('productId'=>$id,'userId'=>$userId))->row_array();
       return $query;
   }
   public function getCartDetails($userId='')
   {
     $this->db->select('cart.*,productmaster.name');
     $this->db->from('cart');
     $this->db->join('productmaster','productmaster.id=cart.productId','left');
     $this->db->where('userId',$userId);
     $this->db->group_by('cart.id');// add group_by
     $query = $this->db->get()->result_array();
     return $query;
   }

   public function getOrderToCollectedAddress()
   {
     $this->db->select('*');
     $this->db->from('setting');
     $query = $this->db->get()->row_array();
     return $query;
   }

   public function getOrder()
   {
     $this->db->select('*');
     $this->db->from('orders');
     $this->db->order_by('id','DESC');
     $query = $this->db->get()->result_array();
     return $query;
   }

   public function getOrderDetails($orderId='')
   {
      $this->db->select('prodet.*,usermaster.name as user_name,productmaster.name as prodct_name');
      $this->db->from('ordersproducts as prodet');
      $this->db->join('usermaster','usermaster.id=prodet.userId','left');
      $this->db->join('productmaster','productmaster.id=prodet.productId','left');
      $this->db->where('orderId',$orderId);
      $query = $this->db->get()->result_array();
      return $query;
   }
   public function getMyOrder($userId)
   {
      $this->db->select('*');
      $this->db->from('orders');
      $this->db->where('userId',$userId);
      $this->db->order_by('id','DESC');
      $query = $this->db->get()->result_array();
      return $query;
   }
   public function getMyOrderDetails($orderId='')
   {
      $userId = $this->session->userdata('userLogin')['id'];
      $this->db->select('prodet.*,productimage.image,productmaster.name');
      $this->db->from('ordersproducts as prodet');
      $this->db->join('productimage','productimage.productId=prodet.productId','left');
      $this->db->join('productmaster','productmaster.id=prodet.productId','left');
      $this->db->where('orderId',$orderId);
      $this->db->where('userId',$userId);
      $this->db->group_by('prodet.id');
      $this->db->group_by('prodet.orderId');
      $query = $this->db->get()->result_array();
      return $query;
   } 

   public function getMyOrderId($orderId)
   {
      $this->db->select('*');
      $this->db->from('orders');
      $this->db->where('id',$orderId);
      $query = $this->db->get()->row_array();
      return $query;
   }  


   // for admin order----
  public function getOrderId($orderId)
   {
      $this->db->select('*');
      $this->db->from('orders');
      $this->db->where('id',$orderId);
      $query = $this->db->get()->row_array();
      return $query;
   }

    public function timetableList()
    {

      $userId = $this->session->userdata('userLogin')['id'];
      // echo $userId;die();
        $result = array();
        $curr_date = date('Y-m-d');
       
        for ($i=0; $i <=7 ; $i++) { 
        $date = date('Y-m-d', strtotime($curr_date . ' +'.$i.' day'));
        $this->db->select('*');
        $this->db->from('timetable');
        $this->db->where(array('status!='=>3,'startDate<='=>$date,'endDate>='=>$date));
        
        $obj = $this->db->get();
        $query = $obj->result_array();
        $num = $obj->num_rows();

        if ($query) { foreach ($query as $key => $value) {
            $booking_id = $this->db->select('id')->get_where('bookingmaster',array('UpcyclingId'=>$value['id'],'bookingDate'=>$date))->num_rows();
            $booked     = $this->db->select('id')->get_where('bookingmaster',array('userId'=>$userId,'UpcyclingId'=>$value['id'],'bookingDate'=>$date))->row_array();
           
            if ($value['maxnoPeopleInSession']==$booking_id){
               $query[$key]['booking_id'] = 'full';
            }else{
              $query[$key]['booking_id'] = '';
            }

            if (!empty($booked)){
              $query[$key]['booked'] = $booked['id'];
            }else{  
                $query[$key]['booked'] = '';
            }
           
          }
        }

        $result[$i]['date'] = $date;
        $result[$i]['list'] = $query;
        $result[$i]['num'] = $num;
      }
      return $result;
    }
    public function UpcyclingDetails($id='')
    {
      $this->db->select('*');
      $this->db->from('timetable');
      $this->db->where('id',$id);
      $query = $this->db->get()->row_array();
      return $query;
    }
    public function getbookingUser($id='')
    { 
        $this->db->select('bookingmaster.*,timetable.sessionEventName,usermaster.name,usermaster.email,usermaster.phone,');
        $this->db->from('bookingmaster');
        $this->db->join('timetable','timetable.id=bookingmaster.UpcyclingId');
        $this->db->join('usermaster','usermaster.id=bookingmaster.userId');
        $this->db->where('bookingmaster.UpcyclingId',$id);
        $query = $this->db->get()->result_array();
        return $query;


    }
    public function getregisterUser()
    {
      $this->db->select('*');
      $this->db->from('usermaster');
      $this->db->where('status!=',3);
      $query = $this->db->get()->result_array();
      return $query;
    }


    public function getAllOrder()
    {
      $this->db->select('*');
      $this->db->from('orders');
      $this->db->where('status!=',3);
      $this->db->order_by('id','DESC');
      $this->db->limit(5);
      $query = $this->db->get()->result_array();
      return $query;
    } 
    public function getallTimetable()
    {
      $this->db->select('*');
      $this->db->from('timetable');
      $this->db->where('status!=',3);
      $this->db->order_by('id','DESC');
      $this->db->limit(5);
      $query = $this->db->get()->result_array();
      return $query;
    }

}// last close
?>