


  <!-- Main Sidebar Container -->
  <aside class="bg-navy color-palette main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      
      <span class="brand-text font-weight-light">Balloonco Stock App</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar bg-navy color-palette">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
    
        <div class="info">
        <a href="#" class="d-block">Hello <?php echo isset($_SESSION['nama_admin']) ? $_SESSION['nama_admin'] : ''; ?></a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2 " >
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <ion-icon name="balloon-outline"></ion-icon>
              <p>
                Barang
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lihat-barang.php" class="nav-link">
                  <ion-icon name="balloon"></ion-icon>
                  <p>Lihat Data Barang</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="input-barang.php" class="nav-link">
                  <ion-icon name="add-circle-outline"></ion-icon>
                  <p>Tambah Data Barang</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
            <ion-icon name="person-circle-outline"></ion-icon>
              <p>
                Admin
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lihat-staff.php" class="nav-link">
                  <ion-icon name="person-outline"></ion-icon>
                  <p>Lihat Data Admin</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="input-staff.php" class="nav-link">
                 <ion-icon name="add-circle-outline"></ion-icon>
                  <p>Tambah Data Admin</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
            <ion-icon name="bar-chart-outline"></ion-icon>
              <p>
                Penjualan
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lihat-penjualan.php" class="nav-link">
                  <ion-icon name="bar-chart"></ion-icon>
                  <p>Lihat Data Penjualan</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="input-penjualan.php" class="nav-link">
                 <ion-icon name="add-circle-outline"></ion-icon>
                  <p>Tambah Data Penjualan</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item menu-open">
            <a href="#" class="nav-link">
              <ion-icon name="bag-check-outline"></ion-icon>
              <p>
                Pembelian
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="lihat-pembelian.php" class="nav-link">
                <ion-icon name="bag-check"></ion-icon>
                  <p>Lihat Data Pembelian</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="input-pembelian.php" class="nav-link">
                  <ion-icon name="add-circle-outline"></ion-icon>
                  <p>Tambah Data Pembelian</p>
                </a>
              </li>
            </ul>
          </li>

          
     
         
          
          
          
          

          



          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <ion-icon name="exit-outline"></ion-icon>
              <p>
                Logout
              </p>
            </a>
          </li>


        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
  <script src="https://kit.fontawesome.com/0b6d322b30.js" crossorigin="anonymous"></script>
    <!-- /.sidebar -->
  </aside>
  <!-- /Main Sidebar Container -->
