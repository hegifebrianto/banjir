<?php
$this->load->view('admin/head');
?>

<!--tambahkan custom css disini-->
<!-- iCheck -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/flat/blue.css') ?>" rel="stylesheet" type="text/css" />
<!-- Morris chart -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.css') ?>" rel="stylesheet" type="text/css" />
<!-- jvectormap -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.css') ?>" rel="stylesheet" type="text/css" />
<!-- Date Picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/datepicker3.css') ?>" rel="stylesheet" type="text/css" />
<!-- Daterange picker -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker-bs3.css') ?>" rel="stylesheet" type="text/css" />
<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />

<!--Javascript peta-->
<!--style map legend-->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/maplegend/maplegend.css');?>" rel="stylesheet" type="text/css"/>

<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>



<?php
//echo '<pre>',print_r($dataAhp),'</pre>';
$batasatas = $batasatas;
$batasbawah = $batasbawah;
$data_ahp = array_values($dataAhp);
$data_keterangan = array_values($stats);
$data_geometry = array_values($geom);


for($i=0;$i<$datalength;$i++)
{    
    $polyString[$i] = $data_geometry[$i]['geom'];
    $valAhp[$i] = $dataAhp[$i]['val_ahp'];
    $nama_kecamatan[$i] = $dataAhp[$i]['nama_kecamatan'];
    $curah_hujan[$i] = $dataAhp[$i]['curah_hujan'];
    $banjir_tercatat[$i] = $dataAhp[$i]['banjir_tercatat'];
    $taman_drainase[$i] = $dataAhp[$i]['taman_drainase'];
    $banyak_penduduk[$i] = $dataAhp[$i]['banyak_penduduk'];

}


echo '<script type="text/javascript">';

