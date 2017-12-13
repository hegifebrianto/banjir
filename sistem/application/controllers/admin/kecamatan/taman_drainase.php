<?php
    class Taman_drainase extends CI_Controller {
		public function __construct() 
		{
            parent::__construct();

            $this->load->helper('url', 'form');
            $this->load->model('kecamatan/tamandrainase_model');
            $this->load->library('form_validation');	
		}

		public function index() 
		{
            $this->data['title'] = 'Taman Drainase';
            $this->data['tamandrainases'] = $this->tamandrainase_model->get_alltamandrainase();
            $this->load->view('admin/kecamatan/tamandrainase_view', $this->data);
		}

		


	}

?>