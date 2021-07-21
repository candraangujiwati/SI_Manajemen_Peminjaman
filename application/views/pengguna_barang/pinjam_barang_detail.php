<!DOCTYPE html>
<html lang="en">
<head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">
  <?php $this->load->view("pengguna_barang/_partials/head.php") ?>
</head>
<body id="page-top">
 <!-- Loading Page -->
 <?php $this->load->view("pengguna_barang/_partials/loader.php") ?>
<body onload="myFunction()" style="margin:0;">
<div id="loader"></div>
<div style="display:none;" id="myDiv" class="animate-bottom">

<?php $this->load->view("pengguna_barang/_partials/navbar.php") ?>

<div id="wrapper">

  <?php $this->load->view("pengguna_barang/_partials/sidebar.php") ?>

  <div id="content-wrapper">

    <div class="container-fluid">
    <?php $this->load->view("admin_barang/_partials/breadcrumb.php") ?>
    <!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-">
            <i class="fas fa-info-circle"></i>
            Detail Pinjam Barang</div>
          <div class="card-body">
               <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
                      <?php echo form_open_multipart('penggunabarang/new_pinjam_barang_in/'.$id_pinjam_barang.''); ?>
                      <div class="form-body">
                      
                        <h3 class="form-section"></h3>
                     
                      <div class="row">
                      <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-9">Tanggal Pinjam</label>
                              <div class="col-md-9">
                              <div class="input-group col-md-12"> <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                              <input class="form-control" type="date" name="tgl_pinjam_barang"  id="dateControl" value="<?php echo $tgl_pinjam_barang;?>" readonly>
                                    </div>                          
                              </div>
                            </div>
                          </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-9">Tanggal Pengembalian<sup style="color:red">*</sup></label>
                            <div class="col-md-9">
                              <div class="input-group col-md-12"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                  <input class="form-control" type="date" name="tgl_kembali_barang"  id="dateControl" value="<?php echo $tgl_kembali_barang;?>" readonly>
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
                                <input type="text" class="form-control" name="keperluan" value="<?php echo $keperluan;?>" disabled>
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-9">NIP - Nama Peminjam - OPD</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="nama" value="<?php echo $nama;?> - <?php echo $nip;?> - <?php echo $nama_opd;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">No. HP</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="no_hp_peminjam_barang" value="<?php echo $no_hp_peminjam_barang;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                    
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">E-Mail G-Mail Aktif Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="email_peminjam_barang" value="<?php echo $email_peminjam_barang;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          </div>
                          <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Surat Permohonan</label>
                              <div class="col-md-9">
                              <input type="text" class="form-control" placeholder="" name="surat_pinjam_barang" value="<?php echo $surat_pinjam_barang;?>" disabled>
                              <?php if($surat_pinjam_barang == '') {
                                } else { 
                              echo "<a href='".base_url()."penggunabarang/file/$surat_pinjam_barang'>Download Surat</a>"; 
                                }?>
                                </div>
                            </div>
                        </div>
                      </div>
                      <hr>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9">
                           
                              <a href="<?php echo base_url().'penggunabarang/new_pinjam_barang/'; ?>" class="btn btn-primary" value="Batal">Kembali</a>
                               
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
    <?php $this->load->view("pengguna_barang/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("pengguna_barang/_partials/scrolltop.php") ?>
<?php $this->load->view("pengguna_barang/_partials/modal.php") ?>
<?php $this->load->view("pengguna_barang/_partials/js.php") ?>
<?php $this->load->view("pengguna_barang/_partials/reservasi.php") ?>


</body>
</html>