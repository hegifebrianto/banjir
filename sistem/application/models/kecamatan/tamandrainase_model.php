<?php
	class Tamandrainase_model extends CI_Model 
	{
		var $tabel = 'taman_drainase';
		
		public function __construct() 
		{
           parent::__construct();
           $this->load->database();
        }

        function get_alltamandrainase()
        {
        	$this->db->from($this->tabel);
        	$this->db->order_by("gid","asc");
        	$query = $this->db->get();
        	if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        function get_counttamandrainase()
        {
            $this->db->select('gid,count(*)');
            $this->db->order_by("gid","asc");
            $this->db->group_by("gid");
            $query = $this->db->get($this->tabel);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }

        }

        


	}

?>