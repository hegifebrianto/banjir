<?php
$this->load->view('admin/head');



if (is_array($ch_bymonth) || is_object($ch_bymonth))
    {
        //get data curah hujan by month
        foreach ($ch_bymonth as $k=>$subArray){
            foreach ($subArray as $id => $value) {
                $datacurahhujanbymonth[$k][] = $value;
            }
        }
    }
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
<?php echo $this->session->flashdata('message');?>
        <h4>1. Masukkan nilai kriteria perbandingan antara variabel</h4>
        <h4>2. Nilai kolom (y) merupakan pembanding pertama (ex=y:x)</h4>
        <h4>3. Klik Hitung </h4>
        <h4>4. Nilai pada segitiga bawah akan otomatis memiliki nilai ( 1/(matriks[kolom][baris]) )</h4>
        <h4>5. Apabila nilai CR < 0.1 maka Konsisten apabila tidak silahkan masukkan nilai lain dari variabel</h4>
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                        <form id="bobotForm" class="form-horizontal" action="<?php echo site_url('admin/perhitungan/perhitungan/hitung_bobot');?>" method="POST" accept-charset="utf-8" onchange="this.form.submit()">  
                            <tr>
                            <td><a href="#" onclick="javascript:void window.open('sistem/admin/perhitungan/perhitungan/ket_skala','1419062987076','width=600,height=350,toolbar=0,menubar=0,location=0,status=1,scrollbars=1,resizable=1,left=0,top=0');return false;">*lihat skala penilaian</a></td>
                            <select id="month" name="month" style="float:right;" >
                                <option value="1" <?php if(isset($_POST['month'])) if(($_POST['month']) == '1') echo "selected";?>>Januari</option>
                                <option value="2" <?php if(isset($_POST['month'])) if(($_POST['month']) == '2') echo "selected";?>>Februari</option>
                                <option value="3" <?php if(isset($_POST['month'])) if(($_POST['month']) == '3') echo "selected";?>>Maret</option>
                                <option value="4" <?php if(isset($_POST['month'])) if(($_POST['month']) == '4') echo "selected";?>>April</option>
                                <option value="5" <?php if(isset($_POST['month'])) if(($_POST['month']) == '5') echo "selected";?>>Mei</option>
                                <option value="6" <?php if(isset($_POST['month'])) if(($_POST['month']) == '6') echo "selected";?>>Juni</option>
                                <option value="7" <?php if(isset($_POST['month'])) if(($_POST['month']) == '7') echo "selected";?>>Juli</option>
                                <option value="8" <?php if(isset($_POST['month'])) if(($_POST['month']) == '8') echo "selected";?>>Agustus</option>
                                <option value="9" <?php if(isset($_POST['month'])) if(($_POST['month']) == '9') echo "selected";?>>September</option>
                                <option value="10" <?php if(isset($_POST['month'])) if(($_POST['month']) == '10') echo "selected";?>>Oktober</option>
                                <option value="11" <?php if(isset($_POST['month'])) if(($_POST['month']) == '11') echo "selected";?>>November</option>
                                <option value="12" <?php if(isset($_POST['month'])) if(($_POST['month']) == '12') echo "selected";?>>Desember</option>
                            </select>                
                            </tr>

                            <table id="perhitungan" class="table table-bordered table-striped">
                                <thead>
                                <th>Nama Kriteria</th>
                                    <?php
                                    foreach($kriterias as $kriteria) { ?>
                                    <td>
                                    <?php echo $kriteria['nama_kriteria']?>
                                    </td>
                                    <?php } ?>
                                </thead>
                                <tbody>
                                    <?php $krit[][]='';?>
                                    
                                    <?php $i=0; do { ?>
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
                                    //Looping Segitiga Atas 
                                    for($j=0;$j<4;$j++){  ?>   
                                    <?php if($i==$j){ 
                                        ?>
                                        <input type="hidden" name="krit[<?php echo $i?>][<?php echo $j?>]"  value="1"></input>
                                    
                                    <?php     
                                       
                                    echo '<td>1</td>';
                                    }
                                    else if($i<$j){ echo '<td>';?>
                                    <!--Membuat dropdown untuk nilai/value segitiga atas -->
                                    <select id="select" name="krit[<?php echo $i; ?>][<?php echo $j; ?>]";   >
                                        <?php foreach($groups as $each){ ?>
                                        <option value="<?php echo $each['nilai']?>"></option>
                                        <option value="<?php echo $each['nilai']?>" <?php if(isset($_POST['krit'][$i][$j])) if($each['nilai'] == $_POST['krit'][$i][$j]) echo "selected";?>><?php echo $each['nilai']?> </option>
                                        <?php } ?>
                                    </select>


                                    <?php echo '</td>'; }
                                    else{
                                        ?>
                                        <td><input type="text" name="krit[<?php echo $i?>][<?php echo $j?>]"  value="" placeholder="" readonly ></input></td> 
                                    <?php }
                                    ?>

                                    <?php } ?>
                                    </tr>
                                    <?php $i++; } while($i < $this->db->count_all('kriteria') ); ?>

                                

                                
        
                                </tbody>
                            </table>
                            <tr>                             
                                    <input type="submit" name="formaction" value="simpan" onclick="this.form.submit()">
                                    <input type="submit" name="formaction" value="hitung" onclick="this.form.submit()">
                                   
                            </tr>
                           
                        </form>
                        
                        <br>

                      

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div><!-- /.row -->
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