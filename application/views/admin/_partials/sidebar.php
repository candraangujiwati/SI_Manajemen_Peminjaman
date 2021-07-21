<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
        <a class="nav-link" href="<?php echo site_url('Admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>DASHBOARD</span>
        </a>
    </li>
  
    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/notif') ?>">
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
            <a class="dropdown-item" href="<?php echo site_url('admin/Ruang') ?>">RUANG</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/Sesi') ?>">SESI</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/Opd') ?>">OPD</a>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/new_reservasi') ?>">
            <i class="fas fa-fw fa-book"></i>
            <span>PEMINJAMAN</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?php echo site_url('admin/filter') ?>">
            <i class="fas fa-fw fa-print"></i>
            <span>LAPORAN</span></a>
    </li>

    
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true">
            <i class="fas fa-fw fa-id-card"></i>
            <span>MANAJEMEN AKUN</span></a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="<?php echo site_url('admin/user_grup') ?>">USER GRUP</a>
            <a class="dropdown-item" href="<?php echo site_url('admin/user') ?>">AKUN PENGGUNA</a>
        </div>
    </li>
</ul>