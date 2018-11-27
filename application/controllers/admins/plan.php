<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Plan extends CI_Controller {


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
		$this->form_validation->set_rules('copy_from','Copy From','xss_clean|required');
		$this->form_validation->set_rules('copy_to','Copy To','xss_clean|required');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$from=$this->input->post('copy_from');
			$to=$this->input->post('copy_to');
			$plan=$this->back_model->select_row_where_db('bc_plans',array('plan_spage_id ='.$from),'*','plan_id','asc');
			foreach($plan as $key => $list){
				$data=array(
					'plan_spage_id'=>$to,
					'plan_feature_name'=>$list['plan_feature_name'],
					'plan_plan1'=>$list['plan_plan1'],
					'plan_plan2'=>$list['plan_plan2'],
					'plan_plan3'=>$list['plan_plan3'],
					'plan_plan4'=>$list['plan_plan4'],
					'plan_status'=>'active'
				);
				$this->back_model->insert_db('bc_plans',$data);
			}
			redirect('admins/plan');
		 }
		 else{
			$data['title'] = "Plans List";
			$data['subcategorys'] = $this->back_model->select_row_where_db('bc_sv_category',array('category_parent_id <>0'),'*','category_name','asc');
			$data['main'] = 'list-plans-new';
			$this->load->view('admin-template',$data);
		 }
	}
	
	public function add()
	{
	
		 $this->form_validation->set_rules('spage','Sub Page','required|htmlspecialchars');
		 $this->form_validation->set_rules('type','Feature name','xss_clean');
		 $this->form_validation->set_rules('plan1','Plan 1','xss_clean');
		 $this->form_validation->set_rules('plan2','Plan 2','xss_clean');
		 $this->form_validation->set_rules('plan3','Plan 3','xss_clean');
		 $this->form_validation->set_rules('plan4','Plan 4','xss_clean');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$spage_name=$this->input->post('spage');
			$type=$this->input->post('type');
			foreach($type as $key => $list){
				$data=array(
							'plan_spage_id'=>$spage_name,
							'plan_feature_name'=>$_REQUEST['type'][$key],
							'plan_plan1'=>$_REQUEST['plan1'][$key],
							'plan_plan2'=>$_REQUEST['plan2'][$key],
							'plan_plan3'=>$_REQUEST['plan3'][$key],
							'plan_plan4'=>$_REQUEST['plan4'][$key],
							'plan_status'=>'active'
				);
				$this->back_model->insert_db('bc_plans',$data);
			}
			$this->session->set_flashdata('message','Plan added successfully!');
			redirect('admins/plan/add');
		}
		else
		{
			$data['main']='add-plan-new';
			$data['title']='Add Plan';
			$data['sub_category'] = $this->back_model->select_row_where_db('bc_sv_category',array('category_parent_id <> 0'),'*','category_name','asc');
			$this->load->view('admin-template',$data);
		}	
	}
	public function edit($id)
	{
	
		 $this->form_validation->set_rules('spage','Sub Page','required|htmlspecialchars');
		 $this->form_validation->set_rules('type','Feature name','xss_clean');
		 $this->form_validation->set_rules('plan1','Plan 1','xss_clean');
		 $this->form_validation->set_rules('plan2','Plan 2','xss_clean');
		 $this->form_validation->set_rules('plan3','Plan 3','xss_clean');
		 $this->form_validation->set_rules('plan4','Plan 4','xss_clean');
		 	
		 if($this->form_validation->run() == TRUE)
		 {
			$this->db->where('plan_spage_id',$id);
			$this->db->delete('bc_plans');
			
			$spage_name=$this->input->post('spage');
			$type=$this->input->post('type');
			if ($type!=FALSE){
				foreach($type as $key => $list){
					$data=array(
								'plan_spage_id'=>$spage_name,
								'plan_feature_name'=>$_REQUEST['type'][$key],
								'plan_plan1'=>$_REQUEST['plan1'][$key],
								'plan_plan2'=>$_REQUEST['plan2'][$key],
								'plan_plan3'=>$_REQUEST['plan3'][$key],
								'plan_plan4'=>$_REQUEST['plan4'][$key],
								'plan_status'=>'active'
					);

					$this->db->insert('bc_plans',$data);
				}
			}
			$this->session->set_flashdata('message','Plan updated successfully!');
			redirect('admins/plan/edit/'.$id);
		}
		else
		{
			$data['main']='edit_plan_new';
			$data['title']='Edit Plan';
			$data['spages']=$this->back_model->select_row_where_db('bc_sv_category',array('category_parent_id <> 0'),'*','category_name','asc');
			$data['plan_details']=$this->back_model->select_row_where_db('bc_plans',array('plan_spage_id = '.$id),'*','plan_id','asc');
			$data['plan_row_details']=$this->back_model->select_row_where_db('bc_sv_category',array('category_id = '.$id),'*','category_id','asc');
			$this->load->view('admin-template',$data);
		}	
	}
	function delete($id=NULL)
	{
		$this->db->delete('bc_plans', array('plan_spage_id'=>$id));
		$this->session->set_flashdata('message','Franchise deleted successfully!');
		redirect('admins/plan');
		
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */