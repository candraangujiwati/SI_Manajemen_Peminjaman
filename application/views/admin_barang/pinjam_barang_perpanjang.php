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
    <!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-">
            <i class="fas fa-table"></i>
            Perpanjangan Pinjam Barang</div>
          <div class="card-body">
               <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
                      <?php echo form_open_multipart('adminbarang/new_pinjam_barang_perpanjang_simpan/','class="form-horizontal"'); ?>
                      <div class="form-body">
                          <input type="hidden" name="id_pinjam_barang" value="<?php echo $id_pinjam_barang;?>">
                          <input type="hidden" name="id_barang" value="<?php echo $id_barang;?>">
                        <h3 class="form-section"></h3>
                     
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-9">Tanggal Perpanjangan<sup style="color:red">*</sup></label>
                            <div class="col-md-9">
                              <div class="input-group col-md-12"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                  <input class="form-control" type="date" name="tgl_kembali_barang" placeholder="Tanggal Perpanjangan" id="dateControl" value="<?php echo $tgl_kembali_barang;?>">
                               </div>                          
                            </div>
                          </div>
                          </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-9">Tanggal Pinjam</label>
                              <div class="col-md-9">
                              <div class="input-group col-md-12"> <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                              <input class="form-control" type="date" name="tgl_pinjam_barang" placeholder="Tanggal Perpanjangan" id="dateControl" value="<?php echo $tgl_pinjam_barang;?>" readonly>
                                    </div>                          
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-9">Barang</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="nama_barang" value="<?php echo $nama_barang;?>" disabled>
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-9">Jumlah Pinjam</label>
                              <div class="col-md-9">
                              <input type="number" class="form-control" placeholder="" name="jumlah_pinjam" value="<?php echo $jumlah_pinjam;?>" disabled>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-9">Keperluan<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Masukkan Tujuan Pinjam Barang" name="keperluan" onkeypress="return event.charCode < 48 || event.charCode  >57" autocomplete="on">
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-9">NIP - Nama Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="nama" value="<?php echo $nip;?> - <?php echo $nama;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">E-Mail G-Mail Aktif Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="email_peminjam_barang" value="<?php echo $email_peminjam_barang;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Surat Permohonan</label>
                              <div class="col-md-9">
                                <input type="file" class="form-control" name="surat_pinjam_barang" value="<?php //echo $surat_pinjam_barang;?>">
                              </div>
                            </div>
                        </div>
                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-success">Perpanjang</button>
                                <a href="<?php echo base_url().'adminbarang/new_pinjam_barang/'; ?>" class="btn btn-danger" value="Batal">Batal</a>
                              
                                </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                          </div>
                        </div>
                      </div>
                    <?php echo form_close();?>  
                    

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
<?php $this->load->view("admin_barang/_partials/reservasi.php") ?>


</body>
</html>