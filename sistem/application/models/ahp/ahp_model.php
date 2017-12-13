<?php

class ahp_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}
	
	//Log Bobot ************************************************************
	function select_bobot($idhitung){
		$this->db->select('valbobot');
		$this->db->from('logbobot');
		$this->db->where('idhitung',$idhitung);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
                return $query->result_array();
            }
	}
	
	function insert_log_bobot($data){
		$this->db->insert('logbobot', $data);
	}

	function select_spatialdata_idhitung($idhitung)
	{

		$this->db->select('logahp.idhitung,logahp.val_ahp,logahp.gid,st_astext(geom)as geom,nama_kecamatan');
		$this->db->from('logahp');
		$this->db->join('surabaya', 'logahp.gid=surabaya.gid', 'inner');
		$this->db->where('logahp.idhitung', $idhitung);
		$query = $this->db->get();

		if ($query->num_rows() > 0) {
                return $query->result_array();
            }
	}
	function select_spatialdata(){
		
		$this->db->select('surabaya.gid, surabaya.geom,surabaya.nama_kecamatan,logahp.val_ahp');
		$this->db->from('surabaya,logahp');
		$this->db->where('surabaya.gid=logahp.gid');
		

		$query = $this->db->get();

		if ($query->num_rows() > 0) {
                return $query->result_array();
            }
	}
	function select_geomdata()
	{
		$this->db->select('gid,st_astext(geom)as geom');
		$this->db->from('surabaya');
		$this->db->order_by('gid','asc');
		
		$query = $this->db->get();
		
		if ($query->num_rows() > 0) {
                return $query->result_array();
            }		
		
	}

	/*function select_spasialdata()
	{
		$this->db->select('gid,st_astext(geom)');
		$this->db->from('surabaya');
		$this->db->where();

		$query = $this->db->get();
 
		if ($query->num_rows() > 0) {
                return $query->result_array();
            }

	}*/
	
	
	//Log AHP ************************************************************
	function get_logahp($idhitung){
		$this->db->select('*');
		$this->db->from('logahp');
		$this->db->where('idhitung',$idhitung);
		$this->db->order_by('gid','asc');
		$query = $this->db->get();
 
		if ($query->num_rows() > 0) {
                return $query->result_array();
            }
	}

	function select_ahpkecamatan($idhitung)
	{
		$this->db->select('*');
		$this->db->from('logahp');
	}
	
	function select_ahp_val($idhitung,$idkel){
		$this->db->select('val_ahp');
		$this->db->from('logahp');
		$this->db->where('idhitung',$idhitung);
		$this->db->where('id_kel',$idkel);
		
		return $this->db->get();
	}
	
	function select_all_ahp(){
		$this->db->select('*');
		$this->db->from('logahp');
		$this->db->join('kelurahan', 'kelurahan.id_kel = logahp.id_kel');
		$this->db->order_by('val_ahp','desc');
		
		return $this->db->get();
	}
	
	function insert_log_ahp($data){
		$this->db->insert('logahp', $data);
	}
	
	//Log Hitung ************************************************************
	function select_all_hitung(){
		$this->db->select('*');
		$this->db->from('loghitung');
		$this->db->where('cr <',0.1);
		$this->db->order_by('datehitung', 'desc');
		
		return $this->db->get();
	}
	
	
	function select_loghitung_by_id($idhitung){
		$this->db->select('*');
		$this->db->from('loghitung');
		$this->db->where('idhitung',$idhitung);
		
		return $this->db->get();
	}

	function select_last_hitung(){
		$this->db->select('*');
		$this->db->from('loghitung');
		$this->db->order_by('datehitung', 'desc');
		$this->db->limit(1);		
		return $this->db->get();
	}

	function insert_log_hitung($data){
		$this->db->insert('loghitung', $data);
	}

	function update_log_hitung($idhitung, $data){
		$this->db->where('idhitung', $idhitung);
		$this->db->update('loghitung', $data);
	}
	
	function get_idhitung($tgl){
		$this->db->select('idhitung');
		$this->db->from('loghitung');
		$this->db->where('datehitung', $tgl);
		
		return $this->db->get();
	}
	
	//Start Temporary AHP dan Bobot
	//***************************************************************************//
	function select_temp_bobot($id_bobot){
		$this->db->select('*');
		$this->db->from('temp_bobot');
		$this->db->where('id_bobot', $id_bobot);
		
		return $this->db->get();
	}
	
	function update_temp_bobot($id_bobot, $data){
		$this->db->where('id_bobot', $id_bobot);
		$this->db->update('temp_bobot', $data);
	}

	
	//End Temporary AHP dan Bobot
	
	
	// Start Range Jamaah dan Perwakilan
	// *************************************************************************************//
	
	function empty_rjamaah(){
		$this->db->empty_table('r_jamaah');	
	}

	function empty_rperwakilan(){
		$this->db->empty_table('r_perwakilan');	
	}

	function select_all_rjamaah(){
		$this->db->select('*');
		$this->db->from('r_jamaah');
		$this->db->order_by('min_rjamaah', 'asc');
		
		return $this->db->get();
	}
	
	function select_all_rperwakilan(){
		$this->db->select('*');
		$this->db->from('r_perwakilan');
		$this->db->order_by('min_rperwakilan', 'asc');
		
		return $this->db->get();
	}

	function select_by_id_rjamaah($id_rjamaah){
		$this->db->select('*');
		$this->db->from('r_jamaah');
		$this->db->where('id_rjamaah', $id_rjamaah);
		
		return $this->db->get();
	}
	
	function select_by_id_rperwakilan($id_rperwakilan){
		$this->db->select('*');
		$this->db->from('r_perwakilan');
		$this->db->where('id_rperwakilan', $id_rperwakilan);
		
		return $this->db->get();
	}
	
	function insert_rjamaah($data){
		$this->db->insert('r_jamaah', $data);
	}
	
	function insert_rperwakilan($data){
		$this->db->insert('r_perwakilan', $data);
	}
	
	function update_rjamaah($id_rjamaah, $data){
		$this->db->where('id_rjamaah', $id_rjamaah);
		$this->db->update('r_jamaah', $data);
	}
	
	function update_rperwakilan($id_rperwakilan, $data){
		$this->db->where('id_rperwakilan', $id_rperwakilan);
		$this->db->update('r_perwakilan', $data);
	}
	
	function delete_rjamaah($id_rjamaah){
		$this->db->where('id_rjamaah', $id_rjamaah);
		$this->db->delete('r_jamaah');
	}
	
	function delete_rperwakilan($id_rperwakilan){
		$this->db->where('id_rperwakilan', $id_rperwakilan);
		$this->db->delete('r_perwakilan');
	}
	//End Range Jamaah dan Perwakilan

	// Start Data Jamaah Tiap Tahun
	// *************************************************************************************//
	function select_all_logjamaah(){
		$this->db->select('*');
		$this->db->from('logjamaah');
		
		return $this->db->get();
	}
	
	function select_tahun_logjamaah(){
		$this->db->select('*');
		$this->db->from('logjamaah');
		$this->db->group_by('tahun'); 
		
		return $this->db->get();
	}

	function select_by_id_logjamaah($tahun,$idkel){
		$this->db->select('*');
		$this->db->from('logjamaah');
		$this->db->where('tahun',$tahun);
		$this->db->where('id_kel',$idkel);
		
		return $this->db->get();
	}
	
	function select_logjamaah_val($tahun,$idkel){
		$this->db->select('val_jamaah');
		$this->db->from('logjamaah');
		$this->db->where('tahun',$tahun);
		$this->db->where('id_kel',$idkel);
		
		return $this->db->get();
	}
		
	
	function select_by_tahun_logjamaah($tahun){
		$this->db->select('*');
		$this->db->from('logjamaah');
		$this->db->where('tahun', $tahun);
		
		return $this->db->get();
	}
	
	function insert_logjamaah($data){
		$this->db->insert('logjamaah', $data);
	}
	
	function update_logjamaah($tahun, $id_kel, $data){
		$this->db->where('tahun', $tahun);
		$this->db->where('id_kel', $id_kel);
		$this->db->update('logjamaah', $data);
	}
	
	function select_last_year(){
		$this->db->select('tahun');
		$this->db->from('logjamaah');
		$this->db->order_by('tahun', 'desc');
		$this->db->limit(1);
		
		return $this->db->get();
	}
	
	//End Range logjamaah
	
}

?>