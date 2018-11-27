<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class services extends CI_Controller {


	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','auth','form_validation'));
        $this->load->model(array('front_model'));
        $this->load->helper(array('inflector','html','url','aw_helper'));
        /** set the profiler on/off to get details of the fetching data and memory usage **/
		$this->output->enable_profiler(false);	
	}
	function index($slug)
	{
		$this->form_validation->set_rules('uname','Name','trim|required|xss_clean');
		$this->form_validation->set_rules('uemail','Email','trim|required|xss_clean');
		$this->form_validation->set_rules('ucomment','Comment','trim|required|xss_clean');
		
		
		$data['subcategorys'] = $this->front_model->select_row_where_db('bc_sv_category',array('category_slug = "'. $slug. '"'),'*','category_id','asc');
		
		if (count($data['subcategorys'])>0){
		$data['plans'] = $this->front_model->select_row_where_db('bc_plans',array('plan_spage_id = "'. $data['subcategorys'][0]['category_id']. '"'),'*','plan_id','asc');
		$data['categorys'] = $this->front_model->select_row_where_db('bc_sv_category',array('category_parent_id =0'),'*','category_name','asc');
			/*echo '<pre>'; print_r($data);
			die();*/	
			if($this->form_validation->run() == TRUE){
			
			$data=array('review_uname'=>$this->input->post('uname',TRUE),
						'review_uemail'=>$this->input->post('uemail',TRUE),
						'review_ucomment'=>$this->input->post('ucomment',TRUE),
						'review_service_id'=>$data['subcategorys'][0]['category_id'],
						'review_parent_id'=>0,
						'review_date'=>date('Y-m-d H:i:s')
			);
			$this->front_model->insert_db('bc_reviews',$data);
			$this->session->set_flashdata('message','Your review submitted successfully and awaiting approval!');
			redirect('services/'.$slug. '#review');
			
		}
		else{
			$data['title'] = $data['subcategorys'][0]['category_title'];
			$data['meta_keywords'] = $data['subcategorys'][0]['category_keyword'];
			$data['meta_description'] = limit_words(strip_tags($data['subcategorys'][0]['category_description']),20);
			$data['main'] = 'sub-page';
			$this->load->library('recaptcha');
			$data['recaptcha_html'] = $this->recaptcha->recaptcha_get_html();
			if($this->auth->logged_in('user') == TRUE)
			{
				$data['logged_in'] = TRUE;
			}
			$this->load->view('template',$data);
			}
		}
		else{
			echo show_404();
		}
	}
	
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */