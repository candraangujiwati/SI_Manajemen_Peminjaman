<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('Adminbarang') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('adminbarang/notif_barang') ?>">
            <i class="fas fa-fw fa-bullhorn"></i>
            <span>INFORMASI NOTIFIKASI</span></a>
    </li>

    <li class="nav-item dropdown <?php echo $this->uri->segment(2) == 'products' ? 'active': '' ?>">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-fw fa-database"></i>
            <span>DATA MASTER</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <a class="dropdown-item" href="<?php echo site_url('adminbarang/jenis_barang') ?>">JENIS BARANG</a>
             <a class="dropdown-item" href="<?php echo site_url('adminbarang/barang') ?>">BARANG</a>
            <a class="dropdown-item" href="<?php echo site_url('adminbarang/opd') ?>">OPD</a>
        </div>
    </li>

    <li class="nav-item ">
        <a class="nav-link" href="<?php echo site_url('adminbarang/new_pinjam_barang')?>"> 
            <i class="fas fa-fw fa-book"></i>
            <span>PEMINJAMAN</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('adminbarang/filter') ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>LAPORAN</span></a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
            <i class="fas fa-fw fa-users"></i>
            <span>MANAJEMEN AKUN</span></a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('adminbarang/user_grup') ?>">USER GRUP</a>
            <a class="dropdown-item" href="<?php echo site_url('adminbarang/user') ?>">AKUN PENGGUNA</a>
        </div>
    </li>
</ul>