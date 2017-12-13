<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	// data for view, we do this so we can set value in __construct
	// and pass to other functions if needed
	var $data = array(); 
	
    public function __construct()
    {
        // Call the Controller constructor
        parent::__construct();
        $this->load->database('ahape');
        $this->load->helper('url', 'form');
		$this->load->model('m_user');
		$this->load->library('session');
		$this->load->library('form_validation');
    }

 	public function index() 
    {
        $this->data['title'] = 'Register Login';
        $this->load->view('login/v_register', $this->data);
	}
        
    public function validate_form() 
    {
            $username = addslashes($this->input->post('username'));
            $password = addslashes(md5($this->input->post('password')));
            $password2 = addslashes(md5($this->input->post('password2')));
            $fullname = addslashes($this->input->post('fullname'));
            $email = addslashes($this->input->post('email'));
            $phone = addslashes($this->input->post('phone'));
            $role = addslashes($this->input->post('role'));
            
            $query = $this->m_user->validate_registration($username);
            
            if ($query) 
            {
                $this->session->set_flashdata('message', "<div class=\"alert alert-danger alert-dismissable\" id=\"alert\">"
                    . "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"
                    . "<i class=\"glyphicon glyphicon-ok\"></i> Username sudah ada</div>");
                $this->index();
            }
            elseif ($password != $password2) {
                $this->session->set_flashdata('message', "<div class=\"alert alert-danger alert-dismissable\" id=\"alert\">"
                    . "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"
                    . "<i class=\"glyphicon glyphicon-ok\"></i> Konfirmasi password salah</div>");
                redirect('login/register');
                $this->index();
            }
            else {
                $data = array (
                    'role_user' => $role,
                    'username' => $username,
                    'password' => $password,
                    'nama' => $fullname,
                    'email' => $email,
                    'telepon' => $phone
                );
                $this->m_user->insert_user($data);
                $this->session->set_flashdata('message', "<div class=\"alert alert-success alert-dismissable\" id=\"alert\">"
                        . "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>"
                        . "<i class=\"glyphicon glyphicon-ok\"></i> Pendaftaran berhasil, silahkan melakukan login</div>");
                redirect('login/login');
            }
    }
}