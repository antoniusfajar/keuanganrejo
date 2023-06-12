
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/keuangan/index'); ?>">
        <div class="sidebar-brand-text mx-3"> TB Rejo Jaya</div>
      </a>

      <hr class="sidebar-divider my-0">
      <hr class="sidebar-divider">

      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/keuangan/bukubesar'); ?>">
         <i class="fas fa-fw fa-user"></i>
          <span>Jurnal Transaksi</span></a>
      </li>
      <hr class="sidebar-divider">

         <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseList" aria-expanded="true" aria-controls="collapseList">
          <i class="fas fa-fw fa-folder"></i>
          <span>List</span>
        </a>
        <div id="collapseList" class="collapse" aria-labelledby="headingList" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('index.php/keuangan/cekhutang'); ?>">Hutang</a>
            <a class="collapse-item" href="<?= base_url('index.php/keuangan/cekpiutang'); ?>">Piutang</a>
          </div>
        </div>
      </li>

     <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTransaksi" aria-expanded="true" aria-controls="collapseTransaksi">
          <i class="fas fa-fw fa-folder"></i>
          <span>Transaksi</span>
        </a>
        <div id="collapseTransaksi" class="collapse" aria-labelledby="headingTransaksi" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="<?= base_url('index.php/keuangan/tampilpembelian'); ?>">Pembelian</a>
            <a class="collapse-item" href="<?= base_url('index.php/keuangan/transaksilain'); ?>">Transaksi Lain</a>
          </div>
        </div>
      </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('index.php/keuangan/laporan'); ?>">
         <i class="fas fa-fw fa-user"></i>
          <span>Buat Laporan</span></a>
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