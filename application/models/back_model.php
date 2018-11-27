<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author prabhjeet
 * @copyright 2010
 */
class Back_model extends CI_Model
{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	//-----------------------------------------------------------
	public function insert_db($table,$data){
		
        $this->db->insert($table, $data);
	}
	//-----------------------------------------------------------
	public function update_db($table,$where_cond,$data){
		
		foreach($where_cond as $list){
			$this->db->where($list);
		}
        $this->db->update($table, $data);
	}
	//-----------------------------------------------------------
	public function select_row_where_db($table,$where_cond,$cond,$forder,$order){
		
        $data=array();
        $this->db->select($cond);
		
		foreach($where_cond as $list){
			$this->db->where($list);
		}
		
		$this->db->order_by($forder,$order);
        $Q = $this->db->get($table);
        if($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
	}
	//-----------------------------------------------------------
	public function select_row_join_where_db($table,$where_cond,$cond,$join_table,$join_cond){
		
        $data=array();
        $this->db->select($cond);
		
		foreach($where_cond as $list){
			$this->db->where($list);
		}
		
		$this->db->join($join_table, $join_cond);
        $Q = $this->db->get($table);
        if($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
	}
	//-----------------------------------------------------------
	public function select_field_where_db($table,$where_cond,$cond){
		
        $data='';
        $this->db->select($cond);
		
		foreach($where_cond as $list){
			$this->db->where($list);
		}
        $Q = $this->db->get($table);
        if($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data = $row[$cond];
            }
        }
        $Q->free_result();
        return $data;
	}
	//-----------------------------------------------------------
	public function select_sum_where_db($table,$where_cond,$cond){
		
        $data='';
        $this->db->select('SUM('.$cond.') as '. $cond);
		
		foreach($where_cond as $list){
			$this->db->where($list);
		}
        $Q = $this->db->get($table);
        if($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data = $row[$cond];
            }
        }
        $Q->free_result();
        return $data;
	}
	//-----------------------------------------------------------
	public function select_data_where_db($table,$where_cond,$cond,$group_order,$limit){
		
        $data=0;
        $this->db->select($cond);
		foreach($where_cond as $list){
			$this->db->where($list);
		}
		$this->db->group_by($group_order);
		$this->db->order_by($group_order,'desc');
		$this->db->limit($limit);
        $Q = $this->db->get($table);
        if($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data+= $row[$cond];
            }
        }
        $Q->free_result();
        return $data;
	}
	//-----------------------------------------------------------
	public function select_order_db($table,$order,$order_field){
		
		$data=array();
        $this->db->select('*');
		$this->db->order_by($order_field,$order);
        $Q = $this->db->get($table);
        if($Q->num_rows() > 0){
            foreach($Q->result_array() as $row){
                $data[] = $row;
            }
        }
        $Q->free_result();
        return $data;
	}
	//-----------------------------------------------------------
	function resize_image($image_path,$image_name)
	{
		$config['image_library'] = 'gd2';
        $config['source_image'] = $image_path;
        //$config['create_thumb'] = TRUE;
        $config['new_image'] = aw_config_item('front_end_images').'software_logo/thumb/'.$image_name;
        //$config['maintain_ratio'] = TRUE;
        $config['width'] = 100;
        //$config['master_dim'] = 'width';
        $config['height'] = 600;
        
        $this->load->library('image_lib', $config);
        
        if(!$this->image_lib->resize()){
            //$err = $this->image_lib->display_errors();
            //$this->session->set_flashdata('err', $err);
        }else{
            $network_logo = array('network_logo' => $image_name);
            return $network_logo;
        }
	}
	//-----------------------------------------------------------
	    public function change_password(){
        
		$id=$_SESSION['user_id'];
		$old_password = $this->input->post('old_password', TRUE);
		$new_password = $this->input->post('new_password', TRUE);
        $this->db->where('user_id', $id);
		$this->db->where('user_password', aw_password($old_password));
		$this->db->where('user_status', 'active');
        $Q = $this->db->get('bc_users');
        if($Q->num_rows() > 0){
            $data = array('user_password' =>  aw_password($new_password));
            $this->db->where('user_id', $id);
            $this->db->where('user_status', 'active');
            $this->db->update('bc_users', $data);
            $this->session->set_flashdata('message', 'Your Account Password Changed Successfully!');
            //return TRUE;
        }else{
            $this->session->set_flashdata('error', 'Wrong Old Password!');
            //return FALSE;
        }
    }
	//-----------------------------------------------------------	   
	function do_upload($file_name,$folder_path,$resize=false)
	{
		$config['upload_path'] = 'resources/back/'.$folder_path.'/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']	= '2000';
		/*$config['max_width']  = '800';
		$config['max_height']  = '600';*/
		
		$this->load->library('upload', $config);
        if (strlen($_FILES[$file_name]['name']))
            {
                if(!$this->upload->do_upload($file_name))
				{
					$data = array('upload_error' => $this->upload->display_errors());
                    return $data;
				}
                else{
				    $data = array('upload_success' => $this->upload->data());
					if ($resize==true){
					$this->do_resize($data['upload_success']['file_name'],$folder_path);
					}
					$res_data=array('upload_error'=>'','file_name'=>$data['upload_success']['file_name']);
                    return $res_data;
				}
            }
	}
	//-----------------------------------------------------------
	public function do_resize($filename, $folder_path)
	{
		
		//$this->load->library('image_lib');
		$source_path = 'resources/back/'.$folder_path.'/' . $filename;
		$target_path = 'resources/back/'.$folder_path .'/tmp';
		$config = array(
        'source_image' => $source_path,
        'new_image' => $target_path,
        'maintain_ration' => false,
        'width' => 600,
        'height' => 600
		);
		
		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);
		$this->image_lib->resize();
		$this->image_lib->clear();
	}
	//-----------------------------------------------------------

	public function record_count($table)
	{
		return $this->db->count_all($table);
	}
}