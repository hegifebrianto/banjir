<?php

class kecamatan_model extends CI_Model {
	var $tabel = 'kecamatan';
		
		public function __construct() 
		{
            parent::__construct();
            $this->load->database();
        }

        function get_allkecamatan()
        {
        	$this->db->from($this->tabel);
        	$query = $this->db->get();
        	if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }
}
?>