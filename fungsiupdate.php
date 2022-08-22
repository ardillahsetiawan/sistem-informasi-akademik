<?php
include 'koneksi.php';
  $id_user = $_POST["id_user"];
  $username = $_POST["username"];
  $level = $_POST["level"];

  $rand = rand();
  $ekstensi =  array('png','jpg','jpeg');
  $filename = $_FILES['foto']['name'];
  $img_tmp = $_FILES['foto']['tmp_name'];

  if($filename){
    unlink('berkas/'.$fotolama);
    move_uploaded_file($img_tmp, 'berkas/'.$filename);
    $querySQL = "UPDATE tbl_user SET
      username = '$username',
      level = '$level',
      foto ='$filename' WHERE id_user = '$id_user'";
  } else {
    $querySQL = "UPDATE tbl_user SET
      username = '$username',
      level = '$level'
      WHERE id_user = '$id_user'";
  }

  $hasil = $conn->query($querySQL);
  echo "<script>
  alert ('Data Berhasil Di Edit...!');
  document.location.href = 'user.php'
  </script>";

 ?>
