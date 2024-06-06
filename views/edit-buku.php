<?php
  require_once('../backend/connect.php');

  $id = $_GET['id'];
  $sql = "SELECT * FROM tb_buku WHERE id = $id";
  $result = mysqli_query($conn, $sql);
  $buku = mysqli_fetch_assoc($result);

  $title_tab = "Edit Buku";

  include '../layouts/header.php';
  include '../layouts/navbar.php'; 
?>

<div class="container my-5 px-5">

  <h1>Edit Buku Perpustakaan</h1>

  <div class="my-3">
    <a href="./data-buku.php" class="btn btn-primary">← Kembali</a>
  </div>

  <div class="card py-4">
    <div class="card-body">
      <form action="../backend/action-edit-buku.php" method="POST">
        <div class="row g-4 mb-2">
          <div class="col"></div>
          <div class="col-6">
            <input type="text" name="id" value="<?= $buku['id'] ?>" hidden>
            <label for="editJudul" class="form-label">Judul Buku</label>
            <input type="text" class="form-control" id="editJudul" name="judul" autocomplete="off" value="<?= $buku['judul_buku'] ?>" required>
          </div>
          <div class="col-2">
            <label for="editTahun" class="form-label">Tahun</label>
            <input type="text" class="form-control" id="editTahun" name="tahun" autocomplete="off" value="<?= $buku['tahun'] ?>" required>
          </div>
          <div class="col">
          </div>
        </div>
        <div class="row g-4">
          <div class="col"></div>
          <div class="col-4">
            <label for="editPengarang" class="form-label">Pengarang</label>
            <input type="text" class="form-control" id="editPengarang" name="pengarang" autocomplete="off" value="<?= $buku['pengarang'] ?>" required>
          </div>
          <div class="col-4">
            <label for="editPenerbit" class="form-label">Penerbit</label>
            <input type="text" class="form-control" id="editPenerbit" name="penerbit" autocomplete="off" value="<?= $buku['penerbit'] ?>" required>
          </div>
          <div class="col">
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