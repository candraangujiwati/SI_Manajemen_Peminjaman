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
    <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Ruang</div>
           
          <div class="card-body">
            <div class="table-responsive">
              <a class="btn btn-success " href="ruang_tambah">Tambah <i class="fa fa-plus"></i></a><br>
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <br>
         <thead>
          <tr>
            <th width="1%">No</th>
           
            <th width="13%">Nama Ruang</th>
            <th width="15%">Sesi</th>
            <th width="15%">Kapasitas</th>
            <th width="15%">Area</th>
            <th width="15%">Fasilitas</th>
            <th width="15%">Foto Ruang</th>
            <th width="15%">Aksi</th>
          </tr>
        </thead>
         <tbody>
          <?php 
          $no = 1;
          foreach($ruang as $k){
            ?>
            <tr>
              <td><?php echo $no++; ?></td>
              <td><?php echo $k->nama_ruang; ?></td>
              <td><?php echo $k->waktu_sesi; ?></td>
              <td><?php echo $k->kapasitas; ?></td>
              <td><?php echo $k->area; ?></td>
              <td><?php echo $k->fasilitas_ruang; ?></td>
              <td>
              <img src="<?php echo base_url();?>./assets/images/<?php echo $k->gambar;?>" alt="" style="width:80px; height:80px;">
              </td>
              <td>
                <a  href="<?php echo base_url().'admin/ruang_edit/'.$k->id_ruang; ?>"
                <i class="fa fa-edit"></i></a> &nbsp;
                <a  href="<?php echo base_url().'admin/ruang_delete/'.$k->id_ruang;?>"onclick="return confirm('Hapus Data? ');"><i class="fa fa-times"></i></a>
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