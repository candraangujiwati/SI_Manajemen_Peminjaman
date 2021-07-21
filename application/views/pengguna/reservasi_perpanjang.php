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
            <i class="fas fa-file-contract"></i>
            Perpanjangan Pinjam</div>
          <div class="card-body">
                    <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
                    <?php echo form_open_multipart('pengguna/new_reservasi_perpanjang_simpan/','class="form-horizontal"'); ?>
                    <div class="form-body">

                        <input type="hidden" name="id_peminjaman" value="<?php echo $id_peminjaman;?>">
                        <input type="hidden" name="id_ruang" value="<?php echo $id_ruang;?>">
                      <!--  <input type="hidden" name="status_ruang" value="<?php echo $status_ruang; ?>">
              -->
                        <h3 class="form-section"></h3>
                      <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label col-md-6">Tanggal Perpanjangan<sup style="color:red">*</sup></label>
                            <div class="col-md-9">
                              <div class="input-group col-md-12"><span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                  <input class="form-control" type="date" name="tgl_selesai" placeholder="Tanggal Perpanjangan" id="dateControl" value="<?php echo $tgl_selesai;?>">
                               </div>                          
                            </div>
                          </div>
                          </div>
                     <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-4">Tanggal Pinjam</label>
                              <div class="col-md-9">
                              <div class="input-group col-md-12"> <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                              <input class="form-control" type="date" name="tgl_pinjam" placeholder="Tanggal Perpanjangan" id="dateControl" value="<?php echo $tgl_pinjam;?>" readonly>
                                    </div>                          
                              </div>
                            </div>
                          </div>

                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Nama Ruang & Sesi<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                              <select data-placeholder="Select..." name="id_ruang" class="form-control select2me">
                                  <option value="">-Pilih Ruang Dan Sesi-</option>          
                                  <?php
                                  foreach ($ruang as $k) { 
                                    //if($k->status_ruang='0') {?>
                                   <option value="<?php echo $k->id_ruang;?>"><?php echo $k->nama_ruang;?> & <?php echo $k->waktu_sesi;?></option>
                                 <?php
                                  //}
                                }
                                  ?>
                                </select>
                                
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-4">Nama Kegiatan</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="nama_kegiatan" value="<?php echo $nama_kegiatan;?>" disabled>
                                
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
                              <label class="control-label col-md-6">No. Hp Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="no_hp_peminjam" value="<?php echo $no_hp_peminjam;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                        
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">E-Mail G-Mail Aktif Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="email" value="<?php echo $email;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-12">Surat Permohonan Pinjam (File .pdf ukuran max 500 Kb)<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                                <input type="file" class="form-control" name="surat" required>
                              </div>
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
                                <a href="<?php echo base_url().'pengguna/new_reservasi/'; ?>" class="btn btn-danger" value="Batal">Batal</a>
                              
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
<?php $this->load->view("admin/_partials/reservasi.php") ?>

</body>
</html>
