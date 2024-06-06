<?php
  session_start();

  require_once('../backend/connect.php');

  $title_tab = "Data Anggota";

  include '../layouts/header.php';
  include '../layouts/navbar.php'; 
?>

<div class="container my-5 px-5">

  <h1>Data Anggota Perpustakaan</h1>

  <!-- Tombol Modal Form Tambah Anggota -->
  <div class="my-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAnggota">
      + Tambah Anggota
    </button>
  </div>

  <!-- Table Data Anggota -->
  <div class="table-responsive">
    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th>No.</th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Email</th>
          <th>No. Telp</th>
          <th>Jenis Kelamin</th>
          <th>Menu</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        
        $sql = "SELECT * FROM tb_anggota";
        $anggota = mysqli_query($conn, $sql);
        $no = 1;

        foreach ($anggota as $a) { ?>
        <tr>
          <td><?= $no ?></td>
          <td><?= $a['nama_anggota'] ?></td>
          <td><?= $a['alamat'] ?></td>
          <td><?= $a['email'] ?></td>
          <td><?= $a['no_telp'] ?></td>
          <td><?php if($a['jenis_kelamin'] == 'L') { echo "Laki-laki"; } else { echo "Perempuan"; } ?></td>
          <td class="text-center">
            <a href="../views/edit-anggota.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-warning mx-1" title="Edit Data">
              <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a onclick="return confirm('Apakah Anda yakin ingin menghapus data yang dipilih?')" href="../backend/action-delete-anggota.php?id=<?= $a['id'] ?>" class="btn btn-sm btn-danger mx-1" title="Hapus Data">
              <i class="fa-solid fa-trash"></i>
            </a>
          </td>
        </tr>
        <?php $no++; } ?>
      </tbody>
    </table>
  </div>

  <!-- Modal Static Backdrop -->
  <div class="modal fade" id="tambahAnggota" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahAnggotaLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="tambahAnggotaLabel">Tambah Anggota</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form Tambah Data Anggota -->
          <form action="../backend/action-add-anggota.php" method="POST">
            <div class="mb-3">
              <label for="inputNamaAnggota" class="form-label">Nama</label>
              <input type="text" class="form-control" id="inputNamaAnggota" name="nama_anggota" autocomplete="off" required>
            </div>
            <div class="mb-3">
              <label for="inputAlamat" class="form-label">Alamat</label>
              <textarea class="form-control" id="inputAlamat" rows="4" name="alamat" autocomplete="off" required></textarea>
            </div>
            <div class="mb-3">
              <label for="inputEmail" class="form-label">Email</label>
              <input type="email" class="form-control" id="inputEmail" name="email" autocomplete="off" required>
            </div>
            <div class="mb-3">
              <label for="inputTelp" class="form-label">No. Telp</label>
              <input type="text" class="form-control" id="inputTelp" name="no_telp" autocomplete="off" required>
            </div>
            <div class="mb-3">
              <label for="inputGender" class="form-label">Jenis Kelamin</label>
              <br>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" required>
                <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" required>
                <label class="form-check-label" for="inlineRadio2">Perempuan</label>
              </div>
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