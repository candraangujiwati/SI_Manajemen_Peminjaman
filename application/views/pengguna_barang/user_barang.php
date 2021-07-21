<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">
  <?php $this->load->view("pengguna_barang/_partials/head.php") ?>
</head>
<body id="page-top">
<?php $this->load->view("pengguna_barang/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("pengguna_barang/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("pengguna_barang/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

    <?php $this->load->view("pengguna_barang/_partials/breadcrumb.php") ?>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-address-book"></i>
           Profil</div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
           
            <th>Nama</th>
            <th>Username</th>
            <th>Peran</th>
            <th>Tanggal Dibuat</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($user as $u){
            ?>
            <tr>
              <?php if($this->session->userdata('nama') == $u->nama) { ?>
              <div class="form-group">
                       <div class="col-md-9">
                <a  href="<?php echo base_url().'penggunabarang/user_profil/'.$u->id_user; ?>" class="btn btn-info">Detail Profil</a>  
                <a  href="<?php echo base_url().'penggunabarang/user_edit/'.$u->id_user; ?>" class="btn btn-primary">Edit</a> 
                </div>
                  </div>
              <td><?php echo $u->nama; ?></td>
              <td><?php echo $u->username; ?></td>
              <td><?php echo $u->nama_user_grup; ?></td>
              <td><?php echo date('D, d-M-Y', $u->date_created);?></td>
              <?php } ?>
            </tr>
            <?php 
          }
          ?>
        </tbody> 
            </table>
          </div>
        </div>
      </div>
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
<?php $this->load->view("pengguna_barang/_partials/js.php") ?>
    
</body>
</html>