<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";
//
// $query = mysqli_query($conn, "SELECT * FROM detail_kls INNER JOIN tbl_mhs ON detail_kls.id_mhs = tbl_mhs.id_mhs INNER JOIN tbl_kls ON detail_kls.id_kls = tbl_kls.id_kls ORDER BY nama_lengkap ASC");

 ?>
 <!-- <pre><?php print_r($_SESSION); ?></pre> -->

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">

    <title>App Data Mahasiswa</title>
  </head>
  <body class="bg-secondary">
    <div class="container">
      <div class="row pt-2">
        <div class="col bg-primary py-5">
          <h1 class="text-center text-white">Aplikasi Data Mahasiswa</h1>
        </div>
      </div>
        <div class="row">
          <?php include "menu.php"?>
          <div class="col-lg-9 bg-white">
            <h2 class="mt-2">Data Detail Kelas</h2>
            <form method="GET">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" name="cari" class="form-control" placeholder="Cari Nama..">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-info">Cari</button>
                        <a href="detail-kls.php" class="btn btn-primary">Refresh</a>
                        <a href="detail-kls-create.php" class="btn btn-primary">Tambah Data</a>
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
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID Mahasiswa</th>
                    <th scope="col">Nama Mahasiswa</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    if(isset($_GET['cari'])){
                      $cari = $_GET['cari'];
                      $data = "SELECT * FROM detail_kls INNER JOIN tbl_mhs ON detail_kls.id_mhs = tbl_mhs.id_mhs INNER JOIN tbl_kls ON detail_kls.id_kls = tbl_kls.id_kls WHERE nama_lengkap LIKE '%".$cari."%'";

                    } else {
                      $data = "SELECT * FROM detail_kls INNER JOIN tbl_mhs ON detail_kls.id_mhs = tbl_mhs.id_mhs INNER JOIN tbl_kls ON detail_kls.id_kls = tbl_kls.id_kls order by nama_lengkap asc";
                    }
                    $no = 1;
                    ?>
                    <?php
                    $result = mysqli_query($conn, $data);
                    while ($row_user = mysqli_fetch_assoc($result)){?>
                    <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $row_user['id_mhs']; ?></td>
                      <td><?php echo $row_user['nama_lengkap']; ?></td>
                      <td><?php echo $row_user['nm_kls']; ?></td>
                      <td>
                        <a href="detail-kls-update.php?id=<?php echo $row_user["id"] ?>" class="btn btn-sm btn-success">Update</a>
                        <a href="detail-kls-delete.php?id=<?php echo $row_user["id"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
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
