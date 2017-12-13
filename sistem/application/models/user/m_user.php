<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_user extends CI_Model {

	
	var $tabel = 'user_role';
	var $max_idle_time = 2; // allowed idle time in secs, 300 secs = 5 minute

	
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
    function is_logged_in()
    {
    	$last_activity = $this->session->userdata('last_activity');
    	$logged_in = $this->session->userdata('logged_in');
    	$user = $this->session->userdata('user');

    	if( ($logged_in == 'yes') && ((time() - $last_activity) < $this->max_idle_time))

    	{
    		$this->allow_pass($user);
    		return true;
    	}
    	else 
    	{
    		$this->remove_pass();
    		return false;
    	}
    }

    function get_role($username)
    {
        $query = $this->db->query("select * from user_role where username='$username'");
        foreach($query->result() as $row)
        {
         $role_user=$row->role_user;
        }
        return $role_user;
    }

    // set login session
    function allow_pass( $user_data ) {
        $this->session->set_userdata( array( 'last_activity' => time(), 'logged_in' => 'yes', 'user' => $user_data ) );
    }

    function get_by_username( $username ) {
        $query = $this->db->get_where($this->tabel, array('username' => $username), 1);
        if( $query->num_rows() > 0 ) return $query->row_array();
        return false;
    }

    function get_by_password($password)
    {
        $query = $this->db->get_where($this->tabel, array('password' => $password), 1);
        if( $query->num_rows() > 0 ) return $query->row_array();
        return false;
    }

    function get_by_roleuser($role_user)
    {   
        $query = $this->db->get_where($this->tabel,array('role_user'=>$role_user),1);
        if( $query->num_rows() > 0 ) return $query->row_array();
        return false;    
    }

   
    
    // Check if password is valid
    function check_password( $password, $hashed_password ) {
        list($salt, $hash) = explode('.', $hashed_password);
        $hashed2 = $salt.'.'.md5( $salt.$password);
        return ($hashed_password == $hashed2);
    }
    
       
    
    public function validate_login($username, $password) {
            $this->db->where('username', $username);
            $this->db->where('password', md5($password));
            $query = $this->db->get($this->tabel);
            
            if ($query->num_rows() == 1) {
                return TRUE;
            }
    }

    // Save a new user. 
     public function insert_user($data) 
     {
            $this->db->insert($this->tabel,$data);    
            return TRUE;
     }


    public function validate_registration($username) 
    {
        $this->db->where('username', $username);
        $query = $this->db->get($this->tabel);          
        if ($query->num_rows() == 1) 
        {
            return TRUE;
        }
    }


    public function remove_pass()
    {
    	$array_items = array('last_activity'=>'','logged_in' =>'','user'=>'');
    	$this->session->unset_userdata($array_items);

    }

	
}

/* End of file m_user.php */
/* Location: ./application/models/m_user.php */