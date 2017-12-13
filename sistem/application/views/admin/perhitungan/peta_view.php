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
for($i=0;$i<$datalength;$i++)
{    
    $polyString[$i] = $data_petavalues[$i]['geom'];
    $valAhp[$i] = $data_petavalues[$i]['val_ahp'];
    $nama_kecamatan[$i] = $data_petavalues[$i]['nama_kecamatan'];
}

echo '<script type="text/javascript">';
echo "var ahp =['$valAhp[0]','$valAhp[1]','$valAhp[2]','$valAhp[3]','$valAhp[4]','$valAhp[5]','$valAhp[6]','$valAhp[7]','$valAhp[8]','$valAhp[9]','$valAhp[10]','$valAhp[11]','$valAhp[12]','$valAhp[13]','$valAhp[4]','$valAhp[15]','$valAhp[16]','$valAhp[17]','$valAhp[18]','$valAhp[19]','$valAhp[20]','$valAhp[21]','$valAhp[22]','$valAhp[23]','$valAhp[24]','$valAhp[25]','$valAhp[26]','$valAhp[27]','$valAhp[28]','$valAhp[29]','$valAhp[30]'];";
echo "var polys =['$polyString[0]','$polyString[1]','$polyString[2]','$polyString[3]','$polyString[4]','$polyString[5]','$polyString[6]','$polyString[7]','$polyString[8]','$polyString[9]','$polyString[10]','$polyString[11]','$polyString[12]','$polyString[13]','$polyString[14]','$polyString[15]','$polyString[16]','$polyString[17]','$polyString[18]','$polyString[19]','$polyString[20]','$polyString[21]','$polyString[22]','$polyString[23]','$polyString[24]','$polyString[25]','$polyString[26]','$polyString[27]','$polyString[28]','$polyString[29]','$polyString[30]'];";
echo "var namakecamatan =['$nama_kecamatan[0]','$nama_kecamatan[1]','$nama_kecamatan[2]','$nama_kecamatan[3]','$nama_kecamatan[4]','$nama_kecamatan[5]','$nama_kecamatan[6]','$nama_kecamatan[7]','$nama_kecamatan[8]','$nama_kecamatan[9]','$nama_kecamatan[10]','$nama_kecamatan[11]','$nama_kecamatan[12]','$nama_kecamatan[13]','$nama_kecamatan[14]','$nama_kecamatan[15]','$nama_kecamatan[16]','$nama_kecamatan[17]','$nama_kecamatan[18]','$nama_kecamatan[19]','$nama_kecamatan[20]','$nama_kecamatan[21]','$nama_kecamatan[22]','$nama_kecamatan[23]','$nama_kecamatan[24]','$nama_kecamatan[25]','$nama_kecamatan[26]','$nama_kecamatan[27]','$nama_kecamatan[28]','$nama_kecamatan[29]','$nama_kecamatan[30]'];";

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
                <?php echo $idhitung;?>
                <div id="map_canvas" style="width:1050px; height:600px;">
<script src="https://maps.googleapis.com/maps/api/js?v=3&sensor=false"></script>
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


    var i, tmp,tmpvalahp,
        myOptions = {
            zoom: 12,
            center: new google.maps.LatLng(-7.265757, 112.734146),
            mapTypeId: google.maps.MapTypeId.ROADMAP
        },
        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    for (i = 0; i < polys.length; i++) {
        tmpvalahp = ahp[i];
        tmpkecamatan = namakecamatan[i];
        tmp = parsePolyStrings(polys[i]);
        if(tmpvalahp < 0.05) //cluster rawan rendah
        {
            if (tmp.length) {
            polys[i] = new google.maps.Polygon({
                paths : tmp,
                val : tmpvalahp,
                kec : tmpkecamatan,
                strokeColor : '#00FF00',
                strokeOpacity : 0.8,
                strokeWeight : 2,
                fillColor : '#00FF00',
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
                        var contentString = '<b>ID : ' +this.indexID +'<br> Value AHP : '+this.val + '<br> Kecamatan : ' +this.kec + '<br> Keterangan : Tingkat Rawan Banjir Rendah' ;

                        // Replace the info window's content and position.
                        infoWindow.setContent(contentString);
                        infoWindow.setPosition(event.latLng);

                        infoWindow.open(map);
                    });  
            }

        }
        else if(tmpvalahp>0.05) //cluster tinggi
        {
            if (tmp.length) {
            polys[i] = new google.maps.Polygon({
                paths : tmp,
                val : tmpvalahp,
                kec : tmpkecamatan,
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
                            
                        var contentString = '<b>ID : ' +this.indexID +'<br> Value AHP : '+this.val + '<br> Kecamatan : ' +this.kec + '<br> Keterangan : Tingkat Rawan Banjir Tinggi' ;

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
                    Footer
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