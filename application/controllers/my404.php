<?php 
class my404 extends CI_Controller 
{
    function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','form_validation'));
        $this->load->model(array('front_model'));
        $this->load->helper(array('inflector','html','url','aw_helper'));
        /** set the profiler on/off to get details of the fetching data and memory usage **/
		$this->output->enable_profiler(false);	
	}

    public function index() 
    { 
		$data['title']='404 Page Not Found';
        $data['main'] = '404_page'; 
        $this->load->view('template',$data);
    } 
} 
?>