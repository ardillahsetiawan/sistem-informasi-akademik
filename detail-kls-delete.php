<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";

$id = $_GET["id"];
  $query = "DELETE FROM detail_kls WHERE id = $id";
  $update = mysqli_query($conn, $query);

  if($update){
    echo "<script>
    alert ('Data Berhasil dihapus...!');
    document.location.href = 'detail-kls.php'
    </script>";
  }

 ?>
