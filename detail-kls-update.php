<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";

$id_detail = $_GET["id"];
$query_detail = "SELECT * FROM detail_kls WHERE id = $id_detail";
$result_detail = mysqli_query($conn, $query_detail);
$row_detail = mysqli_fetch_assoc($result_detail);

if(isset($_POST["submit"])){

  $id_mhs = $_POST["id_mhs"];
  $id_kls = $_POST["id_kls"];

  $query = "UPDATE detail_kls SET
  id_mhs = '$id_mhs',
  id_kls = '$id_kls'
  WHERE id = $id_detail";
  $update = mysqli_query($conn, $query);

  if($update){
    echo "<script>
    alert ('Data Berhasil disimpan...!');
    document.location.href = 'detail-kls.php'
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

    <title>Edit Data Detail Kelas</title>
  </head>
  <body class="bg-secondary">
    <div class="container">
      <div class="row pt-2">
        <div class="col bg-primary py-5">
          <h1 class="text-center text-white">Edit Data Detail Kelas</h1>
        </div>
      </div>
        <div class="row">
          <?php include "menu.php"?>
          <div class="col-lg-9 bg-white">
            <h2 class="mt-2">Edit Data Detail Kelas</h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            <div class="mb-5">
              <form method="POST" target="">

                <form method="POST" target="">
                  <div class="mb-3">
                    <label for="id_mhs">ID Mahasiswa :</label>
                    <select class="form-select" id="id_mhs" name="id_mhs" required>
                      <?php
                      $query_mhs = "SELECT * FROM detail_kls INNER JOIN tbl_mhs ON detail_kls.id_mhs = tbl_mhs.id_mhs WHERE id = $id_detail";

                      $result_mhs = mysqli_query($conn, $query_mhs);
                      while($row_mhs = mysqli_fetch_assoc($result_mhs)){
                       ?>
                      <option value="<?php echo $row_mhs["id_mhs"] ?>"><?php echo $row_mhs["nama_lengkap"] ?></option>
                    <?php } ?>
                    </select>
                  </div>

                <div class="mb-3">
                  <label for="id_kls">Kelas :</label>
                  <select class="form-select" id="id_kls" name="id_kls" required>
                    <option value="">Pilih Kelas...</option>
                    <?php
                    $query_kls = "SELECT * FROM tbl_kls";
                    $result_kls = mysqli_query($conn, $query_kls);
                    while($row_kls = mysqli_fetch_assoc($result_kls)){
                     ?>
                    <option value="<?php echo $row_kls["id_kls"] ?>"><?php echo $row_kls["nm_kls"] ?></option>
                  <?php } ?>
                  </select>
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
