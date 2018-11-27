<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class franchise extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','auth','form_validation','email'));
        $this->load->model(array('front_model'));
        $this->load->helper(array('inflector','html','url','aw_helper'));
        /** set the profiler on/off to get details of the fetching data and memory usage **/
		$this->output->enable_profiler(false);	
	}
	//-----------------------------------------------------------
	public function login()
	{
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
			if($this->session->userdata('token') == $this->input->post('token',TRUE)){
				if($this->_check_login())
					redirect('franchise/dashboard');
				else
					redirect('franchise/login');
			}
			else{
				redirect('franchise/login');
			}
		}
		else{
			
			$data['title']='Franchise Login';
			$this->load->view('user_panel/login-new',$data);
		}
			
	}
	//-----------------------------------------------------------	
	private function _check_login(){
        if($this->auth->advertiser_login() == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
	//-----------------------------------------------------------
	public function change_password(){
		if($this->auth->logged_in('advertiser') == TRUE){
		
			$this->form_validation->set_rules('old_password','Old Password','trim|xss_clean|required|min_length[6]|max_length[16]|htmlspecialchars');
			$this->form_validation->set_rules('new_password','New Password','trim|xss_clean|required|min_length[6]|max_length[16]|htmlspecialchars');
			$this->form_validation->set_rules('confirm_password','Confirm Password','trim|xss_clean|required|matches[new_password]|htmlspecialchars');
        //$this->form_validation->set_rules('recaptcha_challenge_field', 'answer to the security question','required|recaptcha_matches');
		
			if($this->form_validation->run() == TRUE){
				
				$this->front_model->change_password();
				redirect('franchise/change_password');
			}
			else{
				
			$data['title'] = 'Change Password';	
			$data['main'] = 'user-change-password-new';
			$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
			$this->load->view('franchise-template-new', $data);
			}
		}else{
			
			redirect('franchise/login');
		}
	}
	//-----------------------------------------------------------
	public function add_order(){
		if($this->auth->logged_in('advertiser') == TRUE){
		
			$this->form_validation->set_rules('title','Order Title','trim|xss_clean|required|htmlspecialchars');
			$this->form_validation->set_rules('category','Order Category','trim|xss_clean|required|htmlspecialchars');
			$this->form_validation->set_rules('user','Username','trim|xss_clean|required|htmlspecialchars');
			$this->form_validation->set_rules('description','Order Description','trim|xss_clean|htmlspecialchars');
        //$this->form_validation->set_rules('recaptcha_challenge_field', 'answer to the security question','required|recaptcha_matches');
		
			if($this->form_validation->run() == TRUE){
				
				$data=array('order_title'=>$this->input->post('title',TRUE),
				'order_category_id'=>$this->input->post('category',TRUE),
				'order_user_id'=>$this->input->post('user',TRUE),
				'order_description'=>$this->input->post('description',TRUE),
				'order_franchise_id'=>$_SESSION['user_id'],
				'order_status'=>'inactive');
				$this->front_model->insert_db('bc_orders',$data);
				$this->session->set_flashdata('message','Your order request is submitted successfully!');
				redirect('franchise/add_order');
			}
			else{
				
			$data['title'] = 'Add Order';	
			$data['main'] = 'user-add-order-new';
			$data['category'] =  $this->front_model->select_row_where_db('bc_sv_category',array(),'*','category_name','asc');
			//$data['users'] =  $this->front_model->select_row_where_db('bc_users',array('user_referred_by ="'. $_SESSION['user_username'].'"'),'*','user_username','asc');
			$data['users'] =  $this->front_model->select_row_where_db('bc_users',array(),'*','user_username','asc');

			$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
			$this->load->view('franchise-template-new', $data);
			}
		}else{
			
			redirect('franchise/login');
		}
	}
	//-----------------------------------------------------------
	public function edit_profile()
	{
		if($this->auth->logged_in('advertiser') == TRUE){
		$this->form_validation->set_rules('name','Franchise Name','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('mobile','mobile','trim|required|xss_clean|max_length[10]|htmlspecialchars');
		 $this->form_validation->set_rules('state','State','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('city','City','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('address','Address','trim|required|xss_clean|htmlspecialchars');
		 
		 $id=$_SESSION['user_id'];

		 if($this->form_validation->run() == TRUE)
		 {
		 	if(empty($_FILES['userfile']['name']))
		 	{
		 		$data=array(
						'user_fullname'=>$this->input->post('name',TRUE),
						'user_mobile'=>$this->input->post('mobile',TRUE),
						'user_state'=>$this->input->post('state',TRUE),
						'user_city'=>$this->input->post('city',TRUE),
						'user_address'=>$this->input->post('address',TRUE)
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

		 		$data=array(
						'user_fullname'=>$this->input->post('name',TRUE),
						'user_mobile'=>$this->input->post('mobile',TRUE),
						'user_state'=>$this->input->post('state',TRUE),
						'user_city'=>$this->input->post('city',TRUE),
						'user_address'=>$this->input->post('address',TRUE),
						'user_image'=>$imageData['file_name']
					);	
		 	}

			$this->front_model->update_db('bc_users',array('user_id ='. $id),$data);
			$this->session->set_flashdata('message','Profile updated successfully!');
			redirect('franchise/edit_profile');
		}
		else{
			
			$data['title']='Edit Profile';
			$data['main']='franchise-edit-profile-new';
			$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
			$this->load->view('franchise-template-new',$data);
		}
		}
		else{
			redirect('franchise/login');
		}
	}
	function order_list()
	{
		if($this->auth->logged_in('advertiser') == TRUE){
		$data['title'] = "Order List";
		$data['main'] = 'user-order-list-new';
		$data['order_list'] = $this->front_model->select_row_where_db('bc_orders',array('order_franchise_id = '. $_SESSION['user_id']),'*','order_id','desc');
		$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$this->load->view('franchise-template-new',$data);
		}
		else{
			redirect('franchise/login');
		}
	}
	function history()
	{
		if($this->auth->logged_in('advertiser') == TRUE){
		$data['title'] = "Income History";
		$data['main'] = 'user-income-history-new';
		$data['rate'] = $this->front_model->select_field_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'user_franchise_commission');
		$data['history'] = $this->front_model->select_row_where_db('bc_orders',array('order_franchise_id = '. $_SESSION['user_id']),'*','order_id','asc');
		$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$this->load->view('franchise-template-new',$data);
		}
		else{
			redirect('franchise/login');
		}
	}
	function dashboard()
	{
		if($this->auth->logged_in('advertiser') == TRUE){
		$data['title'] = "Dashboard";
		$data['main'] = 'user-dashboard-new';
		$data['role'] = 'franchise';
		$data['total'] = $this->db->where('order_franchise_id',$_SESSION['user_id'])->get('bc_orders')->num_rows();
		$rate=$this->front_model->select_field_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'user_franchise_commission');
		$data['income'] =($rate * $this->front_model->select_sum_where_db('bc_orders',array('order_franchise_id = '. $_SESSION['user_id']),'order_price'))/100;
		$data['stat3'] ='Total Income';
		$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$this->load->view('franchise-template-new',$data);
		}
		else{
			redirect('franchise/login');
		}
	}
	//-----------------------------------------------------------
	public function logout()
	{
		$this->auth->logout();
		redirect('franchise/login');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */