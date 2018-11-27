<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @author Prabhjeet Singh
 * @copyright 2010
 */
class Auth {
    private $CI = null;
    private $_username;
    private $_user_id;
    private $_password;
    private $_table = 'aw_users';
    private $_query;
    private $_row; 
    private $_data;
    private $_user_role;
    private $_err_msg;
    private $_logged_in = FALSE;
    
///////////////////////////////////////////////////////////////////////////////
    public function __construct(){
     //   parent::__construct();
           session_start();
        
        //get instance of CI core to extend
        $this->CI =& get_instance();
        
        //Load Database Library
        $this->CI->load->database();
        
        //load Session Library
        $this->CI->load->library('session');
    }
///////////////////////////////////////////////////////////////////////////////
    
    public function create_token(){
        
        $token = md5(uniqid(rand(), TRUE));
		$get_token = array('token' => $token);
		$this->CI->session->set_userdata($get_token);
    }
        
///////////////////////////////////////////////////////////////////////////////
    
    public function logged_in($role=""){
        
        if((isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == TRUE) && $_SESSION['user_role'] == $role){
              return TRUE;
          }else{
              return FALSE;
          }
    }
    
///////////////////////////////////////////////////////////////////////////////
    public function admin_login(){
        $this->_user_role = 'admin';
        $this->_err_msg = "You are not authorized to access administration panel";
        return $this->process_login();
    }
   
///////////////////////////////////////////////////////////////////////////////
    public function advertiser_login(){
        $this->_user_role = 'advertiser';
        $this->_err_msg = "Please login with your network account details.";
        return $this->process_login();
    }
    
///////////////////////////////////////////////////////////////////////////////
    public function member_login(){
        $this->_user_role = 'user';
        $this->_err_msg = "Please login with your user account details.";
        return $this->process_login();
    }
///////////////////////////////////////////////////////////////////////////////
    public function process_login(){
        $this->_username = $this->CI->input->post('username', true);
        //$this->_password = $this->CI->input->post('password', true);
        //$this->_password = sha1($this->_salt . $this->CI->input->post('password', true));
        $this->_password = aw_password($this->CI->input->post('password', TRUE));
       /* print_r($this->_password);
        die();*/
        $this->CI->db->select('user_id, user_username, role_name,user_status, user_image');
        $this->CI->db->from('bc_users');
        $this->CI->db->where ('user_username', $this->_username);
        $this->CI->db->where ('user_password', $this->_password);
        $this->CI->db->join('bc_role', 'role_id = user_role_id');
        $this->CI->db->limit (1);
        
        $this->_query = $this->CI->db->get();
        if($this->_query->num_rows() > 0){
            $this->_row = $this->_query->row_array();
            if ($this->_row['user_status']=='active'){
            if($this->_row['role_name'] == $this->_user_role)
            { 
			
                $_SESSION['user_id'] =  $this->_row['user_id'];
                $_SESSION['user_username'] = $this->_row['user_username'];
                $_SESSION['user_role'] = $this->_row['role_name'];
                $_SESSION['user_image'] = $this->_row['user_image'];
                $_SESSION['logged_in'] = TRUE;
                //$this->_logged_in = TRUE;
                return TRUE;
            }else{
                $this->CI->session->set_flashdata('error', $this->_err_msg);
               // echo $_SESSION['user_username'];
                return FALSE;
            }
			}
			else{
				$this->CI->session->set_flashdata('error', 'Your account is not activated yet! Please active it now.');
			}
            
        }else{
            $this->CI->session->set_flashdata('error', 'Your username or password is incorrect. Please try again!');
            return FALSE;
        }
    }
    
///////////////////////////////////////////////////////////////////////////////
    public function logout(){
        if($_SESSION['logged_in'] = TRUE){
            unset($_SESSION['user_id']);
            unset($_SESSION['user_username']);
            unset($_SESSION['user_role']);
            unset($_SESSION['logged_in']);
            session_destroy();
            $this->CI->session->set_flashdata('message', 'You logged out successfully');
        }
    }
    
///////////////////////////////////////////////////////////////////////////////
}
/* End of file Auth.php */
/* Location: ./system/application/libraries/Auth.php */