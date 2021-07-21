<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">
  <?php $this->load->view("pengguna/_partials/head.php") ?>
</head>
<body id="page-top">
 <!-- Loading Page -->
 <?php $this->load->view("pengguna/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("pengguna/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("pengguna/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

    <?php $this->load->view("pengguna/_partials/breadcrumb.php") ?>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-edit"></i>
           Edit Akun</div>

          <div class="card-body">
            <div class="table-responsive">
               <?php foreach($user as $u){ ?>
              <form method="post" action="<?php echo base_url().'pengguna/user_edit_aksi'; ?>">
              <div class="form-group">
                      <label class="control-label col-md-3">User Grup<sup style="color:red">*</sup></label>
                      <div class="col-md-9">
                      <input type="hidden" value="<?php echo $u->id_user; ?>" name="id_user">
                      <select name="id_user_grup" class="form-control" disabled>
                        <option value="<?php echo $u->id_user_grup; ?>" > User Grup : <?php echo $u->nama_user_grup ?></option>
                        <?php foreach ($user_grup as $ug) {?>
                          <option value="<?php echo $ug->id_user_grup; ?>"><?php echo $ug->nama_user_grup ?></option>
                        <?php } ?> 
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">OPD<sup style="color:red">*</sup></label>
                      <div class="col-md-9">
                      <input type="hidden" value="<?php echo $u->id_user; ?>" name="id_user">
                      <select name="id_opd" class="form-control">
                        <option value="<?php echo $u->id_opd; ?>"> OPD : <?php echo $u->nama_opd ?></option>
                        <?php foreach ($opd as $ug) {?>
                          <option value="<?php echo $ug->id_opd; ?>"><?php echo $ug->nama_opd ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3">Nama Lengkap<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="hidden" value="<?php echo $u->id_user; ?>" name="id_user">
                            <input type="text" class="form-control" placeholder="" name="nama" value="<?php echo $u->nama; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">NIP<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="hidden" value="<?php echo $u->id_user; ?>" name="id_user">
                            <input type="text" class="form-control" onkeypress="return event.charCode >= 48 && event.charCode <=57" name="nip" value="<?php echo $u->nip; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                      <label class="control-label col-md-3">Jenis Kelamin<sup style="color:red">*</sup></label>
                      <div class="col-md-9">
                      <input type="hidden" value="<?php echo $u->id_user; ?>" name="id_user">
                      <select name="jk" class="form-control">
                      <option value="<?php echo $u->jk;?>">Jenis Kelamin : <?php echo $u->jk ?></option>
                                                 <option value="L">Laki-laki</option>
                                                 <option value="P">Perempuan</option>
                      </select>
                    </div>
                  </div>
                 
                  <div class="form-group">
                    <label class="control-label col-md-3">Username<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="username" value="<?php echo $u->username; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Password<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="password" class="form-control" placeholder="" name="password" required>
                        </div>
                  </div>

                  <div class="form-group">
                       <div class="col-md-9">
                            <input type="submit" class="btn btn-success " value="Simpan">
                            <a href="<?php echo base_url().'pengguna/user'; ?>" class="btn btn-danger" value="Batal">Batal</a>
                    
                        </div>
                  </div>
                </form>
              <?php } ?>
        
            
          </div>
        </div>
        
      </div>

   </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("pengguna/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("pengguna/_partials/scrolltop.php") ?>
<?php $this->load->view("pengguna/_partials/modal.php") ?>
<?php $this->load->view("pengguna/_partials/js.php") ?>
    
</body>
</html>