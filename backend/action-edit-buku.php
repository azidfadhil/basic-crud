<?php

// echo "<pre>";
// print_r($_POST);
// die();

session_start();

require_once('./connect.php');

$id = $_POST['id'];
$judul = $_POST['judul'];
$tahun = $_POST['tahun'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];

$sql = "UPDATE tb_buku
        SET
          judul_buku = '$judul',
          tahun = '$tahun',
          pengarang = '$pengarang',
          penerbit = '$penerbit'
        WHERE id = $id
        ";

if(mysqli_query($conn, $sql)) {
  $_SESSION['toast'] = 'berhasil-edit';
  header("Location: ../views/data-buku.php");
} else {
  $_SESSION['toast'] = 'gagal-edit';
  header("Location: ../views/data-buku.php");
}

mysqli_close($conn);

?>