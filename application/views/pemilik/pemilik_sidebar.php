
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/pemilik/index'); ?>">
        <div class="sidebar-brand-text mx-3"> TB Rejo Jaya</div>
      </a>

      <hr class="sidebar-divider my-0">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/pemilik/lihatlaporan'); ?>">
         <i class="fas fa-fw fa-folder"></i>
          <span>Laporan</span></a>
      </li>

      <hr class="sidebar-divider">
<li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/pemilik/laporan_jual'); ?>">
         <i class="fas fa-fw fa-folder"></i>
          <span>Laporan Penjualan</span></a>
      </li>
<hr class="sidebar-divider">
<li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/pemilik/cek_hutang'); ?>">
         <i class="fas fa-fw fa-folder"></i>
          <span>List Hutang</span></a>
      </li>
<hr class="sidebar-divider d-none d-md-block">
        <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/user_login/logout'); ?>">
        <i class="fas fa-fw fa-sign-out-alt"></i>
          <span>logout</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!--   End of Sidebar -->