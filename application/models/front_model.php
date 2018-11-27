<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author prabhjeet
 * @copyright 2010
 */
class Front_model extends CI_Model
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
	public function select_row_where_limit_db($table,$where_cond,$cond,$limit){
		
        $data=array();
        $this->db->select($cond);
		
		foreach($where_cond as $list){
			$this->db->where($list);
		}
		$this->db->limit($limit);
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
	public function select_sum_where_db($table,$where_cond,$cond){
		
        $data=0;
        $this->db->select('SUM('.$cond.') as '. $cond);
		
		foreach($where_cond as $list){
			$this->db->where($list);
		}
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
    public function accountActivate($validuser, $verifystring){
        $this->db->where('user_username', $validuser);
        $this->db->where('user_activation_key', $verifystring);
        $this->db->where('user_status', 'inactive');
        $Q = $this->db->get('bc_users');
        if($Q->num_rows() > 0){
            $data = array('user_status' => 'active');
            $this->db->where('user_username', $validuser);
            $this->db->where('user_activation_key', $verifystring);
            $this->db->where('user_status', 'inactive');
            $this->db->update('bc_users', $data);          
            $this->session->set_flashdata('message', 'Your account has been activated! Please complete your profile.');
            return TRUE;
        }else{
            $this->session->set_flashdata('error', 'Wrong activation url!');
            return FALSE;
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
            $this->session->set_flashdata('message', 'Wrong Old Password!');
            //return FALSE;
        }
    }

    public function reset_password($new_password,$email,$verifystring)
    {
        $data = array('user_password'=>$new_password);
        $this->db->where(array('user_email'=>$email, 'user_forgot_password_key'=>$verifystring,'user_role_id'=>2, 'user_status'=>'active'));
        $this->db->update('bc_users', $data);
        $this->session->set_flashdata('message', 'Your Account Password Changed Successfully!');
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
        $config['height'] = 50;
        
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
	function do_upload($file_name,$folder_path)
	{
		$config['upload_path'] = 'resources/back/'.$folder_path.'/';
		$config['allowed_types'] = 'gif|jpg|png';
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
					$res_data=array('upload_error'=>'','file_name'=>$data['upload_success']['file_name']);
                    return $res_data;
				}
            }
	}
	//-----------------------------------------------------------

    public function get_cart($id)
    {
        $sql = "SELECT * FROM `bc_orders` JOIN `bc_sv_category` on `bc_orders`.`order_category_id` = `bc_sv_category`.`category_id` WHERE `bc_orders`.`order_user_id` = $id";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function remove_cart_item($id,$field,$table)
    {   
        $this->db->where($field, $id);
        $this->db->delete($table);
    }

    public function newsletter($data)
    {
        $this->db->insert('bc_newsletter',$data);
    }
}