<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";

if(isset($_POST["submit"])){
  $id_user = $_POST["id_user"];
  $nama_lengkap = $_POST["nama_lengkap"];
  $tempat_lahir = $_POST["tempat_lahir"];
  $tanggal_lahir = $_POST["tanggal_lahir"];
  $alamat = $_POST["alamat"];
  $no_telp = $_POST["no_telp"];

  $query = "INSERT INTO tbl_mhs VALUES ('', '$id_user', '$nama_lengkap', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$no_telp')";
  $create = mysqli_query($conn, $query);

  if($create){
    echo "<script>
    alert ('Data Berhasil disimpan...!');
    document.location.href = 'mhs.php'
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

    <title>Tambah Data Mahasiswa</title>
  </head>
  <body class="bg-secondary">
    <div class="container">
      <div class="row pt-2">
        <div class="col bg-primary py-5">
          <h1 class="text-center text-white">Tambah Data Mahasiswa</h1>
        </div>
      </div>
        <div class="row">
          <?php include "menu.php"?>
          <div class="col-lg-9 bg-white">
            <h2 class="mt-2">Input Data Mahasiswa</h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            <div class="mb-5">
              <form method="POST" target="">
                <div class="mb-3">
                  <label for="id_user">ID User :</label>
                  <select class="form-select" id="id_user" name="id_user" required>
                    <option value="">Pilih User...</option>
                    <?php
                    $query_user = "SELECT * FROM tbl_user";
                    $result_user = mysqli_query($conn, $query_user);
                    while($row_user = mysqli_fetch_assoc($result_user)){
                     ?>
                    <option value="<?php echo $row_user["id_user"] ?>"><?php echo $row_user["username"] ?></option>
                  <?php } ?>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="nama_lengkap" class="form-label">Nama Mahasiswa :</label>
                  <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Mahasiswa..." required>
                </div>
                <div class="mb-3">
                  <label for="tempat_lahir" class="form-label">Tempat Lahir :</label>
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir..." required>
                </div>
                <div class="mb-3">
                  <label for="tanggal_lahir" class="form-label">Tanggal Lahir :</label>
                  <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir..." required>
                </div>
                <div class="mb-3">
                  <label for="alamat">Alamat :</label>
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat Lengkap..." id="alamat"></textarea>
                </div>
                <div class="mb-3">
                  <label for="no_telp" class="form-label">Nomor Telepon :</label>
                  <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="Nomor Telepon..." required>
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
