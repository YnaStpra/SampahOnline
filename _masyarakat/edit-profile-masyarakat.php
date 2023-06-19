<?php
//session_start();
session_start();
//include "../backend/masyarakat/tampilProfil.php";
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
  <script>
    $('body').scrollspy({
      target: '#list-example'
    })
  </script>
  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand" href="beranda.php"><img src="../img/logo.png" width="55px" alt="logo-pw"></a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
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

  <nav aria-label="breadcrumb">
    <div class="container">
      <div class="mg-sm-top">
        <ol class="breadcrumb">
        </ol>
      </div>
    </div>
  </nav>

  <!-- AKHUR BREADCUMBR -->
  <section class="edit-profile" id="edit-profile">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div id="list-example" class="list-group">
            <a class="list-group-item list-group-item-action" href="#list-item-1">Informasi Akun</a>
            <a class="list-group-item list-group-item-action" href="#list-item-2">Password</a>
          </div>
        </div>
        <div class="col-lg-8 scrollspy-example" data-spy="scroll" data-target="#list-example" data-offset="50">
          <div class="card pd-20">
            <div class="tab-content" id="myTabContent">
              <div class="tab-pane fade active show" id="account" role="tabpanel">
                <h1>Edit Profile</h1>
                <hr>
                <div class="akun">
                  <form action="../backend/masyarakat/tampilProfil.php" method="post" enctype="multipart/form-data" autocomplete="off">
                  <input type="hidden" name="id_pelanggan" class="form-control" id="id_admin" placeholder="Nama" value="<?= $masyarakat['id_pelanggan'] ?>">
                  <input type="hidden" name="gambarDefault" class="form-control" id="gambarDefault" value="<?= $masyarakat['gambar'] ?>">
                    <div class="row">
                      <div class="col-lg-4">
                        <div class="wrapper-kelas rounded logo-center white-bg">
                          <img src="<?= $gambar ?>" class="img-fluid" alt="">
                        </div>
                      </div>
                      <div class="col-lg4">
                        <input type="file" name="gambar" title="Change Avatar" data-filename-placement="inside" id="upload_image" accept="image/*">
                      </div>
                    </div>

                    <div class="mg-sm-btm mg-sm-top">
                      <h3 id="list-item-1">Informasi Akun</h3>
                    </div>
                    <div class="form-group">
                      <label for="nama">Nama</label>
                      <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value="<?= $masyarakat['nama'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="uname">Username</label>
                      <input type="text" name="uname" class="form-control" id="uname" placeholder="Username" value="<?= $masyarakat['username'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= $masyarakat['email'] ?> ">
                    </div>
                    <div class="form-group">
                      <label for="nama">Nomor Telepon</label>
                      <input type="text" name="notelp" class="form-control" id="pass" placeholder="Nomor Telepon" required value="<?= $masyarakat['no_hp'] ?>">
                    </div>
                    <div class="form-group">
                      <label for="uname">Alamat</label>
                      <input type="text" name="alamat-masy" class="form-control" id="alamat-masy" placeholder="Alamat" required value="<?= $masyarakat['alamat'] ?>">
                    </div>
                    <div class="form-group mg-sm-btm mg-sm-top">
                      <button type="submit" name="submit" id="submit" class="btn btn-edit wid">perbarui Profile</button>
                    </div>
                  </form>
                  <form action="../backend/masyarakat/tampilProfil.php" method="post">
                    <div class="mg-sm-btm mg-sm-top">
                      <h3 id="list-item-2">Ganti Password</h3>
                    </div>

                    <div class="form-group">
                      <label for="nama">Password Sekarang</label>
                      <input type="password" name="pass" class="form-control" id="pass" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <label for="uname">Password Baru</label>
                      <input type="password" name="new-pass" class="form-control" id="new-pass" placeholder="Password" required>
                    </div>
                    <div class="form-group">
                      <label for="email">Konfirmasi Password</label>
                      <input type="password" name="pass2" class="form-control" id="pass2" placeholder="Password" required>
                    </div>
                    <div class="form-group mg-sm-btm mg-sm-top">
                      <button type="submit" name="submitpass" id="submit" class="btn btn-edit wid">perbarui Password</button>
                    </div>
                  </form>
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