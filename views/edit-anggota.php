<?php
  require_once('../backend/connect.php');

  $id = $_GET['id'];
  $sql = "SELECT * FROM tb_anggota WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $anggota = mysqli_fetch_assoc($result);

  $title_tab = "Edit Anggota";

  include '../layouts/header.php';
  include '../layouts/navbar.php'; 
?>

<div class="container my-5 px-5">

  <h1>Edit Anggota Perpustakaan</h1>

  <div class="my-3">
    <a href="./data-anggota.php" class="btn btn-primary">← Kembali</a>
  </div>

  <div class="card py-4">
    <div class="card-body">
      <form action="../backend/action-edit-anggota.php" method="POST">
        <div class="row g-4">
          <div class="col-1"></div>
          <div class="col">
            <input type="text" name="id" value="<?= $anggota['id'] ?>" hidden>
            <label for="editNama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="editNama" name="nama" autocomplete="off" value="<?= $anggota['nama_anggota'] ?>" required>
            <label for="editEmail" class="form-label">Email</label>
            <input type="email" class="form-control" id="editEmail" name="email" autocomplete="off" value="<?= $anggota['email'] ?>" required>
          </div>
          <div class="col">
            <label for="editAlamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="editAlamat" rows="4" name="alamat" autocomplete="off" required><?= $anggota['alamat'] ?></textarea>
          </div>
          <div class="col-1"></div>
        </div>
        <div class="row g-4">
          <div class="col-1"></div>
          <div class="col">
            <label for="editNoTelp" class="form-label">No Telp</label>
            <input type="text" class="form-control" id="editNoTelp" name="no_telp" autocomplete="off" value="<?= $anggota['no_telp'] ?>" required>
          </div>
          <div class="col">
            <label for="editGender" class="form-label mt-1">Jenis Kelamin</label>
            <br>
            <div class="form-check form-check-inline mt-1">
              <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" <?php if($anggota['jenis_kelamin'] == 'L') { echo "checked"; } ?> required>
              <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" <?php if($anggota['jenis_kelamin'] == 'P') { echo "checked"; } ?> required>
              <label class="form-check-label" for="inlineRadio2">Perempuan</label>
            </div>
          </div>
          <div class="col-1"></div>
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