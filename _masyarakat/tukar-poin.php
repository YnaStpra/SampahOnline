<?php
session_start();
include "../backend/umkmBefore.php";
include "../backend/dashboard.php";
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

  <title>Tukar Poin | BANG SAMPAH</title>
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


  <!-- BREADCUMBR -->

  <nav aria-label="breadcrumb mg-sm-top">
    <div class="container">
      <div class="mg-top">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="profile-masyarakat.php">Profile</a></li>
          <li class="breadcrumb-item active" aria-current="page">Tukar Poin</li>
        </ol>
      </div>
    </div>
  </nav>

  <!-- AKHUR BREADCUMBR -->

  <section class="edit-profile" id="edit-profile">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="card btn-edit pl-10">
            <div class="row color">
              <div class="card-body">
                <div class="card-body-icon font-size">
                  <i class="fas fa-coins mr-2"></i>
                </div>
                <h5><b>JUMLAH POIN</h5></b>
                <div class="display-4"><?= $totalPoint ?></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="card">
                <ul class="nav flex-column pd-18">
                  <li class="nav-item ml-25">
                    <a class="nav-link active mg-btm-10" href="#tukar-poin.php"><i class="fas fa-gift mr-3 warna"></i>Rewards</a>
                    <hr>
                  </li>
                  <li class="nav-item ml-25">
                    <a class="nav-link" href="#"><i class="fas fa-hourglass-start mr-3 warna"></i>History</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card pd-20">
            <div class="edit">
              <div class="row">
                <div class="col lg-2">
                  <div class="card">
                    <img src="../img/profpic.jpg" class="card-img-top " alt="...">
                    <div class="card-body">

                      <h5 class="card-title"><i class="fas fa-coins mr-2 warna"></i>500 Poin</h5>
                      <p class="card-text font-weight-bold">Pulsa 5000</p>
                      <form action="../backend/masyarakat/menukar-point.php" method="post">
                        <input type="hidden" name="point1" value="500"> <!-- Nilai poin yang akan dikirimkan -->
                        <button type="submit" class="btn btn-edit wid">Tukar</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col lg-2">
                  <div class="card">
                    <!-- style="width: 10rem;" -->
                    <img src="../img/profpic.jpg" class="card-img-top " alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><i class="fas fa-coins mr-2 warna"></i>5000 Poin</h5>
                      <p class="card-text font-weight-bold">Pulsa 50000</p>
                      <form action="../backend/masyarakat/menukar-point.php" method="post">
                        <input type="hidden" name="point2" value="5000"> <!-- Nilai poin yang akan dikirimkan -->
                        <button type="submit" class="btn btn-edit wid">Tukar</button>
                      </form>
                    </div>
                  </div>
                </div>
                <div class="col lg-2">
                  <div class="card">
                    <img src="../img/profpic.jpg" class="card-img-top " alt="...">
                    <div class="card-body">
                      <h5 class="card-title"><i class="fas fa-coins mr-2 warna"></i>50000 Poin</h5>
                      <p class="card-text font-weight-bold">Pulsa 500000</p>
                      <form action="../backend/masyarakat/menukar-point.php" method="post">
                        <input type="hidden" name="point3" value="50000"> <!-- Nilai poin yang akan dikirimkan -->
                        <button type="submit" class="btn btn-edit wid">Tukar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
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