<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">

  <?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">
 <!-- Loading Page -->
 <?php $this->load->view("admin/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("admin/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("admin/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-info"></i>
            Profil Akun</div>

          <div class="card-body">
            <div class="table-responsive">
          <?php 
        
        foreach($user as $u){
            ?>
           <ul> 
            <i class="fas fa-user fa-7x" style="margin-bottom: 20px; margin-top: 20px"></i>
            
           <li><h6> ID Pengguna : <?php echo $u->id_user;?></h6></li>
           <li><h6> Nama Lengkap : <?php echo $u->nama;?></h6></li>
           <li><h6> NIP / ID Pegawai : <?php echo $u->nip;?></h6></li>
           <li><h6> Jenis Kelamin : <?php echo $u->jk;?></h6></li>
           <li><h6> Asal OPD : <?php echo $u->nama_opd;?></h6></li>
           <li><h6> Username : <?php echo $u->username;?></h6></li>
           <li><h6> Password : <?php echo $u->password;?></h6></li>
           <li><h6> Peran : <?php echo $u->nama_user_grup;?></h6></li>
           <li><h6> Tanggal Dibuat: <?php echo date('D, d-M-Y', $u->date_created);?></h6></li>
           
           </ul>
            <?php 
          }
          ?>
              <a href="<?php echo base_url().'admin/user'; ?>" class="btn btn-primary" value="Kembali">Kembali</a>
        
          </div>
        </div>
      </div>
    </div>
    
   </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("admin/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>