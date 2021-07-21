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
    <div class="card mb-3">
          <div class="card-header bg-">
            <i class="fas fa-plus"></i>
            Tambah Peminjaman Barang Baru</div>
            <div class="card-body">
                  
                    <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
                    
                      <?php echo form_open_multipart('adminbarang/new_pinjam_barang_simpan/','class="form-horizontal"'); ?>
                      <div class="form-body">
                     <h3 class="form-section"></h3>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label col-md-4">Tanggal Pinjam<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                              <div class="input-group col-md-12">
                                   <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                  <input class="form-control" type="date" name="tgl_pinjam_barang" placeholder="Tanggal Pinjam" id="dateControl">
                                  </div>                          
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label col-md-10">Tanggal Kembali Barang<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                              <div class="input-group col-md-12">
                                   <span class="input-group-addon"><span class="fa fa-calendar"></span></span>
                                 <input class="form-control" type="date" name="tgl_kembali_barang" placeholder="Tanggal Selesai" id="dateControl2">
                               </div>
                              </div>
                            </div>
                          </div>
                          
                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Barang<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                                <select data-placeholder="-Pilih Barang-" name="id_barang" class="form-control select2me">
                                  <option value="">-Pilih Barang-</option>          
                                  <?php
                                  foreach ($barang as $k) { 
                                   if($k->jumlah == '0')
                                      { ?>
                                   <option value="<?php echo $k->id_barang;?>">Kosong</option>
                                 <?php
                                  } else if ($k->jumlah > '0') {
                                  ?>
                                   <option value="<?php echo $k->id_barang;?>"><?php echo $k->nama_barang;?> - <?php echo $k->merk;?></option>
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
                                 <label class="control-label col-md-9">Jumlah Pinjam<sup style="color:red">*</sup></label>
                                <div class="col-md-9">
                                <?php foreach ($pinjam_barang as $k) { 
                                   if($this->input->post('jumlah_pinjam') < $k->jumlah)
                                      { ?>
                                    <input type="number" class="form-control" placeholder="Masukkan Jumlah Pinjam" name="jumlah_pinjam" onkeypress="return event.charCode >= 48 && event.charCode <=57">
                               <?php } else if ($this->input->post('jumlah_pinjam') > $k->jumlah)
                               {
                               ?>
                                  <input type="number" class="form-control" placeholder="Masukkan Jumlah Pinjam" name="jumlah_pinjam" onkeypress="return event.charCode >= 48 && event.charCode <=57" disabled>
                               <?php }
                                }?>
                                </div>
                          </div>
                          </div>
                        </div>
             
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Keperluan<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Masukkan Tujuan Pinjam Barang" name="keperluan" onkeypress="return event.charCode < 48 || event.charCode  >57" autocomplete="on">
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Nama Peminjam<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                              <!--<input type="text" id="autocomplete" class="form-control" placeholder="" name="nama" onkeypress="return event.charCode < 48 || event.charCode  >57">-->
                              <select data-placeholder="-Pilih Sesuai Nama Akun Anda-" name="id_user" class="form-control select2me">
                                  <option value="">-Pilih Sesuai Nama Akun Anda-</option>          
                                  <?php
                                  foreach ($user as $k) { 
                                    if($this->session->userdata('nama')==$k->nama)
                                    {?>
                                   <option value="<?php echo $k->id_user;?>"><?php echo $k->nip;?> - <?php echo $k->nama;?> - <?php echo $k->nama_opd;?></option>
                                 <?php
                                  }
                                }
                                  ?>
                                </select>
                              </div>
                            </div>
                            </div>
                       
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">No. HP Peminjam<sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Masukkan No. HP Aktif" name="no_hp_peminjam_barang" onkeypress="return event.charCode >= 48 && event.charCode <=57" autocomplete="on">
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-10">E-Mail G-Mail Aktif Peminjam <sup style="color:red">*</sup></label>
                              <div class="col-md-9">
                                <input type="email" class="form-control" placeholder="Masukkan E-mail G-mail Aktif" name="email_peminjam_barang" autocomplete="on">
                                
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Surat Permohonan Pinjam</label>
                              <div class="col-md-9">
                                <input type="file" class="form-control" name="surat_pinjam_barang">
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
<?php //$this->load->view("admin_barang/_partials/autocomplete.php") ?>

</body>
</html>