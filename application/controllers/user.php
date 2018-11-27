<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','auth','form_validation','email','recaptcha'));
        $this->load->model(array('front_model'));
        $this->load->helper(array('inflector','html','url','aw_helper','captcha'));
        /** set the profiler on/off to get details of the fetching data and memory usage **/
		$this->output->enable_profiler(false);	
	}
	function index()
	{
		$data['title'] = "Web Designer Amritsar, Web Designer India, Web Designer Punjab";
		$data['main'] = 'home-new';
		$data['meta_keywords'] = 'Web Designer Amritsar, Web Designer India, Web Designer Punjab';
		$data['meta_description'] = 'We are into web design, domain web hosting provider,MLM websites, bulk sms, SEO services provider in Amritsar';
		$data['categorys'] = $this->front_model->select_row_where_db('bc_sv_category',array('category_parent_id =0','category_onhome ="true"'),'*','category_sort','asc');
		$data['portfolio'] = $this->front_model->select_row_where_db('bc_portfolio',array(),'*','portfolio_id','desc');
		if($this->auth->logged_in('user') == TRUE)
		{
			$data['logged_in'] = TRUE;
		}
		$this->load->view('template',$data);
	}
	function my404()
	{
		$data['title'] = "404 Page";
		$data['main'] = '404_page';
		$this->load->view('template',$data);
	}
	//-----------------------------------------------------------
	/*public function signup()
	{
		$this->form_validation->set_rules('name','Full Name','trim|required|xss_clean|max_length[100]|htmlspecialchars');
		//$this->form_validation->set_rules('onbill','Name (on bill)','trim|required|xss_clean|max_length[100]|htmlspecialchars');
	$this->form_validation->set_rules('username','Username','trim|required|xss_clean|min_length[6]|max_length[15]|htmlspecialchars|callback_check_username');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|required|valid_email|htmlspecialchars|callback_check_email');
		$this->form_validation->set_rules('phone','Phone','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('dob','Dob','trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('url','Website url','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|min_length[6]|htmlspecialchars');
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|required|xss_clean|min_length[6]|matches[password]|htmlspecialchars');
		$this->form_validation->set_rules('address','Address','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('refer','Reffered By','trim|xss_clean|htmlspecialchars|callback_check_franchise');
		
		if($this->form_validation->run() == TRUE){
				
				$data=array('user_fullname'=>$this->input->post('name',TRUE),
				'user_name_on_bill'=>$this->input->post('onbill',TRUE),
				'user_username'=>$this->input->post('username',TRUE),
				'user_email'=>$this->input->post('email',TRUE),
				'user_password'=>aw_password($this->input->post('password',TRUE)),
				'user_dob'=>$this->input->post('dob',TRUE),
				'user_mobile'=>$this->input->post('phone',TRUE),
				'user_website_url'=>$this->input->post('url',TRUE),
				'user_address'=>$this->input->post('address',TRUE),
				'user_referred_by'=>$this->input->post('refer',TRUE),
				'user_registered_date'=>date('Y-m-d H:i:s'),
				'user_activation_key'=>aw_random_string($this->input->post('username',TRUE)),
				'user_role_id'=>2);
				$this->front_model->insert_db('bc_users',$data);
				
				$validusername = $this->input->post('username',TRUE);  //getting username back after adding form data to database 
				$verify_str    = aw_random_string($this->input->post('username',TRUE));  //getting randomstring back after adding form data to database
				$user_email    = $this->input->post('email',TRUE);  //getting user_email back after adding form data to database
				$varifystring  = base_url()."user/verification/$validusername/$verify_str";

$mail_body=<<<_MAIL_
                Hi $validusername,<br />
                Please click on the following link to verify your new account:\r\n
                {unwrap}<a href="$varifystring">Click here to verify your account</a>{/unwrap}
_MAIL_;

				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('noreply@brutecorp.com', 'Brutecorp');
				$this->email->to($user_email);
				$this->email->subject('Verification of your account');
				$this->email->message($mail_body);
				$this->email->send();
				
				$this->session->set_flashdata('message','You are successfully registered with us!<br />An activation email send to your account.');
				redirect('user/message');
		}
		else{
			
			$data['title']='Signup';
			$data['main']='signup-new';
			$this->load->view('template',$data);
		}
	}*/

	//-----------------------------------------------------------
	public function usersignup()
	{
		
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean|max_length[15]|htmlspecialchars|callback_check_username');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|required|valid_email|htmlspecialchars|callback_check_email');
		$this->form_validation->set_rules('phone','Phone','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|min_length[6]|htmlspecialchars');

		if($this->form_validation->run() == TRUE)
		{
			$data=array('user_fullname'=>$this->input->post('name',TRUE),
				
				'user_username'=>$this->input->post('username',TRUE),
				'user_email'=>$this->input->post('email',TRUE),
				'user_password'=>aw_password($this->input->post('password',TRUE)),
				'user_mobile'=>$this->input->post('phone',TRUE),
				'user_registered_date'=>date('Y-m-d H:i:s'),
				'user_activation_key'=>aw_random_string($this->input->post('username',TRUE)),
				'user_role_id'=>2);
				$this->front_model->insert_db('bc_users',$data);
				$validusername = $this->input->post('username',TRUE);
				$verify_str    = aw_random_string($this->input->post('username',TRUE));
				$user_email    = $this->input->post('email',TRUE);
				$varifystring  = base_url()."user/verification/$validusername/$verify_str";
$mail_body=<<<_MAIL_
                Hi $validusername,<br />
                Please click on the following link to verify your new account:\r\n
                {unwrap}<a href="$varifystring">Click here to verify your account</a>{/unwrap}
_MAIL_;
                $config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html';
				$this->email->initialize($config);
				$this->email->from('noreply@brutecorp.com', 'Brutecorp');
				$this->email->to($user_email);
				$this->email->subject('Verification of your account');
				$this->email->message($mail_body);
				$this->email->send();
				
				$this->session->set_flashdata('message','You are successfully registered with us!<br />An activation email send to your account.');
				redirect('user/message');
		}
		else
		{
			if($this->auth->logged_in('user') == TRUE)
			{
				$data['logged_in'] = TRUE;
			}
			$data['title']='Signup';
			$data['main']='signup-new';
			$this->load->view('template',$data);
		}

	}


	//-----------------------------------------------------------
	public function requestquote()
	{
		$this->form_validation->set_rules('name','Full Name','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|required|valid_email|htmlspecialchars');
		$this->form_validation->set_rules('phone','Phone','trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('budget','Budget','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('subject','Subject','trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('interest','Interest','trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('message','Message','trim|xss_clean|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
				
			$fullname=$this->input->post('name',TRUE); 
			$email=$this->input->post('email',TRUE); 
			$mobile=$this->input->post('phone',TRUE); 
			$budget=$this->input->post('budget',TRUE); 
			$subject=$this->input->post('subject',TRUE); 
			$interest=$this->input->post('interest',TRUE); 
			$message=$this->input->post('message',TRUE); 
				
				$mail_body=<<<_MAIL_
                Hi admins,<br />
                <table>
				<tr><td>Subject</td><td>$subject</td></tr>
				<tr><td>Interest in</td><td>$interest</td></tr>
				<tr><td>Full Name</td><td>$fullname</td></tr>
				<tr><td>Email ID</td><td>$email</td></tr>
				<tr><td>Mobile</td><td>$mobile</td></tr>
				<tr><td>Budget</td><td>$budget</td></tr>
				<tr><td>Message</td><td>$message</td></tr>
				</table>
_MAIL_;
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html'; 
				$this->email->initialize($config);
				
				/* load message file */
				//$mail_body = $this->load->view('front_end/advertiser-account-activation-email');
				
				$this->email->from('noreply@brutecorp.com', 'Contact Us');
				$this->email->to('info@brutecorp.com');
				$this->email->subject('Request Quote - '. $subject);
                $this->email->message($mail_body);
				$this->email->send();
				$this->session->set_flashdata('message','Your Quote Sent Successfully!<br /> We will be contact you shortly.');
				redirect('user/message');
		}
		else{
			
			$data['title']='Request a Quote';
			$data['categorys'] = $this->front_model->select_row_where_db('bc_sv_category',array('category_parent_id <>0'),'*','category_name','asc');
			$data['main']='request-quote';
			$this->load->view('template',$data);
		}
	}
	//-----------------------------------------------------------
	public function message()
	{
		if($this->auth->logged_in('user') == TRUE)
		{
			$data['logged_in'] = TRUE;
		}
		$data['title']='Message';
		$data['main']='message';
		$this->load->view('template',$data);
	}
	//-----------------------------------------------------------
	public function login()
	{
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
			if($this->session->userdata('token') == $this->input->post('token',TRUE)){
				if($this->_check_login())
					redirect('user/dashboard');
				else
					redirect('user/login');
			}
			else{
				redirect('user/login');
			}
		}
		else{
			
			$data['title']='User Login';
			$this->load->view('user_panel/login-new',$data);
		}
			
	}

	//---------------------------------------------------------------
	public function home_login()
	{
		$this->form_validation->set_rules('username','Username','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('password','Password','trim|required|xss_clean|htmlspecialchars');

		if($this->form_validation->run() == TRUE){
			if($this->session->userdata('token') == $this->input->post('token',TRUE)){
				if($this->_check_login())
					redirect('user');
				else
					redirect('user');
			}
			else{
				redirect('user');
			}
		}
		else{
			redirect('user');
		}
	}
	//-----------------------------------------------------------	
	private function _check_login(){
        if($this->auth->member_login() == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
	//-----------------------------------------------------------
	public function change_password(){
		if($this->auth->logged_in('user') == TRUE){
		
			$this->form_validation->set_rules('old_password','Old Password','trim|xss_clean|required|min_length[6]|max_length[16]|htmlspecialchars');
			$this->form_validation->set_rules('new_password','New Password','trim|xss_clean|required|min_length[6]|max_length[16]|htmlspecialchars');
			$this->form_validation->set_rules('confirm_password','Confirm Password','trim|xss_clean|required|matches[new_password]|htmlspecialchars');
        //$this->form_validation->set_rules('recaptcha_challenge_field', 'answer to the security question','required|recaptcha_matches');
		
			if($this->form_validation->run() == TRUE){
				
				$this->front_model->change_password();
				redirect('user/change_password');
			}
			else{
				
			$data['title'] = 'Change Password';	
			$data['main'] = 'user-change-password-new';
			$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
			$data['notifications'] = $this->front_model->select_row_where_db('bc_notifications' ,array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
			$this->load->view('franchise-template-new', $data);
			}
		}else{
			
			redirect('user/login');
		}
	}
	
	//-----------------------------------------------------------
	public function forgot_password()
	{
		$this->form_validation->set_rules('email','Email','trim|required|xss_clean|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
			if($this->session->userdata('token') == $this->input->post('token',TRUE))
			{
				
				$email=$this->input->post('email',TRUE);
				$user_activation_key = aw_random_string($email);
				$flag=$this->db->where(array('user_email'=>$email, 'user_role_id'=>2, 'user_status'=>'active'))->count_all_results('bc_users');
				if ($flag>0)
				{
					
					$this->db->where('user_email', $email);
					$this->db->where('user_status', 'active');
					$this->db->update('bc_users', array('user_forgot_password_key' => $user_activation_key));
					echo $varifystring  = base_url()."user/password_reset/$email/$user_activation_key";    	
$mail_body=<<<_MAIL_
					Hi,<br />
					We have had a request to reset your password, please visit:
					{unwrap}<a href="$varifystring">$varifystring</a>{/unwrap} to reset it.
					<br /><br />
					The Affiliates Weekly Team,<br />
					http://www.brutecorp.com
					
_MAIL_;
echo $mail_body;
die();
					$config['wordwrap'] = TRUE;
					$config['mailtype'] = 'html';
					$this->email->initialize($config);    
					$this->email->from('noreply@cupofdeals.com', 'Brutecorp');
					$this->email->to($email);				  
					$this->email->subject('[Brutecorp] Request to change your password');
					$this->email->message($mail_body);
					$this->email->send();
					$this->session->set_flashdata('message','Forgot password link sent to your email to reset your password!');
					redirect('user/forgot_password');
				}
				else
				{
					$this->session->set_flashdata('error','Email Address is not registered with us!');
					redirect('user/forgot_password');
				}
			}
			else
			{
				redirect('user/forgot_password');
			}
		}
		else
		{
			if($this->auth->logged_in('user') == TRUE)
			{
				$data['logged_in'] = TRUE;
			}
			$data['title']='Forgot Password';
			$data['main']='forgot_password';
			$this->load->view('template',$data);
		}
			
	}


	public function password_reset()
	{
		$this->form_validation->set_rules('new_password','New Password','trim|xss_clean|required|min_length[4]|max_length[16]|htmlspecialchars');
		$this->form_validation->set_rules('confirm_password','Confirm Password','trim|xss_clean|required|matches[new_password]|htmlspecialchars');
		$email = $this->security->xss_clean($this->uri->segment(3));
       	$verifystring = $this->security->xss_clean($this->uri->segment(4));
        $flag=$this->db->where(array('user_email'=>$email, 'user_forgot_password_key'=>$verifystring,'user_role_id'=>2, 'user_status'=>'active'))->count_all_results('bc_users');
        if($flag>0)
        {
        	if($this->form_validation->run() == true)
        	{
        		$new_password = aw_password($this->input->post('new_password'));
        		$this->front_model->reset_password($new_password,$email,$verifystring);
        		redirect('user/password_reset/'.$email.'/'.$verifystring);
        	}
        	else
        	{
        		$data['title']='Forgot Password';
        		$data['main']='password_reset';
        		$this->load->view('template',$data);
        	}
        	
        }
	}
	//-----------------------------------------------------------
	public function edit_profile()
	{
		if($this->auth->logged_in('user') == TRUE){
		$this->form_validation->set_rules('name','Franchise Name','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('onbill','Name(On Bill)','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('mobile','mobile','trim|required|xss_clean|max_length[10]|htmlspecialchars');
		$this->form_validation->set_rules('email','Email','trim|required|xss_clean|valid_email|htmlspecialchars');
		$this->form_validation->set_rules('address','Address','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('city','city','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('state','state','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('pin','pin','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('dob','dob','trim|required|xss_clean|htmlspecialchars');

		 
		 $id=$_SESSION['user_id'];

		 if($this->form_validation->run() == TRUE)
		 {
		 	if(empty($_FILES['userfile']['name']))
		 	{
		 		$data=array(
						'user_fullname'=>$this->input->post('name',TRUE),
						'user_mobile'=>$this->input->post('mobile',TRUE),
						'user_name_on_bill'=>$this->input->post('onbill',TRUE),
						'user_email'=>$this->input->post('email',TRUE),
						'user_address'=>$this->input->post('address',TRUE),
						'user_city'=>$this->input->post('city',TRUE),
						'user_state'=>$this->input->post('state',TRUE),
						'user_zip'=>$this->input->post('pin',TRUE),
						'user_dob'=>$this->input->post('dob',TRUE)

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
						'user_name_on_bill'=>$this->input->post('onbill',TRUE),
						'user_email'=>$this->input->post('email',TRUE),
						'user_address'=>$this->input->post('address',TRUE),
						'user_city'=>$this->input->post('city',TRUE),
						'user_state'=>$this->input->post('state',TRUE),
						'user_zip'=>$this->input->post('pin',TRUE),
						'user_dob'=>$this->input->post('dob',TRUE),
						'user_image'=>$imageData['file_name']
				);
		 	}
			$this->front_model->update_db('bc_users',array('user_id ='. $id),$data);
			$this->session->set_flashdata('message','Profile updated successfully!');
			redirect('user/edit_profile');
		}
		else{
			
			$data['title']='Edit Profile';
			$data['main']='user-edit-profile-new';
			$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
			$data['notifications'] = $this->front_model->select_row_where_db('bc_notifications' ,array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
			$this->load->view('franchise-template-new',$data);
		}
		}
		else{
			redirect('user/login');
		}
	}
	function order_list()
	{
		if($this->auth->logged_in('user') == TRUE){
		$data['title'] = "Order List";
		$data['main'] = 'user-order-list-new';
		$data['order_list'] = $this->front_model->select_row_where_db('bc_orders',array('order_user_id = '. $_SESSION['user_id']),'*','order_id','desc');
		//$data['order_list'] = $this->front_model->select_row_where_db('bc_orders',array('order_user_id = 15'),'*','order_id','desc');
		$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$data['notifications'] = $this->front_model->select_row_where_db('bc_notifications' ,array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$this->load->view('franchise-template-new',$data);
		}
		else{
			redirect('user/login');
		}
	}

	public function order_details($id=NULL)
	{
		if($this->auth->logged_in('user') == TRUE){
		$data['title'] = "Order Details";
		$data['main'] = 'user-order-details-new';
		$data['order_details'] = $this->front_model->select_row_where_db('bc_orders',array('order_id = '. $id),'*','order_id','desc');
		$data['notifications'] = $this->front_model->select_row_where_db('bc_notifications' ,array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$this->load->view('franchise-template-new',$data);
		}
		else
		{
			redirect('user/login');
		}	
	}
	public function dashboard()
	{
		if($this->auth->logged_in('user') == TRUE){
		$data['title'] = "Dashboard";
		$data['main'] = 'user-dashboard-new';
		$data['role'] = 'user';
		$data['total'] = $this->db->where('order_user_id',$_SESSION['user_id'])->get('bc_orders')->num_rows();
		$data['income'] =$this->front_model->select_sum_where_db('bc_orders',array('order_user_id = '. $_SESSION['user_id']),'order_price');
		$data['stat3'] ='Invoice Amount';
		$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$data['notifications'] = $this->front_model->select_row_where_db('bc_notifications' ,array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$this->load->view('franchise-template-new',$data);
		}
		else{
			redirect('user/login');
		}
	}
	//-----------------------------------------------------------
	public function verification(){
        $validuser = $this->security->xss_clean($this->uri->segment(3));
        $verifystring = $this->security->xss_clean($this->uri->segment(4));
        $flag=$this->front_model->accountActivate($validuser, $verifystring);
		if ($flag==TRUE){
			$user_id=$this->front_model->select_field_where_db('bc_users',array('user_username = "'. $validuser. '"'),'user_id');
			$_SESSION['user_id'] =  $user_id;
			$_SESSION['user_username'] = $validuser;
			$_SESSION['user_role'] = 'user';
			$_SESSION['logged_in'] = TRUE;
        	redirect('user/dashboard', 'refresh');
		}
		else
			redirect('user/login', 'refresh');
    }
	function invoice($id=NULL)
	{
		if($this->auth->logged_in('user') == TRUE){
			if ($id==NULL){
				$data['title'] = "Invoice Details";
				$data['main'] = 'user-invoice-list-new';
			$data['order_list'] = $this->front_model->select_row_where_db('bc_orders',array('order_user_id = '. $_SESSION['user_id']),'*','order_id','desc');
			//$data['order_list'] = $this->front_model->select_row_where_db('bc_orders',array('order_user_id = 15'),'*','order_id','desc');
			$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
			$data['notifications'] = $this->front_model->select_row_where_db('bc_notifications' ,array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
				$this->load->view('franchise-template-new',$data);
			}
			else{
				//$this->load->helper('pdf_helper');
				$data['title'] = "Invoice Details";
				$data['main'] = 'user-invoice-new';
				$data['invoice'] = $this->front_model->select_row_where_db('bc_orders',array('order_invoice_no = '. $id),'*','order_invoice_no','desc');
				$data['user_info'] =$this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
				$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
				$data['notifications'] = $this->front_model->select_row_where_db('bc_notifications' ,array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
				$this->load->view('franchise-template-new',$data);
			}
		}
		else{
			redirect('user/login');
		}
	}
	//-----------------------------------------------------------
	public function contactus()
	{

		$this->form_validation->set_rules('user_name','Name','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('user_email','Email','trim|xss_clean|required|valid_email|htmlspecialchars');
		$this->form_validation->set_rules('user_phone','Phone','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('user_subject','Subject','trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('user_message','Message','trim|required|xss_clean|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE)
		{
			
				$fullname=$this->input->post('user_name',TRUE); 
				$email=$this->input->post('user_email',TRUE); 
				$mobile=$this->input->post('user_phone',TRUE);
				$subject = $this->input->post('user_subject',TRUE);
			 	$message=$this->input->post('user_message',TRUE); 

				
				$mail_body=<<<_MAIL_
                Hi admins,<br />
                <table>
				<tr><td>Full Name</td><td>$fullname</td></tr>
				<tr><td>Email ID</td><td>$email</td></tr>
				<tr><td>Mobile</td><td>$mobile</td></tr>
				<tr><td>Message</td><td>$message</td></tr>
				</table>
_MAIL_;
				/*print_r($mail_body);
				die();*/
				$config['wordwrap'] = TRUE;
				$config['mailtype'] = 'html'; 
				$this->email->initialize($config);
				
				/* load message file */
				//$mail_body = $this->load->view('front_end/advertiser-account-activation-email');
				$this->email->from('noreply@brutecorp.com', 'Contact Us');
				$this->email->to('vishwender.baloria29@gmail.com');
				$this->email->subject('Enquiry Us');
                $this->email->message($mail_body);
				$this->email->send();
				$this->session->set_flashdata('message','Your Message Sent Successfully! <br />Our Team will be contact you shortly.');
				redirect('user/message');
		}
		else
		{
			if($this->auth->logged_in('user') == TRUE)
			{
				$data['logged_in'] = TRUE;
			}
			$data['title']='Contact Us';
			$data['main']='contactus-new';
			$this->load->view('template',$data);
		}
	}
	//-----------------------------------------------------------		
	public function validate_captcha(){
    if($this->input->post('captcha') != $this->session->userdata['captcha'])
    {
        $this->form_validation->set_message('validate_captcha', 'Wrong captcha code!');
        return false;
    }else{
        return true;
    }
	}
	//-----------------------------------------------------------
	public function logout()
	{
		$this->auth->logout();
		redirect('user/login');
	}
	//-----------------------------------------------------------
	public function home_logout()
	{
		$this->auth->logout();
		redirect('user');
	}
	//-----------------------------------------------------------
	public function aboutus()
	{
		$data['title']='About Us';
		$data['main']='page-about';
		$this->load->view('template',$data);
	}
	
	public function digitalmarketing()
	{
		$data['title']='Digital Marketing';
		$data['main']='page-digitalmarketing';
		$this->load->view('template',$data);
	}
	//-----------------------------------------------------------
	public function terms()
	{
		$data['title']='Terms & Conditions';
		$data['main']='page-terms';
		$this->load->view('template',$data);
	}
	//-----------------------------------------------------------
	public function privacy()
	{
		$data['title']='Privacy Policy';
		$data['main']='page-policy';
		$this->load->view('template',$data);
	}
	//-----------------------------------------------------------
    //callback function to verify email address is not already registered
    function check_franchise(){
        $username = $this->input->post('reffer', TRUE);
		if (!empty($username)){
        $Q = $this->db->select('user_username')->where('user_username', $username)->where('user_role_id', 3)->limit(1)->get('bc_users');
        if($Q->num_rows() == 0){
            $this->form_validation->set_message('check_franchise', 'Invalid Referred Link');
            return FALSE;
        }else{
            return TRUE;
        }
		}
		else
		return TRUE;
    }
	//-----------------------------------------------------------
    //callback function to verify email address is not already registered
    function check_email(){
        $advertiser_email = $this->input->post('email', TRUE);
        $Q = $this->db->select('user_email')->where('user_email', $advertiser_email)->limit(1)->get('bc_users');
        if($Q->num_rows() > 0){
            $this->form_validation->set_message('check_email', 'The Email Address already registered. Please use another email address to signup!');
            return FALSE;
        }else{
            return TRUE;
        }
    }
    //-----------------------------------------------------------
    //callback function to verify email address is not already registered
    function check_username(){
        $advertiser_username = $this->input->post('username', TRUE);
        $Q = $this->db->select('user_username')->where('user_username', $advertiser_username)->limit(1)->get('bc_users');
        if($Q->num_rows() > 0){
            $this->form_validation->set_message('check_username', 'This Username already chosen. Please try a different username to signup!');
            return FALSE;
        }else{
            return TRUE;
        }
    }
	//-----------------------------------------------------------
    //callback function to verify email address is not already registered
    function check_captcha(){
        $this->recaptcha->recaptcha_check_answer();
		$flag=$this->recaptcha->getIsValid();
        if($flag==false){
            $this->form_validation->set_message('check_captcha', 'Wrong ReCaptcha Code!');
            return FALSE;
        }else{
            return TRUE;
        }
    }

    public function remove_notice()
	{
		echo  $id = $this->input->post('id');

		$this->db->delete('bc_notifications', array('id'=>$id));
	}

	public function renew_plan($id)
	{
		if($this->auth->logged_in('user') == TRUE){
		$data['title'] = "Renew Orders";
		$data['main'] = 'user-order-renew-new';
		$data['order_details'] = $this->front_model->select_row_where_db('bc_orders',array('order_id = '. $id),'*','order_id','desc');
		$data['notifications'] = $this->front_model->select_row_where_db('bc_notifications' ,array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$data['profile'] = $this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$this->load->view('franchise-template-new',$data);
		}
		else
		{
			redirect('user/login');
		}
	}

	public function newsletter()
	{
		$this->form_validation->set_rules('user_name','Name','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|required|valid_email|htmlspecialchars');
		if($this->form_validation->run() == TRUE)
		{
			$user_name = $this->input->post('user_name');
			$email = $this->input->post('email');	
			$data = array('user_name'=>$user_name,'email'=>$email);
			$this->front_model->newsletter($data);
			$this->session->set_flashdata('message','You are subscribed to newsletter');
			redirect('user');
		}
		else
		{
			redirect('user');
		}
		
	}

    /*public function generate_pdf($id)
    {
    	$data['title'] = "Invoice Details";
		$data['main'] = 'user-invoice-new';
		$data['invoice'] = $this->front_model->select_row_where_db('bc_orders',array('order_invoice_no = '. $id),'*','order_invoice_no','desc');
		$data['user_info'] =$this->front_model->select_row_where_db('bc_users',array('user_id = '. $_SESSION['user_id']),'*','user_id','desc');
		$this->load->library('pdf');
		$this->pdf->load_view('user_panel/invoice_template',$data);
		$this->pdf->render();
		$this->pdf->stream("invoice.pdf");
    }*/
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */