<?php
    class saranmitigasi extends CI_Controller {
		public function __construct() 
		{
            parent::__construct();

            $this->load->helper('url', 'form');
            $this->load->model('ahp/ahp_model');
            $this->load->library('form_validation');	
		}

		public function index() 
		{
             
            $this->load->view('admin/maps/saranmitigasi_view');
		}

		


	}

?>