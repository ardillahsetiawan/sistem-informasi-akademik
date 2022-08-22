<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";

if(isset($_POST["submit"])){

  $nm_kls = $_POST["nm_kls"];
  $kode_kls = $_POST["kode_kls"];

  $query = "INSERT INTO tbl_kls VALUES ('', '$kode_kls', '$nm_kls')";
  $create = mysqli_query($conn, $query);

  if($create){
    echo "<script>
    alert ('Data Berhasil disimpan...!');
    document.location.href = 'kls.php'
    </script>";
  } else {
    echo "<script>
    alert ('Data Gagal disimpan...!');
    history.go(-1);
    </script>";
  }
}
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">

    <title>Tambah Data Kelas</title>
  </head>
  <body class="bg-secondary">
    <div class="container">
      <div class="row pt-2">
        <div class="col bg-primary py-5">
          <h1 class="text-center text-white">Tambah Data Kelas</h1>
        </div>
      </div>
        <div class="row">
          <?php include "menu.php"?>
          <div class="col-lg-9 bg-white">
            <h2 class="mt-2">Input Data Kelas</h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            <div class="mb-5">
              <form method="POST" target="">
                <div class="mb-3">
                  <label for="nm_kls" class="form-label">Kode Kelas :</label>
                  <input type="text" class="form-control" name="kode_kls" id="kode_kls" placeholder="Kode Kelas" required>
                </div>
                <div class="mb-3">
                  <label for="nm_kls" class="form-label">Nama Kelas :</label>
                  <input type="text" class="form-control" name="nm_kls" id="nm_kls" placeholder="Nama Kelas" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="self.history.back()">Cancel</button>
              </form>
            </div>
          </div>
        </div>
          <div class="row">
            <div class="col bg-info py-2">
              <p class="text-center text-white">Copyright &copy;   <?php echo date ("Y") ?></p>
            </div>
          </div>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>
