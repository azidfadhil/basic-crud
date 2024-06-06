<?php

// echo "<pre>";
// print_r($_POST);
// die();

session_start();

require_once('./connect.php');

$buku_id = $_POST['buku_id'];
$anggota_id = $_POST['anggota_id'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

$sql = "INSERT INTO tb_transaksi 
        (buku_id, anggota_id, status, tgl_pinjam, tgl_kembali)
        VALUES
        ('$buku_id', '$anggota_id', '1', '$tgl_pinjam', '$tgl_kembali')";

if(mysqli_query($conn, $sql)) {
  $_SESSION['toast'] = 'berhasil-tambah';
  header("Location: ../views/transaksi.php");
} else {
  $_SESSION['toast'] = 'gagal-tambah';
  header("Location: ../views/transaksi.php");
}

mysqli_close($conn);

?>