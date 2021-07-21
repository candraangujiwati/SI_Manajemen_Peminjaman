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
    <div class="card mb-3">
          <div class="card-header bg-">
            <i class="fas fa-check"></i>
            Tambah Peminjaman Baru</div>
            <div class="card-body">
                  
                    <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
                      <?php echo form_open_multipart('pengguna/new_reservasi_simpan/','class="form-horizontal"'); ?>
                    <!-- <input class="form-control" type="hidden" name="id_peminjaman" value=<?php echo $id_peminjaman;?>>
              -->    
                      <div class="form-body">
                     <h3 class="form-section"></h3>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label col-md-4">Tanggal Pinjam<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                              <div class="input-group col-md-12">
                                   <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                  <input class="form-control" type="date" name="tgl_pinjam" placeholder="Tanggal Pinjam" id="dateControl">
                                  </div>                          
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label col-md-4">Tanggal Selesai<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                              <div class="input-group col-md-12">
                                   <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                 <input class="form-control" type="date" name="tgl_selesai" placeholder="Tanggal Selesai" id="dateControl2">
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
                              <label class="control-label col-md-6">Nama kegiatan<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Masukan Kegiatan" name="nama_kegiatan" onkeypress="return event.charCode < 48 || event.charCode  >57">
                                
                              </div>
                            </div>
                          </div>
                       
                        </div>
                        
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Nama Peminjam<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                              <select data-placeholder="Select..." name="id_user" class="form-control select2me" required="required">
                                  <option value="id_user">-Pilih Nama Akun Anda-</option>          
                                  <?php
                                  foreach ($user as $s) { 
                                    if($this->session->userdata('nama')==$s->nama) {
                                      ?>
                                  <option value="<?php echo $s->id_user;?>"><?php echo $s->nip;?> - <?php echo $s->nama;?> - <?php echo $s->nama_opd;?></option>
                                  <?php
                                  }
                                }
                                  ?>
                                </select>
                                
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">No. HP Peminjam<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Masukkan No. Hp Peminjam" name="no_hp_peminjam" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                                
                              </div>
                            </div>
                          </div>

                         
                                </div>
                       
                        <div class="row">
                        
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">E-Mail G-Mail Aktif<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                                <input type="email" class="form-control" placeholder="Masukkan E-mail G-mail Aktif Peminjam" name="email">
                                
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-12">Surat Permohonan Pinjam (File .pdf ukuran max 500 Kb)</label>
                              <div class="col-md-9">
                                <input type="file" class="form-control" name="surat">
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
                                <button type="submit" class="btn btn-success">Simpan</button>
                                <a href="<?php echo base_url().'admin/new_reservasi/'; ?>" class="btn btn-danger" value="Batal">Batal</a>
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
   </div> <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <?php $this->load->view("pengguna/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("pengguna/_partials/scrolltop.php") ?>
<?php $this->load->view("pengguna/_partials/modal.php") ?>
<?php $this->load->view("pengguna/_partials/js.php") ?>
<?php $this->load->view("pengguna/_partials/reservasi.php") ?>
<?php $this->load->view("admin/_partials/time.php") ?>

</body>
</html>