<?php

// echo "<pre>";
// print_r($_POST);
// die();

session_start();

require_once('./connect.php');

$judul = $_POST['judul'];
$tahun = $_POST['tahun'];
$pengarang = $_POST['pengarang'];
$penerbit = $_POST['penerbit'];

$sql = "INSERT INTO tb_buku (judul_buku, tahun, pengarang, penerbit)
        VALUES ('$judul', '$tahun', '$pengarang', '$penerbit')";

if(mysqli_query($conn, $sql)) {
  $_SESSION['toast'] = 'berhasil-tambah';
  header("Location: ../views/data-buku.php");
} else {
  $_SESSION['toast'] = 'gagal-tambah';
  header("Location: ../views/data-buku.php");
}

mysqli_close($conn);

?>