echo "var ahp =['$valAhp[0]','$valAhp[1]','$valAhp[2]','$valAhp[3]','$valAhp[4]','$valAhp[5]','$valAhp[6]','$valAhp[7]','$valAhp[8]','$valAhp[9]','$valAhp[10]','$valAhp[11]','$valAhp[12]','$valAhp[13]','$valAhp[4]','$valAhp[15]','$valAhp[16]','$valAhp[17]','$valAhp[18]','$valAhp[19]','$valAhp[20]','$valAhp[21]','$valAhp[22]','$valAhp[23]','$valAhp[24]','$valAhp[25]','$valAhp[26]','$valAhp[27]','$valAhp[28]','$valAhp[29]','$valAhp[30]'];";
echo "var polys =['$polyString[0]','$polyString[1]','$polyString[2]','$polyString[3]','$polyString[4]','$polyString[5]','$polyString[6]','$polyString[7]','$polyString[8]','$polyString[9]','$polyString[10]','$polyString[11]','$polyString[12]','$polyString[13]','$polyString[14]','$polyString[15]','$polyString[16]','$polyString[17]','$polyString[18]','$polyString[19]','$polyString[20]','$polyString[21]','$polyString[22]','$polyString[23]','$polyString[24]','$polyString[25]','$polyString[26]','$polyString[27]','$polyString[28]','$polyString[29]','$polyString[30]'];";
echo "var namakecamatan =['$nama_kecamatan[0]','$nama_kecamatan[1]','$nama_kecamatan[2]','$nama_kecamatan[3]','$nama_kecamatan[4]','$nama_kecamatan[5]','$nama_kecamatan[6]','$nama_kecamatan[7]','$nama_kecamatan[8]','$nama_kecamatan[9]','$nama_kecamatan[10]','$nama_kecamatan[11]','$nama_kecamatan[12]','$nama_kecamatan[13]','$nama_kecamatan[14]','$nama_kecamatan[15]','$nama_kecamatan[16]','$nama_kecamatan[17]','$nama_kecamatan[18]','$nama_kecamatan[19]','$nama_kecamatan[20]','$nama_kecamatan[21]','$nama_kecamatan[22]','$nama_kecamatan[23]','$nama_kecamatan[24]','$nama_kecamatan[25]','$nama_kecamatan[26]','$nama_kecamatan[27]','$nama_kecamatan[28]','$nama_kecamatan[29]','$nama_kecamatan[30]'];";
echo "var curahhujan =['$curah_hujan[0]','$curah_hujan[1]','$curah_hujan[2]','$curah_hujan[3]','$curah_hujan[4]','$curah_hujan[5]','$curah_hujan[6]','$curah_hujan[7]','$curah_hujan[8]','$curah_hujan[9]','$curah_hujan[10]','$curah_hujan[11]','$curah_hujan[12]','$curah_hujan[13]','$curah_hujan[14]','$curah_hujan[15]','$curah_hujan[16]','$curah_hujan[17]','$curah_hujan[18]','$curah_hujan[19]','$curah_hujan[20]','$curah_hujan[21]','$curah_hujan[22]','$curah_hujan[23]','$curah_hujan[24]','$curah_hujan[25]','$curah_hujan[26]','$curah_hujan[27]','$curah_hujan[28]','$curah_hujan[29]','$curah_hujan[30]'];";
echo "var banjirtercatat =['$banjir_tercatat[0]','$banjir_tercatat[1]','$banjir_tercatat[2]','$banjir_tercatat[3]','$banjir_tercatat[4]','$banjir_tercatat[5]','$banjir_tercatat[6]','$banjir_tercatat[7]','$banjir_tercatat[8]','$banjir_tercatat[9]','$banjir_tercatat[10]','$banjir_tercatat[11]','$banjir_tercatat[12]','$banjir_tercatat[13]','$banjir_tercatat[14]','$banjir_tercatat[15]','$banjir_tercatat[16]','$banjir_tercatat[17]','$banjir_tercatat[18]','$banjir_tercatat[19]','$banjir_tercatat[20]','$banjir_tercatat[21]','$banjir_tercatat[22]','$banjir_tercatat[23]','$banjir_tercatat[24]','$banjir_tercatat[25]','$banjir_tercatat[26]','$banjir_tercatat[27]','$banjir_tercatat[28]','$banjir_tercatat[29]','$banjir_tercatat[30]'];";
echo "var tamandrainase =['$taman_drainase[0]','$taman_drainase[1]','$taman_drainase[2]','$taman_drainase[3]','$taman_drainase[4]','$taman_drainase[5]','$taman_drainase[6]','$taman_drainase[7]','$taman_drainase[8]','$taman_drainase[9]','$taman_drainase[10]','$taman_drainase[11]','$taman_drainase[12]','$taman_drainase[13]','$taman_drainase[14]','$taman_drainase[15]','$taman_drainase[16]','$taman_drainase[17]','$taman_drainase[18]','$taman_drainase[19]','$taman_drainase[20]','$taman_drainase[21]','$taman_drainase[22]','$taman_drainase[23]','$taman_drainase[24]','$taman_drainase[25]','$taman_drainase[26]','$taman_drainase[27]','$taman_drainase[28]','$taman_drainase[29]','$taman_drainase[30]'];";
echo "var banyakpenduduk =['$banyak_penduduk[0]','$banyak_penduduk[1]','$banyak_penduduk[2]','$banyak_penduduk[3]','$banyak_penduduk[4]','$banyak_penduduk[5]','$banyak_penduduk[6]','$banyak_penduduk[7]','$banyak_penduduk[8]','$banyak_penduduk[9]','$banyak_penduduk[10]','$banyak_penduduk[11]','$banyak_penduduk[12]','$banyak_penduduk[13]','$banyak_penduduk[14]','$banyak_penduduk[15]','$banyak_penduduk[16]','$banyak_penduduk[17]','$banyak_penduduk[18]','$banyak_penduduk[19]','$banyak_penduduk[20]','$banyak_penduduk[21]','$banyak_penduduk[22]','$banyak_penduduk[23]','$banyak_penduduk[24]','$banyak_penduduk[25]','$banyak_penduduk[26]','$banyak_penduduk[27]','$banyak_penduduk[28]','$banyak_penduduk[29]','$banyak_penduduk[30]'];";

