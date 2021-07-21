<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin_barang/_partials/head.php") ?>
</head>
<body id="page-top">

<?php $this->load->view("admin_barang/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("admin_barang/_partials/sidebar.php") ?>

  <div id="content-wrapper">
    <div class="container-fluid">
    <?php $this->load->view("admin_barang/_partials/breadcrumb.php") ?>
    <!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-primary">
            <i class="fas fa-table"></i>
            Laporan Peminjaman Barang</div>
          <div class="card-body">
          <!--Munculkan data-->
        <?php foreach ($pinjam_barang as $value) { ?>
          <a  class="btn btn-primary" href="<?php echo base_url().'adminbarang/cetak'?>"><i class="fa fa-print"></i>Cetak</a>
          <table class="table table-bordered" id="print-area" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
          <th width="1%">No</th>
            <th width="1%">ID Pinjam</th>
            <th width="13%">Tanggal Pinjam</th>
            <th width="13%">Tanggal Kembali</th>
            <!--<th width="13%">Nama Barang</th>
            <th width="13%">Jumlah Pinjam</th>
            <th width="13%">NIP</th>
            <th width="13%">Nama</th>
            <th width="13%">Tanggal Data Ditambah / Diedit</th></tr>-->
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($pinjam_barang as $r){
            //foreach ($opd as $key => $value) {
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $r->id_pinjam_barang; ?></td>
              <td><?php echo $r->tgl_pinjam_barang; ?></td>
              <td><?php echo $r->tgl_kembali_barang; ?></td>
             
              <!--<td><?php /*echo $r->nama_barang; ?></td>
              <td><?php echo $r->jumlah_pinjam; ?></td>
              <td><?php echo $r->nip; ?></td>
              <td><?php echo $r->nama; ?></td>
              <!--<td>
              <?php// echo "<a href='".base_url()."admin/file/$r->surat'>Download</a>"; ?>
                <!--<a  class="btn btn-success" href="<?php //echo base_url().'admin/file/'.$r->surat?>"><i class="fa fa-file-download"></i></a>
              </td>-->
              <td><?php echo date('D, d-M-Y', $r->tanggal_buat_pinjam_barang);*/?></td>-->
            </tr>
            <?php 
          }
          ?>
        </tbody> 
            </table>
    <?php } 
   ?>
        </div>
      </div>
    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("admin_barang/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin_barang/_partials/scrolltop.php") ?>
<?php $this->load->view("admin_barang/_partials/modal.php") ?>
<?php $this->load->view("admin_barang/_partials/js.php") ?>
    
</body>
</html>