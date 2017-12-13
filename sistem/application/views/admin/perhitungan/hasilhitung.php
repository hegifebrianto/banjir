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
                    

                <table>
                                                <thead>
                                    <tr>
                                        <th>GId</th>
                                        <th>ID Curah Hujan</th>
                                        <th>Nilai Curah Hujan</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>

                </table>
                <tbody>
                    <?php if(empty($logahpkecamatans)) { ?>
                                    <tr>
                                        <td colspan="6">Data not found</td>
                                    </tr>
                                    <?php } else {
                                    foreach($logahpkecamatans as $logahpkecamatan){ ?>
                                    <tr>
                                        <td><?=$logahpkecamatan['idhitung']?></td>
                                        <td><?=$logahpkecamatan['gid']?></td>
                                        <td><?=$logahpkecamatan['val_ahp']?></td>

                                    </tr>
                                    <?php }} ?>
                </tbody>



       </div>
   </div>
	</section><!-- /.content -->
	<form action="">
	</form>
	


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

<a href="<?=base_url()?>admin/kecamatan/form/add" class="btn btn-sm btn-primary">
        <i class="glyphicon glyphicon-plus"></i> Simpan
        </a><script src="<?php echo base_url('assets/AdminLTE-2.0.5/plugins/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
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