echo "var batasatas = $batasatas;";
echo "var batasbawah = $batasbawah;";
//echo count($polyString);
//echo "var polys=['$polyString[30]'];";
echo '</script>';
?>


<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Peta
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->
        <section class="content">
          <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Surabaya Google Maps Decision System Making</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body">
                
                <div id="map_canvas" style="width:1050px; height:600px;">

<script src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&key=AIzaSyCe6S2SCFDllMUpdASqH11LPUcksWPpGe4"  type="text/javascript"></script>

<script type="text/javascript"> 
function parsePolyStrings(ps) {
    var i, j, lat, lng, tmp, tmpArr,
        arr = [],
        //match '(' and ')' plus contents between them which contain anything other than '(' or ')'
        m = ps.match(/\([^\(\)]+\)/g);
    if (m !== null) {
        for (i = 0; i < m.length; i++) {
            //match all numeric strings
            tmp = m[i].match(/-?\d+\.?\d*/g);
            if (tmp !== null) {
                //convert all the coordinate sets in tmp from strings to Numbers and convert to LatLng objects
                for (j = 0, tmpArr = []; j < tmp.length; j+=2) {
                    lat = Number(tmp[j]);
                    lng = Number(tmp[j + 1]);
                    tmpArr.push(new google.maps.LatLng(lng, lat));
                }
                arr.push(tmpArr);
            }
        }
    }
    //array of arrays of LatLng objects, or empty array
    return arr;
}

