<?php
session_start();
include 'koneksi.php';
if(isset($_SESSION["login"])){
  header("Location: home.php");
}


if(isset($_POST["login"])){

  $username = $_POST["username"];
  $password = md5($_POST["password"]);
  $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username' and password = '$password'");
  $ambil =  mysqli_query($conn, "SELECT level FROM tbl_user WHERE username='$username'");
  $user =  mysqli_query($conn, "SELECT id_user FROM tbl_user WHERE username='$username'");
  $cek = mysqli_num_rows($result);
  if ($cek == 1) {
    $ambil;
    $_SESSION["level"] = $ambil->fetch_assoc();
    $_SESSION["id_usr"] = $result->fetch_assoc();
    $_SESSION["login"] = true;
    $_SESSION["username"] = $username;

    header("Location:home.php");
    exit;
  }
  $error = true;
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
          <h1 class="text-center text-white">Aplikasi Akademik</h1>
        </div>
      </div>
        <div class="row">

          <div class="col-lg-3 bg-warning">
            <h4 class="mt-2">Menu</h4>
            <ul class="nav flex-column mb-5">
              <li class="nav-item">
                <a class="nav-link" href="index.php">Login</a>
              </li>
            </ul>
          </div>

          <div class="col-lg-9 bg-white">
            <h2 class="mt-2">Login Aplikasi Akademik</h2><br><br>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> -->
            <?php if(isset($error)){?>
            <div class="alert alert-warning alert-dismissible fade show">
              Username atau Password SALAH...!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="close"></button>
            </div>
          <?php } ?>
            <div class="mb-5">
              <form method="POST" target="">
                <div class="mb-3">
                  <label for="username" class="form-label">Username :</label>
                  <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Password :</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
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
