<!DOCTYPE html>
<html lang="en">
<head>
  <?php $this->load->view("admin/_partials/head.php") ?>
  <link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">

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
            <i class="fas fa-table"></i>
            Peminjaman</div>
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
                            echo "<div class='alert alert-danger'>
                                           <span>Peminjaman Ditolak</span>  
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
          <h6>Jika Belum Upload Surat Permohonan Pinjam > 2 Hari. Pengajuan Otomatis Terhapus </h6>
          
               <a class="btn btn-primary " href="sinkronisasi">Sinkronkan Data <i class="fa fa-spinner"></i></a><br>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
          <th width="1%">No</th>
           
            <th width="1%">ID Pinjam</th>
            <th width="12%">Sesi</th>
            <th width="12%">Tanggal Pinjam</th>
            <th width="12%">Tanggal Selesai</th>
            <th width="12%">Ruang</th>
            <th width="13%">NIP</th>
            <th width="12%">Nama</th>
            <th width="12%">Tanggal Data dibuat</th>
            <th width="30%" >Aksi</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($peminjaman as $r){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $r->id_peminjaman; ?></td>
              <td><?php echo $r->waktu_sesi; ?></td>
              <td><?php echo $r->tgl_pinjam; ?></td>
              <td><?php echo $r->tgl_selesai; ?></td>
              <td><?php echo $r->nama_ruang; ?></td>
              <td><?php echo $r->nip; ?></td>
              <td><?php echo $r->nama; ?></td>
              <td><?php echo date('D, d-M-Y', $r->tanggal_dibuat);?></td>
              <td>
                <?php
                        if ($r->status_pinjam == 0) { ?>
                           <a  class="btn btn-info" href="<?php echo base_url().'admin/new_reservasi_detail/'.$r->id_peminjaman?>">Detail</a> 
                        <?php
                        }
                        else if ($r->status_pinjam == 1 && $r->tgl_selesai < date('Y-m-d')) { ?>
                           <a  class="btn btn-warning" href="<?php echo base_url().'admin/new_reservasi_out/'.$r->id_peminjaman?>/2">Kosongkan Ruang</a> 
                           <span class="badge badge-danger">Tanggal Selesai Sudah Lewat</span>
                        <?php
                        }else if(($r->status_pinjam == 1 && $r->tgl_selesai > date('Y-m-d'))){ ?>
                          <a  class="btn btn-warning" href="<?php echo base_url().'admin/new_reservasi_out/'.$r->id_peminjaman?>/2">Kosongkan Ruang</a> 
                         
                        <?php }
                          else if(($r->status_pinjam == 1 && $r->tgl_selesai == date('Y-m-d'))){ ?>
                              <a  class="btn btn-warning" href="<?php echo base_url().'admin/new_reservasi_out/'.$r->id_peminjaman?>/2">Kosongkan Ruang</a> 
                              <span class="badge badge-danger">Tanggal Selesai Hari Ini</span>
                       <?php }
                        if($r->status_pinjam == 2) { ?>
                          <span class="badge badge-info">Pinjam Selesai</span>
                        <?php
                        }
                      
                         if($r->status_pinjam == 3) { ?>
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
    <?php $this->load->view("admin/_partials/footer.php") ?>

  </div>
  <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php $this->load->view("admin/_partials/scrolltop.php") ?>
<?php $this->load->view("admin/_partials/modal.php") ?>
<?php $this->load->view("admin/_partials/js.php") ?>
    
</body>
</html>