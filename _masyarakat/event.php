<?php
session_start();
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
$table_name = 'event';
$data = getSpesifikPage($table_name);
$event = $data['data'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Event | BANG SAMPAH</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
</head>

<body>

  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand"><img src="../img/logo.png" width="55px" alt="logo-pw"></a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="BerandaAfter.php">Beranda</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="umkm.php">UMKM</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" id="penanda" href="event.php">Event<span class="sr-only">(current)</span></a>
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
  <div class="jumbotron jumbotron-fluid" style="background: url('../img/1.png'); background-repeat: no-repeat;">
    <div class="container">
      <h1 class="display-4 text-shadow">Dunia darurat sampah <span>plastik.</span><br>Ikuti berbagai macam event yang<span> seru!</span></h1>
      <div class="row justify-content-center">
        <form class="form-inline input-group cari my-2 my-lg-0" autocomplete="off" method="GET">
          <input class="form-control mr-sm-2" name="search" type="search" placeholder="Cari event" aria-label="Search">
          <button class="btn btn-edit my-2 my-sm-0" type="submit" name="submit">Cari</button>
        </form>
      </div>
    </div>
  </div>
  <!-- AKHIT JUMBOTRON -->

  <!-- BREADCUMBR -->

  <nav aria-label="breadcrumb" class="mg-btm">
    <div class="container">
      <div class="">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="BerandaAfter.php">Beranda</a></li>
          <li class="breadcrumb-item active" aria-current="page">Event</li>
        </ol>
      </div>
    </div>
  </nav>
  <!-- AKHUR BREADCUMBR -->
  <section class="event" id="event">
    <div class="container">
      <div class="row">
        <?php
        foreach ($event as $row) {
          $id_umkm = $row['id_umkm'];
          $sql_umkm = "SELECT nama FROM umkm WHERE id_umkm = $id_umkm";
          $result_umkm = query($sql_umkm);
          $nama_umkm = $result_umkm[0]['nama'];

        ?>
          <!-- col-sm-offset-1 -->
          <div class="col-lg-4">
            <div class="card">
              <?php
                $gambarEvent = $row['gambar'] ? '../img/event/' . $row['gambar'] : '../img/profpic.jpg';
              ?>
              <img src="<?= $gambarEvent ?>" class="card-img-top" alt="latifa">
              <div class="tanggal btn-edit"><?= $row['tanggal']; ?></div>
              <div class="card-body">
                <p class="komunitas"><?= $nama_umkm ?></p>
                <h4 class="nama-event"><?= $row['nama']; ?></h4>
                <p class="card-text"><?= implode(' ', array_slice(explode(' ', $row['deskripsi']), 0, 11)); ?></p>
                <hr>
                <div class="row">
                  <div class="mr-auto text-left pl-minus">
                    <a class="nav-link warna" href="share.php"><i class="fas fa-share-alt warna mr-3"></i></a>
                  </div>
                  <div class="pr-15">
                    <a href="rincian-event.php?kd_event=<?= isset($row['kd_event']) ? $row['kd_event'] : '' ?>" class="btn btn-edit">Selengkapnya</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php

        }
        ?>
      </div>
    </div>
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
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>


  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>