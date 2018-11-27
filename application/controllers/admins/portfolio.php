<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Portfolio extends CI_Controller {


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
	
	function list_category()
	{
		$data['title'] = "Category List";
		$data['categorys'] = $this->back_model->select_row_where_db('bc_category',array(),'*','category_id','desc');
		$data['main'] = 'list-portfolio-category-new';
		$this->load->view('admin-template',$data);
	}
	function list_subcategory()
	{
		$data['title'] = "Sub-Category List";
		$data['categorys'] = $this->back_model->select_row_where_db('bc_sv_category',array('category_parent_id <>0'),'*','category_parent_id','desc');
		$data['parent'] =TRUE;
		$data['main'] = 'list-category';
		$this->load->view('admin-template',$data);
	}
	public function add_category()
	{
		
		 $this->form_validation->set_rules('name','Category Name','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('title','Meta Title','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('keyword','Meta Keyword','trim|max_length[200]|xss_clean|htmlspecialchars');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$data=array(
						'category_name'=>$this->input->post('name',TRUE),
						'category_title'=>$this->input->post('title',TRUE),
						'category_keyword'=>$this->input->post('keyword',TRUE),
						'category_url'=>convert_to_hyphen($this->input->post('name',TRUE))
			);
			$this->back_model->insert_db('bc_category',$data);
			$this->session->set_flashdata('message','Category added successfully!');
			redirect('admins/portfolio/add_category');
		}
		else
		{
			$data['main']='add-portfolio-category-new';
			$data['title']='Add Category';
			$this->load->view('admin-template',$data);
		}	
	}
	public function edit_category($id=NULL)
	{
		
		 $this->form_validation->set_rules('name','Category Name','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('title','Meta Title','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('keyword','Meta Keyword','trim|max_length[200]|xss_clean|htmlspecialchars');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$data=array(
						'category_name'=>$this->input->post('name',TRUE),
						'category_title'=>$this->input->post('title',TRUE),
						'category_keyword'=>$this->input->post('keyword',TRUE),
						'category_url'=>convert_to_hyphen($this->input->post('name',TRUE))
			);
			$this->back_model->update_db('bc_category',array('category_id ='. $id),$data);
			$this->session->set_flashdata('message','Category Updated successfully!');
			redirect('admins/portfolio/edit_category/'. $id);
		}
		else
		{
			$data['main']='edit-portfolio-category-new';
			$data['title']='Edit Category';
			$data['details']=$this->back_model->select_row_where_db('bc_category',array('category_id = '. $id),'*','category_id','asc');
			$this->load->view('admin-template',$data);
		}	
	}
	
	public function add_portfolio()
	{
		
		 $this->form_validation->set_rules('title','Portfolio Title','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		  $this->form_validation->set_rules('category','Category','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('link','Website Link','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('image','Image','trim|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('description','Description','trim|max_length[70]|required|xss_clean');
		 $this->form_validation->set_rules('tags','Tags','trim|xss_clean|max_length[500]');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$upload=$this->back_model->do_upload('image','portfolio',true);
			if (empty($upload['upload_error'])){
			$data=array(
						'portfolio_title'=>$this->input->post('title',TRUE),
						'portfolio_description'=>$this->input->post('description',TRUE),
						'portfolio_category_id'=>$this->input->post('category',TRUE),
						'portfolio_live_link'=>$this->input->post('link',TRUE),
						'portfolio_image'=>$upload['file_name'],
						'portfolio_tags'=>$this->input->post('tags',TRUE),
						'portfolio_status'=>'active'
			);
				$this->back_model->insert_db('bc_portfolio',$data);
				$this->session->set_flashdata('message','Portfolio added successfully!');
			}
			else{
				$this->session->set_flashdata('error',$upload['upload_error']);
			}
			redirect('admins/portfolio/add_portfolio');
		}
		else
		{
			$data['main']='add-portfolio-new';
			$data['title']='Add Portfolio';
			$data['categorys'] = $this->back_model->select_row_where_db('bc_category',array(),'*','category_name','asc');
			$this->load->view('admin-template',$data);
		}	
	}
	public function edit($id=NULL)
	{
		
		 $this->form_validation->set_rules('title','Portfolio Title','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('category','Category','trim|required|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('link','Website Link','trim|required|max_length[200]|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('image','Image','trim|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('description','Description','trim|required|xss_clean|max_length[70]');
		 $this->form_validation->set_rules('tags','Tags','trim|xss_clean|max_length[500]');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$upload=$this->back_model->do_upload('image','portfolio',true);
			if (empty($upload['upload_error'])){
			$data=array(
						'portfolio_title'=>$this->input->post('title',TRUE),
						'portfolio_description'=>$this->input->post('description',TRUE),
						'portfolio_category_id'=>$this->input->post('category',TRUE),
						'portfolio_live_link'=>$this->input->post('link',TRUE),
						'portfolio_tags'=>$this->input->post('tags',TRUE),
						'portfolio_status'=>'active'
			);
			if (!empty($_FILES['image']['name'])){
				$data['portfolio_image']=$upload['file_name'];
			}
				$this->back_model->update_db('bc_portfolio',array('portfolio_id = '. $id),$data);
				$this->session->set_flashdata('message','Portfolio updated successfully!');
			}
			else{
				$this->session->set_flashdata('error',$upload['upload_error']);
			}
			redirect('admins/portfolio/edit/'. $id);
		}
		else
		{
			$data['main']='edit-portfolio-new';
			$data['title']='Edit Portfolio';
			$data['categorys'] = $this->back_model->select_row_where_db('bc_category',array(),'*','category_name','asc');
			$data['portfolio'] = $this->back_model->select_row_where_db('bc_portfolio',array('portfolio_id = '. $id),'*','portfolio_id','asc');
			$this->load->view('admin-template',$data);
		}	
	}
	function list_portfolio()
	{
		$data['title'] = "List Portfolio";
		//$data['portfolios'] = $this->back_model->select_row_where_db('bc_portfolio',array(),'*','portfolio_id','desc');
		$data['portfolios'] = $this->back_model->select_row_join_where_db('bc_portfolio',array(),'*','bc_category','category_id=portfolio_category_id');
		$data['main'] = 'list-portfolio-new';
		$this->load->view('admin-template',$data);
	}
	function delete_category($id=NULL)
	{
		$this->db->delete('bc_category', array('category_id'=>$id));
		$this->session->set_flashdata('message','Category deleted successfully!');
		redirect('admins/portfolio/list_category');
	}
	function delete($id=NULL)
	{
		$this->db->delete('bc_portfolio', array('portfolio_id'=>$id));
		$this->session->set_flashdata('message','Portfolio deleted successfully!');
		redirect('admins/portfolio/list_portfolio');
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */