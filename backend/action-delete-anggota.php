<?php

// echo "<pre>";
// print_r($_GET);
// die();

session_start();

require_once('./connect.php');

$id = $_GET['id'];

$sql = "DELETE FROM tb_anggota WHERE id=$id";
if(mysqli_query($conn, $sql)) {
  $_SESSION['toast'] = 'berhasil-hapus';
  header("Location: ../views/data-anggota.php");
} else {
  // echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $_SESSION['toast'] = 'gagal-hapus';
  header("Location: ../views/data-anggota.php");
}

mysqli_close($conn);

?>