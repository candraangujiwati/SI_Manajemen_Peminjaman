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
            <i class="fas fa-edit"></i>
            Edit Sesi</div>

          <div class="card-body">
            <div class="table-responsive">
               <?php foreach($sesi as $kk){ ?>
              <form method="post" action="<?php echo base_url().'admin/sesi_edit_aksi'; ?>">
                  <div class="form-group">
                    <label class="control-label col-md-3">Waktu Sesi<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="hidden" value="<?php echo $kk->id_sesi; ?>" name="id_sesi">
                            <input type="text" class="timepicker" name="waktu_sesi[]" value="<?php echo $kk->waktu_sesi; ?>"> -
                                 <input type="text" class="timepicker" name="waktu_sesi[]" value="<?php echo $kk->waktu_sesi; ?>">
                        </div>
                   
                  <div class="form-group">
                       <div class="col-md-9">
                            <input type="submit" class="btn btn-success " value="Simpan">
                            <a href="<?php echo base_url().'admin/sesi'; ?>" class="btn btn-danger" value="Batal">Batal</a>
                        
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
    <?php $this->load->view("admin/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
<?php $this->load->view("admin/_partials/time.php") ?>    
</body>
</html>