function init() {


    var i, tmp,tmpvalahp,tmpcurahhujan,tmpbanjirtercatat,tmptamandrainase,tmpbanyakpenduduk
        myOptions = {
            zoom: 12,
            center: new google.maps.LatLng(-7.265757, 112.734146),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        },
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

    for (i = 0; i < polys.length; i++) {
        tmpvalahp = ahp[i];
        tmpkecamatan = namakecamatan[i];
        tmpcurahhujan = curahhujan[i];
        tmpbanjirtercatat = banjirtercatat[i];
        tmptamandrainase = tamandrainase[i];
        tmpbanyakpenduduk = banyakpenduduk[i];
        tmp = parsePolyStrings(polys[i]);
        if( tmpvalahp <= batasatas) //cluster rawan rendah
        {
            if (tmp.length) {
            polys[i] = new google.maps.Polygon({
                paths : tmp,
                val : tmpvalahp,
                kec : tmpkecamatan,
                curahhujan : tmpcurahhujan,
                bt : tmpbanjirtercatat,
                td : tmptamandrainase,
                bp : tmpbanyakpenduduk,
                strokeColor : '#33cc00',
                strokeOpacity : 0.8,
                strokeWeight : 2,
                fillColor : '#66ff33',
                fillOpacity : 0.35,
                indexID: i
            });
            polys[i].setMap(map);

            
                    // Add a listener for the click event.
                    //polys[i].addListener('click', showArrays);
                    infoWindow = new google.maps.InfoWindow;
                    google.maps.event.addListener(polys[i], 'click', function (event) {
                            
                        var contentString = '<b>ID : ' +this.indexID;


                        // Replace the info window's content and position.
                        infoWindow.setContent(contentString);
                        infoWindow.setPosition(event.latLng);

                        infoWindow.open(map);
                        var contentString = '<b>ID : ' +this.indexID +'<br> Value AHP : '+this.val + '<br> Kecamatan : ' +this.kec +'<br>Curah Hujan :'+this.curahhujan+'milimeter'+'<br>History Banjir :'+this.bt+'kali'+'<br>Taman Drainase :'+this.td+'taman / drainase'+'<br>Banyak Penduduk :'+this.bp+'jiwa'+  '<br> Keterangan : Tingkat Rawan Banjir Rendah' ;

                        // Replace the info window's content and position.
                        infoWindow.setContent(contentString);
                        infoWindow.setPosition(event.latLng);

                        infoWindow.open(map);
                    });  
            }
        }

        
//=========================================================================================================================
		else if( tmpvalahp >= batasatas && tmpvalahp <= batasbawah) //cluster rawan rendah
        {
            if (tmp.length) {
            polys[i] = new google.maps.Polygon({
                paths : tmp,
                val : tmpvalahp,
                kec : tmpkecamatan,
                curahhujan : tmpcurahhujan,
                bt : tmpbanjirtercatat,
                td : tmptamandrainase,
                bp : tmpbanyakpenduduk,
                strokeColor : '#cccc00',
                strokeOpacity : 0.8,
                strokeWeight : 2,
                fillColor : '#ffff00',
                fillOpacity : 0.35,
                indexID: i
            });
            polys[i].setMap(map);

            
                    // Add a listener for the click event.
                    //polys[i].addListener('click', showArrays);
                    infoWindow = new google.maps.InfoWindow;
                    google.maps.event.addListener(polys[i], 'click', function (event) {
                            
                        var contentString = '<b>ID : ' +this.indexID;


                        // Replace the info window's content and position.
                        infoWindow.setContent(contentString);
                        infoWindow.setPosition(event.latLng);

                        infoWindow.open(map);
                        var contentString = '<b>ID : ' +this.indexID +'<br> Value AHP : '+this.val + '<br> Kecamatan : ' +this.kec +'<br>Curah Hujan :'+this.curahhujan+'milimeter'+'<br>History Banjir :'+this.bt+'kali'+'<br>Taman Drainase :'+this.td+'taman / drainase'+'<br>Banyak Penduduk :'+this.bp+'jiwa'+  '<br> Keterangan : Tingkat Rawan Banjir Sedang' ;
                        // Replace the info window's content and position.
                        infoWindow.setContent(contentString);
                        infoWindow.setPosition(event.latLng);

                        infoWindow.open(map);
                    });  
            }
        }

//===========================================================================================================================
        else if(  tmpvalahp >= batasbawah) //cluster rawan rendah
        {
            if (tmp.length) {
            polys[i] = new google.maps.Polygon({
                paths : tmp,
                val : tmpvalahp,
                kec : tmpkecamatan,
                curahhujan : tmpcurahhujan,
                bt : tmpbanjirtercatat,
                td : tmptamandrainase,
                bp : tmpbanyakpenduduk,
                strokeColor : '#ff3333',
                strokeOpacity : 0.8,
                strokeWeight : 2,
                fillColor : '#ff3333',
                fillOpacity : 0.35,
                indexID: i
            });
            polys[i].setMap(map);

            
                    // Add a listener for the click event.
                    //polys[i].addListener('click', showArrays);
                    infoWindow = new google.maps.InfoWindow;
                    google.maps.event.addListener(polys[i], 'click', function (event) {
                            
                        var contentString = '<b>ID : ' +this.indexID;


                        // Replace the info window's content and position.
                        infoWindow.setContent(contentString);
                        infoWindow.setPosition(event.latLng);

                        infoWindow.open(map);
                        var contentString = '<b>ID : ' +this.indexID +'<br> Value AHP : '+this.val + '<br> Kecamatan : ' +this.kec +'<br>Curah Hujan :'+this.curahhujan+'milimeter'+'<br>History Banjir :'+this.bt+'kali'+'<br>Taman Drainase :'+this.td+'taman / drainase'+'<br>Banyak Penduduk :'+this.bp+'jiwa'+  '<br> Keterangan : Tingkat Rawan Banjir Tinggi' ;

                        // Replace the info window's content and position.
                        infoWindow.setContent(contentString);
                        infoWindow.setPosition(event.latLng);

                        infoWindow.open(map);
                    });  
            }
        }       

       
        
    }
  

    // Create the legend and display on the map
    var legend = document.createElement('div');
    legend.id = 'legend';
    var content = [];
    content.push('<h5><b>Tingkat Resiko <br> Banjir Kota Surabaya</b></h5>');
    content.push('<p><div class="color green"></div>Rendah</p>');
    content.push('<p><div class="color yellow"></div>Sedang</p>');
    content.push('<p><div class="color red"></div>Tinggi</p>');
    legend.innerHTML = content.join('');
    legend.index = 1;
    map.controls[google.maps.ControlPosition.LEFT_BOTTOM].push(legend);
}
init();


