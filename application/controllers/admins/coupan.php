<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Coupan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','auth','form_validation'));
        $this->load->helper(array('inflector','html','url','aw_helper'));
		$this->load->model(array('back_model'));
        /** set the profiler on/off to get details of the fetching data and memory usage **/
		$this->output->enable_profiler(false);	
		if($this->auth->logged_in('admin') != TRUE){
			redirect('admins');
		}
	}
	//-----------------------------------------------------------
	public function add_advertiser()
	{
		$this->form_validation->set_rules('first_name','First Name','trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('last_name','Last Name','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('company_name','Company Name','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('plan','Plan','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('email','Email','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('mobile','Mobile','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('landline','Landline','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('std_code','STD Code','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('location','Location','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('country','Country','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('state','State','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('city','City','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('username','Username','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('password','Password','trim|xss_clean|required|htmlspecialchars');
		$this->form_validation->set_rules('status','Status','trim|xss_clean|required|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
			
			$data=array('user_firstname'=>$this->input->post('first_name',TRUE),'user_lastname'=>$this->input->post('last_name',TRUE),'user_username'=>$this->input->post('username',TRUE),'user_password'=>aw_password($this->input->post('password',TRUE)),'user_email'=>$this->input->post('email',TRUE),'user_mobile'=>$this->input->post('mobile',TRUE),'user_status'=>$this->input->post('status',TRUE),'user_registered_date'=>date('Y-m-d H:i:s'),'user_role_id'=>3);
			$this->back_model->insert_db('cp_users',$data);
			
			$data2=array('company_name'=>$this->input->post('company_name',TRUE),'plan_id'=>$this->input->post('plan',TRUE),'std_code'=>$this->input->post('std_code',TRUE),'landline'=>$this->input->post('landline',TRUE),'company_location'=>$this->input->post('location',TRUE),'country_id'=>$this->input->post('country',TRUE),'state_id'=>$this->input->post('state',TRUE),'city_id'=>$this->input->post('city',TRUE),'user_user_id'=>$this->db->insert_id(),'slug'=>convert_to_hyphen($this->input->post('company_name',TRUE)));
			$this->back_model->insert_db('cp_advertiser',$data2);
			$this->session->set_flashdata('message','Advertiser added Succcessfully!');
			redirect('admins/coupan/add_advertiser');
		}
		else{
			$data['title']='Add Advertiser';
			$data['main']='add-advertiser';
			$data['plans']=$this->back_model->select_row_where_db('cp_plans',array(),'*','plan_name','asc');
			$data['country']=$this->back_model->select_row_where_db('cp_country',array(),'*','country_name','asc');
			$data['state']=$this->back_model->select_row_where_db('cp_state',array(),'*','state_name','asc');
			$data['city']=$this->back_model->select_row_where_db('cp_city',array(),'*','city_name','asc');
			$this->load->view('admin-template',$data);
		}
	}
	//-----------------------------------------------------------
	public function add_category()
	{
		$this->form_validation->set_rules('name','Category Name','trim|required|xss_clean');
		$this->form_validation->set_rules('description','Description','trim|required|xss_clean');
		$this->form_validation->set_rules('keywords','Meta Keywords','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('meta_desc','Meta Description','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('sort_order','Sort Order','trim|required|xss_clean|htmlspecialchars');
        $this->form_validation->set_rules('image','Image','trim|xss_clean|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
			
			$data['upload']=$this->back_model->do_upload('image','advertiser/category');
			if (empty($data['upload']['upload_error'])){
			$data=array('category_name'=>$this->input->post('name',TRUE),'category_page'=>convert_to_hyphen($this->input->post('name',TRUE)),'description'=>$this->input->post('description',TRUE),'meta_description'=>$this->input->post('meta_desc',TRUE),'meta_keyword'=>$this->input->post('keywords',TRUE),'image'=>$data['upload']['file_name'],'parent_id'=>0,'sort_order'=>$this->input->post('sort_order',TRUE),'status'=>'active');
			$this->back_model->insert_db('cp_offers_category',$data);
			$this->session->set_flashdata('message','Offer added Succcessfully!');
			}
			else
			$this->session->set_flashdata('error',$data['upload']['upload_error']);
			redirect('admins/coupan/add_category');
		}
		else{
			$data['title']='Add Offer Category';
			$data['main']='add-category';
			$this->load->view('admin-template',$data);
		}
	}
	//-----------------------------------------------------------
	public function add_city()
	{
		$this->form_validation->set_rules('city','City','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('state','State','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('price','Advertise Price','trim|required|xss_clean|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
			
			$data=array('city_name'=>$this->input->post('city',TRUE),'state_id'=>$this->input->post('state',TRUE),'city_advertise_price'=>$this->input->post('price',TRUE),'city_status'=>1);
			$this->back_model->insert_db('cp_city',$data);
			$this->session->set_flashdata('message','City added succcessfully!');
			redirect('admins/coupan/add_city');
		}
		else{
			$data['title']='Add City';
			$data['main']='add-city';
			$this->load->view('admin-template',$data);
		}
	}
	//-----------------------------------------------------------
	public function add_state()
	{
		$this->form_validation->set_rules('state','State','trim|required|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('country','Country','trim|required|xss_clean|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
			
			$data=array('state_name'=>$this->input->post('state',TRUE),'country_id'=>$this->input->post('country',TRUE),'state_status'=>1);
			$this->back_model->insert_db('cp_state',$data);
			$this->session->set_flashdata('message','State added succcessfully!');
			redirect('admins/coupan/add_state');
		}
		else{
			$data['title']='Add State';
			$data['main']='add-state';
			$this->load->view('admin-template',$data);
		}
	}
	//-----------------------------------------------------------
	public function add_country()
	{
		$this->form_validation->set_rules('country','Country','trim|required|xss_clean|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
			
			$data=array('country_name'=>$this->input->post('country',TRUE));
			$this->back_model->insert_db('cp_country',$data);
			$this->session->set_flashdata('message','Country added succcessfully!');
			redirect('admins/coupan/add_country');
		}
		else{
			$data['title']='Add Country';
			$data['main']='add-country';
			$this->load->view('admin-template',$data);
		}
	}
	//-----------------------------------------------------------
	public function add_card()
	{
		$this->form_validation->set_rules('no_of_cards','No. of Cards','trim|required|xss_clean|integer|htmlspecialchars');
		$this->form_validation->set_rules('price','Card Price','trim|required|xss_clean|integer|htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
			
			$cards_count=$this->input->post('no_of_cards',TRUE); $count=0;
			for ($i=0;$i<$cards_count; $i++){ $count+=1;
			$card_code='';
			$seed = str_split('abcdefghijklmnopqrstuvwxyz'
					 .'ABCDEFGHIJKLMNOPQRSTUVWXYZ'
					 .'0123456789'); // and any other characters
			shuffle($seed); // probably optional since array_is randomized; this may be redundant
			$rand = '';
		foreach (array_rand($seed, 20) as $k) $card_code.= $seed[$k];
			$data=array('card_no'=>$card_code,'card_price'=>$this->input->post('price',TRUE));
			$this->back_model->insert_db('cp_cash_card',$data);
			}
			$this->session->set_flashdata('message',$count.' Cash Cards successfully added!');
			redirect('admins/coupan/add_card');
		}
		else{
			$data['title']='Add Cash Card';
			$data['main']='add-cashcard';
			$this->load->view('admin-template',$data);
		}
	}
	//-----------------------------------------------------------
	public function cash_cards()
	{
		$data['title']='Cash Cards';
		$data['main']='list-cashcards';
		$data['cash_cards']=$this->back_model->select_row_where_db('cp_cash_card',array(),'*','card_id','desc');
		$this->load->view('admin-template',$data);
	}
	//-----------------------------------------------------------
	public function advertisers()
	{
		$data['title']='Advertiser List';
		$data['main']='list-advertiser';
		$data['advertisers']=$this->back_model->select_row_join_where_db('cp_users',array(),'*','cp_advertiser','user_user_id = user_id');
		$this->load->view('admin-template',$data);
	}
	//-----------------------------------------------------------
	public function users()
	{
		$data['title']='Users List';
		$data['main']='list-users';
		$data['users']=$this->back_model->select_row_where_db('cp_users',array('user_role_id = 2'),'*','user_id','desc');
		$this->load->view('admin-template',$data);
	}
	//-----------------------------------------------------------
	public function offers()
	{
		$data['title']='Offers List';
		$data['main']='list-offers';
		$data['offers']=$this->back_model->select_row_where_db('cp_offers',array(),'*','offer_id','desc');
		$this->load->view('admin-template',$data);
	}
	//-----------------------------------------------------------
	public function reviews()
	{
		$data['title']='Offer Reviews';
		$data['main']='list-reviews';
		$data['reviews']=$this->back_model->select_row_where_db('cp_user_reviews',array(),'*','review_id','desc');
		$this->load->view('admin-template',$data);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */