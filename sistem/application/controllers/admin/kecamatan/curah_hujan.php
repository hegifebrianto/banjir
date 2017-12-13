<?php
    class Curah_hujan extends CI_Controller {
		public function __construct() 
		{
            parent::__construct();

            $this->load->helper('url', 'form');
            $this->load->model('kecamatan/curahhujan_model');
            $this->load->library('form_validation');	
		}

		public function index() 
		{
            $this->data['title'] = 'Curah Hujan';
            $this->data['curah_hujans'] = $this->curahhujan_model->get_allcurahhujan();
            $this->load->view('admin/kecamatan/curahhujan_view', $this->data);
		}

		


	}

?>