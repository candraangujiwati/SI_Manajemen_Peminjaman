<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">

  <?php $this->load->view("admin_barang/_partials/head.php") ?>
</head>
<body id="page-top">
<!-- Loading Page -->
<?php $this->load->view("admin_barang/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("admin_barang/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("admin_barang/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">

    <?php $this->load->view("admin_barang/_partials/breadcrumb.php") ?>
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-plus"></i>
            Tambah Akun</div>

          <div class="card-body">
            <div class="table-responsive">
              <form method="post" action="<?php echo base_url().'adminbarang/user_tambah_aksi'; ?>">
               
                  <div class="col-lg-7 col-sm-8 ">
                  
                  <div class="form-group">
                      <label class="col-lg-12">User Grup<sup style="color:red">*</sup> </label>
                      <div class="col-md-9">
                      <select name="id_user_grup" class="form-control">
                        <option value="id_user_grup">-Pilih User Grup-</option>
                        <?php foreach ($user_grup as $u) {?>
                          <option value="<?php echo $u->id_user_grup; ?>"><?php echo $u->nama_user_grup ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div> 
                   <div class="form-group">
                      <label class="col-lg-12">Asal OPD<sup style="color:red">*</sup></label>
                      <div class="col-md-9">
                      <select name="id_opd" class="form-control">
                        <option value="id_opd">-Pilih OPD-</option>
                        <?php foreach ($opd as $u) {?>
                          <option value="<?php echo $u->id_opd; ?>"><?php echo $u->nama_opd ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-12">Nama Lengkap<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Masukkan Nama Lengkap" name="nama" onkeypress="return event.charCode < 48 || event.charCode  >57"> 
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-12">NIP<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Masukkan NIP (Jika belum punya masukkan ID pegawai" name="nip" onkeypress="return event.charCode >= 48 && event.charCode <=57" > 
                        </div>
                  </div>
                  <div class="form-group">
                                                <label class="col-lg-12">Jenis Kelamin<sup style="color:red">*</sup></label>
                                                <div class="col-md-9">
                                                <select name="jk" class="form-control">
                                                 <option value="">-Pilih Jenis Kelamin-</option>
                                                 <option value="L">Laki-laki</option>
                                                 <option value="P">Perempuan</option>
                                                 </select>
                                            </div>  
                                            </div>         
                  <div class="form-group">
                    <label class="col-lg-12">Username<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Masukkan Username" name="username">
                        </div>
                  </div> 
                  <div class="form-group">
                    <label class="col-lg-12">Password<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="Password" class="form-control" placeholder="Masukkan Password" name="password">
                        </div>
              </div>
                   <div class="form-group">
                       <div class="col-md-9">
                            <input type="submit" class="btn btn-success " value="Simpan">
                            <a href="<?php echo base_url().'adminbarang/user'; ?>" class="btn btn-danger" value="Batal">Batal</a>
                    
                        </div>
                  </div>
                </div>

             
              </form>
        
            
          </div>
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