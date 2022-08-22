
<div class="col-lg-3 bg-warning">
  <h4 class="mt-2">Menu</h4>
  <ul class="nav flex-column mb-5">
    <li class="nav-item">
      <a class="nav-link" href="home.php">Dashboard</a>
    </li>
    <?php if ($_SESSION['level']['level'] == 'admin') { ?>
    <li class="nav-item">
      <a class="nav-link" href="user.php">User</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="mhs.php">Mahasiswa</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="kls.php">Kelas</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="detail-kls.php">Detail Kelas</a>
    </li>

<?php } ?>
    <?php if ($_SESSION['level']['level'] == 'mahasiswa') { ?>
      <li class="nav-item">
        <a class="nav-link" href="profile.php">Profile</a>
      </li>
      <?php } ?>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
  </ul>
</div>
