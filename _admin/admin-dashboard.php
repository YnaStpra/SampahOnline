<?php
session_start();
include "../backend/dashboard.php";
include "../backend/umkmBefore.php";
$id = $_SESSION['id_admin'];
// Cek keberadaan session
if (!isset($_SESSION['id_admin'])) {
  // Session tidak ada, arahkan ke halaman login
  header("Location: ../masuk.php");
  exit;
}
$sql = "SELECT * FROM admin WHERE id_admin = '$id'";
$result = query($sql);
if (!empty($result)) {
  $admin = $result[0];
} else {
  echo "data admin tidak ditemukan.";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Dashboard | BANG SAMPAH</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>

  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <!-- <div class="container"> -->
    <a class="navbar-brand"><img src="../img/logo.png" width="55px" alt="logo-pw"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <?php
          $gambar = $admin['gambar'] ? '../img/admin/' . $admin['gambar'] : '../img/profpic.jpg';
          ?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?= $gambar ?>" class="img-circle" width="25px" alt="img-profile">
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="edit-profile-admin.php"><i class="fas fa-user-edit mr-3"></i>edit profil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="admin-dashboard.php"><i class="fas fa-cogs mr-3"></i>Kelola</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../backend/logout.php"><i class="fas fa-sign-out-alt mr-3"></i>Keluar</a>
          </div>
        </li>
      </ul>
    </div>
    <!-- </div> -->
  </nav>


  <section class="admin-side" id="admin-side">
    <!-- <div class="container"> -->
    <div class="row mg-top mr-ml-plus">
      <div class="col-lg-3 color pr pl-minus">
        <div class="card shadow btn-edit">
          <ul class="nav flex-column pd-18">
            <li class="nav-item ml-25">
              <a class="nav-link active mg-btm-10" href="admin-dashboard.php"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a>
              <hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link" href="data-masyarakat.php"><i class="fas fa-user mr-3"></i>Data Masyarakat</a>
              <hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link " href="data-umkm.php"><i class="fas fa-house-user mr-3"></i>Data UMKM</a>
              <hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link mg-btm-10" href="data-event.php"><i class="fas fa-calendar-alt mr-3"></i>Data Event</a>
              <hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link" href="data-artikel.php"><i class="fas fa-newspaper mr-3"></i>Data Artikel</a>
              <hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link" href="umkm-side-penukaran.php"><i class="fas fa-recycle mr-3"></i>Data Penukaran</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="col-lg-9 color pr-pl-minus">
        <div class="card pd-20">
          <h1><i class="fas fa-tachometer-alt mr-3 warna"></i>Dashboard</h1>
          <hr>
          <div class="row justify-content-center">
            <div class="card btn-edit ml-3" style="width: 18rem">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-user mr-2"></i>
                </div>
                <h6>Data Masyarakat</h6>
                <div class="display-4"><a href="data-masyarakat.php"><?= $jumlahMasyarakat; ?></a></div><!-- atur menggunakan php untuk nilai 2013 -->
              </div>
            </div>
            <div class="card btn-edit ml-3" style="width: 18rem">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-house-user mr-2"></i>
                </div>
                <h6>Data Umkm</h6>
                <div class="display-4"><a href="data-umkm.php"><?= $jumlahUMKM; ?></a></div>
              </div>
            </div>
            <div class="card btn-edit ml-3" style="width: 18rem">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-newspaper mr-2"></i>
                </div>
                <h6>Data Artikel</h6>
                <div class="display-4"><a href="data-artikel.php"><?= $jumlahArtikel; ?></a></div>
              </div>
            </div>
            <div class="card btn-edit ml-3" style="width: 18rem">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-calendar-alt mr-2"></i>
                </div>
                <h6>Data Event</h6>
                <div class="display-4"><a href="data-event.php"><?= $jumlahEvent; ?></a></div>
              </div>
            </div>
            <div class="card btn-edit ml-3" style="width: 18rem">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-recycle mr-2"></i>
                </div>
                <h6>Data Penukaran</h6>
                <div class="display-4"><a href="umkm-side-penukaran.php"><?= $jumlahPenukaran?></a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>



  <script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>