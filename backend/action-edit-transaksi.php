<?php

// echo "<pre>";
// print_r($_POST);
// die();

session_start();

require_once('./connect.php');

$id = $_POST['id'];
$buku_id = $_POST['buku_id'];
$anggota_id = $_POST['anggota_id'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];
$status = $_POST['status'];

$sql = "UPDATE tb_transaksi 
        SET
          buku_id = '$buku_id',
          anggota_id = '$anggota_id',
          tgl_pinjam = '$tgl_pinjam',
          tgl_kembali = '$tgl_kembali',
          status = '$status'
        WHERE id = $id
        ";

if(mysqli_query($conn, $sql)) {
  $_SESSION['toast'] = 'berhasil-edit';
  header("Location: ../views/transaksi.php");
} else {
  // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $_SESSION['toast'] = 'gagal-edit';
  header("Location: ../views/transaksi.php");
}

mysqli_close($conn);

?>