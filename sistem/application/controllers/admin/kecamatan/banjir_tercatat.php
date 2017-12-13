<?php
    class Banjir_tercatat extends CI_Controller {
		public function __construct() 
		{
            parent::__construct();

            $this->load->helper('url', 'form');
            $this->load->model('kecamatan/banjirtercatat_model');
            $this->load->library('form_validation');	
		}

		public function index() 
		{
            $this->data['title'] = 'Banjir_tercatat';
            $this->data['banjir_tercatats'] = $this->banjirtercatat_model->get_allbanjirtercatat();
            $this->load->view('admin/kecamatan/banjirtercatat_view', $this->data);
		}

		


	}

?>