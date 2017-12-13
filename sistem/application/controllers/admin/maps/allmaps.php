<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class allmaps extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url', 'html'));
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('ahp/ahp_model');
		$this->load->model('ahp/kriteria_model');
        $this->load->model('ahp/skemaperbandingan_model');
        $this->load->model('kecamatan/curahhujan_model');
        $this->load->model('kecamatan/banjirtercatat_model');
        $this->load->model('kecamatan/tamandrainase_model');
        $this->load->model('kecamatan/penduduk_model');
        $this->load->model('kecamatan/kecamatan_model');
        $this->load->model('ahp/jenks_model');   
	
	}
	
	// bagian pengelolaan agenda
	public function index()
	{
		$kecamatan = $this->kecamatan_model->get_allkecamatan();
		$datalength = $this->db->count_all('kecamatan');
		$data['datalength'] = $datalength;
		//Mengambil id hitung terakhir
        $data_hitung['hitung'] = $this->ahp_model->select_last_hitung()->row();
        $idhitung = $data_hitung['hitung']->idhitung;
		$dataAhp = $this->ahp_model->get_logahp($idhitung);
		

		

		//PENETRALISIR RACUN
		for ($dt=0; $dt < 31 ; $dt++) { 
			$datatest[$dt] = $dataAhp[$dt]['val_ahp'] * 100;
			# code...
		}
		$data['dttest'] = $datatest;
		//////////////////////////////////////////////// NATURAL BREAKS BEGINING //////////////////////////////////////

		$batasatas = 0;
		$batasbawah = 0;
		$sdamfix = 0;
		$sdcmallfix =0;
		$gvffix =0;
		$flag =0;

		
		for ($geje=0; $geje < 100 ; $geje++) { 

			// MEMBANGKITKAN NILAI RANDOM

			$nilaimin = min($datatest);
			$nilaimax = max($datatest);

						

			$rand1 = rand($nilaimin,$nilaimax) % ($nilaimax - $nilaimin) + $nilaimin;
			$rand2 = rand($nilaimin,$nilaimax) % ($nilaimax - $nilaimin) + $nilaimin;

			// $rand1 = 6;
			// $rand2 = 3;

			if ($rand2 > $rand1) {
				$test = 1;
			}
			else
				$test = 0;

			//PEMBAGIAN KELAS 

			$kls1=0;
			$kls2=0;
			$kls3=0;

			$kelas1=NULL;
			$kelas2=NULL;
			$kelas3=NULL;

			for($i = 0 ; $i < count($datatest) ; $i++ ){
				if ($rand2 > $rand1) {
					if ($datatest[$i] < $rand1) {
						$kelas1[$kls1] = $datatest[$i];
						$kls1++;
					}
					elseif ($datatest[$i] > $rand2) {
						$kelas3[$kls3] = $datatest[$i];
						$kls3++;
					}
					else{
						$kelas2[$kls2] = $datatest[$i];
						$kls2++;
					}
				}
				else{
					if ($datatest[$i] < $rand2) {
						$kelas1[$kls1] = $datatest[$i];
						$kls1++;
					}
					elseif ($datatest[$i] > $rand1) {
						$kelas3[$kls3] = $datatest[$i];
						$kls3++;
					}
					else{
						$kelas2[$kls2] = $datatest[$i];
						$kls2++;
					}
				}
			}


			// MENCARI ARRAY MEAN

			$am = array_sum($datatest) / count($datatest);

			// MENGHITUNG SDAM
			$sdam =0;
			for($i =0 ; $i < count($datatest); $i++){
				$sdam = $sdam + pow(($datatest[$i]-$am), 2);
			}

			// MENCARI ARRAY MEAN PER KELAS

			if($kelas1 == NULL)
				$amk1 = 0;
			else
				$amk1 = array_sum($kelas1) / count($kelas1);

			if ($kelas2 == NULL)
				$amk2 = 0;
			else
				$amk2 = array_sum($kelas2) / count($kelas2);
				
			if ($kelas3 == NULL)
				$amk3 = 0;
			else
				$amk3 = array_sum($kelas3) / count($kelas3);
						
						// if($kelas1 == NULL){
						// 	$tester = 1;
						// 	$amk1 = 1;
						// 	$amk2 = array_sum($kelas2) / count($kelas2);
						// 	$amk3 = array_sum($kelas3) / count($kelas3);
						// }
						// elseif (is_null($kelas2)) {
						// 	$tester = 2;
						// 	$amk1 = array_sum($kelas1) / count($kelas1);
						// 	$amk2 = 0.0;
						// 	$amk3 = array_sum($kelas3) / count($kelas3);
						// }
						// elseif (is_null($kelas3)) {
						// 	$tester = 3;
						// 	$amk1 = array_sum($kelas1) / count($kelas1);
						// 	$amk2 = array_sum($kelas2) / count($kelas2);
						// 	$amk3 = 0;
						// }
						// else
						// $tester = 4;
						// $amk1 = array_sum($kelas1) / count($kelas1);
						// $amk2 = array_sum($kelas2) / count($kelas2);
						// $amk3 = array_sum($kelas3) / count($kelas3);

			// MENGHITUNG SDCM Kelas 1
			$sdcm1 =0;
			for($i =0 ; $i < count($kelas1); $i++){
				$sdcm1 = $sdcm1 + pow(($kelas1[$i]-$amk1), 2);
			}

			// MENGHITUNG SDCM Kelas 2
			$sdcm2 =0;
			for($i =0 ; $i < count($kelas2); $i++){
				$sdcm2 = $sdcm2 + pow(($kelas2[$i]-$amk2), 2);
			}

			// MENGHITUNG SDCM Kelas 3
			$sdcm3 =0;
			for($i =0 ; $i < count($kelas3); $i++){
				$sdcm3 = $sdcm3 + pow(($kelas3[$i]-$amk3), 2);
			}

			//MENGHITUNG SDCM_ALL
			$sdcmall = $sdcm1 + $sdcm2 + $sdcm3;

			// MENGHITUNG GVF
			$gvf = ( $sdam - $sdcmall ) / $sdam;



			// MENCARI BATAS FIX NATURAL BREAKS DENGAN KRITERIA SDCM_ALL (MENDEKATI 0) dan GVF (MENDEKATI 1)

			if ($sdamfix == 0){
				$sdamfix = $sdam;
				$sdcmallfix = $sdcmall;
				$gvffix = $gvf;
				
				
				if($rand1 > $rand2){
					$batasatas = $rand2;
					$batasbawah = $rand1;
				}
				else{
					$batasatas = $rand1;
					$batasbawah = $rand2;
				}
			}
			else{
				$flag++;
				if ($sdcmall < $sdcmallfix && $gvf > $gvffix) {
					$sdcmallfix = $sdcmall;
					$gvffix = $gvf;

					if($rand1 > $rand2){
					$batasatas = $rand2;
					$batasbawah = $rand1;
					}
					
					else{
						$batasatas = $rand1;
						$batasbawah = $rand2;
					}
				}
			}
			
			
		 }

		// $data['sdam'] = $sdam;
		// $data['sdcmall'] = $sdcmall;
		// $data['rand1'] = $rand1;
		// $data['rand2'] = $rand2;

		$data['sdamfix'] = $sdamfix;
		$data['sdcmallfix'] = $sdcmallfix;
		$data['batasatas'] = $batasatas;
		$data['batasbawah'] = $batasbawah;
		$data['gvffix'] = $gvffix;

		// $data['kelas1'] = $kelas1;
		// $data['kelas2'] = $kelas2;
		// $data['kelas3'] = $kelas3;
		
		//////////////////////////////////////////////// NATURAL BREAKS ENDING ////////////////////////////////////////////

		//PEMBERIAN STATUS SETELAH MENDAPATKAN BATAS DARI NATURAL BREAKS
		// $teststatus = array(1,2,4,4,3,5,6,1,2,2,3,2,7,8,9,4,3,5,2,1,9,8,7,7,7,6,5,2,2,1);
		// $btsa = 3;
		// $btsb = 7;

		for ($ts=0; $ts < count($datatest) ; $ts++) { 
			if ($datatest[$ts] < $batasatas)
				$stats[$ts] = "RENDAH";
			elseif ($datatest[$ts] >= $batasatas && $datatest[$ts] <= $batasbawah)
				$stats[$ts] = "SEDANG";
			else
				$stats[$ts] = "TINGGI"; 
		}

		$data['stats'] = $stats;

		//var_dump($stats);
		//echo '<pre>',print_r($stats),'</pre>';
		//var_dump($batasatas/100,$batasbawah/100,$gvffix,$sdamfix);
		$data['dataAhp'] = $dataAhp;
		$data['batasatas'] = $batasatas/100;
		$data['batasbawah'] = $batasbawah/100;

		//echo '<pre>',print_r($dataAhp),'</pre>';
		$data['geom'] = $this->ahp_model->select_geomdata();

		$this->load->view('admin/maps/allmaps_view',$data);

	}
	
}