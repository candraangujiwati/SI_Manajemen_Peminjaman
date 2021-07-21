<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">
  <?php $this->load->view("pengguna_barang/_partials/head.php") ?>
</head>
<body id="page-top">
  <!-- Loading Page -->
  <?php $this->load->view("pengguna_barang/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("pengguna_barang/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("pengguna_barang/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">
<div class="card mb-3">
  <div class="card-header bg-">
            <i class="fas fa-bell"></i>
           Informasi Notifikasi Masuk</div>
            <br>
<?php
if($this->session->flashdata('tandai')){
echo "<div class='alert alert-primary'>
               <span>Informasi Sudah Dibaca </span>  
            </div>";
}else if($this->session->flashdata('hapusnotif')){
  echo "<div class='alert alert-success'>
                 <span>Informasi Berhasil Dikosongkan </span>  
              </div>";
  }
?>
  
           
          <div class="card-body">
            <div class="table-responsive">
            <!--<a href="<?php echo base_url().'penggunabarang/tandaisudahdibacasemua/'?>" onclick="return confirm('Tandai Semua Sudah Dibaca')" class="btn btn-warning">Tandai Sudah Dibaca Semua</a> 
            <a href="<?php echo base_url().'penggunabarang/hapussemuanotif/'?>" onclick="return confirm('Kosongkan Infomasi?')" class="btn btn-danger">Kosongkan Informasi</a> 
            -->
             <br>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
          <th width="1%">No</th>
          <th width="1%">ID Peminjaman</th>
        
          <th width="12%">Judul</th>
            <th width="12%">Pesan</th>
            <th width="12%">Aksi</th>
           </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($notif_barang as $r){
             ?>
            <tr>
            <?php if($this->session->userdata('nama') == $r['nama']) { ?>
       
            <td><?php echo $no++; ?></td>
            <td><?php echo $r['id_pinjam_barang']; ?></td>
             <td><?php echo $r['judul_notif_barang']; ?></td>
              <td><?php echo $r['pesan_notif_barang']; ?></td>
              <td>     
              <?php if($r['status_baca_notif_barang']==1) { ?>
              <a href="<?php echo base_url().'penggunabarang/tandaisudahdibaca/'.$r['id_pinjam_barang']?>" class="btn btn-info">Tandai Sudah Dibaca</a> 
              <?php } else if($r['status_baca_notif_barang']==2){ 
                 //redirect(base_url('penggunabarang/hapusnotif'));?>
                 <span class="badge badge-primary">Sudah Dibaca</span>
<?php 
          }}
          ?>
              </td>
             
            </tr>
            <?php
          }
          ?>
        </tbody> 
            </table>          </div>
        </div>
      </div>
       <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("pengguna_barang/_partials/footer.php") ?>

</div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("pengguna_barang/_partials/scrolltop.php") ?>
<?php $this->load->view("pengguna_barang/_partials/modal.php") ?>
<?php $this->load->view("pengguna_barang/_partials/jspemberitahuan.php") ?>
  
</body>
</html>