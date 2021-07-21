<nav class="navbar navbar-expand navbar-dark bg-info static-top">

    <a class="navbar-brand mr-1" href="<?php echo site_url('penggunabarang') ?>">
    <img src="https://surakarta.go.id/wp-content/uploads/2017/04/cropped-Logo-Pemkot-square.png" alt="left" width="30" length="30"><?php echo "SISTEM PEMINJAMAN BARANG" ?>
        
    </a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0"> 
    <?php 
        $notif = $this->db->from('pinjam_barang')->join('user', 'user.id_user=pinjam_barang.id_user')->where(['status_baca_notif_barang' => 1])->order_by('status_pinjam_barang', 'DESC')->get()->result_array();
        $notif_count = count($notif);
    ?>
    
    <li class="nav-item dropdown mx-1">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" style="font-size: 18px; font-family: Arial">
                <i class="fas fa-bell fa-fw"></i><span class="badge badge-warning"><?php
                   foreach ($notif as $data):
                    if($this->session->userdata('nama') == $data['nama']){
                        echo ".";
                     }
                    endforeach; ?></span>
                </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <?php 
                foreach ($notif as $data): ?>
                 <?php if($this->session->userdata('nama') == $data['nama']) { ?>
       
            <a class="dropdown-item" href="<?php echo base_url('penggunabarang/notif_barang')?>"><?php echo $data['judul_notif_barang'] ?></a>  
            <?php }
        endforeach; ?>
            <!--<div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Isi notify</a>-->
            </div>
        </li>


        <li class="nav-item dropdown mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                aria-expanded="false" style="font-size: 18px; font-family: Arial">
                <i class="fas fa-user-circle fa-fw"></i>
                <span>Halo, <?php echo $this->session->userdata('nama'); ?> </span>
			
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
            </div>
        </li>
    </ul>

</nav>