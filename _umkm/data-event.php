<?php
session_start();
include "../backend/umkmBefore.php";
$id = $_SESSION['id_umkm'];
if (!isset($_SESSION['id_umkm'])) {
  // Session tidak ada, arahkan ke halaman login
  header("Location: ../masuk.php");
  exit;
}
$sql = "SELECT * FROM umkm WHERE id_umkm = '$id'";
$result1 = query($sql);
if (!empty($result1)) {
  $umkm = $result1[0];
} else {
  echo "data admin tidak ditemukan.";
  exit;
}
$table_name = 'event';
$data = getSpesifikPage($table_name);
$total_halaman = $data['total_halaman'];
$halaman_saat_ini = $data['halaman_saat_ini'];
$event = $data['data'];
$jumlah_per_halaman = $data['jumlah_per_halaman'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Data Event | BANG SAMPAH</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../fontawesome/css/all.min.css">

</head>

<body>

  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <!-- <div class="container"> -->
    <a class="navbar-brand"><img src="../img/logo.png" width="55px" alt="logo-pw"></a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <?php
            $gambar = $umkm['gambar'] ? '../img/umkm/' . $umkm['gambar'] : '../img/profpic.jpg';
          ?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?= $gambar ?>" class="img-circle" width="25px" alt="img-profile">
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="edit-profile-umkm.php"><i class="fas fa-user-edit mr-3"></i>edit profil</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="umkm-dashboard.php"><i class="fas fa-cogs mr-3"></i>Kelola</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../backend/logout.php"><i class="fas fa-sign-out-alt mr-3"></i>Keluar</a>
          </div>
        </li>
      </ul>
    </div>
    <!-- </div> -->
  </nav>


  <section class="komunitas-side" id="komunitas-side">
    <!-- <div class="container"> -->
    <div class="row mg-top mr-ml-plus">
      <div class="col-lg-3 color pr pl-minus">
        <div class="card shadow btn-edit">
          <ul class="nav flex-column pd-18">
            <li class="nav-item ml-25">
              <a class="nav-link active" href="umkm-dashboard.php"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a>
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
      <div class="col-lg-9 pr-pl-minus">
        <div class="card pd-20">
          <h1><i class="fas fa-calendar-alt mr-3 warna"></i>Data Event</h1>
          <hr>
          <div class="row">
            <div class="col-lg-4">
              <form class="form-inline input-group" autocomplete="off">
                <div class="input-group-prepend">
                  <div class="input-group-text" id="btnGroupAddon">
                    <i class="fas fa-search"></i>
                  </div>
                </div>
                <input type="search" name="search" class="form-control" placeholder="cari event" aria-label="Search" aria-describedby="btnGroupAddon">
              </form>
            </div>
            <div class="col-lg-8 text-right">
              <a href="buat-event.php"><i class="fas fa-plus-circle fa-3x warna"></i></a>
            </div>
          </div>
          <table class="table mg-btm mg-sm-top table-edit ukuran-font">
            <!-- <caption>List of users</caption> -->
            <thead class="thead-edit text-center">
              <tr>
                <th scope="col">No.</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Gambar</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = ($halaman_saat_ini - 1) * $jumlah_per_halaman + 1;
              foreach ($event as $row) {
              ?>
                <tr>
                  <th scope="row" class="text-center"><?= $i; ?></th>
                  <td><?= $row['nama']; ?></td>
                  <td class="text-center"><?= $row['tanggal']; ?></td>
                  <?php
                  $gambar = $row['gambar'] ? '../img/event/' . $row['gambar'] : '../img/profpic.jpg';
                  ?>
                  <td class="text-center"><img src="<?= $gambar ?>" width="50px" alt="event"></td>
                  <td><?= $row['lokasi']; ?></td>
                  <td class="text-center">
                    <a href="edit-event-umkm.php?kd_event=<?= isset($row['kd_event']) ? $row['kd_event'] : '' ?>" class="btn btn-edit"><i class="fas fa-edit"></i></a>
                    <a href="../backend/delete-data.php?table_name=event&delete_id=<?= isset($row['kd_event']) ? $row['kd_event'] : '' ?>" class="btn btn-edit" onclick="return confirmDelete()"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              <?php
                $i++;
              }
              ?>
            </tbody>
          </table>
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
  </section>

  <script>
    function confirmDelete() {
      return confirm("Apakah Anda yakin ingin menghapus data ini?");
    }
  </script>

  <script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>