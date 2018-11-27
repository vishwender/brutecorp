<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Services extends CI_Controller {


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
	
	function list_category($id=NULL)
	{
		$this->form_validation->set_rules('sort','sort','trim|xss_clean|required|numeric');
		
		if($this->form_validation->run() == TRUE)
		{
			$this->back_model->update_db('bc_sv_category',array('category_id ='. $id),array('category_sort'=>$this->input->post('sort',TRUE)));
			$this->session->set_flashdata('message','Sort Ordered successfully!');
			redirect('admins/services/list_category');
		}
		else{
			$data['title'] = "Category List";
			$data['categorys'] = $this->back_model->select_row_where_db('bc_sv_category',array('category_parent_id =0'),'*','category_id','desc');
			$data['parent'] =FALSE;
			$data['main'] = 'list-category-new';
			$this->load->view('admin-template',$data);
		}
	}
	function list_subcategory($id=NULL)
	{
		$this->form_validation->set_rules('sort','sort','trim|xss_clean|required|numeric');
		
		if($this->form_validation->run() == TRUE)
		{
			$this->back_model->update_db('bc_sv_category',array('category_id ='. $id),array('category_sort'=>$this->input->post('sort',TRUE)));
			$this->session->set_flashdata('message','Sort Ordered successfully!');
			redirect('admins/services/list_subcategory');
		}
		else{
			$data['title'] = "Sub-Category List";
			$data['categorys'] = $this->back_model->select_row_where_db('bc_sv_category',array('category_parent_id <>0'),'*','category_parent_id','desc');
			$data['parent'] =TRUE;
			$data['main'] = 'list-category-new';
			$this->load->view('admin-template',$data);
		}
	}
	function list_link($id=NULL)
	{
		$data['title'] = "Link List";
		$data['links'] = $this->back_model->select_row_where_db('bc_links',array(),'*','link_id','desc');
		$data['main'] = 'list-link-new';
		$this->load->view('admin-template',$data);
	}
	function reviews()
	{
		$data['title'] = "Reivews List";
		$data['reviews'] = $this->back_model->select_row_where_db('bc_reviews',array(),'*','review_id','desc');
		$data['main'] = 'reviews-new';
		$this->load->view('admin-template',$data);
	}
	public function edit_review($id=NULL)
	{
		$this->form_validation->set_rules('uname','Name','trim|required|xss_clean');
		$this->form_validation->set_rules('uemail','Email','trim|required|xss_clean');
		$this->form_validation->set_rules('ucomment','Comment','trim|required|xss_clean');
		$this->form_validation->set_rules('status','Status','trim|required|xss_clean');
		
		if($this->form_validation->run() == TRUE){
			
			$data=array('review_uname'=>$this->input->post('uname',TRUE),
						'review_uemail'=>$this->input->post('uemail',TRUE),
						'review_ucomment'=>$this->input->post('ucomment',TRUE),
						'review_parent_id'=>0,
						'review_status'=>$this->input->post('status',TRUE)
			);
			$this->back_model->update_db('bc_reviews',array('review_id ='. $id),$data);
			$this->session->set_flashdata('message','Review Updated Successfully!');
			redirect('admins/services/edit_review/'.$id);
		}
		else
		{
			$data['main']='edit-review-new';
			$data['title']='Edit Review';
			$data['review'] = $this->back_model->select_row_where_db('bc_reviews',array('review_id = '.$id),'*','review_id','asc');
			$this->load->view('admin-template',$data);
		}	
	}
	public function add_link()
	{
		 $this->form_validation->set_rules('keyword','Keyword','trim|max_length[200]|xss_clean');
		 $this->form_validation->set_rules('url','Url','trim|required|max_length[200]|xss_clean');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$data=array(
						'link_keyword'=>$this->input->post('keyword',TRUE),
						'link_url'=>$this->input->post('url',TRUE)
			);
			$this->back_model->insert_db('bc_links',$data);
			$this->session->set_flashdata('message','Link added successfully!');
			redirect('admins/services/add_link');
		}
		else
		{
			$data['main']='add-links-new';
			$data['title']='Add Link';
			$this->load->view('admin-template',$data);
		}	
	}
	public function edit_link($id=NULL)
	{
		 $this->form_validation->set_rules('keyword','Keyword','trim|max_length[200]|xss_clean');
		 $this->form_validation->set_rules('url','Url','trim|required|max_length[200]|xss_clean');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$data=array(
						'link_keyword'=>$this->input->post('keyword',TRUE),
						'link_url'=>$this->input->post('url',TRUE)
			);
			$this->back_model->update_db('bc_links',array('link_id ='. $id),$data);
			$this->session->set_flashdata('message','Link updated successfully!');
			redirect('admins/services/edit_link/'.$id);
		}
		else
		{
			$data['main']='edit-links-new';
			$data['title']='Edit Link';
			$data['links'] = $this->back_model->select_row_where_db('bc_links',array('link_id = '.$id),'*','link_id','asc');
			$this->load->view('admin-template',$data);
		}	
	}
	public function add_category()
	{
		
		$this->form_validation->set_rules('name','Category Name','trim|required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('title','Meta Title','trim|required|max_length[200]|xss_clean');
		$this->form_validation->set_rules('keyword','Meta Keyword','trim|max_length[200]|xss_clean');
		$this->form_validation->set_rules('image','Image','trim|xss_clean|htmlspecialchars');
		$this->form_validation->set_rules('description','Description','trim|xss_clean');
		$this->form_validation->set_rules('onhome','On Home','trim|xss_clean');
		 	
		if($this->form_validation->run() == TRUE)
		{
			$upload=$this->back_model->do_upload('image','services',true);
			if (empty($upload['upload_error']))
			{
				$data=array
					(
						'category_name'=>ucwords(strtolower($this->input->post('name',TRUE))),
						'category_title'=>ucwords(strtolower($this->input->post('title',TRUE))),
						'category_keyword'=>ucwords(strtolower($this->input->post('keyword',TRUE))),
						'category_image'=>$upload['file_name'],
						'category_description'=>$this->input->post('description',TRUE),
						'category_parent_id'=>0,
						'category_onhome'=>$this->input->post('onhome',TRUE),
						'category_slug'=>convert_to_hyphen($this->input->post('name',TRUE))
					);
				$this->back_model->insert_db('bc_sv_category',$data);
				$this->session->set_flashdata('message','Category added successfully!');
			}
			else
			{
				$this->session->set_flashdata('error',$upload['upload_error']);
			}
				redirect('admins/services/add_category');
		}
		else
		{
			$data['main']='add-category-new';
			$data['title']='Add Category';
			$this->load->view('admin-template',$data);
		}	
	}
	public function edit_category($id=NULL)
	{
		
		 $this->form_validation->set_rules('name','Category Name','trim|required|max_length[200]|xss_clean');
		 $this->form_validation->set_rules('title','Meta Title','trim|required|max_length[200]|xss_clean');
		 $this->form_validation->set_rules('keyword','Meta Keyword','trim|max_length[200]|xss_clean');
		 $this->form_validation->set_rules('image','Image','trim|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('description','Description','trim|xss_clean');
		  $this->form_validation->set_rules('parent_category','Parent Category','trim|xss_clean');
		 $this->form_validation->set_rules('onhome','On Home','trim|xss_clean');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$upload=$this->back_model->do_upload('image','services',true);
			$parent_category=$this->input->post('parent_category',TRUE);
			if (empty($upload['upload_error'])){
			$data=array(
						'category_name'=>$this->input->post('name',TRUE),
						'category_title'=>$this->input->post('title',TRUE),
						'category_keyword'=>$this->input->post('keyword',TRUE),
						'category_description'=>$this->input->post('description',TRUE),
						'category_onhome'=>$this->input->post('onhome',TRUE),
						'category_slug'=>convert_to_hyphen($this->input->post('name',TRUE))
			);
			if (!empty($_FILES['image']['name']))
			$data['category_image']=$upload['file_name'];
			if ($parent_category!=false)
			$data['category_parent_id']=$this->input->post('parent_category',TRUE);
			$this->back_model->update_db('bc_sv_category',array('category_id ='. $id),$data);
			$this->session->set_flashdata('message','Category updated successfully!');
			}
			else{
				$this->session->set_flashdata('error',$upload['upload_error']);
			}
			redirect('admins/services/edit_category/'. $id);
		}
		else
		{
			$data['category'] = $this->back_model->select_row_where_db('bc_sv_category',array('category_id = '.$id),'*','category_name','asc');
			if (count($data['category'])>0){
			$parent=$data['category'][0]['category_parent_id'];
			if ($parent==0){
				$data['title']='Edit Category';
				$data['categorys'] =array();
				$data['has_parent']=false;
			}
			else{
				$data['title']='Edit Sub-Category';
				$data['categorys'] = $this->back_model->select_row_where_db('bc_sv_category',array('category_parent_id = 0'),'*','category_name','asc');
				$data['has_parent']=true;
			}
			$data['main']='edit-category-new';
			$this->load->view('admin-template',$data);
			}
			else
				show_404();
		}	
	}
	
	public function add_subcategory()
	{
		
		 $this->form_validation->set_rules('name','Category Name','trim|required|max_length[200]|xss_clean');
		 $this->form_validation->set_rules('title','Category Title','trim|required|max_length[200]|xss_clean');
		 $this->form_validation->set_rules('keyword','Keyword','trim|required|max_length[200]|xss_clean');
		 $this->form_validation->set_rules('image','Image','trim|xss_clean|htmlspecialchars');
		 $this->form_validation->set_rules('parent_category','Category Parent','trim|required|xss_clean');
		 $this->form_validation->set_rules('description','Description','trim|required|xss_clean');
		 	
		  if($this->form_validation->run() == TRUE)
		 {
			$upload=$this->back_model->do_upload('image','services',true);
			if (empty($upload['upload_error'])){
			$data=array(
						'category_name'=>$this->input->post('name',TRUE),
						'category_title'=>$this->input->post('title',TRUE),
						'category_keyword'=>$this->input->post('keyword',TRUE),
						'category_image'=>$upload['file_name'],
						'category_description'=>$this->input->post('description',TRUE),
						'category_parent_id'=>$this->input->post('parent_category',TRUE),
						'category_slug'=>convert_to_hyphen($this->input->post('name',TRUE))
			);
				$this->back_model->insert_db('bc_sv_category',$data);
				$this->session->set_flashdata('message','Subcategory added successfully!');
			}
			else{
				$this->session->set_flashdata('error',$upload['upload_error']);
			}
			redirect('admins/services/add_subcategory');
		}
		else
		{
			$data['main']='add-subcategory-new';
			$data['title']='Add Sub-Category';
			$data['categorys'] = $this->back_model->select_row_where_db('bc_sv_category',array('category_parent_id = 0'),'*','category_name','asc');
			$this->load->view('admin-template',$data);
		}	
	}
	function delete_category($id=NULL)
	{
		$this->db->delete('bc_sv_category', array('category_id'=>$id));
		$this->session->set_flashdata('message','Category deleted successfully!');
		redirect('admins/services/list_category');
		
	}
	function delete_subcategory($id=NULL)
	{
		$this->db->delete('bc_sv_category', array('category_id'=>$id));
		$this->session->set_flashdata('message','Sub category deleted successfully!');
		redirect('admins/services/list_subcategory');
		
	}
	function delete($id=NULL)
	{
		$this->db->delete('bc_links', array('link_id'=>$id));
		$this->session->set_flashdata('message','Link deleted successfully!');
		redirect('admins/services/list_link');
		
	}
	function delete_review($id=NULL)
	{
		$this->db->delete('bc_reviews', array('review_id'=>$id));
		$this->session->set_flashdata('message','Review deleted successfully!');
		redirect('admins/services/reviews');
		
	}
}

/* End of file welcome.php */
/* Location: ./system/application/controllers/welcome.php */