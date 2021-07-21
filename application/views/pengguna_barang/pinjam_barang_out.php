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
    <?php $this->load->view("pengguna_barang/_partials/breadcrumb.php") ?>
    <!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-">
            <i class="fas fa-archive"></i>
            Proses Selesai Pinjam</div>
          <div class="card-body">
              <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
                <?php echo form_open_multipart('penggunabarang/new_pinjam_barang_out_simpan/','class="form-horizontal"'); ?>
                      <div class="form-body">
                         <!--<input type="hidden" name="waktu" value="<?php //echo $waktu;?>">-->
                        <input type="hidden" name="id_pinjam_barang" value="<?php echo $id_pinjam_barang;?>">
                       <!--<input type="hidden" name="judul_notif_barang" value="<?php e//cho $judul_notif_barang;?>">-->
                        <input type="hidden" name="jumlah" value="<?php echo $jumlah;?>">
                        <input type="hidden" name="jumlah_pinjam" value="<?php echo $jumlah_pinjam;?>">
                       
                        <input type="hidden" name="status_pinjam_barang" value="<?php echo $status_pinjam_barang;?>">
                        <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                        <input type="hidden" name="id_barang" value="<?php echo $id_barang;?>">
                        
                        <h3 class="form-section">Informasi</h3>
                        <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-10">Tanggal Pinjam</label>
                                <div class="col-md-9">
                                   <input class="form-control form-control-inline input-medium date-picker" name="tgl_pinjam_barang" id="tgl_pinjam_barang" size="16" type="date" value="<?php echo $tgl_pinjam_barang;?>" disabled/>
                                </div>
                              </div>
                            </div>
  
                            <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label col-md-10">Tanggal Pengembalian</label>
                              <div class="col-md-9">
                              <div class="input-group col-md-12">
                                   <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                 <input class="form-control" name="tgl_kembali_barang" placeholder="Tanggal Selesai" value="<?php echo $tgl_kembali_barang;?>"disabled>
                               </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Barang</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama_barang" value="<?php echo $nama_barang;?>" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-10">Jumlah Barang Pinjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="jumlah_pinjam" value="<?php echo $jumlah_pinjam;?>" disabled>
                              </div>
                            </div>
                          </div>

                        </div>

                        <div class="row">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-10">Keperluan</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="keperluan" value="<?php echo $keperluan;?>" disabled>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-10">Nama Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="nama" value="<?php echo $nama;?>" disabled>
                              </div>
                            </div>
                          </div>

                         
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-10">No. HP Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="no_hp_peminjam_barang" value="<?php echo $no_hp_peminjam_barang;?>" disabled>
                             </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-10">E-Mail G-Mail Aktif Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="email_peminjam_barang" value="<?php echo $email_peminjam_barang;?>" disabled>
                              </div>
                            </div>
                          </div>
                        
                        </div> 
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-10">Surat Permohonan Pinjam</label>
                              <div class="col-md-9">
                              <input type="text" class="form-control" placeholder="" name="surat_pinjam_barang" value="<?php echo $surat_pinjam_barang;?>" disabled>
                              <?php if($surat_pinjam_barang == '') {
                                } else { 
                              echo "<a href='".base_url()."adminbarang/file/$surat_pinjam_barang'>Download Surat</a>"; 
                                }?>
                                </div>
                            </div>
                        </div>
                        </div>                      
                    </div>
                     <hr>
                        <h3 class="form-section">Update Kondisi Barang</h3>
                        <div class="card-body">
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="control-label col-md-10">Kondisi Barang<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                              <textarea name="kondisi_barang" rows="10" id="summernote"></textarea>
                              </div>
                            </div>
                          </div>
                      </div>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn btn-success">Selesai</button>
                                <a href="<?php echo base_url().'penggunabarang/new_pinjam_barang/'; ?>" class="btn btn-danger" value="Batal">Batal</a>
                              
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

</body>
</html>