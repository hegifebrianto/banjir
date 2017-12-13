<?php
	class Banjirtercatat_model extends CI_Model 
	{
		var $tabel = 'banjir_tercatat';
		
		public function __construct() 
		{
            parent::__construct();
            $this->load->database();
        }

        function get_allbanjirtercatat()
        {
        	$this->db->from($this->tabel);
        	$this->db->order_by("gid","asc");
        	$query = $this->db->get();
        	if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }
        
        function get_countbanjirtercatat()
        {
            $this->db->select('gid,count(*)');
            $this->db->group_by("gid");
            $this->db->order_by("gid","asc");
            $query = $this->db->get($this->tabel);
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }

        }
    }
?>