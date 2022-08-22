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
            <h2 class="mt-2">Input Data Mahasiswa</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <img src="image/campus.jpg" alt="campus" class="img-fluid mb-2">
            <div class="mb-5">
              <form method="POST" target="">
                <div class="mb-3">
                  <label for="nama" class="form-label">Nama :</label>
                  <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" required>
                </div>
                <div class="mb-3">
                  <label>Jenis Kelamin :</label><br>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio1" value="Laki-Laki" checked>
                    <label class="form-check-label" for="inlineRadio1">Laki-Laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="jk" id="inlineRadio2" value="Perempuan">
                    <label class="form-check-label" for="inlineRadio2">Perempuan</label>
                  </div>
                </div>
                <div class="mb-3">
                  <label for="kelas">Kelas :</label>
                  <select class="form-select" id="kelas" name="kelas" required>
                    <option value="">Pilih Kelas...</option>
                    <option value="4A">4A</option>
                    <option value="4B">4B</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="alamat">Alamat :</label>
                  <textarea class="form-control" rows="3" name="alamat" placeholder="Alamat Lengkap" id="alamat"></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="self.history.back()">Cancel</button>
              </form>
            </div>
            <hr>
            <h2 class="mt-2">Data Mahasiswa</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            <div class="table-responsive mb-5">
              <table class="table table-bordered table-hover">
                <thead class="table-primary">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>
                      <a href="update.php" class="btn btn-sm btn-success">Update</a>
                      <a href="delete.php" class="btn btn-sm btn-danger">Delete</a>
                    </td>
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
