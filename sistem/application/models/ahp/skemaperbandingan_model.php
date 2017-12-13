<?php

	class Skemaperbandingan_model extends CI_Model
	{
		var $tabel = 'skema_perbandingan';

		public function __construct() {
            parent::__construct();
        }

        function get_allperbandingan() {
            $query = $this->db->get($this->tabel);
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        function getAllGroups(){
            $query = $this->db->get($this->tabel);
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }




	}

?>