<?php

// echo "<pre>";
// print_r($_POST);
// die();

session_start();

require_once('./connect.php');

$id = $_POST['id'];
$nama_anggota = $_POST['nama'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$no_telp = $_POST['no_telp'];
$jenis_kelamin = $_POST['jenis_kelamin'];

$sql = "UPDATE tb_anggota 
        SET
          nama_anggota = '$nama_anggota',
          alamat = '$alamat',
          email = '$email',
          no_telp = '$no_telp',
          jenis_kelamin = '$jenis_kelamin'
        WHERE id = $id
        ";
if(mysqli_query($conn, $sql)) {
  $_SESSION['toast'] = 'berhasil-edit';
  header("Location: ../views/data-anggota.php");
} else {
  // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $_SESSION['toast'] = 'gagal-edit';
  header("Location: ../views/data-anggota.php");
}

mysqli_close($conn);

?>