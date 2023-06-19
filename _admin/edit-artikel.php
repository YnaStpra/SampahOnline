<?php
session_start();
include "../backend/umkmBefore.php";
//menampilkan gambar profil user
$id = $_SESSION['id_admin'];
// Cek keberadaan session
if (!isset($_SESSION['id_admin'])) {
  // Session tidak ada, arahkan ke halaman login
  header("Location: ../masuk.php");
  exit;
}
$sql1 = "SELECT * FROM admin WHERE id_admin = '$id'";
$result1 = query($sql1);
if (!empty($result1)) {
  $admin = $result1[0];
} else {
  echo "data admin tidak ditemukan.";
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
  $umkmSql = "SELECT nama FROM umkm WHERE id_umkm = $id_umkm";
  $umkmResult = query($umkmSql);

  // Memastikan UMKM ditemukan
  if (!empty($umkmResult)) {
    $umkm = $umkmResult[0];
    $nama_umkm = $umkm['nama'];
  } else {
    // Jika UMKM tidak ditemukan, Anda dapat menentukan nilai default atau menampilkan pesan kesalahan
    $nama_umkm = "UMKM tidak ditemukan";
  }
} else {
  // Jika event tidak ditemukan, Anda dapat mengarahkan pengguna ke halaman lain atau menampilkan pesan kesalahan
  echo "Umkm tidak ditemukan.";
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Buat Artikel | BANG SAMPAH</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">


  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
  <link rel="stylesheet" href="../fontawesome/css/all.min.css">

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


  <!-- DATA KOMUNITAS -->
  <section class="edit-profile" id="edit-profile">
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

      <div class="col-lg-8 scrollspy-example" data-spy="scroll" data-target="#list-example" data-offset="50">
        <div class="card pd-20">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="account" role="tabpanel">
              <h1>Edit Artikel</h1>
              <hr>
              <div class="akun">
                <form action="../backend/admin/edit-data-artikel.php" method="post" enctype="multipart/form-data" autocomplete="off">
                  <input type="hidden" name="kd_artikel" class="form-control" id="kd_artikel" placeholder="Nama" value="<?= $artikel['kd_artikel'] ?>">
                  <input type="hidden" name="gambarDefault" class="form-control" id="gambarDefault" value="<?= $artikel['gambar'] ?>">
                  <div class="row">
                    <div class="col-lg-4">
                      <?php
                      $gambar = $artikel['gambar'] ? '../img/artikel/' . $artikel['gambar'] : '../img/profpic.jpg';
                      ?>
                      <div class="wrapper-kelas rounded logo-center white-bg">
                        <img src="<?= $gambar ?>" class="img-fluid" alt="">
                      </div>
                    </div>
                    <div class="col-lg4">
                      <input type="file" name="gambar" title="Change Avatar" data-filename-placement="inside" id="upload_image" accept="image/*">
                    </div>
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="nama-umkm">Nama UMKM</label>
                    <input type="text" name="nama-umkm" class="form-control" id="nama-umkm" placeholder="Nama UMKM" value="<?= $nama_umkm ?>" readonly>
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="judul-artikel">Judul Artikel</label>
                    <input type="text" name="judul-artikel" class="form-control" id="judul-artikel" placeholder="judul-artikel" value="<?= $artikel['judul'] ?>">
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="isi-artikel">Isi Artikel</label>
                    <textarea name="isi_artikel" class="form-control" id="isi_artikel" cols="80" rows="5" placeholder="artikel ini"> <?= $artikel['isi'] ?></textarea>
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Perbarui Artikel</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>


  <script>
    $('#summernote').summernote({
      placeholder: ' Isi Artikel...',
      tabsize: 2,
      height: 100
    });
  </script>
  <script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>
</body>

</html>