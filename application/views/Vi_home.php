<!-- Left Panel Prosedur Konfirmasi Peminjaman-->
<meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/ion">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url("assets/"); ?>plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
<!--<div id="right-panel" class="right-panel"> Right Panel Prosedur Peminjaman-->

<div class="content-wrapper">
<div class="container">
    <div class="card">
	<div class="row">
		    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <br>
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner" style="margin-left: 40px;">
                <h4 style="margin-left: 40px;">Pending</h4>
                <p>Harap Segera Konfirmasi Peminjaman Barang</p>
                  <a href="<?= base_url("Laporanbarang/kelaporan_dashboard"); ?>" class="small-box-footer" style="margin-left: 30px;"> <u> More info </u><i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
          </div>
                  <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner" style="margin-left: 40px;">
                <h4 style="margin-left: 40px;">Pending</h4>
                <p>Harap Segera Konfirmasi Peminjaman Ruangan</p>  
              <a href="<?= base_url("Laporanruangan/kelaporan_dashboard"); ?>" class="small-box-footer" style="margin-left: 30px;"> <u> More info </u><i class="fas fa-arrow-circle-right"></i></a>
            </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner" style="margin-left: 40px;">
                <h4 style="margin-left: 40px;">Notifikasi</h4>
                <p>Pinjaman Barang yang Belum Dikembalikan</p>    
              <a data-toggle="modal"data-target="#staticModal" class="small-box-footer" style="margin-left: 30px;"> <u> More info </u><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner" style="margin-left: 40px;">
                <h4 style="margin-left: 40px;">Notifikasi</h4>
                <p>Pinjaman Ruangan yang Belum Dikembalikan</p>
              <a data-toggle="modal"data-target="#staticModal2" class="small-box-footer" style="margin-left: 40px;"> <u> More info </u><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          </div>
        </div>
        <!-- /.row -->
        <!-- Main row 
        <div class="row">
-->
            <!-- /.card -->
        <br><hr>
        <div>
        <h3> Prosedur Penggunaan Aplikasi Peminjaman Barang dan Ruangan untuk Admin</h3>
        <hr>
        <a><img src="<?php echo base_url('assets/images/admin_step.png'); ?>"></a>
        </div>
      </section>
  		
   </div>
	</div>
</div>
</div>

<div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document" >
    <div class="modal-content" style="width:700px; position: absolute; left: -50%;">
      <div class="modal-header">
        <h5 class="modal-title" id="staticModalLabel">Daftar Peminjam Barang yang Belum Mengembalikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table id="bootstrap-data-table" class="table table-striped table-bordered">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama Pihak Kedua</th>
                <th>Jumlah Hari Terlambat</th>
                <th>Jumlah Denda</th>
                <th class="text-center">Aksi</th>
            </tr>
          </thead>
            <?php
                  $i=1;
                  foreach($table as $row)
                  {
                    $tmstamp = strtotime(date('Y-m-d')) - strtotime($row->tanggal_kembali);
                    $telat = date("d", $tmstamp) -1 ;


                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row->nama2."</td>";
                    echo "<td>".$telat."</td>";
                    echo "<td>".($telat*500)."</td>";
                    echo '<td><a href="'.base_url("crudpinjambarang/accpinjam_barang/".$row->id_pb).'" class="ion-edit text-success" style="font-size: 20px;" onclick="myFunction();"> More Info</a></td>';
                    echo "</tr>";

                      $i++;
                    }
                    ?>
      </div>
    </div>
  </div>
</div>

<!--
<div class="modal fade" id="staticModal2" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true" data-backdrop="static">
  <div class="modal-dialog modal-sm" role="document" >
    <div class="modal-content" style="width:700px; position: absolute; left: -50%;">
      <div class="modal-header">
        <h5 class="modal-title" id="staticModalLabel">Daftar Peminjam Ruangan yang Belum Mengembalikan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <table id="bootstrap-data-table" class="table table-striped table-bordered">
          <thead>
            <tr>
                <th>No</th>
                <th>Nama Pihak Kedua</th>
                <th>Jumlah Hari Terlambat</th>
                <th>Jumlah Denda</th>
                <th class="text-center">Aksi</th>
            </tr>
          </thead>
            <?php
                  $i=1;
                  foreach($table as $row)
                  {
                    $tmstamp = strtotime(date('Y-m-d')) - strtotime($row->tanggal_kembali);
                    $telat = date("d", $tmstamp) -1 ;


                    echo "<tr>";
                    echo "<td>".$i."</td>";
                    echo "<td>".$row->nama2."</td>";
                    echo "<td>".$telat."</td>";
                    echo "<td>".($telat*500)."</td>";
                    echo '<td><a href="'.base_url("Laporanruangan/kelaporan/").'" class="ion-edit text-success" style="font-size: 20px;" onclick="myFunction2();"> More Info</a></td>';
                    echo "</tr>";

                      $i++;
                    }
                    ?>
      </div>
    </div>
  </div>
</div> -->

<!-- jQuery -->
<script src="<?= base_url("assets/"); ?>plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url("assets/"); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url("assets/"); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url("assets/"); ?>plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url("assets/"); ?>plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="<?= base_url("assets/"); ?>plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url("assets/"); ?>plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url("assets/"); ?>plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url("assets/"); ?>plugins/moment/moment.min.js"></script>
<script src="<?= base_url("assets/"); ?>plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url("assets/"); ?>plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url("assets/"); ?>plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url("assets/"); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url("assets/"); ?>dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url("assets/"); ?>dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url("assets/"); ?>dist/js/demo.js"></script>

<script type="text/javascript">
  function myFunction(){
    alert("Harap Segera Hubungi Peminjam !!");
}; 
</script>

<script type="text/javascript">
  function myFunction2(){
    alert("Harap Segera Hubungi Peminjam !!");
}; 
</script>