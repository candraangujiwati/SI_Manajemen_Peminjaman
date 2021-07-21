<!DOCTYPE html>
<html>
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
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-search"></i>
           Laporan Peminjaman</div>
           
          <div class="card-body">
            <div class="table-responsive">
            <form method="get" action="<?php echo base_url('admin/filter') ?>"> 
          
              <div class="col-sm-6 col-md-4">
              <div class="form-group">                        
              <label class="control-label col-md-9">Cari</label>                        
              <div class="col-md-9">
              <div class="input-group col-md-12">                            
                <input type="text" name="tgl_awal" value="<?= @$_GET['tgl_awal'] ?>" 
                class="form-control tgl_awal" placeholder="Tgl Awal" autocomplete="off">                            
                <span class="input-group-addon">s/d</span>                            
                <input type="text" name="tgl_akhir" value="<?= @$_GET['tgl_akhir'] ?>" 
                class="form-control tgl_akhir" placeholder="Tgl Akhir" autocomplete="off">                       
              </div>                    
            </div>                
          </div>            
        </div>  
        <div class="form-group">
                       <div class="col-md-9">        
           <button type="submit" name="filter" value="true" class="btn btn-primary">TAMPILKAN</button>
</div>
</div>
       
        
                           <?php            
        if(isset($_GET['filter'])) // Jika user mengisi filter tanggal, maka munculkan tombol untuk reset filter                
        echo '<a href="'.base_url('admin/filter').'" class="btn btn-default">RESET</a>';?>        
       
                    </div>
              </form>

        <!--Munculkan data-->
                <hr />        
                <h4 style="margin-bottom: 5px;">
                <b>Data Peminjaman Ruang</b></h4>       
                 <?php echo $label ?><br />        
                 <div style="margin-top: 5px;">            
                 <a href="<?php echo $url_cetak ?>">CETAK PDF</a>        
                </div>        
                <div class="table-responsive" style="margin-top: 10px;">            
                <table class="table table-bordered">               
                <thead>                    
                  <tr>
                  <th>ID Pinjam</th>                       
            <th>Tanggal Pinjam</th>
            <th>Tanggal Selesai</th>
            <th>Waktu Sesi</th>
            <th>Nama Ruang</th>
            <th>Kegiatan</th>
            <th>NIP</th>
            <th>Nama Lengkap</th>
            <th>Asal OPD</th>
            <th>No. Hp</th>
            <th>E-mail Aktif</th>
            <th>Tanggal Data Ditambah / Diedit</th>                
                  </tr>                
                </thead>                
                <tbody>                    
                  <?php                    
                  if(empty($peminjaman)){ // Jika data tidak ada                       
                   echo "<tr><td colspan='9'>Data tidak ada</td></tr>";                  
                     }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)     
                         foreach($peminjaman as $data){ // Looping hasil data transaksi 
                          $tgl_pinjam = date('Y-m-d', strtotime($data->tgl_pinjam)); // Ubah format tanggal jadi dd-mm-yyyy
                            echo "<tr>";                           
                            echo "<td>".$data->id_peminjaman."</td>";  
                            echo "<td>".$tgl_pinjam."</td>";                            
                            echo "<td>".$data->tgl_selesai."</td>"; 
                            echo "<td>".$data->waktu_sesi."</td>";                           
                            echo "<td>".$data->nama_ruang."</td>";  
                            echo "<td>".$data->nama_kegiatan."</td>";  
                            echo "<td>".$data->nip."</td>";
                            echo "<td>".$data->nama."</td>"; 
                            echo "<td>".$data->nama_opd."</td>"; 
                            echo "<td>".$data->no_hp_peminjam."</td>";   
                            echo "<td>".$data->email."</td>";
                            echo "<td>".date('D, d-M-Y', $data->tanggal_dibuat)."</td>";                         
                            echo "</tr>";                        
                            }                    
                            }                    
                            ?>                
                            </tbody>            
                          </table>        
                        </div>    
                      </div>
                    
                      
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
<?php $this->load->view("admin_barang/_partials/filter.php") ?>
<?php //$this->load->view("admin_barang/_partials/js.php") ?>

<?php //$this->load->view("admin_barang/_partials/custom.js") ?>
    
</body>
</html>