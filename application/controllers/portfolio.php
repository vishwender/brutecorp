<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','auth','form_validation'));
        $this->load->model(array('front_model'));
        $this->load->helper(array('inflector','html','url','aw_helper'));
        /** set the profiler on/off to get details of the fetching data and memory usage **/
		$this->output->enable_profiler(false);	
	}

	function index()
	{
		$data['title'] = "Portfolio";
		$data['portfolio'] = $this->front_model->select_row_where_db('bc_portfolio',array(),'*','portfolio_id','desc');
		$data['categorys'] = $this->front_model->select_row_where_db('bc_category',array(),'*','category_name','asc');
		$data['main'] = 'portfolio';
		if($this->auth->logged_in('user') == TRUE)
		{
			$data['logged_in'] = TRUE;
		}
		$this->load->view('template',$data);
	}

	public function view($uri=NULL)
	{
		$data['title'] = "Portfolio";
		
		if ($uri!=NULL)
		{
			$id = $this->front_model->select_field_where_db('bc_category',array('category_url ="'. $uri. '"'),'category_id');
		
		if ($id==NULL)
		echo show_404();
		$data['portfolio'] = $this->front_model->select_row_where_db('bc_portfolio',array('portfolio_category_id ='. $id),'*','portfolio_id','desc');

		}
		else
		$data['portfolio'] = $this->front_model->select_row_where_db('bc_portfolio',array(),'*','portfolio_id','desc');
		$data['categorys'] = $this->front_model->select_row_where_db('bc_category',array(),'*','category_name','asc');
		$data['main'] = 'portfolio';
		if($this->auth->logged_in('user') == TRUE)
		{
			$data['logged_in'] = TRUE;
		}
		$this->load->view('template',$data);
	}

	public function view_full($id)
	{
		$data['title'] = "Portfolio";
		$data['portfolio'] = $this->front_model->select_row_where_db('bc_portfolio',array('portfolio_id ='. $id),'*','portfolio_id','desc');
		$data['categorys'] = $this->front_model->select_row_where_db('bc_category',array(),'*','category_name','asc');
		$data['main'] = 'portfull';
		if($this->auth->logged_in('user') == TRUE)
		{
			$data['logged_in'] = TRUE;
		}
		$this->load->view('template',$data);
	}
}
?>