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
            Edit Ruang</div>

          <div class="card-body">
            <div class="table-responsive">
               <?php foreach($ruang as $k){ ?>
              <form method="post" action="<?php echo base_url().'admin/ruang_edit_aksi'; ?>" enctype="multipart/form-data">
              <div class="row">
              <div class="col-md-6">  
              <div class="form-group">
                      <label class="control-label col-md-6">Sesi</label>
                      <div class="col-md-9">
                      <input type="hidden" value="<?php echo $k->id_ruang; ?>" name="id_ruang">
                      <select name="id_sesi" class="form-control" readonly>
                        <option value="<?php echo $k->id_sesi; ?>"> Sesi : <?php echo $k->waktu_sesi ?></option>
                        <?php foreach ($sesi as $kk) {?>
                          <option value="<?php echo $kk['id_sesi']; ?>"><?php echo $kk['waktu_sesi'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    </div>
                        </div>
                  <div class="col-md-6">  
                  <div class="form-group">
                    <label class="control-label col-md-6">Nama Ruang<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="nama_ruang" value="<?php echo $k->nama_ruang; ?>" >
                        </div>
                  </div>
                        </div>
                </div>
              <div class="row">
              <div class="col-md-6">       
                  <div class="form-group">
                    <label class="control-label col-md-6">Kapasitas (orang)<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="kapasitas" value="<?php echo $k->kapasitas; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                        </div>
                  </div>
               </div>
                       
                 <div class="col-md-6">  
                  <div class="form-group">
                    <label class="control-label col-md-6">Area (meter)<sup>2</sup><sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="" name="area" value="<?php echo $k->area; ?>" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                        </div>
                  </div>
                        </div>
                        </div>
                        <div class="row">
              <div class="col-md-6">  
                  <div class="form-group">
                    <label class="control-label col-md-7">Gambar (File .jpg/.png/.jpeg max 1.5 mb)<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                        <input type="file" class="form-control" name="gambar">
                        </div>
                  </div>
                        </div>
                        </div>
                       
            

                  <div class="form-group">
                    <label class="control-label col-md-6">Fasilitas<sup style="color:red">*</sup></label>
                       <div class="col-md-7">
                            <textarea type="textarea" id="summernote" rows="10" class="form-control" name="fasilitas_ruang" value=""><?php echo $k->fasilitas_ruang; ?></textarea>
                        </div>
                  </div>
                        </div>
                     
                  <div class="form-group">
                       <div class="col-md-9">
                            <input type="submit" class="btn btn-success " value="Simpan">
                            <a href="<?php echo base_url().'admin/ruang'; ?>" class="btn btn-danger" value="Batal">Batal</a>
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
    
</body>
</html>