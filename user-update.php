<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location: index.php");
}

include "koneksi.php";

$id_user = $_GET["id"];
$query_user = "SELECT * FROM tbl_user WHERE id_user = $id_user";
$result_user = mysqli_query($conn, $query_user);
$row_user = mysqli_fetch_assoc($result_user);

 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="image/icon.jpg" type="image/x-icon">

    <title>Edit Data Mahasiswa</title>
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
            <h2 class="mt-2">Edit Data User</h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            <div class="mb-5">
              <form method="POST" action="fungsiupdate.php" enctype="multipart/form-data">
                <div class="mb-3">
                  <label for="id_user" class="form-label">ID User :</label>
                  <input type="text" class="form-control" name="id_user" id="id_user" value="<?php echo $row_user["id_user"] ?>" readonly>
                </div>
                <div class="mb-3">
                  <label for="level">Level :</label>
                  <select class="form-select" id="level" name="level" required>
                    <option value="<?php echo $row_user["level"] ?>"><?php echo $row_user["level"] ?></option>
                    <option value="admin">Admin</option>
                    <option value="mahasiswa">Mahasiswa</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="username" class="form-label">Username :</label>
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo $row_user["username"] ?>" required>
                </div>
                <div class="mb-3">
                  <label for="foto" class="form-label">Foto :</label><br>
                  <img src="berkas/<?php echo $row_user["foto"] ?>" alt="" width="170" height="170"><br><br>
                  <input type="file" class="form-control" name="foto" id="foto" value="<?php echo $row_user["foto"] ?>">
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
