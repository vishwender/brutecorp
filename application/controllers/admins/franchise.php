<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Franchise extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','auth','form_validation'));
        $this->load->model(array('back_model'));
        $this->load->helper(array('inflector','html','url','aw_helper'));
        /** set the profiler on/off to get details of the fetching data and memory usage **/
		$this->output->enable_profiler(false);
		if($this->auth->logged_in('admin') != TRUE){
			redirect('admins');
		}
	}
	function index()
	{
		$data['main']='list-franchise-new';
		$data['franchise'] = $this->back_model->select_row_where_db('bc_users',array('user_role_id = 3'),'*','user_id','desc');
		$data['title']='Franchise List';
		$this->load->view('admin-template',$data);
	}
	function orders()
	{
		$data['main']='list-franchise-orders-new';
		$data['orders'] = $this->back_model->select_row_where_db('bc_orders',array(),'*','order_id','desc');
		$data['title']='Order List';
		$this->load->view('admin-template',$data);
	}
	public function add()
	{
		
		 $this->form_validation->set_rules('name','Franchise Name','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('fee','Franchise Fee','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('commission','commission','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('email','email','trim|required|xss_clean|valid_email|htmlspecialchars');
		 $this->form_validation->set_rules('mobile','mobile','trim|required|xss_clean|max_length[10]|htmlspecialchars');
		 $this->form_validation->set_rules('state','state','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('city','City','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('address','Address','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('username','Username','trim|required|max_length[20]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('password','Password','trim|required|xss_clean|htmlspecialchars');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$data=array(
						'user_fullname'=>$this->input->post('name',TRUE),
						'user_franchise_fee'=>$this->input->post('fee',TRUE),
						'user_franchise_commission'=>$this->input->post('commission',TRUE),
						'user_email'=>$this->input->post('email',TRUE),
						'user_mobile'=>$this->input->post('mobile',TRUE),
						'user_state'=>$this->input->post('state',TRUE),
						'user_city'=>$this->input->post('city',TRUE),
						'user_address'=>$this->input->post('address',TRUE),
						'user_username'=>$this->input->post('username',TRUE),
						'user_password'=>aw_password($this->input->post('password',TRUE)),
						'user_registered_date'=>date('Y-m-d H:i:s'),
						'user_status'=>'active',
						'user_role_id'=>3
			);
			$this->back_model->insert_db('bc_users',$data);
			$this->session->set_flashdata('message','Franchise added successfully!');
			redirect('admins/franchise/add');
		}
		else
		{
			$data['main']='add-franchise-new';
			$data['title']='Add Franchise';
			$this->load->view('admin-template',$data);
		}	
	}
	public function edit($id=NULL)
	{
		
		 $this->form_validation->set_rules('name','Franchise Name','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('fee','Franchise Fee','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('commission','commission','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('email','email','trim|required|xss_clean|valid_email|htmlspecialchars');
		 $this->form_validation->set_rules('mobile','mobile','trim|required|xss_clean|max_length[10]|htmlspecialchars');
		 $this->form_validation->set_rules('state','state','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('city','City','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('address','Address','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('username','Username','trim|required|max_length[20]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('password','Password','trim|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('status','Status','trim|required|xss_clean|htmlspecialchars');
		 	
		 if($this->form_validation->run() == TRUE)
		 {
			$data=array(
						'user_fullname'=>$this->input->post('name',TRUE),
						'user_franchise_fee'=>$this->input->post('fee',TRUE),
						'user_franchise_commission'=>$this->input->post('commission',TRUE),
						'user_email'=>$this->input->post('email',TRUE),
						'user_mobile'=>$this->input->post('mobile',TRUE),
						'user_state'=>$this->input->post('state',TRUE),
						'user_city'=>$this->input->post('city',TRUE),
						'user_address'=>$this->input->post('address',TRUE),
						'user_username'=>$this->input->post('username',TRUE),
						'user_status'=>$this->input->post('status',TRUE),
			);
			$password=$this->input->post('password',TRUE);
			if (!empty($password)){
				$data['user_password']=aw_password($password);	
			}
			$this->back_model->update_db('bc_users',array('user_id ='. $id),$data);
			$this->session->set_flashdata('message','Franchise updated successfully!');
			redirect('admins/franchise/edit/'. $id);
		}
		else
		{
			$data['main']='edit-franchise';
			$data['title']='Edit Franchise';
			$data['franchise'] = $this->back_model->select_row_where_db('bc_users',array('user_id = '. $id),'*','user_id','desc');
			$this->load->view('admin-template',$data);
		}	
	}
	public function create_invoice($id=NULL)
	{
		$invoice_no=0; $this->db->select_max('order_invoice_no'); $query = $this->db->get('bc_orders');
		if ($query->num_rows() > 0)
		{
		   $row = $query->row(); 
		   $invoice_no=$row->order_invoice_no;
		}
		if ($invoice_no==0)
			$invoice_no=10001;
		else
			$invoice_no+=1;
		$user_id=$this->back_model->select_field_where_db('bc_orders',array('order_id = '. $id),'order_user_id');
		$invoice_name=$this->back_model->select_field_where_db('bc_users',array('user_id = '. $user_id),'user_name_on_bill');
		$data=array('order_invoice_no'=>$invoice_no,
		'order_invoice_name'=>$invoice_name,
		'order_invoice_date'=>date('Y-m-d'));
		$invoice_no=$this->back_model->select_field_where_db('bc_orders',array('order_id ='. $id),'order_invoice_no');
		if ($invoice_no==0){
		$notice = array('user_id'=>$user_id,'notification'=>'Your Invoice is created');
				$this->db->insert('bc_notifications',$notice);
		$this->back_model->update_db('bc_orders',array('order_id ='.$id),$data);
		$this->session->set_flashdata('message','Invoice Created Successfully!');
		}
		else{
			$this->session->set_flashdata('error','Invoice already created!');
		}
		redirect('admins/franchise/orders');
	}
	public function edit_order($id=NULL)
	{
		if ($id==NULL)
		show_404();
		$this->form_validation->set_rules('title','Order Title','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('category','Order Category','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('description','Order Description','trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('franchise','Order Franchise','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('user','Order User','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('register','Order Register Date','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('expired','Order Expired Date','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('price','Order Price','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('status','Order Status','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('paid_unpaid','Paid/Unpaid Status','trim|xss_clean|required|htmlspecialchars');
        //$this->form_validation->set_rules('recaptcha_challenge_field', 'answer to the security question','required|recaptcha_matches');
		
			if($this->form_validation->run() == TRUE){
				
				$data=array('order_title'=>$this->input->post('title',TRUE),
				'order_category_id'=>$this->input->post('category',TRUE),
				'order_description'=>$this->input->post('description',TRUE),
				'order_franchise_id'=>$this->input->post('franchise',TRUE),
				'order_user_id'=>$this->input->post('user',TRUE),
				'order_register_date'=>$this->input->post('register',TRUE),
				'order_expired_date'=>$this->input->post('expired',TRUE),
				'order_price'=>$this->input->post('price',TRUE),
				'order_status'=>$this->input->post('status',TRUE),
				'order_invoice_status'=>$this->input->post('paid_unpaid',TRUE));
				$this->back_model->update_db('bc_orders',array('order_id ='.$id),$data);
				$notice = array('user_id'=>$this->input->post('user',TRUE),'notification'=>'Your order has been modified');
				$this->db->insert('bc_notifications',$notice);
				$this->session->set_flashdata('message','Your order updated successfully!');
				redirect('admins/franchise/edit_order/'. $id);
			}
		else
		{
			$data['main']='edit-order-new';
			$data['title']='Edit Order';
			$data['franchise'] =  $this->back_model->select_row_where_db('bc_users',array('user_role_id =3'),'*','user_username','asc');
			$data['user'] =  $this->back_model->select_row_where_db('bc_users',array('user_role_id =2'),'*','user_username','asc');
			$data['category'] =  $this->back_model->select_row_where_db('bc_sv_category',array(),'*','category_name','asc');
			$data['order'] = $this->back_model->select_row_where_db('bc_orders',array('order_id = '. $id),'*','order_id','desc');
			$this->load->view('admin-template',$data);
		}	
	}
	public function add_order($id=NULL)
	{
		
		$this->form_validation->set_rules('title','Order Title','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('category','Order Category','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('description','Order Description','trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('franchise','Order Franchise','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('user','Order User','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('register','Order Register Date','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('expired','Order Expired Date','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('price','Order Price','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('status','Order Status','trim|xss_clean|required|htmlspecialchars');
        //$this->form_validation->set_rules('recaptcha_challenge_field', 'answer to the security question','required|recaptcha_matches');
		
			if($this->form_validation->run() == TRUE){
				
				$data=array('order_title'=>$this->input->post('title',TRUE),
				'order_category_id'=>$this->input->post('category',TRUE),
				'order_description'=>$this->input->post('description',TRUE),
				'order_franchise_id'=>$this->input->post('franchise',TRUE),
				'order_user_id'=>$this->input->post('user',TRUE),
				'order_register_date'=>$this->input->post('register',TRUE),
				'order_expired_date'=>$this->input->post('expired',TRUE),
				'order_price'=>$this->input->post('price',TRUE),
				'order_status'=>$this->input->post('status',TRUE));
				$this->back_model->insert_db('bc_orders',$data);
				$this->session->set_flashdata('message','Your order added successfully!');
				redirect('admins/franchise/add_order');
			}
		else
		{
			$data['main']='add-order-new';
			$data['title']='Add Order';
			$data['franchise'] =  $this->back_model->select_row_where_db('bc_users',array('user_role_id =3'),'*','user_username','asc');
			$data['user'] =  $this->back_model->select_row_where_db('bc_users',array('user_role_id =2'),'*','user_username','asc');
			$data['category'] =  $this->back_model->select_row_where_db('bc_sv_category',array(),'*','category_name','asc');
			$this->load->view('admin-template',$data);
		}	
	}
	function delete($id=NULL)
	{
		$this->db->delete('bc_users', array('user_id'=>$id));
		$this->session->set_flashdata('message','Franchise deleted successfully!');
		redirect('admins/franchise');
		
	}
	function delete_order($id=NULL)
	{
		$this->db->delete('bc_orders', array('order_id'=>$id));
		$user_id=$this->back_model->select_field_where_db('bc_orders',array('order_id = '. $id),'order_user_id');
		$notice = array('user_id'=>$user_id,'notification'=>'Your order has been modified');
				$this->db->insert('bc_notifications',$notice);
		$this->session->set_flashdata('message','Order deleted successfully!');
		redirect('admins/franchise/orders');
		
	}

}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */