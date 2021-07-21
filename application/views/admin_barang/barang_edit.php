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
            <i class="fas fa-edit"></i>
            Edit Data Barang</div>

          <div class="card-body">
            <div class="table-responsive">
               <?php foreach($barang as $k){ ?>
              <form method="post" action="<?php echo base_url().'adminbarang/barang_edit_aksi'; ?>" enctype="multipart/form-data">
                 
                    <div class="form-group">
                      <label class="control-label col-md-3">Jenis Barang<sup style="color:red">*</sup></label>
                      <div class="col-md-9">
                      <input type="hidden" value="<?php echo $k->id_barang; ?>" name="id_barang">
                      <select name="id_jenis_barang" class="form-control">
                        <option value="<?php echo $k->id_jenis_barang; ?>">Jenis Barang : <?php echo $k->jenis_barang ?></option>
                        <?php foreach ($jenis_barang as $kk) {?>
                          <option value="<?php echo $kk->id_jenis_barang; ?>"><?php echo $kk->jenis_barang ?></option>
                        <?php } ?>
                      </select>
                    </div>
                   
                  <div class="form-group">
                    <label class="control-label col-md-3">Kode Barang<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="kode_barang" value="<?php echo $k->kode_barang; ?>" readonly >
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Nama Barang<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" name="nama_barang" onkeypress="return event.charCode < 48 || event.charCode  >57" value="<?php echo $k->nama_barang; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Merk<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" name="merk" onkeypress="return event.charCode < 48 || event.charCode  >57" value="<?php echo $k->merk; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Jumlah<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="number" class="form-control" name="jumlah" onkeypress="return event.charCode >= 48 && event.charCode <=57" value="<?php echo $k->jumlah; ?>">
                        </div>
                  </div>
                  <div class="form-group">
                    <label class="control-label col-md-3">Keterangan<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <textarea type="textarea" id="summernote" rows="10" class="form-control" name="keterangan" value=""><?php echo $k->keterangan; ?></textarea>
                        </div>
                  </div>
                 <div class="form-group">
                    <label class="control-label col-md-12">Foto Barang (File .jpg/.png/.jpeg max 1.5 mb)<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                        <input type="file" class="form-control" name="foto_barang">
                        </div>
                  </div>


               
                  <div class="form-group">
                       <div class="col-md-9">
                            <input type="submit" class="btn btn-success " value="Simpan">
                            <a href="<?php echo base_url().'adminbarang/barang'; ?>" class="btn btn-danger" value="Batal">Batal</a>
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
    <?php $this->load->view("admin_barang/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin_barang/_partials/scrolltop.php") ?>
<?php $this->load->view("admin_barang/_partials/modal.php") ?>
<?php $this->load->view("admin_barang/_partials/js.php") ?>
<?php $this->load->view("admin_barang/_partials/summernote.php") ?>
 
</body>
</html>