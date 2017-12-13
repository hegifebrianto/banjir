<?php

	class kriteria_model extends CI_Model
	{
		var $tabel = 'kriteria';

		public function __construct() {
            parent::__construct();
        }

        function get_allkriteria() {
            $query = $this->db->get($this->tabel);
            
            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }


        function getcount_kriteria(){
            $query =  $this->db->count_all($this->tabel);
        }

        function get_kriteria_byid($id) {
            $this->db->where('id_kriteria', $id);
            $query = $this->db->get($this->tabel);

            if ($query->num_rows() == 1) {
                return $query->result_array();
            }
        }


	}

?>