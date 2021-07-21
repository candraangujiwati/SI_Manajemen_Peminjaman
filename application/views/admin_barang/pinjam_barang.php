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
            Data Peminjaman</div>
            <br>
             <?php 
                          if($this->session->flashdata('in')){
                            echo "<div class='alert alert-success'>
                                           <span>Peminjaman SUKSES </span>  
                                        </div>";
                          }
                          else if($this->session->flashdata('out')){

                            echo "<div class='alert alert-success'>
                                           <span>Selesai Pinjam</span>  
                                        </div>";
                          }
                          else if($this->session->flashdata('berhasil')){

                            echo "<div class='alert alert-success'>
                                           <span>Pengajuan Pemesanan Baru Sukses</span>  
                                        </div>";
                          }
                          else if($this->session->flashdata('perpanjang')){
                            echo "<div class='alert alert-success'>
                                           <span>Perpanjang Pinjam Sukses</span>  
                                        </div>";
                          }
                          else if($this->session->flashdata('sinkron')){
                             echo "<div class='alert alert-info'>
                                           <span>Data Berhasil Disinkronisasi!</span>  
                                        </div>";
                          }
                          else if($this->session->flashdata('hapus')){
                            echo "<div class='alert alert-primary'>
                                           <span>Pemesanan Ditolak</span>  
                                        </div>";
                          }   
                          else if($this->session->flashdata('sinkrontakrubah')){
                            echo "<div class='alert alert-primary'>
                                           <span>Data Berhasil Disinkronisasi! (Tak ada yang berubah)</span>  
                                        </div>";
                          }     
              ?>
          <div class="card-body">
            <div class="table-responsive">
             <h5><sup style="color:red">*</sup>Informasi :</h5>
          <h6>Jika Belum Upload Surat Permohonan Pinjam Barang > 2 Hari. Pengajuan Otomatis Terhapus. </h6>
          <h6>Barang Tidak Bisa Diperpanjang Pinjam, Dikarenakan Barang Tidak Tersedia.</h6>
               <a class="btn btn-primary " href="sinkronisasi">Sinkronkan Data <i class="fa fa-spinner"></i></a><br>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
          <th width="1%">No</th>
        
            <th width="1%">ID Pinjam</th>
            <th width="13%">Tanggal Pinjam</th>
            <th width="13%">Tanggal Kembali</th>
            <th width="13%">Nama Barang</th>
            <th width="13%">Jumlah Pinjam</th>
            <th width="13%">NIP</th>
            <th width="13%">Nama</th>
            <th width="13%">Tanggal Data Ditambah / Diedit</th>
            <th width="30%" >Aksi</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($pinjam_barang as $r){
            //foreach ($opd as $key => $value) {
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
             
              <td><?php echo $r->id_pinjam_barang; ?></td>
              <td><?php echo $r->tgl_pinjam_barang; ?></td>
              <td><?php echo $r->tgl_kembali_barang; ?></td>
             
              <td><?php echo $r->nama_barang; ?></td>
              <td><?php echo $r->jumlah_pinjam; ?></td>
              <td><?php echo $r->nip; ?></td>
              <td><?php echo $r->nama; ?></td>
              <!--<td>
              <?php// echo "<a href='".base_url()."admin/file/$r->surat'>Download</a>"; ?>
                <!--<a  class="btn btn-success" href="<?php //echo base_url().'admin/file/'.$r->surat?>"><i class="fa fa-file-download"></i></a>
              </td>-->
              <td><?php echo date('D, d-M-Y', $r->tanggal_buat_pinjam_barang);?></td>
              <td>
                <?php
                        if ($r->status_pinjam_barang == 0) { ?>
                        <a  class="btn btn-info" href="<?php echo base_url().'adminbarang/new_pinjam_barang_detail/'.$r->id_pinjam_barang?>">Detail</a> 
                        <?php
                        }
                       
                        if ($r->status_pinjam_barang == 1 && $r->tgl_kembali_barang < date('Y-m-d') && $r->jumlah <= $r->jumlah_pinjam) { ?>
                            <span class="badge badge-success">Disetujui</span>
                           <a  class="btn btn-info" href="<?php echo base_url().'adminbarang/new_pinjam_barang_detailforkembali/'.$r->id_pinjam_barang?>">Detail</a> 
                           <span class="badge badge-danger">Pengembalian Sudah Lewat</span>
                           <span  class="badge badge-warning">Barang Tidak Bisa Diperpanjang Pinjam</span>
                            <?php }
                            else if ($r->status_pinjam_barang == 1 && $r->tgl_kembali_barang < date('Y-m-d') && $r->jumlah > $r->jumlah_pinjam) { ?>
                               <span class="badge badge-success">Disetujui</span>
                              <span class="badge badge-danger">Pengembalian Sudah Lewat</span>
                              <a  class="btn btn-secondary" href="<?php echo base_url().'adminbarang/new_pinjam_barang_out/'.$r->id_pinjam_barang?>/2">Kembalikan Barang</a> 
                            <!--<a  class="btn btn-success" href="<?php echo base_url().'adminbarang/new_pinjam_barang_perpanjang/'.$r->id_pinjam_barang?>">Perpanjang Pinjam</a>-->
                            <?php } 
                            else if ($r->status_pinjam_barang == 1 && $r->tgl_kembali_barang == date('Y-m-d') && $r->jumlah > $r->jumlah_pinjam) { ?>
                              <span class="badge badge-success">Disetujui</span>
                             <span class="badge badge-danger">Pengembalian Hari Ini</span>
                             <a  class="btn btn-secondary" href="<?php echo base_url().'adminbarang/new_pinjam_barang_out/'.$r->id_pinjam_barang?>/2">Kembalikan Barang</a> 
                            <?php } 
                             else if($r->status_pinjam_barang == 1 && $r->tgl_kembali_barang == date('Y-m-d') && $r->jumlah <= $r->jumlah_pinjam) { ?>
                              <span class="badge badge-success">Disetujui</span>
                              <a  class="btn btn-secondary" href="<?php echo base_url().'adminbarang/new_pinjam_barang_out/'.$r->id_pinjam_barang?>/2">Kembalikan Barang</a> 
                              <span  class="badge badge-warning">Barang Tidak Bisa Diperpanjang Pinjam</span>
                              <?php }

                        
                            else if ($r->status_pinjam_barang == 1 && $r->tgl_kembali_barang > date('Y-m-d') && $r->jumlah > $r->jumlah_pinjam) { ?>
                               <span class="badge badge-success">Disetujui</span>
                              <a  class="btn btn-secondary" href="<?php echo base_url().'adminbarang/new_pinjam_barang_out/'.$r->id_pinjam_barang?>/2">Kembalikan Barang</a> 
                              <!--<a  class="btn btn-success" href="<?php echo base_url().'adminbarang/new_pinjam_barang_perpanjang/'.$r->id_pinjam_barang?>">Perpanjang Pinjam</a>-->
                         <?php }
                            else if($r->status_pinjam_barang == 1 && $r->tgl_kembali_barang > date('Y-m-d') && $r->jumlah <= $r->jumlah_pinjam) { ?>
                              <span class="badge badge-success">Disetujui</span>
                              <a  class="btn btn-secondary" href="<?php echo base_url().'adminbarang/new_pinjam_barang_out/'.$r->id_pinjam_barang?>/2">Kembalikan Barang</a> 
                              <span  class="badge badge-warning">Barang Tidak Bisa Diperpanjang Pinjam</span>
                              <?php }
                       if ($r->status_pinjam_barang == 2) { ?>
                          <span class="badge badge-primary">Pinjam Selesai</span>
                        <?php
                        }
                        
                      if ($r->status_pinjam_barang == 3) { ?>
                          <span class="badge badge-danger">Ditolak</span>
                        <?php
                        }
                      
                        ?>
              </td>
          
            </tr>
            <?php 
          }
          ?>
        </tbody> 
            </table>
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
    
</body>
</html>