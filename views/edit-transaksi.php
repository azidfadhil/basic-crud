<?php
  require_once('../backend/connect.php');

  $id = $_GET['id'];
  $sql = "SELECT * FROM tb_transaksi WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $transaksi = mysqli_fetch_assoc($result);

  $title_tab = "Edit Transaksi";

  include '../layouts/header.php';
  include '../layouts/navbar.php'; 
?>

<div class="container my-5 px-5">

  <h1>Edit Transaksi Perpustakaan</h1>

  <div class="my-3">
    <a href="./transaksi.php" class="btn btn-primary">← Kembali</a>
  </div>

  <div class="card py-4">
    <div class="card-body">
      <form action="../backend/action-edit-transaksi.php" method="post">
        <div class="mb-3">
          <input type="text" name="id" value="<?= $transaksi['id'] ?>" hidden>
          <label class="form-label">Judul Buku</label>
          <select class="form-select" name="buku_id" required>
            <?php 
            
            $sql = "SELECT id, judul_buku, tahun
                    FROM tb_buku
                    ORDER BY tahun ASC";
            $buku = mysqli_query($conn, $sql);        
            
            foreach ($buku as $b) { ?>
            <option value="<?= $b['id'] ?>" <?php if($transaksi['buku_id'] == $b['id']) { echo "selected"; } ?>><?= $b['tahun'] ?> - <?= $b['judul_buku'] ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="mb-3">
          <label class="form-label">Peminjam</label>
          <select class="form-select" name="anggota_id" required>
            <?php 
            
            $sql = "SELECT id, nama_anggota, alamat
                    FROM tb_anggota
                    ORDER BY nama_anggota ASC";
            $anggota = mysqli_query($conn, $sql);        
            
            foreach ($anggota as $a) { ?>
            <option value="<?= $a['id'] ?>" <?php if($transaksi['anggota_id'] == $a['id']) { echo "selected"; } ?>><?= $a['nama_anggota'] ?> [<?= $a['alamat'] ?>]</option>
            <?php } ?>
          </select>
        </div>
        <div class="row">
          <div class="col">
            <div class="mb-3">
              <label for="tanggalPinjam" class="form-label">Tanggal Pinjam</label>
              <input type="date" class="form-control" id="tanggalPinjam" name="tgl_pinjam" value="<?= $transaksi['tgl_pinjam'] ?>" required>
            </div>
          </div>
          <div class="col">
            <div class="mb-3">
              <label for="tanggalKembali" class="form-label">Tanggal Kembali</label>
              <input type="date" class="form-control" id="tanggalKembali" name="tgl_kembali" value="<?= $transaksi['tgl_kembali'] ?>" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <label for="editGender" class="form-label">Status</label>
            <br>
            <div class="form-check form-check-inline mt-1">
              <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="1" <?php if($transaksi['status'] == '1') { echo "checked"; } ?> required>
              <label class="form-check-label" for="inlineRadio1">Sedang Dipinjam</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="inlineRadio2" value="2" <?php if($transaksi['status'] == '2') { echo "checked"; } ?> required>
              <label class="form-check-label" for="inlineRadio2">Sudah Dikembalikan</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="status" id="inlineRadio3" value="3" <?php if($transaksi['status'] == '3') { echo "checked"; } ?> required>
              <label class="form-check-label" for="inlineRadio3">Belum Dikembalikan</label>
            </div>
          </div>
        </div>
        <div class="row g-4 mt-5">
          <div class="col"></div>
          <div class="col-3">
            <button type="submit" class="btn btn-primary w-100">Submit</button>
          </div>
          <div class="col"></div>
        </div>
      </form>
    </div>
  </div>

</div>

<?php include '../layouts/footer.php' ?>