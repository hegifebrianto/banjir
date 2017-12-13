<?php
	class Curahhujan_model extends CI_Model 
	{
		var $tabel = 'curah_hujan';
		
		public function __construct() 
		{
            parent::__construct();
            $this->load->database();
        }

        function get_allcurahhujan()
        {
        	$this->db->from($this->tabel);
        	$this->db->order_by("gid","asc");
        	$query = $this->db->get();
        	if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }


        function get_curahhujan_bymonth($month) {
			$this->db->where("extract(MONTH FROM waktu) =", $month);
            $query = $this->db->get($this->tabel);

            if ($query->num_rows() > 0) {
                return $query->result_array();
            }
        }

        function get_curahhujan_byid($id) {
            $this->db->where('id_curahhujan', $id);
            $query = $this->db->get($this->tabel);

            if ($query->num_rows() == 1) {
                return $query->result_array();
            }
        }
        
        public function insert_kecamatan($data) {
            $this->db->insert($this->tabel, $data);
            
            return TRUE;
        }
        
        public function update_kecamatan($id, $data) {
            $this->db->where('id_curahhujan', $id);
            $this->db->update($this->tabel, $data);
            
            return TRUE;
        }
        
        public function delete_kecamatan($id) {
            $this->db->where('id_curahhujan', $id);
            $this->db->delete($this->tabel);
            
            if ($this->db->affected_rows() == 1) {
                return TRUE;
            }
            return FALSE;
        }


	}

?>