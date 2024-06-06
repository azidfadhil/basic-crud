<?php

// echo "<pre>";
// print_r($_GET);
// die();

session_start();

require_once('./connect.php');

$id = $_GET['id'];
$sql = "DELETE FROM tb_buku WHERE id=$id";

if(mysqli_query($conn, $sql)) {
  $_SESSION['toast'] = 'berhasil-hapus';
  header("Location: ../views/data-buku.php");
} else {
  $_SESSION['toast'] = 'gagal-hapus';
  header("Location: ../views/data-buku.php");
}

mysqli_close($conn);

?>