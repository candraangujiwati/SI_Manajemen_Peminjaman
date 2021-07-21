<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('Penggunabarang') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('penggunabarang/notif_barang') ?>">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>INFORMASI NOTIFIKASI</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('penggunabarang/cekbarang')?>">
            <i class="fas fa-fw fa-qrcode"></i>
            <span>SCAN QR CODE</span></a>
    </li>
   

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('penggunabarang/new_pinjam_barang') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>PEMINJAMAN</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('penggunabarang/user') ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>PROFIL</span></a>
    </li>
    <!--<li class="nav-item dropdown <?php //echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-book"></i>
            <span>PEMINJAMAN</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php //echo site_url('pengguna/new_reservasi') ?>">PEMINJAMAN BARU</a>
            <a class="dropdown-item" href="<?php //echo site_url('pengguna/all_reservasi') ?>">PEMINJAMAN SELESAI</a>
        </div>
    </li>-->

   
    
</ul>