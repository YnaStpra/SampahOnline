<?php
session_start();
//include "../backend/masyarakat/tampilProfil.php";
include "../backend/dashboard.php";
include "../backend/umkmBefore.php";
$id = $_SESSION['id_pelanggan'];
// Cek keberadaan session
if (!isset($_SESSION['id_pelanggan'])) {
  // Session tidak ada, arahkan ke halaman login
  header("Location: ../masuk.php");
  exit;
}
$sql = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'";
$result = query($sql);
if (!empty($result)) {
  $masyarakat = $result[0];
} else {
  echo "data masyarakat tidak ditemukan.";
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Profile | BANG SAMPAH</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>

  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand"><img src="../img/logo.png" width="55px" alt="logo-pw"></a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="BerandaAfter.php">Beranda<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="umkm.php">UMKM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="event.php">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="artikel.php">Artikel</a>
          </li>
          <li class="nav-item dropdown">
            <?php
            $gambar = $masyarakat['gambar'] ? '../img/masyarakat/' . $masyarakat['gambar'] : '../img/profpic.jpg';
            ?>
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <img src="<?= $gambar ?>" class="img-circle" width="25px" alt="img-profile">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item pd-0" href="profile-masyarakat.php"><i class="fas fa-user mr-3"></i>Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item pd-0" href="edit-profile-masyarakat.php"><i class="fas fa-user-edit mr-3"></i>Edit Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item pd-0" href="tukar-poin.php"><i class="fas fa-coins mr-3"></i>Poin</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item pd-0" href="../backend/logout.php"><i class="fas fa-sign-out-alt mr-3"></i>Keluar</a>
            </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- JUMBOTRON -->

  <div class="jumbotron jumbotron-fluid bot" style="background-image: url(../img/jumbotron6.png); background-repeat: no-repeat;">
    <div class="container">

    </div>
  </div>
  <!-- AKHIT JUMBOTRON -->

  <div class="profile">
    <div class="container">
      <div class="row mg-lg-btm">
        <div class="col-lg-8">
          <div class="row">
            <div class="col-lg-3 col-sm-5 col-md-4 mb-sm-7 pl-minus">
              <div class="wrapper-kelas rounded minus-top logo-center white-bg wrapper-kelas-sm">
                <img src="<?= $gambar ?>" class="img-fluid img-thumbnail" alt="">
              </div>
            </div>
            <div class="col-lg-9 col-sm-7 col-md-8">
              <h3><?= $masyarakat['nama'] ?></h3>
              <p><i class="fa fa-map-marker mr-2 warna"></i><?= $masyarakat['alamat'] ?></p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 text-lg-right">
          <a href="tukar-sampah.php" class="btn btn-edit"><i class="fas fa-exchange-alt mr-2"></i></i>Tukar Plastik</a>
          <a href="tukar-poin.php" class="btn btn-edit"><i class="fas fa-exchange-alt mr-2"></i>Tukar Poin</a>
        </div>

      </div>
    </div>
  </div>

  <section class="detail" id="detail">
    <div class="container">
      <div class="row color">
        <div class="col-lg-4">
          <div class="card btn-edit">
            <div class="card-body">
              <div class="card-body-icon font-size">
                <i class="fas fa-coins mr-2"></i>
              </div>
              <h5><b>JUMLAH POIN</h5></b>
              <div class="display-4"><?= $totalPoint?></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card btn-edit">
            <div class="card-body">
              <div class="card-body-icon font-size">
                <i class="fas fa-recycle mr-2"></i>
              </div>
              <h5><b>JUMLAH PENUKARAN</h5></b>
              <div class="display-4"><?=$jumlahPenukaran?></div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card btn-edit">
            <div class="card-body">
              <div class="card-body-icon font-size">
                <i class="fas fa-certificate mr-2"></i>
              </div>
              <h5><b>EVENT TELAH DIIKUTI</h5></b>
              <div class="display-4"><?= $jumlah_event?></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="mg-lg-top">

  </section>

  <footer>
    <div class="foot">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h4>BANG SAMPAH</h4>
            <p>Website yang memudahkan proses pengolahan sampah plastik di Lombok NTB</p>
          </div>
          <div class="col-lg-4 ">
            <h4>Menu BANG SAMPAH</h4>
            <div class="hov">
              <ul>
                <li><a href="about-us.php">Tentang Kami</a></li>
                <li><a href="umkm.php">UMKM</a></li>
                <li><a href="event.php">Event</a></li>
                <li><a href="artikel.php">Artikel</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <h4>HUBUNGI KAMI</h4>
            <p>1, Vila Ali, Gunung Sari, Mataram</p>
            <p>(021) 098 082</p>
            <p>contact@bangsampah.com</p>
            <a href="www.facebook.com" class="fa fa-facebook mr-3 fa-3x"></a>
            <a href="www.twiter.com" class="fa fa-twitter mr-3 fa-3x"></a>
            <a href="www.instagram.com" class="fa fa-instagram mr-3 fa-3x"></a>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6">
            <p>copyright © 2023 - Bang Sampah. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>

  <script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>