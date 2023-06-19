<?php
session_start();
include "backend/umkmBefore.php";
$table_name = 'umkm';
$data = getSpesifikPage($table_name);

$total_halaman = $data['total_halaman'];
$halaman_saat_ini = $data['halaman_saat_ini'];
$umkm = $data['data'];
$jumlah_per_halaman = $data['jumlah_per_halaman'];

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>UMKM | BANG SAMPAH</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
</head>

<body>

  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand"><img src="img/logo.png" width="55px" alt="logo-pw"></a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="beranda.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="penanda" href="umkmBefore.php">UMKM<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="eventBefore.php">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="artikelBefore.php">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="daftar.php">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-edit" href="masuk.php">Masuk</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- JUMBOTRON -->
  <div class="jumbotron jumbotron-fluid" style="background: url('img/3.png'); background-repeat: no-repeat;">
    <div class="container">

    </div>
  </div>
  <!-- AKHIT JUMBOTRON -->

  <!-- BREADCUMBR -->

  <nav aria-label="breadcrumb">
    <div class="container">
      <div class="">
        <ol class="breadcrumb">
        </ol>
      </div>
    </div>
  </nav>
  <!-- AKHUR BREADCUMBR -->

  <!-- DATA KOMUNITAS -->

  <section class="data" id="data">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h1 class="mg-sm-btm">Data UMKM</h1>
              <div class="row">
                <div class="col-lg-3">
                  <form class="form-inline input-group" method="get" autocomplete="off">
                    <div class="input-group-prepend">
                      <div class="input-group-text" id="btnGroupAddon">
                        <i class="fas fa-search"></i>
                      </div>
                    </div>
                    <input type="search" name="search" class="form-control" placeholder="cari UMKM" aria-label="Search" aria-describedby="btnGroupAddon">
                  </form>
                </div>
              </div>
              <form action="backend/umkmBefore.php">
                <table class="table mg-btm mg-sm-top table-edit">
                  <!-- <caption>List of users</caption> -->
                  <thead class="thead-edit">
                    <tr>
                      <th scope="col">No.</th>
                      <th scope="col">Nama UMKM</th>
                      <th scope="col">Alamat</th>
                      <th scope="col">Penanggung Jawab</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $i = ($halaman_saat_ini - 1) * $jumlah_per_halaman + 1;
                    foreach ($umkm as $row) {
                    ?>
                      <tr>
                        <th scope="row"><?= $i; ?></th>
                        <td><a class="warna"><?= $row['nama']; ?></a></td>
                        <td><?= $row['alamat']; ?></td>
                        <td><?= $row['penanggung_jawab']; ?></td>
                      </tr>
                    <?php
                      $i++;
                    }
                    ?>
                  </tbody>
                </table>
              </form>
              <nav aria-label="">
                <ul class="pagination justify-content-end">
                  <?php if ($halaman_saat_ini > 1) : ?>
                    <li class="page-item">
                      <a class="page-link" href="?page=<?= $halaman_saat_ini - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                    </li>
                  <?php endif; ?>
                  <?php for ($i = 1; $i <= $total_halaman; $i++) : ?>
                    <li class="page-item <?= ($i == $halaman_saat_ini) ? 'active' : ''; ?>" aria-current="page">
                      <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                    </li>
                  <?php endfor; ?>
                  <?php if ($halaman_saat_ini < $total_halaman) : ?>
                    <li class="page-item">
                      <a class="page-link" href="?page=<?= $halaman_saat_ini + 1; ?>">Next</a>
                    </li>
                  <?php endif; ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
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
                <li><a href="about-us-before.php">Tentang Kami</a></li>
                <li><a href="umkmBefore.php">UMKM</a></li>
                <li><a href="eventBefore.php">Event</a></li>
                <li><a href="artikelBefore.php">Artikel</a></li>
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