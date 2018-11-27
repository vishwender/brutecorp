<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','auth','form_validation','email','recaptcha','ccavenue'));
		$this->load->helper(array('inflector','html','url','aw_helper'));
		$this->load->model('front_model');
	}

	public function index()
	{
		$id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : '';
		$data['title'] = "Web Designer Amritsar, Web Designer India, Web Designer Punjab";
		$data['main'] = 'cart-new';
		$data['meta_keywords'] = 'Web Designer Amritsar, Web Designer India, Web Designer Punjab';
		$data['meta_description'] = 'We are into web design, domain web hosting provider,MLM websites, bulk sms, SEO services provider in Amritsar';
		
		if($this->auth->logged_in('user') == TRUE)
		{
			$data['logged_in'] = TRUE;
			$data['orders'] = $this->front_model->get_cart($id);
		}
		$this->load->view('template',$data);
	}

	public function add()
	{
		$testString = $this->input->post('plan_price');
    	$price = preg_replace('/\D/', '', $testString);
		$insert_data = array(
			'order_category_id'=>$this->input->post('plan_category_id'),
			'order_title'=>$this->input->post('plan_name'),
			'order_price'=>$price,
			'order_status'=>'active',
			'order_register_date'=>date('Y-m-d'),
			'order_franchise_id'=>1,
			'order_user_id'=>$this->input->post('user_id')
		);

		$this->front_model->insert_db('bc_orders',$insert_data);
		$this->session->set_flashdata('message','Product Added to cart');
		redirect('services/'.$this->input->post('uri'));
	}

	public function remove($id)
	{
		$this->front_model->remove_cart_item($id,'order_id','bc_orders');
		$this->session->set_flashdata('message','Product Removed');
		redirect('cart');
	}

	public function pay_request()
	{
		$stamp = strtotime("now").$this->input->ip_address();
		$data['billing_cust_name']=$this->input->post('user_username');
		$data['Order_Id'] = str_replace(".", "", $stamp);
		$data['Amount'] = $this->input->post('order_price');
		$data['Merchant_Id']='M_mprusty_11000';
		$data['WorkingKey']='nljjre6fcsomr7485j';
		$data['Redirect_Url']=base_url();
		$data['Checksum']=$this->ccavenue->getCheckSum($data['Merchant_Id'],$data['Amount'],$data['Order_Id'] ,$data['Redirect_Url'],$data['WorkingKey']);
		$this->load->view("user_panel/ccavenue_order_page",$data);
		var_dump($data);
	}
}
