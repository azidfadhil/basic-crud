<?php
  require_once('../backend/connect.php');

  session_start();

  $title_tab = "Data Buku";

  include '../layouts/header.php';
  include '../layouts/navbar.php'; 
?>

<div class="container my-5 px-5">
  <h1>Data Buku Perpustakaan</h1>

  <!-- Tombol Modal Form Tambah data buku -->
  <div class="my-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataBuku">
      + Tambah Buku
    </button>
  </div>

  <!-- Table Data Buku -->
  <div class="table-responsive">

    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th>No.</th>
          <th>Judul Buku</th>
          <th>Tahun Terbit</th>
          <th>Pengarang</th>
          <th>Penerbit</th>
          <th>Menu</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $sql = "SELECT * FROM tb_buku";
        $buku = mysqli_query($conn, $sql);
        $no = 1;

        foreach ($buku as $b) {
        ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $b['judul_buku'] ?></td>
          <td><?= $b['tahun'] ?></td>
          <td><?= $b['pengarang'] ?></td>
          <td><?= $b['penerbit'] ?></td>
          <td class="text-center">
            <a href="../views/edit-buku.php?id=<?= $b['id'] ?>" class="btn btn-sm btn-warning mx-1" title="Edit Data">
              <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a onclick="return confirm('Apakah Anda yakin ingin menghapus data yang dipilih?')" href="../backend/action-delete-buku.php?id=<?= $b['id'] ?>" class="btn btn-sm btn-danger mx-1" title="Hapus Data">
              <i class="fa-solid fa-trash"></i>
            </a>
          </td>
        </tr>
        <?php $no++; } ?>
      </tbody>
    </table>
  </div>

  <!-- Modal Static Backdrop -->
  <div class="modal fade" id="tambahDataBuku" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahDataBukuLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="tambahDataBukuLabel">Tambah Data Buku</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form Tambah Data Buku -->
          <form action="../backend/action-add-buku.php" method="POST">
            <div class="mb-3">
              <label for="inputJudulBuku" class="form-label">Judul Buku</label>
              <input type="text" name="judul" class="form-control" id="inputJudulBuku" autocomplete="off" required>
            </div>
            <div class="mb-3">
              <label for="inputTahun" class="form-label">Tahun</label>
              <input type="text" name="tahun" class="form-control" id="inputTahun" autocomplete="off" required>
            </div>
            <div class="mb-3">
              <label for="inputPengarang" class="form-label">Pengarang</label>
              <input type="text" name="pengarang" class="form-control" id="inputPengarang" autocomplete="off" required>
            </div>
            <div class="mb-3">
              <label for="inputPenerbit" class="form-label">Penerbit</label>
              <input type="text" name="penerbit" class="form-control" id="inputPenerbit" autocomplete="off" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Toast Berhasil Tambah -->
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="toastBerhasilTambah" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="fa-solid fa-circle-check text-success me-2"></i>
        <strong class="me-auto">SIM Perpustakaan</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Data berhasil ditambahkan!
      </div>
    </div>
  </div>

  <!-- Toast Gagal Tambah -->
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="toastGagalTambah" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="fa-solid fa-circle-xmark text-danger me-2"></i>
        <strong class="me-auto">SIM Perpustakaan</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Data gagal ditambahkan!
      </div>
    </div>
  </div>

  <!-- Toast Berhasil Edit -->
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="toastBerhasilEdit" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="fa-solid fa-circle-check text-success me-2"></i>
        <strong class="me-auto">SIM Perpustakaan</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Data berhasil diedit!
      </div>
    </div>
  </div>

  <!-- Toast Gagal Edit -->
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="toastGagalEdit" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="fa-solid fa-circle-xmark text-danger me-2"></i>
        <strong class="me-auto">SIM Perpustakaan</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Data gagal diedit!
      </div>
    </div>
  </div>

  <!-- Toast Berhasil Hapus -->
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="toastBerhasilHapus" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="fa-solid fa-circle-check text-success me-2"></i>
        <strong class="me-auto">SIM Perpustakaan</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Data berhasil dihapus!
      </div>
    </div>
  </div>

  <!-- Toast Gagal Hapus -->
  <div class="toast-container position-fixed top-0 end-0 p-3">
    <div id="toastGagalHapus" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
      <div class="toast-header">
        <i class="fa-solid fa-circle-xmark text-danger me-2"></i>
        <strong class="me-auto">SIM Perpustakaan</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
      <div class="toast-body">
        Data gagal dihapus!
      </div>
    </div>
  </div>

</div>

<?php include '../layouts/footer.php' ?>