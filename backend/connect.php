<?php

$host = 'localhost';
$user = 'root';
$pass = 'toor';
$db   = 'simperpus_vsga2024';

$conn = mysqli_connect($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>