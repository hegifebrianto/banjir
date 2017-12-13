<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class perhitungan extends CI_Controller {
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
		$this->data['title'] = 'Perhitungan';
		$this->data['msg'] = "";           
        $month = $this->input->post('month');
        $this->data['ch_bymonth'] = $this->curahhujan_model->get_curahhujan_bymonth($month);
        $this->data['kriterias'] = $this->kriteria_model->get_allkriteria();
        $this->data['groups'] = $this->skemaperbandingan_model->getAllGroups();


          
        $this->load->view('admin/perhitungan/perhitungan_view',$this->data);			
	}

	public function ket_skala()
	{
			$this->data['title'] = 'Keterangan Skala';
			$this->data['skemas'] = $this->skemaperbandingan_model->get_allperbandingan() ;
			$this->load->view('admin/perhitungan/ket_skala',$this->data);
	}

	public function hitung_bobot()
    {

            $month= $this->input->post('month');
            $this->data['hasil'] = $this->input->post('krit');
            $this->data['kriterias'] = $this->kriteria_model->get_allkriteria();
            $kecamatan = $this->kecamatan_model->get_allkecamatan();
    		$ch_bymonth = $this->curahhujan_model->get_curahhujan_bymonth($month);
            $bt_perkecamatan = $this->banjirtercatat_model->get_countbanjirtercatat();
            $td_perkecamatan = $this->tamandrainase_model->get_counttamandrainase();
            $bp_perkecamatan = $this->penduduk_model->get_countbanyakpenduduk();
            $datakriteria = $this->kriteria_model->get_allkriteria();
    		


            
            
           

			$datalength = $this->db->count_all('kecamatan'); 
			$kriterialength = $this->db->count_all('kriteria');
			
			

            $datehitung =  date('Y-m-d H:i:s'); 
            $datahitung = array(
                  'datehitung'=>$datehitung
            );
            $this->db->insert('loghitung',$datahitung);

			if($this->data['hasil']!=0)
            {
              //menghitung array semuanya setiga atas dan bawah
	          $tempbobot=array_values($this->data['hasil']);
	          $this->data['bobot'] =array();
	            
	            
	          	for($x=0;$x<4;$x++) { 
	                for($y=0;$y<4;$y++) {
	                	if($x==$y)
	                    	$this->data['bobot'][$x][$y] = 1;
	                    if($x<$y)
	                    	$this->data['bobot'][$x][$y] = ($tempbobot[$x][$y]);
	                    if($x>$y)
	                        $this->data['bobot'][$x][$y] = (1/($tempbobot[$y][$x]));
	                    
	                }
	            }
	                //echo '<br>';
	        }
      
            //Mengambil id hitung terakhir
            $data_hitung['hitung'] = $this->ahp_model->select_last_hitung()->row();
            $idhitung = $data_hitung['hitung']->idhitung;
            

            
            
            //Mencari Jumlah kolom perbandingan
            $value_bobot = array_values($this->data['bobot']);
			for($i=0;$i<4;$i++){
				$sum_kolom_bobot[$i] = 0;
				for($j=0;$j<4;$j++)
				{
					$sum_kolom_bobot[$i] += $value_bobot[$j][$i];
				}
			}
			
			//Normalisasi Tabel Bobot
			for($i=0;$i<4;$i++){
				for($j=0;$j<4;$j++)
				{
					$t_normal[$j][$i] = $value_bobot[$j][$i] / $sum_kolom_bobot[$i];
				}
			}

			//Priority Vector Kriteria
			for($i=0;$i<4;$i++){
				$pvk[$i] = 0;
				for($j=0;$j<4;$j++)
				{
					$pvk[$i] += $t_normal[$i][$j];
				}
				$pvk[$i] = $pvk[$i]/4;
			}
			$this->data['prirorityvector'] = $pvk;
			//Lambda Max
			$l_max = 0;
			for($i=0;$i<4;$i++){
				$l_max += ($sum_kolom_bobot[$i] * $pvk[$i]);
			}

            $datahitung['ci'] = ($l_max - 4)/3;
			$datahitung['cr'] = $datahitung['ci'] /0.90;

			

			

	        $dtkriteria = array_values($datakriteria);
	        $dtkecamatan = array_values($kecamatan);
	        $dtcurahhujan = array_values($ch_bymonth);
			$dtbanjirtercatat = array_values($bt_perkecamatan);
			$dttamandrainase = array_values($td_perkecamatan);
			$dtpenduduk = array_values($bp_perkecamatan);

			//$this->data['coba'] = $dtcurahhujan[0]['gid'];


			$k=0;
				do{
					
					//Menentukan nilai dari masing-masing kecamatan setiap kriteria
					for($x=0;$x<$datalength;$x++) {
						$sumNilai = array();
						for($y=0;$y<$datalength;$y++) {
							//data id kriteria 
							$id_kriteria = $dtkriteria[$k]['id_kriteria'];

							//data nilai curah hujan  
							$curah_hujan1 = $dtcurahhujan[$x]['nilai_curahhujan'];
							$curah_hujan2 = $dtcurahhujan[$y]['nilai_curahhujan'];
							//data nilai banjir tercatat
							$banjir_tercatat1 = $dtbanjirtercatat[$x]['count'];
							$banjir_tercatat2 = $dtbanjirtercatat[$y]['count'];
							//data nilai taman drainase
							$drainase1 = $dttamandrainase[$x]['count'];
							$drainase2 = $dttamandrainase[$y]['count'];
							//data nilai jumlah penduduk
							$penduduk1 = $dtpenduduk[$x]['jumlah_penduduk'];
							$penduduk2 = $dtpenduduk[$y]['jumlah_penduduk'];

							switch ($id_kriteria) {
								case 1:
									if($curah_hujan1==$curah_hujan2) {
										$h_chujan1 = 1;
										$h_chujan2 = 1;
									}
									elseif(($curah_hujan1>=166 and $curah_hujan1<250) and ($curah_hujan2>=166 and $curah_hujan2<250)){ //2:2
										$h_chujan1 = 1;
										$h_chujan2 = 1;
									}
									elseif(($curah_hujan1>=166 and $curah_hujan1<250) and $curah_hujan2 < 166){ //2:1
										$h_chujan1 = 1;
										$h_chujan2 = 5;
									}
									elseif($curah_hujan1 < 166 and ($curah_hujan2>=166 and $curah_hujan2<250)){ //1:2
										$h_chujan1 = 5;
										$h_chujan2 = 1;
									}
									elseif($curah_hujan1 > 250 and $curah_hujan2 > 250){ //3:3
										$h_chujan1 = 1;
										$h_chujan2 = 1;
									}
									elseif($curah_hujan1 > 250 and $curah_hujan2<166){
										$h_chujan1 = 1;
										$h_chujan2 = 9;
									}
									elseif($curah_hujan1 < 166 and $curah_hujan2 > 250){
										$h_chujan1 = 9;
										$h_chujan2 = 1;
									}
									elseif($curah_hujan1 < 166 and $curah_hujan2 < 166){ // 1:1
										$h_chujan1 = 1;
										$h_chujan2 = 1;
									}
									elseif($curah_hujan1 > 250 and ($curah_hujan2>=166 and $curah_hujan2<250)){
										$h_chujan1 = 1;
										$h_chujan2 = 7;
									}
									elseif(($curah_hujan1>=166 and $curah_hujan1<250) and $curah_hujan2 > 250){
										$h_chujan1 = 7;
										$h_chujan2 = 1;
									}
									$hasil = $h_chujan2 / $h_chujan1;
									break;
								
								case 2:
									if($banjir_tercatat1==$banjir_tercatat2) {
										$h_btercatat1 = 1;
										$h_btercatat2 = 1;
									}
									elseif(($banjir_tercatat1>5 and $banjir_tercatat1<=10) and ($banjir_tercatat2>5 and $banjir_tercatat2<=10)){ //2:2
										$h_btercatat1 = 1;
										$h_btercatat2 = 1;
									}
									elseif(($banjir_tercatat1>5 and $banjir_tercatat1<=10) and $banjir_tercatat2 <= 5){ //1:3 //sedang:rendah
										$h_btercatat1 = 1;
										$h_btercatat2 = 5;
									}
									elseif($banjir_tercatat1 <= 5 and ($banjir_tercatat2>5 and $banjir_tercatat2<=10)){ //1:3
										$h_btercatat1 = 5;
										$h_btercatat2 = 1;
									}
									elseif($banjir_tercatat1 > 10 and $banjir_tercatat2 > 10){ //3:3
										$h_btercatat1 = 1;
										$h_btercatat2 = 1;
									}
									elseif($banjir_tercatat1 > 10 and $banjir_tercatat2<=5){ //tinggi : rendah
										$h_btercatat1 = 1;
										$h_btercatat2 = 9;
									}
									elseif($banjir_tercatat1 <= 5 and $banjir_tercatat2 > 10){
										$h_btercatat1 = 9;
										$h_btercatat2 = 1;
									}
									elseif($banjir_tercatat1 <= 5 and $banjir_tercatat2 <= 5){ // 1:1
										$h_btercatat1 = 1;
										$h_btercatat2 = 1;
									}
									elseif($banjir_tercatat1 > 10 and ($banjir_tercatat2>5 and $banjir_tercatat2 <= 10)){ //tinggi : sedang
										$h_btercatat1 = 1;
										$h_btercatat2 = 7;
									}
									elseif(($banjir_tercatat1 > 5 and $banjir_tercatat1<=10) and $banjir_tercatat2 > 10){
										$h_btercatat1 = 7;
										$h_btercatat2 = 1;
									}
									$hasil = $h_btercatat2 / $h_btercatat1;
									break;

									case 3 :
									if($drainase1==$drainase2) {
										$h_drainase1 = 1;
										$h_drainase2 = 1;
									}
									elseif(($drainase1>=4 and $drainase1<=7) and ($drainase2>=4 and $drainase2<=7)){ //2:2
										$h_drainase1 = 1;
										$h_drainase2 = 1;
									}
									elseif(($drainase1>=4 and $drainase1<=7) and $drainase2 <= 3){ //2:1
										$h_drainase1 = 1;
										$h_drainase2 = 3;
									}
									elseif($drainase1 <= 3 and ($drainase2>=4 and $drainase2<=7)){ //1:2
										$h_drainase1 = 3;
										$h_drainase2 = 1;
									}
									elseif($drainase1 > 8 and $drainase2 > 8){ //3:3
										$h_drainase1 = 1;
										$h_drainase2 = 1;
									}
									elseif($drainase1 > 8 and $drainase2<=3){ //3:1
										$h_drainase1 = 1;
										$h_drainase2 = 5;
									}
									elseif($drainase1 <= 3 and $drainase2 > 8){
										$h_drainase1 = 5;
										$h_drainase2 = 1;
									}
									elseif($drainase1 <=3 and $drainase2 <= 3){ // 1:1
										$h_drainase1 = 1;
										$h_drainase2 = 1;
									}
									elseif($drainase1 > 8 and ($drainase2>=4 and $drainase2<=7)){ //2:3--+--
										$h_drainase1 = 1;
										$h_drainase2 = 4;
									}
									elseif(($drainase1>=4 and $drainase1<=7) and $drainase2 > 8){
										$h_drainase1 = 4;
										$h_drainase2 = 1;
									}
									$hasil = $h_drainase2 / $h_drainase1;
									break;
									case 4:
									if($penduduk1 == $penduduk2) {
										$h_penduduk1 = 1;
										$h_penduduk2 = 1;
									}
									elseif($penduduk1 > 178418 and $penduduk2 > 178418){ //3:3
										$h_penduduk1 = 1;
										$h_penduduk2 = 1;
									}
									elseif($penduduk1 > 178418 and $penduduk2<=89209){ //3:1
										$h_penduduk1 = 1;
										$h_penduduk2 = 7;
									}
									elseif($penduduk1 <= 89209 and $penduduk2 > 178418){
										$h_penduduk1 = 7;
										$h_penduduk2 = 1;
									}
									elseif(($penduduk1>=89209 and $penduduk1<=178418) and ($penduduk2>=89209 and $penduduk2<=178418)){ //2:2
										$h_penduduk1 = 1;
										$h_penduduk2 = 1;
									}
									elseif(($penduduk1>=89209 and $penduduk1<=178418) and ($penduduk2 >= 0 and $penduduk2 <=89209)){ //2:1
										$h_penduduk1 = 1;
										$h_penduduk2 = 3;
									}
									elseif(($penduduk1 >= 0 and $penduduk1 <=89209) and ($penduduk2>=89209 and $penduduk2<=178418)){ //1:2
										$h_penduduk1 = 3;
										$h_penduduk2 = 1;
									}
									elseif(($penduduk1 >= 0 and $penduduk1 <=89209)  and ($penduduk2 >= 0 and $penduduk2 <=89209) ){ // 1:1
										$h_penduduk1 = 1;
										$h_penduduk2 = 1;
									}
									elseif($penduduk1 > 178418 and ($penduduk2>=89209 and $penduduk2<=178418)){ //3:2--+--
										$h_penduduk1 = 1;
										$h_penduduk2 = 4;
									}
									elseif(($penduduk1>=89209 and $penduduk1<=178418) and $penduduk2 > 178418){
										$h_penduduk1 = 4;
										$h_penduduk2 = 1;
									}
									$hasil = $h_penduduk2/$h_penduduk1;
									break;

								default:
									# code...
									break;
							}
							$hasil_kali[$x][$y]=round($hasil,2);
							
	
						}
						
					}

					//Menentukan jumlah dari nilai setiap kecamatan kriteria
					$temporary = array_values($hasil_kali);
					for($x=0;$x<$datalength;$x++) {
						$tmp = 0;
						for($y=0;$y<$datalength;$y++) {
							$tmp += $temporary[$y][$x];
							//echo $tmp;
						}
						$sum[$x] = $tmp;
						//echo $tmp; echo ' ';
					}
					
					//Normalisasi
					for($x=0;$x<$datalength;$x++) {
						for($y=0;$y<$datalength;$y++) {
							$normalisasi[$x][$y] = round($temporary[$x][$y] / $sum[$y],6);
							
						}
					}
					//avg_priority 
					$priority_values = array_values($normalisasi);
					for($x=0;$x<$datalength;$x++) {
						$tmp=0;
						for($y=0;$y<$datalength;$y++) {
							$tmp += $priority_values[$x][$y];
						}
						$avg_priority[$k][$x] = round($tmp/$datalength,5);
					}
					//echo '<pre>';print_r($avg_priority);'</pre>';



					$k++;
				}while($k<4);


			//avg_priority vector values
			$avgpriority_values = array_values($avg_priority);
			$priorityvector_kriteria = array_values($pvk);

			for($x=0;$x<$datalength;$x++) {
				
				$nilaibobotkecamatan = 0;
				for($y=0;$y<4;$y++) {
					$tmp = 0;
					$tmp = round(($avgpriority_values[$y][$x]*$priorityvector_kriteria[$y]),4);
					$nilaibobotkecamatan += $tmp;
				}
				$bobot_normalkecamatan[$x] = $nilaibobotkecamatan;
			}

			$data_ahpkecamatan = array_values($bobot_normalkecamatan);
			//penampung bobotnormalkecamatan untuk perhitungan klasifikasi;
			$tempku1 = $bobot_normalkecamatan;
			//bobot normal values
			/*for($x=0;$x<$datalength;$x++) {
					$dtkecamatan[$x][1]; echo ' = '; echo $data_ahpkecamatan[$x];
						
			}*/	

			if ($datahitung['cr']>0.1)
			{
				$this->session->set_flashdata('message', "<div class='alert alert-danger'>
				<button data-dismiss='alert' class='close close-sm' type='button'><i class='fa fa-times'></i></button>
				Nilai CR Melebihi Batas Konsistensi, Atur Ulang Bobot Tiap Kriteria !
			</div>");
				redirect('admin/perhitungan/perhitungan');
			}
			

			//==================================================================================================
			if($this->input->post('formaction') == "simpan") { 
			    //menyimpan semua elemen dari log perhitungan, log bobot, dan log ahp
				//mengupdate array ci & cr
				$this->ahp_model->update_log_hitung($idhitung, $datahitung);
				$this->data['l_max'] = $l_max;
				$this->data['ci'] = $datahitung['ci'];
				$this->data['cr'] = $datahitung['ci']/0.90;

				$this->data['bobotnormalkecamatan'] =  $bobot_normalkecamatan;
				$this->data['ch'] = $dtcurahhujan;
				$this->data['bt'] = $dtbanjirtercatat;
				$this->data['td'] = $dttamandrainase; 
				$this->data['bp'] = $dtpenduduk;
				$this->data['datalength'] = $datalength; 
				$jum[0]=0;
				$jum[1]=0;$jum[2]=0;
				

				$dtAkhir = array();
				for($i=0;$i<$datalength;$i++)
				{
					$tempku2 = array(($i+1),$dtkecamatan[$i]['nama_kecamatan'],$data_ahpkecamatan[$i],$dtcurahhujan[$i]['nilai_curahhujan'],$dtbanjirtercatat[$i]['count'],$dttamandrainase[$i]['count'],$dtpenduduk[$i]['jumlah_penduduk']);
					array_push($dtAkhir, $tempku2);
				}

				$this->data['dtAkhir'] = $dtAkhir;
				//menyimpan array bobot values
	            for($i=0;$i<4;$i++)
	            {
	            	for($j=0;$j<4;$j++)
	            	{
	            		$data_bobot['idhitung'] = $idhitung;
						$data_bobot['valbobot'] = $value_bobot[$i][$j];
						$this->ahp_model->insert_log_bobot($data_bobot);
	            	}
	            }

	            //mengambil log bobot
	            $this->data['hasil_bobot'] = $this->ahp_model->select_bobot($idhitung);
	            
	            //echo '<pre>',print_r($hasilbobot),'</pre>';
	           	//menyimpan ahp kecamatan
	            for($x=0;$x<$datalength;$x++) 
	            {
	            	$data_ahp['idhitung'] = $idhitung;
	            	$data_ahp['gid'] = $dtAkhir[$x][0];
	            	$data_ahp['nama_kecamatan'] = $dtAkhir[$x][1];
	            	$data_ahp['val_ahp'] = $dtAkhir[$x][2];
	            	$data_ahp['curah_hujan'] = $dtAkhir[$x][3];
	            	$data_ahp['banjir_tercatat'] = $dtAkhir[$x][4];
	            	$data_ahp['taman_drainase'] = $dtAkhir[$x][5];
	            	$data_ahp['banyak_penduduk'] = $dtAkhir[$x][6];
					$this->ahp_model->insert_log_ahp($data_ahp);	
				}

				//$this->data['logahpkecamatans'] = $this->ahp_model->select_ahp($idhitung);

				$this->session->set_flashdata('message', "<div class='alert alert-success'>
				<button data-dismiss='alert' class='close close-sm' type='button'><i class='fa fa-times'></i></button>
				Data Log Perhitungan Berhasil Disimpan !
				</div>");

			    $this->load->view('admin/perhitungan/hasilhitung_view',$this->data);
			}

			else 
			{
			    // Lanjut perhitungan tanpa penyimpanan log
				$this->data['l_max'] = $l_max;
				$this->data['ci'] = $datahitung['ci'];
				$this->data['cr'] = $datahitung['ci']/0.90;

				$this->data['bobotnormalkecamatan'] =  $bobot_normalkecamatan;

				$this->session->set_flashdata('message', "<div class='alert alert-success'>
				<button data-dismiss='alert' class='close close-sm' type='button'><i class='fa fa-times'></i></button>
				Perhitungan Berhasil !
				</div>");

				$this->data['ch'] = $dtcurahhujan;
				$this->data['bt'] = $dtbanjirtercatat;
				$this->data['td'] = $dttamandrainase; 
				$this->data['bp'] = $dtpenduduk;
				$this->data['datalength'] = $datalength; 


				$jum[0]=0;
				$jum[1]=0;$jum[2]=0;
				for($j = 0; $j < $datalength;$j++){ 
					if($data_ahpkecamatan[$j]>=$batasawal[0] && $data_ahpkecamatan[$j]<=$batasakhir[0]){
						$ket[$j]='Rendah'; $jum[0]+=1; 
					}elseif($data_ahpkecamatan[$j]>=$batasawal[1] && $data_ahpkecamatan[$j]<=$batasakhir[1]){
						$ket[$j]='Sedang'; $jum[1]+=1;
					}elseif($data_ahpkecamatan[$j]>=$batasawal[2] && $data_ahpkecamatan[$j]<=$batasakhir[2]){
						$ket[$j]='Tinggi'; $jum[2]+=1;
					}
					
				}
				$this->data['jum'] = $jum;

				$dtAkhir = array();
				for($i=0;$i<$datalength;$i++)
				{
					$tempku2 = array(($i+1),$dtkecamatan[$i]['nama_kecamatan'],$data_ahpkecamatan[$i],$ket[$i],$dtcurahhujan[$i]['nilai_curahhujan'],$dtbanjirtercatat[$i]['count'],$dttamandrainase[$i]['count'],$dtpenduduk[$i]['jumlah_penduduk']);
					array_push($dtAkhir, $tempku2);
				}

				$this->data['dtAkhir'] = $dtAkhir;



				$this->load->view('admin/perhitungan/hasilhitung_view',$this->data);

			}	


            
           
    }


	
	
	
}