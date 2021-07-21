<html><head>
<link rel="icon" type="image/png" sizes="32x32" href="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png">
  
        <title>Cetak PDF</title>  
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <!-- Bootstrap core CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!--<link href="<?php echo base_url(); ?>assets/css/jquery-ui.css" rel="stylesheet">-->
    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <!--<script src="" type="text/javascript"></script>-->

    <!-- Page level plugin CSS-->
    <link href="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url(); ?>assets/css/sb-admin.css" rel="stylesheet">

    <script src="<?php echo base_url(); ?>assets/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/node_modules/jquery-mask-plugin/dist/jquery.mask.min.js"></script>

    <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
    <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!--<script src="<?php echo base_url(); ?>assets/js/jquery-ui.js" ></script>-->
    <body onload="window.print()">   
    <div>
    <div id="content-wrapper"  style="margin-top:50px">
    <div class="container-fluid">
    <div class="card mb-3" id="cardbayar">
            <div class="card-header">
              <center>
                <b>
                <h3>Data Peminjaman Ruang</h3>  
                    <h4><?php echo $label ?> </h4> 
                </br>
                </center>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="tabelbayar" width="100%" cellspacing="0">
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
                        </tr>    
                        <tbody>
                        <?php        
                        if(empty($peminjaman)){ // Jika data tidak ada            
                        echo "<tr><td colspan='5'>Data tidak ada</td></tr>";        
                        }else{ // Jika jumlah data lebih dari 0 (Berarti jika data ada)            
                        foreach($peminjaman as $data){ // Looping hasil data transaksi                
                        $tgl_pinjam = date('d-m-Y', strtotime($data->tgl_pinjam)); // Ubah format tanggal jadi dd-mm-yyyy                
                        echo "<tr>";   
                        echo "<td style='width: 1px;'>".$data->id_peminjaman."</td>";                 
                        echo "<td style='width: 7px;'>".$tgl_pinjam."</td>";                
                        echo "<td style='width: 7px;'>".$data->tgl_selesai."</td>";                
                        echo "<td style='width: 20px;'>".$data->waktu_sesi."</td>";                
                        echo "<td style='width: 1px;'>".$data->nama_ruang."</td>";                
                        echo "<td style='width: 5px;'>".$data->nama_kegiatan."</td>"; 
                        echo "<td style='width: 5px;'>".$data->nip."</td>";
                        echo "<td style='width: 7px;'>".$data->nama."</td>";
                        echo "<td style='width: 7px;'>".$data->nama_opd."</td>";
                       
                        echo "<td style='width: 7px;'>".$data->no_hp_peminjam."</td>";                           
                        echo "<td style='width: 7px;'>".$data->email."</td>";    
                         
                        echo "</tr>";            
                        }
                        }    
                        ?>  
                        </tbody>
                        </table>
                    </div>
                    </div>

<div class="card-body card-block">
<div class="row form-group">
    <div id="form-tanggal" class="col col-md-9"><label for="select" class=" form-control-label"></label></div>
    <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">Surakarta, <?php echo date('d M Y')?></label></div>
    
</div>
<div class="row form-group">
    <div id="form-tanggal" class="col col-md-9"><label for="select" class=" form-control-label"></label></div>
    <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">Pimpinan Instansi</label></div>
    
</div>
<div class="row form-group">
    <div id="form-tanggal" class="col col-md-9"><label for="select" class=" form-control-label"></label></div>
    <div id="form-tanggal" class="col col-md-3"><label for="select" class=" form-control-label">Candra Angujiwati</label></div>
    </div>
            </div>

          </div>


            </div>
            </div>
 <!-- Bootstrap core JavaScript-->
 <script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>assets/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>
    
                 
                    </body></html>