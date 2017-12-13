<?php
    class Banyak_penduduk extends CI_Controller {
		public function __construct() 
		{
            parent::__construct();

            $this->load->helper('url', 'form');
            $this->load->model('kecamatan/penduduk_model');
            $this->load->library('form_validation');	
		}

		public function index() 
		{
            $this->data['title'] = 'Penduduk';
            $this->data['penduduks'] = $this->penduduk_model->get_allbanyakpenduduk();
            $this->load->view('admin/kecamatan/banyakpenduduk_view', $this->data);
		}

		


	}

?>