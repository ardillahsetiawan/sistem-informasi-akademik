<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";

$id_kls = $_GET["id"];
  $query = "DELETE FROM tbl_kls WHERE id_kls = $id_kls";
  $update = mysqli_query($conn, $query);

  if($update){
    echo "<script>
    alert ('Data Berhasil dihapus...!');
    document.location.href = 'kls.php'
    </script>";
  }

 ?>
