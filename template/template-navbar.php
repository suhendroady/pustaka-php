<!-- membuat menu aktif -->
<?php $module = !empty($_GET['module']) ? $_GET['module'] : '' ?>

<?php
if ($module == '' or $module == 'home') :
  $home = 'active';
elseif ($module == 'siswa') :
  $siswa = 'active';
elseif ($module == 'buku') :
  $buku = 'active';
elseif ($module == 'user') :
  $user = 'active';
endif;
?>
<div class="dashboard-nav">
  <header>
    <a href="#!" class="menu-toggle">
      <i class="fas fa-bars"></i>
    </a>
    <a href="#" class="brand-logo">
      <i class="fab fa-codepen"></i>
      <span>Muda Pustaka</span>
    </a>
  </header>
  <nav class="dashboard-nav-list">
    <a href="?module=home" class="dashboard-nav-item <?= $home; ?>">
      <i class="fas fa-home"></i>
      Beranda
    </a>
    <a href="?module=siswa" class="dashboard-nav-item <?= $siswa; ?>">
      <i class="fas fa-users"></i>
      Data Siswa
    </a>
    <a href="?module=buku" class="dashboard-nav-item <?= $buku; ?>">
      <i class="fas fa-book"></i>
      Data Buku
    </a>
    <div class='dashboard-nav-dropdown'>
      <a href="#!" class="dashboard-nav-item dashboard-nav-dropdown-toggle">
        <i class="fas fa-th-list"></i>
        Pustaka
      </a>
      <div class='dashboard-nav-dropdown-menu'>
        <a href="?module=pinjam" class="dashboard-nav-dropdown-item">Peminjaman</a>
        <a href="?module=pengembalian" class="dashboard-nav-dropdown-item">Pengembalian</a>
      </div>
    </div>
    <a href="?module=user" class="dashboard-nav-item <?= $user; ?>">
      <i class="fas fa-user"></i>
      Data User
    </a>

    <!-- garis -->
    <div class="nav-item-divider"></div>

    <a href="logout.php" class="dashboard-nav-item">
      <i class="fas fa-sign-out-alt"></i>
      Logout
    </a>

  </nav>
</div>