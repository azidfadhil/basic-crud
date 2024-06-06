<nav class="navbar navbar-expand-lg bg-body-tertiary sticky-top">
  <div class="container">
    <a class="navbar-brand" href="#">SIM Perpustakaan</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], "beranda") !== false) { echo "active"; } ?>" href="../views/beranda.php">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], "buku") !== false) { echo "active"; } ?>" href="../views/data-buku.php">Data Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], "anggota") !== false) { echo "active"; } ?>" href="../views/data-anggota.php">Data Anggota</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?php if(strpos($_SERVER['REQUEST_URI'], "transaksi") !== false) { echo "active"; } ?>" href="../views/transaksi.php">Transaksi</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Laporan
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Peminjaman Buku</a></li>
            <li><a class="dropdown-item" href="#">Pengembalian Buku</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>