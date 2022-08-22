<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";
//
$id_detail = $_SESSION["id_usr"]["id_user"] ;
// $id_detail = isset($_SESSION['id_user']) ? count($id_detail['id_user']) : 0;
$query_detail = "SELECT * FROM tbl_user WHERE id_user = $id_detail";
$result_detail = mysqli_query($conn, $query_detail);
$row_detail = mysqli_fetch_assoc($result_detail);

$query_mhs = "SELECT * FROM tbl_mhs WHERE id_user = $id_detail";
$result_mhs = mysqli_query($conn, $query_mhs);
$row_mhs = mysqli_fetch_assoc($result_mhs);

$query_kls = "SELECT * FROM detail_kls INNER JOIN tbl_mhs ON detail_kls.id_mhs = tbl_mhs.id_mhs INNER JOIN tbl_kls ON detail_kls.id_kls = tbl_kls.id_kls WHERE id_user = $id_detail";
$result_kls = mysqli_query($conn, $query_kls);
$row_kls = mysqli_fetch_assoc($result_kls);


if(isset($_POST["submit"])){

  $nama_lengkap = $_POST["nama_lengkap"];
  $tempat_lahir = $_POST["tempat_lahir"];
  $tanggal_lahir = $_POST["tanggal_lahir"];
  $alamat = $_POST["alamat"];
  $no_telp = $_POST["no_telp"];


  $query = "UPDATE tbl_mhs SET
  nama_lengkap = '$nama_lengkap',
  tempat_lahir = '$tempat_lahir',
  tanggal_lahir = '$tanggal_lahir',
  alamat = '$alamat',
  no_telp = '$no_telp'
  WHERE id_user = $id_detail";
  $update = mysqli_query($conn, $query);


  if($update){
    echo "<script>
    alert ('Data Berhasil disimpan...!');
    document.location.href = 'profile.php'
    </script>";
  } else {
    echo "<script>
    alert ('Data Gagal disimpan...!');
    history.go(-1);
    </script>";
  }
}
 ?>
 <!-- <pre><?php print_r($_SESSION); ?></pre> -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">

    <title>Aplikasi Akademik</title>
  </head>
  <body class="bg-secondary">
    <div class="container">
      <div class="row pt-2">
        <div class="col bg-primary py-5">
          <h1 class="text-center text-white">Aplikasi Akademik </h1>
        </div>
      </div>
        <div class="row">
          <?php include "menu.php"?>
          <div class="col-lg-9 bg-white">
            <h2 class="mt-2">Profile <?php echo $row_mhs["nama_lengkap"] ?></h2><br>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            <div class="mb-5">

                <form method="POST" target="">

                  <div class="mb-3">
                    <img src="berkas/<?php echo $row_detail["foto"] ?>" alt="" width="170" height="170"><br><br>
                  </div>
                  <div class="mb-3">
                    <label for="kode_kls" class="form-label">Nama Mahasiswa :</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="<?php echo $row_mhs["nama_lengkap"] ?>" placeholder="Kode Kelas" required>
                  </div>

                  <div class="mb-3">
                    <label for="kode_kls" class="form-label">Tempat Lahir:</label>
                    <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?php echo $row_mhs["tempat_lahir"] ?>" placeholder="Kode Kelas" required>
                  </div>

                  <div class="mb-3">
                    <label for="kode_kls" class="form-label">Tanggal Lahir :</label>
                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $row_mhs["tanggal_lahir"] ?>" placeholder="Kode Kelas" required>
                  </div>

                  <div class="mb-3">
                    <label for="kode_kls" class="form-label">Alamat :</label>
                    <input type="text" class="form-control" name="alamat" id="alamat" value="<?php echo $row_mhs["alamat"] ?>" placeholder="Kode Kelas" required>
                  </div>

                  <div class="mb-3">
                    <label for="kode_kls" class="form-label">No. Telepon :</label>
                    <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?php echo $row_mhs["no_telp"] ?>" placeholder="Kode Kelas" required>
                  </div>

                  <div class="mb-3">
                    <label for="kode_kls" class="form-label">Kelas :</label>
                    <input type="text" class="form-control" name="nm_kls" id="nm_kls" value="<?php echo $row_kls["nm_kls"] ?>" placeholder="Kode Kelas" readonly>
                  </div>


                <button type="submit" class="btn btn-warning" name="submit">Edit</button>
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
