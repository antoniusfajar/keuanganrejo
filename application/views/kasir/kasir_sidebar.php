
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/kasir/index'); ?>">
         <i class="fas fa-home"></i>
        <div class="sidebar-brand-text mx-3"> TB Rejo Jaya</div>
      </a>


    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/kasir/nomor_faktur'); ?>">
          <i class="fas fa-fw fa-cart-arrow-down"></i>
          <span>Penjualan</span></a>
      </li>
      <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/kasir/barangdagang'); ?>">
        <i class="fas fa-bold"></i>
          <span>List Barang</span></a>
      </li>
      <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/kasir/detailpenjualan'); ?>">
         <i class="fas fa-fw fa-clipboard-list"></i>
          <span>List Penjualan</span></a> 
      </li>
      <hr class="sidebar-divider">

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