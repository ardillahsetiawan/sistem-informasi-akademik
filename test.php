<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";
$id_kls = $_GET["id"];
$query_kls = "SELECT * FROM tbl_kls WHERE id_kls = $id_kls";
$result_kls = mysqli_query($conn, $query_kls);

$query_mhs = "SELECT * FROM detail_kls INNER JOIN tbl_mhs ON detail_kls.id_mhs = tbl_mhs.id_mhs WHERE id_kls = $id_kls";
$result_mhs = mysqli_query($conn, $query_mhs);
$row_mhs = mysqli_fetch_assoc($result_mhs);

var_dump($row_mhs);

 ?>
