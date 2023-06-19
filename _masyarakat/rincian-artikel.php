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
// Mendapatkan ID event dari parameter URL
$kd_artikel = $_GET['kd_artikel'];

// Lakukan query ke database untuk mendapatkan event berdasarkan ID
$sql = "SELECT * FROM artikel WHERE kd_artikel = $kd_artikel";
$result = query($sql);

// Memastikan event ditemukan
if (!empty($result)) {
  $artikel = $result[0];
  $id_umkm = $artikel['id_umkm'];

  // Query ke tabel umkm untuk mendapatkan nama UMKM berdasarkan ID UMKM
  $sql_umkm = "SELECT nama FROM umkm WHERE id_umkm = $id_umkm";
  $result_umkm = query($sql_umkm);

  // Memastikan UMKM ditemukan
  if (!empty($result_umkm)) {
    $nama_umkm = $result_umkm[0]['nama'];
  } else {
    // Jika UMKM tidak ditemukan, Anda dapat menampilkan pesan kesalahan atau menggunakan nilai default
    $nama_umkm = "Nama UMKM tidak ditemukan";
  }
} else {
  // Jika event tidak ditemukan, Anda dapat mengarahkan pengguna ke halaman lain atau menampilkan pesan kesalahan
  echo "Event tidak ditemukan.";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Artikel | BANG SAMPAH</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css" />
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
          <li class="nav-item">
            <a class="nav-link" href="BerandaAfter.php">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="umkm.php">UMKM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="event.php">Event</a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" id="penanda" href="artikel.php">Artikel<span class="sr-only">(current)</span></a>
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
  <div class="jumbotron jumbotron-fluid bot" style="background-image: url(../img/3.png); background-repeat: no-repeat;">
    <div class="container">

    </div>
  </div>
  <!-- AKHIT JUMBOTRON -->

  <!-- BREADCUMBR -->

  <nav aria-label="breadcrumb">
    <div class="container">
      <div class="">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="BerandaAfter.php">Beranda</a></li>
          <li class="breadcrumb-item"><a href="artikel.php">Artikel</a></li>
          <li class="breadcrumb-item active" aria-current="page">Selengkapnya</li>
        </ol>
      </div>
    </div>
  </nav>
  <!-- AKHUR BREADCUMBR -->

  <section class="rincian-artikel" id="rincian-artikel">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="card pd-20">
            <div class="foto-umkm mg-btm">
              <?php
              $gambarArtikelPilihan = $artikel['gambar'] ? '../img/artikel/' . $artikel['gambar'] : '../img/profpic.jpg';
              ?>
              <img src="<?= $gambarArtikelPilihan ?>" class="img-fluid" alt="artikel">
            </div>
            <span class="warna"><i class="fab fa-creative-commons mr-1"></i><?= $nama_umkm ?></span>
            <h1><?= $artikel['judul'] ?></h1>
            <hr>
            <p><?= $artikel['isi'] ?></p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card pd-20">
            <h3>Artikel lainnya</h3>
            <hr>
            <table>
              <?php
              $tableArtikel_name = 'artikel';
              $dataArtikel = getSpesifikPage($tableArtikel_name);
              $artikelss = $dataArtikel['data'];
              $randomArtikel = $artikelss[array_rand($artikelss)];
              ?>
              <tr>
                <?php
                  $gambarArtikelLain = $randomArtikel['gambar'] ? '../img/artikel/' . $randomArtikel['gambar'] : '../img/profpic.jpg';
                ?>
                <td>
                  <img src="<?= $gambarArtikelLain?>" class="img-thumbnail" width="65px" alt="artikel">
                </td>
                <td>
                  <p style="padding-left: 10px"><a href="rincian-artikel.php?kd_artikel=<?= isset($randomArtikel['kd_artikel']) ? $randomArtikel['kd_artikel'] : '' ?>"><?= $randomArtikel['judul']?></a></p>
                </td>
              </tr>
            </table>
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