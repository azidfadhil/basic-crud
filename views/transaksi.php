<?php
  require_once('../backend/connect.php');

  session_start();

  $title_tab = "Transaksi";

  include '../layouts/header.php';
  include '../layouts/navbar.php'; 
?>

<div class="container my-5 px-5">
  <h1>Data Transaksi Perpustakaan</h1>

  <!-- Tombol Modal Form Tambah data buku -->
  <div class="my-3">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTransaksi">
      + Tambah Transaksi
    </button>
  </div>

  <!-- Table Data Buku -->
  <div class="table-responsive">

    <table class="table table-hover">
      <thead>
        <tr class="text-center">
          <th>No.</th>
          <th>Judul Buku</th>
          <th>Peminjam</th>
          <th>Status</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
          <th style="width: 8em;">Menu</th>
        </tr>
      </thead>
      <tbody>
        <?php 
        
        $sql = "SELECT 
                  t.id, b.judul_buku, b.tahun, a.nama_anggota, a.alamat, t.status, t.tgl_pinjam, t.tgl_kembali
                FROM tb_transaksi AS t
                INNER JOIN tb_buku AS b
                  ON t.buku_id = b.id
                INNER JOIN tb_anggota AS a
                  ON t.anggota_id = a.id
                ORDER BY t.tgl_kembali";
        $transaksi = mysqli_query($conn, $sql);

        // echo "<pre>";
        // print_r(mysqli_fetch_assoc($transaksi));
        // die();
        $no = 1;
        
        if(mysqli_num_rows($transaksi) < 1) { ?>
        <tr>
          <td colspan="7" class="text-center">
            <i>Belum ada data</i>
          </td>
        </tr>
        <?php } else { 
        foreach ($transaksi as $t) { ?>
        <tr>
          <td class="text-center"><?= $no ?></td>
          <td><?= $t['tahun'] . " - " . $t['judul_buku'] ?></td>
          <td><?= $t['nama_anggota'] . " [" . $t['alamat'] . "]"?></td>
          <td class="text-center">
            <?php if($t['status'] == '1') { ?>
            <span class="badge text-bg-warning">
              <i class="fa-regular fa-clock"></i> Dipinjam
            </span>
            <?php } else if($t['status'] == '2') { ?>
            <span class="badge text-bg-success">
              <i class="fa-regular fa-circle-check"></i> Dikembalikan
            </span>
            <?php } else { ?>
            <span class="badge text-bg-danger">
              <i class="fa-solid fa-triangle-exclamation"></i> Terlambat
            </span>
            <?php } ?>
          </td>
          <td class="text-center"><?= $t['tgl_pinjam'] ?></td>
          <td class="text-center"><?= $t['tgl_kembali'] ?></td>
          <td class="text-center">
            <a href="../views/edit-transaksi.php?id=<?= $t['id'] ?>" class="btn btn-sm btn-warning mx-1" title="Edit Data">
              <i class="fa-solid fa-pen-to-square"></i>
            </a>
            <a href="#" class="btn btn-sm btn-danger mx-1" title="Hapus Data">
              <i class="fa-solid fa-trash"></i>
            </a>
          </td>
        </tr>
        <?php $no++; }} ?>
      </tbody>
    </table>
  </div>

  <!-- Modal Static Backdrop -->
  <div class="modal fade" id="tambahTransaksi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahTransaksiLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="tambahTransaksiLabel">Tambah Transaksi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Form Tambah Transaksi -->
          <form action="../backend/action-add-transaksi.php" method="POST">
            <div class="mb-3">
              <label class="form-label">Judul Buku</label>
              <select class="form-select" name="buku_id" required>
                <option selected hidden>Pilih judul buku</option>
                <?php 
                
                $sql = "SELECT id, judul_buku, tahun
                        FROM tb_buku
                        ORDER BY tahun ASC";
                $buku = mysqli_query($conn, $sql);        
                
                foreach ($buku as $b) { ?>
                <option value="<?= $b['id'] ?>"><?= $b['tahun'] ?> - <?= $b['judul_buku'] ?></option>
                <?php } ?>
              </select>
            </div>
            <div class="mb-3">
              <label class="form-label">Peminjam</label>
              <select class="form-select" name="anggota_id" required>
                <option selected hidden>Pilih nama peminjam</option>
                <?php 
                
                $sql = "SELECT id, nama_anggota, alamat
                        FROM tb_anggota
                        ORDER BY nama_anggota ASC";
                $anggota = mysqli_query($conn, $sql);        
                
                foreach ($anggota as $a) { ?>
                <option value="<?= $a['id'] ?>"><?= $a['nama_anggota'] ?> [<?= $a['alamat'] ?>]</option>
                <?php } ?>
              </select>
            </div>
            <div class="row">
              <div class="col">
                <div class="mb-3">
                  <label for="tanggalPinjam" class="form-label">Tanggal Pinjam</label>
                  <input type="date" class="form-control" id="tanggalPinjam" name="tgl_pinjam" required>
                </div>
              </div>
              <div class="col">
                <div class="mb-3">
                  <label for="tanggalKembali" class="form-label">Tanggal Kembali</label>
                  <input type="date" class="form-control" id="tanggalKembali" name="tgl_kembali" required>
                </div>
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