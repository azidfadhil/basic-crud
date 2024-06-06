<?php
  $title_tab = "Beranda";

  include '../layouts/header.php';
  include '../layouts/navbar.php'; 
?>

  <div class="container d-flex justify-content-center my-5">
    <div class="card">
      <div class="card-body text-center">
        <h1 class="card-title">Selamat Datang di SIM Perupustakaan</h1>
        <hr>
        <p class="card-text">v1.0.0</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row mb-4">
      <div class="col-lg-6 col-sm-12 mb-4">
        <a href="./data-buku.php" class="btn btn-success w-100 p-4">
          <span class="fa-solid fa-book-open mb-4 mt-2" style="font-size: 5rem;"></span>
          <h3>Data Buku</h3>
        </a>
      </div>
      <div class="col-lg-6 col-sm-12 mb-4">
        <a href="./data-anggota.php" class="btn btn-primary w-100 p-4">
          <span class="fa-solid fa-users mb-4 mt-2" style="font-size: 5rem;"></span>
          <h3>Data Anggota</h3>
        </a>
      </div>
      <div class="col-lg-6 col-sm-12 mb-4">
        <a href="./transaksi.php" class="btn btn-warning w-100 p-4 text-light">
          <span class="fa-solid fa-calendar-days mb-4 mt-2" style="font-size: 5rem;"></span>
          <h3>Transaksi</h3>
        </a>
      </div>
      <div class="col-lg-6 col-sm-12 mb-4">
        <button class="btn btn-danger w-100 p-4" disabled>
          <span class="fa-solid fa-file-lines mb-4 mt-2" style="font-size: 5rem;"></span>
          <h3>Laporan</h3>
        </button>
      </div>
    </div>
  </div>

<?php include '../layouts/footer.php' ?>