<?php
$this->load->view('admin/head');
?>
<?php
        $pvk = array_values($prirorityvector);
        
        $dtbobotkecamatan = array_values($bobotnormalkecamatan);
        $dtBobot = array_values($hasil_bobot);
        
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
<!-- DATA TABLES -->

    <link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datatables/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url('assets/AdminLTE-2.0.5/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />     

<!-- bootstrap wysihtml5 - text editor -->
<link href="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>" rel="stylesheet" type="text/css" />


<?php
$this->load->view('admin/topbar');
$this->load->view('admin/sidebar');
?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Dashboard
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<!-- Main content -->

<section class="content">
<?php echo $this->session->flashdata('message');?>
  <!-- Hasil Ci & CR -->
    <div class="col-xs-12">
        <div class="box">

    <p><h5>Tabel Hasil Pembobotan AHP</h5></p>
                <table  class="table table-bordered table-striped">
                                <thead>
                                <th>Nama Kriteria</th>
                                    <?php
                                    foreach($kriterias as $kriteria) { ?>
                                    <td>
                                    <?php echo $kriteria['nama_kriteria']?>
                                    </td>
                                    <?php } ?>
                                    <td>
                                        Priority Vector
                                    </td>
                                </thead>
                                <tbody>
                                   <?php
                        
                                    
                                    $i=0;$j=0; do { ?>
                                    <tr>
                                    <?php $query = $this->db->query("SELECT nama_kriteria FROM kriteria where id_kriteria = $i+1;");  ?>
                                    <?php
                                        foreach($query->result_array() as $row) { ?>
                                        <td>
                                        <?php echo $row['nama_kriteria']?>
                                        </td>

                                    <?php } ?>
                                    
                                    
                                    <!--Membuat segitiga atas dropdown-->
                                    <?php 
                                        echo '<td>';
                                        echo $dtBobot[$j]['valbobot'];
                                        echo '</td>';
                                        echo '<td>';
                                        echo $dtBobot[$j+1]['valbobot'];
                                        echo '</td>';
                                        echo '<td>';
                                        echo $dtBobot[$j+2]['valbobot'];
                                        echo '</td>';
                                        echo '<td>';
                                        echo $dtBobot[$j+3]['valbobot'];
                                        echo '</td>';
                                        echo '<td>';
                                        echo $pvk[$i];
                                        echo '</td>';
                                        $j+=4;
                                        ?>
                                    
                                    </tr>
                                    <?php $i++; } while($i < 4 ); ?>

                                </tbody>
                </table>

  
    <table class="table table-bordered table-striped">
                <p><h3>Konsistensi Matriks Variabel<h3></p>
                <tr>
                    <th width="30%"><strong>Alpha Max</strong></th>
                    <th><?php echo $l_max;?></th>

                </tr>
                <tr>
                    <th><strong>CI</strong></th>
                    <th><?php echo $ci;?></th>
                </tr>
                <tr>
                    <th><strong>RI</strong></th>
                    <th><?php echo 0.90;?></th>
                </tr>
                <tr>
                    <th><strong>CR</strong></th>
                    <th><?php echo $cr;?></th>
                </tr>

                </table>
                
                <p><h3>Tingkat Kerentanan Tiap Kecamatan Surabaya</h3></p>
                <table id="example1" class="table table-bordered table-striped">
                    <thead >
                    <tr>
                        <th>Nama Kecamatan</th>
                        <th>Bobot Normal</th>
                        <th>Curah Hujan</th>
                        <th>Banjir Tercatat</th>
                        <th>Taman  Drainase</th>
                        <th>Banyak Penduduk</th>
                    </tr>
                    </thead >
                    <tbody>
                    <?php
                        for($i=0;$i<$datalength;$i++){
                            echo '<tr>';
                            for($j=0;$j<6;$j++){
                                echo '<td>';
                                echo $dtAkhir[$i][$j+1];
                                echo '</td>';
                            }
                            echo '</tr>';
                        }
                    ?>
                    <tbody>
                </table>

                <?php
                 
                    
                    $_SESSION["array1"] = $dtAkhir;
      
                ?>
                </table>



       </div>
   </div>
    <a href="<?=base_url()?>admin/perhitungan/perhitungan/peta" class="btn btn-sm btn-primary">
    <i class="glyphicon glyphicon-plus"></i> Lanjut Peta </a>
	</section><!-- /.content -->
	
	


<?php
$this->load->view('admin/js');
?>
    


    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datatables/jquery.dataTables.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/datatables/dataTables.bootstrap.js') ?>" type="text/javascript"></script>

    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>


<?php
$this->load->view('admin/foot');
?>

