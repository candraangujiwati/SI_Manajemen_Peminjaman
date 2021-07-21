<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
</head>
<body id="page-top">
<?php $this->load->view("admin/_partials/navbar.php") ?>
<div id="wrapper">
  <?php $this->load->view("admin/_partials/sidebar.php") ?>
  <div id="content-wrapper">
    <div class="container-fluid">
    <?php $this->load->view("admin/_partials/breadcrumb.php") ?>
<!-- Area Chart Example-->
    <div class="card mb-3">
          <div class="card-header bg-">
           
            <i class="fas fa-table"></i>
            Proses Pinjam Selesai</div>
          
          <div class="card-body">
              
                    <?php if(validation_errors()) { ?>
                <div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php 
                } 
                ?>
                    
                      <?php echo form_open_multipart('admin/new_reservasi_perpanjang_simpan/','class="form-horizontal"'); ?>
                      <div class="form-body">

                        <input type="hidden" name="id_peminjaman" value="<?php echo $id_peminjaman;?>">
                        <input type="hidden" name="id_sesi" value="<?php echo $id_sesi;?>">
                        
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
                        <div claass="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Ruang</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="nama_ruang" value="<?php echo $nama_ruang;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-3">Sesi</label>
                              <div class="col-md-9">
                              <select data-placeholder="Select..." name="id_sesi" class="form-control select2me" required="required">
                                  <option value="id_sesi">Pilih Sesi</option>          
                                  <?php
                                  foreach ($sesi as $s) { ?>
                                  <option value="<?php echo $s->id_sesi;?>"><?php echo $s->waktu_sesi;?></option>
                                  <?php
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
                              <label class="control-label col-md-4">Nama Kegiatan</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="nama_kegiatan" value="<?php echo $nama_kegiatan;?>" disabled>
                                
                              </div>
                            </div>
                          </div>

                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Nama Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="name" value="<?php echo $nip;?> - <?php echo $nama;?> - <?php echo $nama_opd;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          
                        </div>
                        <div class="row">
                          
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">No. Hp Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="no_hp_peminjam" value="<?php echo $no_hp_peminjam;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">E-Mail G-Mail Aktif Peminjam</label>
                              <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="email" value="<?php echo $email;?>" disabled>
                                
                              </div>
                            </div>
                          </div>
                         
                          </div>
                        <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                              <label class="control-label col-md-6">Surat</label>
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
                                <button type="submit" class="btn btn-success">Perpanjang</button>
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