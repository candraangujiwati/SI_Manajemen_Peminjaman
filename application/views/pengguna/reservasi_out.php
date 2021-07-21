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
                    
                      <?php echo form_open_multipart('pengguna/new_reservasi_out_simpan/','class="form-horizontal"'); ?>
                      <div class="form-body">
                        <input type="hidden" name="id_peminjaman" value="<?php echo $id_peminjaman;?>">
                        <input type="hidden" name="status_pinjam" value="<?php echo $status_pinjam;?>">
                        <input type="hidden" name="id_ruang" value="<?php echo $id_ruang;?>">
                        <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                       
                       <h4 class="form-section">Informasi</h4>
                        <hr>
                        <div class="card-body">
                        <div class="row">
                          
                          <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-6">Tanggal Pinjam</label>
                                <div class="col-md-9">
                                   <input class="form-control form-control-inline input-medium date-picker" name="tgl_pinjam" id="tgl_pinjam" size="16" type="date" value="<?php echo $tgl_pinjam;?>" disabled/>
                                                                
                                </div>
                              </div>
                            </div>
  
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="control-label col-md-6">Tanggal Selesai</label>
                                <div class="col-md-9">
                                <input class="form-control" name="tgl_selesai" placeholder="Tanggal Selesai" value="<?php echo $tgl_selesai;?>"disabled>
                                                            
                                </div>
                              </div>
                            </div>
                              
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Nama Ruang & Waktu Sesi</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="nama_ruang" value="<?php echo $nama_ruang;?> & <?php echo $waktu_sesi;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Nama Kegiatan</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="nama_kegiatan" value="<?php echo $nama_kegiatan;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                     
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-9">NIP - Nama Peminjam - OPD</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="nama" value="<?php echo $nip;?> - <?php echo $nama;?> - <?php echo $nama_opd;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">No. Hp</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" name="no_hp_peminjam" value="<?php echo $no_hp_peminjam;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                        
                          </div>
                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-9">E-Mail G-mail Aktif Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="email" value="<?php echo $email;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-10">Surat Permohonan</label>
                              <div class="col-md-9">
                              <input type="text" class="form-control" placeholder="" name="surat" value="<?php echo $surat;?>" disabled>
                              <?php if($surat == '') {
                                } else { 
                              echo "<a href='".base_url()."admin/file/$surat'>Download Surat</a>"; 
                                }?>
                                </div>
                            </div>
                        </div>
                        </div>    
                              </div>            <hr>
                        <h4 class="form-section">Update Kondisi Ruangan</h4>
                     <div class="card-body">
                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Keterangan</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="keterangan" id="keterangan" value="" >
                             
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
                                <a href="<?php echo base_url().'pengguna/new_reservasi'; ?>" class="btn btn-danger" value="Batal">Batal</a>
                        
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
