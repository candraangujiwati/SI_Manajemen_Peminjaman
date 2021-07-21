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
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Barang</div>
           
          <div class="card-body">
            <div class="table-responsive">
              <a class="btn btn-success " href="barang_tambah">Tambah <i class="fa fa-plus"></i></a><br>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
           
            <th width="13%">Kode Barang</th>
            <th width="15%">Nama Barang</th>
            <th width="15%">Merk</th>
            <th width="7%">Jumlah</th>
            <th width="15%">Keterangan</th>
            <th width="15%">Foto Barang</th>
            <th width="15%">QR Code</th>
            <th width="15%">Aksi</th>

          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($barang as $k){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
             
              <td><?php echo $k->kode_barang; ?></td>
              <td><?php echo $k->nama_barang; ?></td>
              <td><?php echo $k->merk; ?></td>
              <td><?php echo $k->jumlah; ?></td>
              <td><?php echo $k->keterangan; ?></td>
              <td>
              <img src="<?php echo base_url();?>./assets/images_barang/<?php echo $k->foto_barang;?>" alt="" style="width:80px; height:80px;">
              </td>
              <td>
                <img style="width: 100px;" src="<?php echo base_url()?>./assets/qr_code_barang/<?php echo $k->qr_code;?>">
                <a  class="btn btn-primary" href="<?php echo base_url().'adminbarang/liatqr/'.$k->id_barang?>">Cetak QR</a> 
                          
              </td>
                <td>
                <a  href="<?php echo base_url().'adminbarang/barang_edit/'.$k->id_barang; ?>"
                <i class="fa fa-edit"></i></a> &nbsp;
                <a  href="<?php echo base_url().'adminbarang/barang_delete/'.$k->id_barang;?>"onclick="return confirm('Hapus Data? ');"><i class="fa fa-times"></i></a>
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