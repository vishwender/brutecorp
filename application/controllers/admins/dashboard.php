<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','auth','form_validation','email'));
        $this->load->helper(array('inflector','html','url','aw_helper'));
        /** set the profiler on/off to get details of the fetching data and memory usage **/
		$this->load->model(array('back_model'));
		$this->output->enable_profiler(false);	
		if($this->auth->logged_in('admin') != TRUE){
			redirect('admins');
		}
	}
	//-----------------------------------------------------------
	public function index()
	{
		$data['title']='Dashboard';
		$data['main']='dashboard-new';
		$data['franchise']['total']=$this->db->where(array('user_role_id'=> 3))->count_all_results('bc_users');
		$data['franchise']['active']=$this->db->where(array('user_role_id'=> 3,'user_status'=>'active'))->count_all_results('bc_users');
		$data['franchise']['inactive']=$this->db->where(array('user_role_id'=> 3,'user_status'=>'inactive'))->count_all_results('bc_users');
		
		$data['user']['total']=$this->db->where(array('user_role_id'=> 2))->count_all_results('bc_users');
		$data['user']['active']=$this->db->where(array('user_role_id'=> 2,'user_status'=>'active'))->count_all_results('bc_users');
		$data['user']['inactive']=$this->db->where(array('user_role_id'=> 2,'user_status'=>'inactive'))->count_all_results('bc_users');
		
		$data['category']=$this->db->where(array('category_parent_id'=>0))->count_all_results('bc_sv_category');
		$data['subcategory']=$this->db->where(array('category_parent_id <>'=>0))->count_all_results('bc_sv_category');
		
		$data['portfolio']=$this->db->where(array())->count_all_results('bc_portfolio');
		
		$this->load->view('admin-template',$data);
	}
	function users()
	{
		$data['main']='list-users-new';
		$data['franchise'] = $this->back_model->select_row_where_db('bc_users',array('user_role_id = 2'),'*','user_id','desc');
		$data['title']='User List';
		$this->load->view('admin-template',$data);
	}

	public function add()
	{
		$this->form_validation->set_rules('name','Franchise Name','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('email','email','trim|required|xss_clean|valid_email|htmlspecialchars');
		$this->form_validation->set_rules('mobile','mobile','trim|required|xss_clean|max_length[10]|htmlspecialchars');
		$this->form_validation->set_rules('address','Address','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('username','Username','trim|required|max_length[20]|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('status','Status','trim|required|xss_clean|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE)
		{
			if(empty($_FILES['userfile']['name']))
			{
				$data = array('user_fullname'=>$this->input->post('name',TRUE),
						  'user_name_on_bill'=>$this->input->post('name',TRUE),
						  'user_username'=>$this->input->post('username',TRUE),
						  'user_email'=>$this->input->post('email',TRUE),
						  'user_mobile'=>$this->input->post('mobile',TRUE),
						  'user_address'=>$this->input->post('address',TRUE),
						  'user_username'=>$this->input->post('username',TRUE),
						  'user_status'=>$this->input->post('status',TRUE),
						  'user_state'=>$this->input->post('state',TRUE),
						  'user_zip'=>$this->input->post('pin',TRUE),
						  'user_dob'=>$this->input->post('dob',TRUE),
						  'user_role_id'=>$this->input->post('user_role_id',TRUE),
						  'user_city'=>$this->input->post('city',TRUE));	
			}
			else
			{
				$config['upload_path'] = './resources/uploads';
		 		$config['allowed_types'] = "gif|jpg|png|jpeg";
		 		$this->load->library('upload',$config);
		 		if(! $this->upload->do_upload('userfile'))
		 		{
		 			echo 'error';
		 		}
		 		else
		 		{
		 			$imageData = $this->upload->data();
		 		}
		 		
		 		$data = array('user_fullname'=>$this->input->post('name',TRUE),
						  'user_name_on_bill'=>$this->input->post('name',TRUE),
						  'user_username'=>$this->input->post('username',TRUE),
						  'user_email'=>$this->input->post('email',TRUE),
						  'user_mobile'=>$this->input->post('mobile',TRUE),
						  'user_address'=>$this->input->post('address',TRUE),
						  'user_username'=>$this->input->post('username',TRUE),
						  'user_status'=>$this->input->post('status',TRUE),
						  'user_state'=>$this->input->post('state',TRUE),
						  'user_zip'=>$this->input->post('pin',TRUE),
						  'user_dob'=>$this->input->post('dob',TRUE),
						  'user_role_id'=>$this->input->post('user_role_id',TRUE),
						  'user_city'=>$this->input->post('city',TRUE),
						  'user_image'=>$imageData['file_name']);
			}
			
			$this->back_model->insert_db('bc_users',$data);
			$this->session->set_flashdata('message','User Added successfully!');
			redirect('admins/dashboard/users');
		}
		else
		{
			$data['main']='add-user-new';
			$data['title']='Add User';
			$this->load->view('admin-template',$data);
		}	
	}


	public function edit($id=NULL)
	{
		
		 $this->form_validation->set_rules('name','Franchise Name','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('email','email','trim|required|xss_clean|valid_email|htmlspecialchars');
		 $this->form_validation->set_rules('mobile','mobile','trim|required|xss_clean|max_length[10]|htmlspecialchars');
		 $this->form_validation->set_rules('address','Address','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('state','State','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('city','City','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('pin','Pin','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('dob','Date of Birth','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('username','Username','trim|required|max_length[20]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('password','Password','trim|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('status','Status','trim|required|xss_clean|htmlspecialchars');
		 	
		 if($this->form_validation->run() == TRUE)
		 {
		 	if(empty($_FILES['userfile']['name']))
		 	{
		 		$data = array('user_fullname'=>$this->input->post('name',TRUE),
						  'user_name_on_bill'=>$this->input->post('name',TRUE),
						  'user_username'=>$this->input->post('username',TRUE),
						  'user_email'=>$this->input->post('email',TRUE),
						  'user_mobile'=>$this->input->post('mobile',TRUE),
						  'user_address'=>$this->input->post('address',TRUE),
						  'user_username'=>$this->input->post('username',TRUE),
						  'user_status'=>$this->input->post('status',TRUE),
						  'user_state'=>$this->input->post('state',TRUE),
						  'user_zip'=>$this->input->post('pin',TRUE),
						  'user_dob'=>$this->input->post('dob',TRUE),
						  'user_role_id'=>$this->input->post('user_role_id',TRUE),
						  'user_city'=>$this->input->post('city',TRUE)
						);
		 	}
		 	else
		 	{
		 		$config['upload_path'] = './resources/uploads';
		 		$config['allowed_types'] = "gif|jpg|png|jpeg";
		 		$this->load->library('upload',$config);
		 		if(! $this->upload->do_upload('userfile'))
		 		{
		 			echo 'error';
		 		}
		 		else
		 		{
		 			$imageData = $this->upload->data();
		 		}
		 	}
			
				$data = array('user_fullname'=>$this->input->post('name',TRUE),
							  'user_name_on_bill'=>$this->input->post('name',TRUE),
							  'user_username'=>$this->input->post('username',TRUE),
							  'user_email'=>$this->input->post('email',TRUE),
							  'user_mobile'=>$this->input->post('mobile',TRUE),
							  'user_address'=>$this->input->post('address',TRUE),
							  'user_username'=>$this->input->post('username',TRUE),
							  'user_status'=>$this->input->post('status',TRUE),
							  'user_state'=>$this->input->post('state',TRUE),
							  'user_zip'=>$this->input->post('pin',TRUE),
							  'user_dob'=>$this->input->post('dob',TRUE),
							  'user_role_id'=>$this->input->post('user_role_id',TRUE),
							  'user_city'=>$this->input->post('city',TRUE),
							  'user_image'=>$imageData['file_name']);
			
			/*$password=$this->input->post('password',TRUE);
			
			if (!empty($password)){
				$data['user_password']=aw_password($password);	
			}*/
			$this->back_model->update_db('bc_users',array('user_id ='. $id),$data);
			$this->session->set_flashdata('message','User updated successfully!');
			redirect('admins/dashboard/edit/'. $id);
		}
		else
		{
			$data['main']='edit-user-new';
			$data['title']='Edit User';
			$data['user'] = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $id),'*','user_id','desc');
			$this->load->view('admin-template',$data);
		}	
	}
	function delete($id=NULL)
	{
		$this->db->delete('bc_users', array('user_id'=>$id));
		$this->session->set_flashdata('message','Franchise deleted successfully!');
		redirect('admins/dashboard/users');
		
	}
	//-----------------------------------------------------------
	public function logout(){
        $this->auth->logout();
        redirect('admins/login');
    }

    //------------------------------------------------------------

    public function sms_view()
    {
    	$this->form_validation->set_rules('days','Days', 'trim|required');
    	$this->form_validation->set_rules('message','Message','trim|required|xss_clean|htmlspecialchars');
    	if($this->form_validation->run() ==  true)
    	{
    		$days = $this->input->post('days');
    		$message = $this->input->post('message');
    		$this->send_expire_sms($days,$message);
    	}
    	$data['main']='sms_view';
		$data['title']='Send Bulk Messages';
		$this->load->view('admin-template',$data);
    }

    //------------------------------------------------------------

   /* public function find_users($days)
    {
    	$data['orders'] = $this->back_model->select_row_where_db('bc_orders',array(),'*','order_id','desc');
    	$dateToday = date('Y-m-d');
    	$response = array();
    	foreach($data['orders'] as $date)
    	{
    		$diffInSeconds = strtotime($date['order_expired_date']) - strtotime($dateToday);
    		$diffInDays = round($diffInSeconds / 86400);
    		if($diffInDays == $days)
			{
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				
				array_push($response,$user);
				
			}
			else
			{
				//echo 'not ok';
			}
   		}
   		echo json_encode($response);
    	
    }*/	

    //------------------------------------------------------------
    public function send_expire_sms($days,$message)
    {
    	$data['orders'] = $this->back_model->select_row_where_db('bc_orders',array(),'*','order_id','desc');
    	$dateToday = date('Y-m-d');
    	foreach($data['orders'] as $date)
    	{
    		$diffInSeconds = strtotime($date['order_expired_date']) - strtotime($dateToday);
    		$diffInDays = round($diffInSeconds / 86400);
    		if($diffInDays == $days)
			{
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$mobile = $user[0]['user_mobile'].',';
				$message .= ' Order title: '.$date['order_title'].',';
				$message .= 'Order expiry date: ' .$date['order_expired_date'].',';
				$message .= 'Order Renewal Price: ' .$date['order_price'].',';
				//strip_tags($message);
				//echo $message;
				$this->send_sms($message,$mobile);
				$this->session->set_flashdata('message','SMS sent successfully');
				
			}
			else
			{
				$this->session->set_flashdata('error','Error Sending SMS.Please try again later...!!');
			}
    	}
    }

    //------------------------------------------------------------


    public function send_expiry_sms()
    {
    	$data['orders'] = $this->back_model->select_row_where_db('bc_orders',array(),'*','order_id','desc');
    	$dateToday = date('Y-m-d');
    	foreach($data['orders'] as $date)
    	{
    		$diffInSeconds = strtotime($date['order_expired_date']) - strtotime($dateToday);
			$diffInDays = round($diffInSeconds / 86400);
			//echo '<br/>';

			if($diffInDays < 0)
			{
				//do nothing
			}
			
			if($diffInDays == 0)
			{
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				echo $message = "your plan expiers today";
				print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
				//$this->send_expiry_emails('naveen.webadsmedia@gmail.com');
			}
			if ($diffInDays == 1) 
			{
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				echo $message = "your plan expiers in one day";
				print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 2) {
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "your plan expiers in two days";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 3) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "your plan expiers in three days";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}

			if ($diffInDays == 4) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "your plan expiers in four days";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 5) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 6) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 7) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 8) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 9) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 10) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 15) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 30) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
			if ($diffInDays == 45) {
				
				$user = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $date['order_user_id']),'*','user_id','desc');
				$message = "";
				//print_r($user[0]['user_mobile']);
				//$this->send_sms($user[0]['user_mobile']);
			}
   		}
	}

    public function send_sms($message,$mobile)
    {
    	/*echo $mobile;
    	echo '<br/>';*/
    	
    	$senderId="sender";
    	$routeId="1";
    	$serverUrl="msg.msgclub.net";
    	$authKey="577129d3c4995c9b7b6463be9e9b64f3";
    	$message = $message;

    	$postData = array(
    	//'mobileNumbers' => '7832892132,8628851512', 
    	//$mobileNumber, 
    	'mobileNumbers' => $mobile,
    	'smsContent' => $message,
    	'senderId' => $senderId,
    	'routeId' => $routeId, 
    	"smsContentType" =>'english');

    	echo $data_json = json_encode($postData);

    	$url="http://".$serverUrl."/rest/services/sendSMS/sendGroupSms?AUTH_KEY=".$authKey;

    	$ch = curl_init();
    	curl_setopt_array($ch,array(CURLOPT_URL => $url,
    								CURLOPT_HTTPHEADER => array('Content-Type: application/json','Content-Length: ' . strlen($data_json)),
    								CURLOPT_RETURNTRANSFER => true,
    								CURLOPT_POST => true,
    								CURLOPT_POSTFIELDS => $data_json,
    								CURLOPT_SSL_VERIFYHOST => 0,
    								CURLOPT_SSL_VERIFYPEER => 0));
    	//get response
    	$output = curl_exec($ch);
    	//Print error if any
    	if(curl_errno($ch)){
    		echo 'error:' . curl_error($ch);
    	}
    	curl_close($ch);
    }

    public function send_expiry_emails($email,$message)
    {
    	$this->email->from('noreply@webadsmedia.com', 'Admin');
		$this->email->to($email);
		$this->email->subject('Email Test');
		$this->email->message($message);
		if($this->email->send())
		{
			echo 'mail sent';
		}else
		{
			echo 'error';
		}
    }
	
	public function change_password()
	{
		$this->form_validation->set_rules('old_password','Old Password','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('new_password','New Password','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('confirm_password','Password Confirmation','trim|required|matches[new_password]|xss_clean|htmlspecialchars');

		if($this->form_validation->run() == true)
		{
			$this->back_model->change_password();
			redirect('admins/dashboard/change_password');

		}
		else
		{
			$data['main']='change_password';
			$data['title']='Change Password';
			$this->load->view('admin-template',$data);	
		}
		
	}

	public function update_profile_pic()
	{
		if(!empty($_FILES['userfile']['name']))
		{
			$config['upload_path'] = './resources/uploads';
		 	$config['allowed_types'] = "gif|jpg|png|jpeg";
		 	$this->load->library('upload',$config);
		 	if(!$this->upload->do_upload('userfile'))
		 	{
		 		$this->session->set_flashdata('error','Error uploading profile pic');
		 		redirect('admins/dashboard/update_profile_pic');
		 	}
		 	else
		 	{

		 		$imageData = $this->upload->data();
		 		$id=$_SESSION['user_id'];
		 		$data['user_image'] = $imageData['file_name'];
		 		$this->back_model->update_db('bc_users',array('user_id ='. $id),$data);
		 		$this->session->set_flashdata('message','Profile pic uploaded');
		 		redirect('admins/dashboard/update_profile_pic');
		 	}	
		}
		$data['main']='update_profile_pic';
		$data['title']='Update Profile';
		$this->load->view('admin-template',$data);
	}
	
}