  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url('C_Admin'); ?>" class="brand-link">
      <img src="<?= base_url('assets/'); ?>dist/img/logopamsimas.png" alt="Sistem Pamsimas" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Sistem Pamsimas</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


          <li class="nav-item 
          <?php if (
            $this->uri->segment(1) == "C_User" |
            $this->uri->segment(1) == "C_LayananAir" |
            $this->uri->segment(1) == "C_Pelanggan"
          ) {
            echo 'menu-open"';
          } ?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-database text-primary"></i>
              <p>Master<i class="fas fa-angle-left right text-primary"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('C_User'); ?>" class="nav-link 
                <?php if ($this->uri->segment(1) == "C_User") {
                  echo 'active';
                } ?>
                
                ">
                  &emsp;<i class="nav-icon far fa-circle text-primary"></i>
                  <p>Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('C_LayananAir'); ?>" class="nav-link
                
                <?php if ($this->uri->segment(1) == "C_LayananAir") {
                  echo 'active';
                } ?>
                
                ">
                  &emsp;<i class="nav-icon far fa-circle text-primary"></i>
                  <p>Layanan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('C_Pelanggan'); ?>" class="nav-link
                
                <?php if ($this->uri->segment(1) == "C_Pelanggan") {
                  echo 'active';
                } ?>
                
                ">
                  &emsp;<i class="nav-icon far fa-circle text-primary"></i>
                  <p>Pelanggan</p>
                </a>
              </li>
            </ul>
          </li>







          <li class="nav-item
          <?php if (
            $this->uri->segment(1) == "C_PemakaianAir" |
            $this->uri->segment(1) == "C_TagihanAir"
          ) {
            echo 'menu-open"';
          } ?>
          
          ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-file-word text-success"></i>
              <p> Transaksi <i class="right fas fa-angle-left text-success"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('C_PemakaianAir'); ?>" class="nav-link
                
                <?php if ($this->uri->segment(1) == "C_PemakaianAir") {
                  echo 'active';
                } ?>
                
                ">
                  &emsp;<i class="far fa-circle nav-icon text-success"></i>
                  <p>Pemakaian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('C_TagihanAir'); ?>" class="nav-link
                <?php if ($this->uri->segment(1) == "C_TagihanAir") {
                  echo 'active';
                } ?>
                
                ">
                  &emsp;<i class="far fa-circle nav-icon text-success"></i>
                  <p>Tagihan</p>
                </a>
              </li>
            </ul>
          </li>




          <li class="nav-item 
          <?php if (
            $this->uri->segment(1) == "C_Pemasukan" |
            $this->uri->segment(1) == "C_Pengeluaran" |
            $this->uri->segment(1) == "C_Penunggakan"
          ) {
            echo 'menu-open"';
          } ?>
          
          
          ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie text-warning"></i>
              <p>Administrasi <i class="fas fa-angle-left right text-warning"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('C_Pemasukan'); ?>" class="nav-link
                <?php if ($this->uri->segment(1) == "C_Pemasukan") {
                  echo 'active';
                } ?>
                
                ">
                  &emsp;<i class="far fa-circle nav-icon text-warning"></i>
                  <p>Pemasukan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('C_Pengeluaran'); ?>" class="nav-link
                <?php if ($this->uri->segment(1) == "C_Pengeluaran") {
                  echo 'active';
                } ?>
                ">
                  &emsp;<i class="far fa-circle nav-icon text-warning"></i>
                  <p>Pengeluaran</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('C_Penunggakan'); ?>" class="nav-link
                <?php if ($this->uri->segment(1) == "C_Penunggakan") {
                  echo 'active';
                } ?>
                ">
                  &emsp;<i class="far fa-circle nav-icon text-warning"></i>
                  <p>Penunggakan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item
          
          <?php if (
            $this->uri->segment(1) == "C_KonfigurasiTahun"
          ) {
            echo 'menu-open"';
          } ?>
          
          ">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog text-danger"></i>
              <p>Konfigurasi <i class="fas fa-angle-left right text-danger"></i></p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link
                <?php if ($this->uri->segment(1) == "C_KonfigurasiTahun") {
                  echo 'active';
                } ?>
                ">
                  &emsp;<i class="far fa-circle nav-icon text-danger"></i>
                  <p>Master Tahun</p>
                </a>
              </li>

            </ul>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
    <div class="sidebar-custom">

      <a href="<?= base_url('C_Main/logout'); ?>" onclick="return confirm('Apakah anda yakin ingin keluar?')" class="btn btn-sm btn-danger hide-on-collapse pos-right"><i class="nav-icon fa fa-power-off"></i></a>
    </div>
  </aside>