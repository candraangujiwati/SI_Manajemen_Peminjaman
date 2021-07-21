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
         
            <i class="fas fa-plus"></i>
            Tambah Ruang</div>
           
          <div class="card-body">
            <div class="table-responsive">
              <form method="post" action="<?php echo base_url().'admin/ruang_tambah_aksi'; ?>" enctype="multipart/form-data">
              <!--<input type="hidden" value='<?php //echo $id_ruang; ?>' name="id_ruang"></input>-->
                    
              <div class="row">
              <div class="col-md-6">   
              <div class="form-group">
                    <label class="control-label col-md-6">Nama Ruang<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="text" class="form-control" placeholder="Masukkan nama ruang" name="nama_ruang">
                        </div>
                  </div>
</div>
<div class="col-md-6">   
                  <div class="form-group">
                    <label class="control-label col-md-6">Kapasitas (orang)<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="number" class="form-control" placeholder="Masukkan kapasitas ruangan" name="kapasitas" min="1"  onkeypress="return event.charCode >= 48 && event.charCode <=57">
                        </div>
                  </div>
</div>
</div>
<div class="row">
              <div class="col-md-6">   
                  <div class="form-group">
                    <label class="control-label col-md-6">Area (meter)<sup>2</sup><sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                            <input type="number" class="form-control" placeholder="Masukkan luas area ruangan" name="area" min="1" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                        </div>
                  </div>
</div>
<div class="col-md-6">  

                  <div class="form-group">
                    <label class="control-label col-md-10">Gambar (File .jpg/.png/.jpeg max 1.5 mb)<sup style="color:red">*</sup></label>
                       <div class="col-md-9">
                        <input type="file" class="form-control" name="gambar">
                        </div>
                  </div>
                  </div>
</div>
<div class="row">

                

                  <div class="col-md-6">  
                  <div class="form-group">
                  <label class="control-label col-md-6">Pilih Sesi<sup style="color:red">*</sup></label>
                  <div class="col-md-9">
				    	<?php foreach($sesi as $s){ ?>
						    <input type="checkbox" name="sesi[]" value="<?php echo $s['id_sesi'];?>"> 
                <?php echo $s['waktu_sesi']; ?>
						<?php } ?>
              </div>
				    </div>
                    </div>
</div>
<div class="form-group">
                    <label class="control-label col-md-6">Fasilitas<sup style="color:red">*</sup></label>
                       <div class="col-md-7">
                            <textarea name="fasilitas_ruang" rows="10" id="summernote" ></textarea>

                        </div>
                  </div>
                  
                  <div class="form-group">
                       <div class="col-md-9">
                            <input type="submit" class="btn btn-success " value="Simpan">
                            <a href="<?php echo base_url().'admin/ruang'; ?>" class="btn btn-danger" value="Batal">Batal</a>
                        </div>
                    </div>
              </form>
        
            
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
<?php //$this->load->view("admin/_partials/ruang.php") ?>
    
</body>
</html>