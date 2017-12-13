<?php
	class penduduk_model extends CI_Model 
	{
		var $tabel = 'banyak_penduduk';
		
		public function __construct() 
		{
           parent::__construct();
           $this->load->database();
        }

        function get_allbanyakpenduduk()
        {
        	$this->db->from($this->tabel);
        	$this->db->order_by("gid","asc");
        	$query = $this->db->get();
        	if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        function get_countbanyakpenduduk()
        {
            
            $this->db->order_by("gid","asc");
            $query = $this->db->get($this->tabel);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }

        }

        
	}

?>