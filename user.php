<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";

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
      <div class="row">
        <div class="col bg-primary py-5">
          <h1 class="text-center text-white">Aplikasi Akademik</h1>
        </div>
      </div>
        <div class="row">
          <?php include "menu.php"?>
          <div class="col-md-9 bg-white">

            <h2 class="mt-2">Data User</h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            <form method="GET">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="form-group">
                            <input type="text" name="cari" class="form-control" placeholder="Cari Username..">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <button class="btn btn-info">Cari</button>
                        <a href="user.php" class="btn btn-primary">Refresh</a>
                        <a href="user-create.php" class="btn btn-primary">Tambah Data</a>
                    </div>
                </div>
                <?php
                if (isset($_GET['cari'])) {
                  $cari = $_GET['cari'];
                  echo "Hasil Pencarian : <b>"  . $cari . "</b>";
                } ?>
            </form>

            <br>
            <div class="table-responsive mb-5">
              <table class="table table-bordered table-hover">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">ID User</th>
                    <th scope="col">Username</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Level</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  	if(isset($_GET['cari'])){
                  		$cari = $_GET['cari'];
                  		$data = "SELECT * FROM tbl_user WHERE username LIKE '%".$cari."%'";
                  	} else {
                  		$data = "SELECT * FROM tbl_user order by id_user asc";
                  	}
                  	$no = 1;
                    ?>
                    <?php
                    $result = mysqli_query($conn, $data);
                    while ($row_user = mysqli_fetch_assoc($result)){?>

                  	<tr>
                  		<td><?php echo $no++; ?></td>
                      <td><?php echo $row_user['id_user']; ?></td>
                      <td><?php echo $row_user['username']; ?></td>
                      <!-- <td><?php echo $row_user['foto']; ?></td> -->
                      <td align="center"><?php echo "<img src='berkas/$row_user[foto]' width='90' height='90' />";?></td>
                      <td><?php echo $row_user['level']; ?></td>
                      <td>
                        <a href="user-update.php?id=<?php echo $row_user["id_user"] ?>" class="btn btn-sm btn-success">Update</a>
                        <a href="user-delete.php?id=<?php echo $row_user["id_user"] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">Delete</a>
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
