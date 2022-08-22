<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";
$id_kls = $_GET["id"];
$query_mhs = "SELECT * FROM detail_kls INNER JOIN tbl_mhs ON detail_kls.id_mhs = tbl_mhs.id_mhs WHERE id_kls = $id_kls";
$result_mhs = mysqli_query($conn, $query_mhs);
$row_mhs = mysqli_fetch_assoc($result_mhs);

$query_kls = "SELECT * FROM tbl_kls WHERE id_kls = $id_kls";
$result_kls = mysqli_query($conn, $query_kls);


 ?>


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
          <h1 class="text-center text-white">Aplikasi Akademik</h1>
        </div>
      </div>
        <div class="row">
          <?php include "menu.php"?>
          <div class="col-lg-9 bg-white">
            <?php while ($row_kls = mysqli_fetch_array($result_kls)){ ?>
            <h2 class="mt-2">Data Kelas <?php echo $row_kls["nm_kls"] ?> </h2>
          <?php } ?>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            <!-- <a href="kls-lihat.php?id=<?php echo $row_user["id_kls"] ?>" class="btn btn-success" onclick="window.open('kls-download.php')">Download PDF</a> -->
            <div class="table-responsive mb-5"><br>
              <table class="table table-bordered table-hover">
                <thead class="table-primary">
                  <tr>
                    <th scope="col" class="bg black">ID Mahasiswa</th>
                    <th scope="col">Nama Mahasiswa</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $result = mysqli_query($conn, $query_mhs);

                   while ($row_mhs = mysqli_fetch_assoc($result)){ ?>
                  <tr>
                    <th scope="row"><?php echo $row_mhs["id_mhs"] ?></th>
                    <th scope="row"><?php echo $row_mhs["nama_lengkap"] ?></th>
                  <?php } ?>
                  </tr>
                </tbody>
              </table>
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
