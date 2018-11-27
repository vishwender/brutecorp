<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','auth','form_validation'));
        $this->load->helper(array('inflector','html','url','aw_helper'));
        /** set the profiler on/off to get details of the fetching data and memory usage **/
		$this->output->enable_profiler(false);	
		
	}
	//-----------------------------------------------------------	
	private function _check_login(){
        if($this->auth->admin_login() == TRUE){
            return TRUE;
        }else{
            return FALSE;
        }
    }
	//-----------------------------------------------------------
	public function index()
	{
		$this->form_validation->set_rules('username','Username','trim|xss_clean|required|htmlspecialchars');
        $this->form_validation->set_rules('password','Password','trim|xss_clean|required||htmlspecialchars');
		
		if($this->form_validation->run() == TRUE){
			if($this->session->userdata('token') == $this->input->post('token',TRUE)){
				if($this->_check_login())
					redirect('admins/dashboard');
				else
					redirect('admins/login');
			}
			else{
				redirect('admins/login');
			}
		}
		else{
			
			$data['title']='Brutecorp | Login';
			$data['main']='admin-login';
			$this->load->view('admin-login-template',$data);
		}
	}
	//-----------------------------------------------------------
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */