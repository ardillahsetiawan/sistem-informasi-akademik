<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";

$id_user = $_GET["id"];
  $query = "DELETE FROM tbl_user WHERE id_user = $id_user";
  $update = mysqli_query($conn, $query);

  if($update){
    echo "<script>
    alert ('Data Berhasil dihapus...!');
    document.location.href = 'user.php'
    </script>";
  }

 ?>
