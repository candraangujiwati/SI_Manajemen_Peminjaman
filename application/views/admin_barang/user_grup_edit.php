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
            User Grup Edit / Role User</div>

          <div class="card-body">
            <div class="table-responsive">
               <?php foreach($user_grup as $ug){ ?>
              <form method="post" action="<?php echo base_url().'adminbarang/user_grup_edit_aksi'; ?>">
                  <div class="form-group">
                    <label class="control-label col-md-3">User Grup<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="hidden" value="<?php echo $ug->id_user_grup; ?>" name="id_user_grup">
                            <input type="text" class="form-control" placeholder="" name="nama_user_grup" value="<?php echo $ug->nama_user_grup; ?> "onkeypress="return event.charCode < 48 || event.charCode  >57">
                        </div>
                  </div>
                  <div class="form-group">
                       <div class="col-md-9">
                            <input type="submit" class="btn btn-success " value="Simpan">
                            <a href="<?php echo base_url().'adminbarang/user_grup'; ?>" class="btn btn-danger" value="Batal">Batal</a>
                    
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
    
</body>
</html>