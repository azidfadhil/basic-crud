<?php

// echo "<pre>";
// print_r($_POST);
// die();

session_start();

require_once('./connect.php');

$nama_anggota = $_POST['nama_anggota'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$no_telp = $_POST['no_telp'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$sql = "INSERT INTO tb_anggota 
        (nama_anggota, alamat, email, no_telp, jenis_kelamin)
        VALUES
        ('$nama_anggota', '$alamat', '$email', '$no_telp', '$jenis_kelamin')";
if(mysqli_query($conn, $sql)) {
  $_SESSION['toast'] = 'berhasil-tambah';
  header("Location: ../views/data-anggota.php");
} else {
  $_SESSION['toast'] = 'gagal-tambah';
  header("Location: ../views/data-anggota.php");
}

mysqli_close($conn);

?>