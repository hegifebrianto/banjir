<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	// data for view, we do this so we can set value in __construct
	// and pass to other functions if needed
	var $data = array();
	 
	
    function __construct()
    {
        // Call the Controller constructor
         parent::__construct();
        $this->load->database();
		$this->load->model('user/m_user');
		$this->load->library('form_validation','url');
		$this->load->library('session');
		$this->load->helper('url');
    }

    
	// route /login
	public function index()
	{
		
		if ($this->m_user->is_logged_in()) { redirect('admin'); }
	
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		if ($this->form_validation->run()) {
			$username = addslashes($this->input->post('username'));
            $password = addslashes($this->input->post('password'));
		
			if ($user = $this->m_user->get_by_username($username)) 
			{
				if ($this->m_user->get_by_password($password))
				{

					//$this->m_user->allow_pass( $user );
					//redirect('admin');
					
				} 
				else { $this->data['login_error'] = 'Invalid username or password'; }
			} 
			else { $this->data['login_error'] = 'Username not found'; }
		}
		$this->load->view('login/v_login', $this->data);
	}

	public function validate_credentials() 
    {
            $username = addslashes($this->input->post('username'));
            $password = addslashes($this->input->post('password'));
            
            echo $username .' '. md5($password);
            
            
            $query = $this->m_user->validate_login($username, $password);
            
            if ($query) 
            {
                $data = array(
                    'username' => $this->input->post('username'),
                    'is_logged_in' => TRUE
                );
                
                if($this->m_user->get_role($username)=='1')
                {
                	$this->session->set_userdata($data);
                	redirect('admin/home');
                }
            	else
                {
                	$this->session->set_userdata($data);
                	redirect('user/dashboard');
                }
                //echo 'yes';
            }
            else {
                $this->index();
                //echo 'no';
            }
    }
	
	
	// route /logout -- check settings in /application/config/routes.php
	public function logout() {
		$this->m_user->remove_pass();
		$this->data['login_success'] = 'You have been logged out. Thank you.';
		$this->load->view('login/v_login', $this->data);
	}
	
	// noaccess to show no access message
	public function noaccess() {
		$this->data['login_error'] = 'You do not have access or your login has expired.';
		$this->load->view('login/v_login', $this->data);
	}
}

/* End of file login.php */
/* Location: ./application/controllers/login.php */