<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar" style="margin-top: 50px;">
    <!-- sidebar: style can be found in sidebar.less -->
    
    <section class="sidebar" >
        <!--Logo-->
        <div style="text-align: center; margin-top:-30px;"><img src="<?php echo base_url('assets/AdminLTE-2.0.5/dist/img/a1.png') ?>" width="70" /></div>
        <!-- Sidebar user panel -->
        <div class="user-panel">
        <div style="text-align: center; "><font color="white"><h4><b>DSS SYSTEM FOR URBAN FLOOD </b><h4></font></div>       
            
        </div>
        <!-- search form -->
        <base href="http://localhost/banjir/" />
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" style="height:1200px;">
            <li class="header">MAIN NAVIGATION</li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Kecamatan</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/kecamatan/curah_hujan') ?>"><i class="fa fa-circle-o"></i> Curah Hujan</a></li>
                    <li><a href="<?php echo site_url('admin/kecamatan/banjir_tercatat') ?>"><i class="fa fa-circle-o"></i> Banyak Banjir Tercatat</a></li>
                    <li><a href="<?php echo site_url('admin/kecamatan/taman_drainase') ?>"><i class="fa fa-circle-o"></i> Banyak Taman Drainase</a></li>
                    <li><a href="<?php echo site_url('admin/kecamatan/banyak_penduduk') ?>"><i class="fa fa-circle-o"></i> Banyak Populasi</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="<?=base_url()?>admin/perhitungan/perhitungan">
                                <i class="fa fa-sliders"></i>
                                <span>Perhitungan</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class=""></i> <span>Maps</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="<?php echo site_url('admin/maps/allmaps') ?>"><i class="fa fa-circle-o"></i> All Risk</a></li>
                    <li><a href="<?php echo site_url('admin/maps/highmaps') ?>"><i class="fa fa-circle-o"></i> High Risk</a></li>
                    <li><a href="<?php echo site_url('admin/maps/mediummaps') ?>"><i class="fa fa-circle-o"></i> Medium Risk</a></li>
                    <li><a href="<?php echo site_url('admin/maps/lowmaps') ?>"><i class="fa fa-circle-o"></i> Low Risk</a></li>
                </ul>
            </li>
            <li>
                <a href="<?php echo site_url('admin/graphic/graphic') ?>">
                    <i class="fa fa-th"></i> <span>Graphic</span> 
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('admin/mitigasi/mitigasi') ?>">
                    <i class="fa fa-th"></i> <span>Saran Mitigasi</span> 
                </a>
            </li>            
            
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

<!-- =============================================== -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">