</script>

                </div><!-- /.box-body -->
                <div class="box-footer">
                    Halaman Mitigasi :<br>
                    ================================================================================================================================<br>
                    Daerah Beresiko Tinggi <br>
                    ================================================================================================================================<br>
                    Untuk tingkat resiko tinggi, kecamatan tersebut akan terkena banjir dengan kedalaman lebih 1.5 m yang berdampak pada hingga lebih dari 1000 jiwa per km persegi. Banjir ini akan menggenangi seluruh bangunan dan lahan produktif dengan potensi kerugian lebih dari 3 milliar rupiah. Terjadi kerusakan pada infrastruktur dan bangunan. Timbulnya penyakit-penyakit menahun (PES, dsb.) Listrik dan jaringan telekomunikasi padam, munculnya trauma dan stress pasca bencana. Untuk menanggulangi ini, hal yang harus dilakukan adalah menambah cadangan pompa air ataupun menambah Ruang Terbuka Hijau. Memberikan penyuluhan dan pelatihan kepada masyarakat tentang evakuasi banjir , membentuk tim tanggap darurat untuk bencana banjir, melarang masyarakat mendirikan bangunan di sekitar aliran drainase, dan membuat jalur-jalur alternatif untuk daerah yang sering terkena banjir<br>

                    ================================================================================================================================<br>
                    Daerah Beresiko Sedang <br>
                    ================================================================================================================================<br>
                    Untuk tingkat resiko Sedang, kecamatan tersebut akan terkena banjir dengan kedalaman hingga 0.75 m yang berdampak pada hingga 1000 jiwa per km persegi. Banjir ini akan menggenangi beberapa bangunan dan lahan produktif dengan potensi kerugian mencapai 750 juta rupiah. Untuk menanggulangi ini, hal yang harus dilakukan adalah menyiagakan cadangan pompa air serta menyiagakan tim yang siap siaga mengoprasikan pompa-pompa air, membuat saluran-saluran perangkap air dan pemanen hujan, dan memberikan pendidikan kepada masyarakat mengenai bahaya banjir kota.
                    ================================================================================================================================<br>
                    Daerah Beresiko Rendah <br>
                    ================================================================================================================================<br>
                    Untuk tingkat resiko Rendah, kecamatan tersebut akan terkena banjir dengan kedalaman hingga 0.25 m yang berdampak pada hingga 500 jiwa per km persegi. Banjir ini akan menggenangi beberapa bangunan dan lahan produktif dengan potensi kerugian mencapai 500 juta rupiah. Untuk menanggulangi ini, hal yang harus dilakukan adalah menyiagakan cadangan pompa air serta menyiagakan tim yang siap siaga mengoprasikan pompa-pompa air, serta memberi maintain kepada drainase agar tetap berjalan.

                    <?php 
                    
                    //echo '<pre>',print_r($dttest),'</pre>'; 
                    //var_dump($batasatas,$batasbawah);?>
                </div><!-- /.box-footer-->
            </div><!-- /.box -->
        </section><!-- /.content -->


<?php
$this->load->view('admin/js');
?>

<!--tambahkan custom js disini-->
<!-- jQuery UI 1.11.2 -->
<script src="<?php echo base_url('assets/js/jquery-ui.min.js') ?>" type="text/javascript"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/js/raphael-min.js') ?>"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/morris/morris.min.js') ?>" type="text/javascript"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>" type="text/javascript"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/knob/jquery.knob.js') ?>" type="text/javascript"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/daterangepicker/daterangepicker.js') ?>" type="text/javascript"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datepicker/bootstrap-datepicker.js') ?>" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>" type="text/javascript"></script>
<!-- iCheck -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/iCheck/icheck.min.js') ?>" type="text/javascript"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/pages/dashboard.js') ?>" type="text/javascript"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/js/demo.js') ?>" type="text/javascript"></script>

<?php
$this->load->view('admin/foot');
?>