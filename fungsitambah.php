<?php
include 'koneksi.php';
$username = $_POST['username'];
$password = md5($_POST['password']);
$level = $_POST['level'];

$rand = rand();
$ekstensi =  array('png','jpg','jpeg');
$filename = $_FILES['foto']['name'];
$ukuran = $_FILES['foto']['size'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);

if(!in_array($ext,$ekstensi) ) {
  echo "<script>alert('Salah Ekstensi File!');</script>";
  echo "<script>location='user-create.php';</script>";
}else{
	if($ukuran < 1044070){
		$xx = $rand.'_'.$filename;
		move_uploaded_file($_FILES['foto']['tmp_name'], 'berkas/'.$rand.'_'.$filename);
		mysqli_query($conn, "INSERT INTO tbl_user (username, password, foto, level) VALUES ('$username', '$password', '$xx', '$level')");
		echo "<script>
		alert ('Data Berhasil Ditambah...!');
		document.location.href = 'user.php'
		</script>";
	}else{
		echo "<script>
		alert ('Ukuran File Terlalu Besar...!');
		document.location.href = 'user-create.php'
		</script>";
	}
}
