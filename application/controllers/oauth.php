<?php 
class Oauth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('pagination','auth','form_validation','email'));
        $this->load->model(array('front_model'));
        $this->load->helper(array('inflector','html','url','aw_helper'));
        /** set the profiler on/off to get details of the fetching data and memory usage **/
		$this->output->enable_profiler(false);
		
	}
    public function login($provider)
    {
        $this->load->helper('url_helper');
		$this->load->library('session');
        $this->load->spark('oauth2/0.3.1');
		if ($provider=='google'){
        $provider = $this->oauth2->provider($provider, array(
            'id' => '756695490526-8q5h20ku76jokjasgmft3tg0hlutvhth.apps.googleusercontent.com',
            'secret' => 'ZL4jwVvf9T_5Q47DcALTvk6n',
			'redirect_uri' => site_url('user/login'),
        ));
		}
		elseif ($provider=='facebook'){
			$provider = $this->oauth2->provider($provider, array(
            'id' => '1480244762252528',
            'secret' => '1609918ea63b7c2b3b433601eb51e158',
        ));
		}
        if ( ! $this->input->get('code'))
        {
            // By sending no options it'll come back here
            $provider->authorize();
        }
        else
        {
            // Howzit?
            try
            {
                $token = $provider->access($_GET['code']);
                $data = $provider->get_user_info($token);
				$count=$this->db->where(array('user_facebook_id'=> $data['uid']))->count_all_results('cp_users');
				$username=explode('@',$data['email']);
				if (strpos($data['image'], 'google')){
					$data2=array('user_facebook_id'=>$data['uid'], 'user_firstname'=>$data['first_name'],'user_username'=>$username[0], 'user_lastname'=>$data['last_name'], 'user_email'=>$data['email'],'user_image'=>$data['image'], 'user_status'=>'active', 'user_role_id'=>'2');
				}
				elseif (strpos($data['image'], 'facebook')){
					$data2=array('user_facebook_id'=>$data['uid'], 'user_firstname'=>$data['first_name'],'user_username'=>$username[0], 'user_lastname'=>$data['last_name'], 'user_email'=>$data['email'],'user_image'=>'https://graph.facebook.com/'.$data['uid'].'/picture?type=square', 'user_status'=>'active', 'user_role_id'=>'2');
				}
				
				if ($count==0){
					$data2['user_registered_date']=date('Y-m-d H:i:s');
					$this->db->insert('cp_users',$data2);
					$user_id=$this->db->insert_id();
				}
				else{
					$user_id=$this->front_model->select_field_where_db('cp_users',array('user_facebook_id = '. $data['uid']),'user_id');
					$this->front_model->update_db('cp_users',array('user_facebook_id = ' . $user_id),$data2);
				}
				
				$this->load->library('session');
				$_SESSION['user_id'] =  $user_id;
				$_SESSION['user_username'] = $username[0];
				$_SESSION['user_role'] = 'user';
				$_SESSION['logged_in'] = TRUE;
				redirect('user/edit_profile', 'refresh');
            }

            catch (OAuth2_Exception $e)
            {
                show_error('That didnt work: '.$e);
            }

        }
    }
} 
?>