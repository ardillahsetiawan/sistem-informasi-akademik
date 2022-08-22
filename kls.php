<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";
//
// $query_kls = "SELECT * FROM tbl_kls ORDER BY id_kls asc";
// $result_kls = mysqli_query($conn, $query_kls);
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
            <h2 class="mt-2">Data Kelas</h2>
            <form method="GET">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" name="cari" class="form-control" placeholder="Cari Nama Kelas..">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-info">Cari</button>
                        <a href="kls.php" class="btn btn-primary">Refresh</a>
                        <a href="kls-create.php" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div><br>
                <?php
                if (isset($_GET['cari'])) {
                  $cari = $_GET['cari'];
                  echo "Hasil Pencarian : <b>"  . $cari . "</b>";
                } ?>
            </form>
            <div class="table-responsive mb-5">
              <table class="table table-bordered table-hover">
                <thead class="table-primary">
                  <tr >
                    <th scope="col">ID Kelas</th>
                    <th scope="col">Kode Kelas</th>
                    <th scope="col">Nama Kelas</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(isset($_GET['cari'])){
                      $cari = $_GET['cari'];
                      $data = "SELECT * FROM tbl_kls WHERE nm_kls LIKE '%".$cari."%'";
                    } else {
                      $data = "SELECT * FROM tbl_kls order by nm_kls asc";
                    }
                    $no = 1;
                    ?>
                    <?php
                    $result = mysqli_query($conn, $data);
                    while ($row_user = mysqli_fetch_assoc($result)){?>

                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row_user['kode_kls']; ?></td>
                      <td><?php echo $row_user['nm_kls']; ?></td>
                      <td>
                        <a href="kls-update.php?id=<?php echo $row_user["id_kls"] ?>" class="btn btn-sm btn-success" >Update</a>
                        <a href="kls-delete.php?id=<?php echo $row_user["id_kls"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
                        <a href="kls-lihat.php?id=<?php echo $row_user["id_kls"] ?>" class="btn btn-sm btn-primary">Lihat</a>
                        <a href="kls-download.php?id=<?php echo $row_user["id_kls"] ?>" class="btn btn-sm btn-warning"  target="_blank">Download</a>
                      </td>
                    </tr>
                    <?php } ?>
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
