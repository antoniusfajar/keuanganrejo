
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('index.php/admin/index'); ?>">
        <div class="sidebar-brand-text mx-3"> TB Rejo Jaya</div>
      </a>

      <hr class="sidebar-divider my-0">
      
      <div class="sidebar-heading">
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Seting</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Jenis Seting:</h6>
            <a class="collapse-item" href="<?= base_url('index.php/admin/tampil_user'); ?>">User</a>
            <a class="collapse-item" href="<?= base_url('index.php/admin_barang/tampil_barang'); ?>">Barang</a>
             <a class="collapse-item" href="<?= base_url('index.php/admin/tampil_kategori'); ?>">Kategori</a>
          </div>
        </div>
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