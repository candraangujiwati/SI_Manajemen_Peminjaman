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
    <!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-">
            <i class="fas fa-info-circle"></i>
            Detail Pinjam Ruang</div>
          <div class="card-body">
               <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
                      <?php echo form_open_multipart('admin/new_reservasi_in/'.$id_peminjaman.''); ?>
                      <div class="form-body">
                      <h3 class="form-section"></h3>
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
                                <input class="form-control form-control-inline input-medium date-picker" id="tgl_selesai" size="16" type="date" name="tgl_selesai" placeholder="Tanggal Selesai" value="<?php echo $tgl_selesai;?>"disabled>
                                                            
                                </div>
                              </div>
                            </div>
                              
                          </div>

                          <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Nama Ruang & Sesi</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="id_ruang" value="<?php echo $nama_ruang;?> & <?php echo $waktu_sesi;?>" disabled>
                                
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
                              <label class="control-label col-md-6">Nama Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control"  name="nama_peminjam" value="<?php echo $nip;?> - <?php echo $nama;?>" disabled>
                                
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
                              <label class="control-label col-md-6">E-Mail Aktif G-mail Peminjam</label>
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
                      </div>
                         <hr>
                      <div class="form-actions">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9">
                           
                              <a href="<?php echo base_url().'admin/new_reservasi/'; ?>" class="btn btn-primary" value="Batal">Batal</a>
                               
                                <button type="submit" class="btn btn-success">Setujui</button>
                                <a  class="btn btn-danger" href="<?php echo base_url().'admin/reservasi_delete/'.$id_peminjaman?>" onclick="return confirm('Yakin Ingin Menolak Pengajuan Ini?')">Tolak</a> 
                                <!--<a href="<?php //echo base_url().'adminbarang/new_pinjam_barang/'; ?>" class="btn btn-danger" value="Batal">Batal</a>
                            -->
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
    <?php $this->load->view("admin/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
<?php $this->load->view("admin/_partials/reservasi.php") ?>


</body>
</html>