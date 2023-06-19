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
$sql1 = "SELECT id_umkm, nama FROM umkm";
$result1 = query($sql1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Tukar Sampah | BANG SAMPAH</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
  <script type="text/javascript" src="javascript.js"></script>

  <script src="sweetalert/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert/sweetalert2.min.css">
</head>

<body>

  <script>


  </script>

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


  <!-- DATA KOMUNITAS -->

  <section class="daftar fdb-block pl-40" id="daftar">
    <div class="container">
      <div class="row">
        <div class="col">
          <form action='../backend/masyarakat/menukar-sampah.php' method="post">
            <input type="hidden" name="id_pelanggan" class="form-control" id="id_pelanggan" placeholder="Nama" value="<?= $masyarakat['id_pelanggan'] ?>">
            <div class="form-group">
              <div class="card shadow">
                <div class="row justify-content-center pd-20">
                  <div class="col-lg-6 pos">
                    <div class="plastik">
                      <h3 class="mg-sm-btm">Sampah yang dapat ditukarkan</h3>
                      <table class="table mg-btm mg-sm-top">
                        <tr>
                          <td>
                            <img src="../img/plastik/pet.jpeg" class="img-thumbnail" data-toggle="modal" data-target="#contoh-modal" width="180px" alt="jenis-sampah">
                            <div class="pl-20 modal fade" id="contoh-modal" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title">PET atau PETE (polyethylene terephthalate)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Botol air mineral, jus, softdrink, dan bumbu dapur.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                            <div class="pl-20">
                              <h5>PET atau PETE (polyethylene terephthalate)</h5>
                              <p>Botol air mineral, jus, softdrink, dan bumbu dapur.</p>

                              <input type="number" id="quantity1" name="quantity1" min="0" max="100" class="form-control wid-20 result" step="1" value="0" onchange="sum()">
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            <img src="../img/plastik/hdpe.jpeg" class="img-thumbnail" data-toggle="modal" data-target="#contoh-modal2" width="180px" alt="jenis-sampah">
                            <div class="pl-20 modal fade" id="contoh-modal2" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5>HDPE (high density polyethylene)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Botol susu, kosmetik, shampo, tas kresek.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                            <div class="pl-20">
                              <h5>HDPE (high density polyethylene)</h5>
                              <p>Botol susu, kosmetik, shampo, tas kresek.</p>
                              <input type="number" id="quantity2" name="quantity2" min="0" max="100" class="form-control wid-20 result" step="1" value="0" onchange="sum()">
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <img src="../img/plastik/pvc.jpeg" class="img-thumbnail" data-toggle="modal" data-target="#contoh-modal3" width="180px" alt="jenis-sampah">
                            <div class="pl-20 modal fade" id="contoh-modal3" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5>V atau PVC (polyvinyl chloride)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Kotak makanan plastik, mainan, shower curtain, pipa, lantai vinyl.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                            <div class="pl-20">
                              <h5>V atau PVC (polyvinyl chloride)</h5>
                              <p>Kotak makanan plastik, mainan, shower curtain, pipa, lantai vinyl.</p>
                              <input type="number" id="quantity3" name="quantity3" min="0" max="100" class="form-control wid-20 result" step="1" value="0" onchange="sum()">
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <img src="../img/plastik/ldpe.jpeg" class="img-thumbnail" data-toggle="modal" data-target="#contoh-modal4" width="180px" alt="jenis-sampah">
                            <div class="pl-20 modal fade" id="contoh-modal4" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5>LDPE (low density polyethylene)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Bungkus makanan, bungkus roti, dry cleaning bag.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                            <div class="pl-20">
                              <h5>LDPE (low density polyethylene)</h5>
                              <p>Bungkus makanan, bungkus roti, dry cleaning bag.</p>
                              <input type="number" id="quantity4" name="quantity4" min="0" max="100" class="form-control wid-20 result" step="1" value="0" onchange="sum()">
                            </div>
                          </td>
                        </tr>


                        <tr>
                          <td>
                            <img src="../img/plastik/pp.jpeg" class="img-thumbnail" data-toggle="modal" data-target="#contoh-modal5" width="180px" alt="jenis-sampah">
                            <div class="pl-20 modal fade" id="contoh-modal5" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5>PP (polypropylene)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Botol bayi, botol obat, sedotan, tempat margarin.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                            <div class="pl-20">
                              <h5>PP (polypropylene)</h5>
                              <p>Botol bayi, botol obat, sedotan, tempat margarin.</p>
                              <input type="number" id="quantity5" name="quantity5" min="0" max="100" class="form-control wid-20 result" step="1" value="0" onchange="sum()">
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <img src="../img/plastik/ps.png" class="img-thumbnail" data-toggle="modal" data-target="#contoh-modal6" width="180px" alt="jenis-sampah">
                            <div class="pl-20 modal fade" id="contoh-modal6" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5>PS (polystyrene)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Cup minuman, styrofoam, cooler.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                            <div class="pl-20">
                              <h5>PS (polystyrene)</h5>
                              <p>Cup minuman, styrofoam, cooler.</p>
                              <input type="number" id="quantity6" name="quantity6" min="0" max="100" class="form-control wid-20 result" step="1" value="0" onchange="sum()">
                            </div>
                          </td>
                        </tr>

                        <tr>
                          <td>
                            <img src="../img/plastik/other.jpeg" class="img-thumbnail" data-toggle="modal" data-target="#contoh-modal7" width="180px" alt="jenis-sampah">
                            <div class="pl-20 modal fade" id="contoh-modal7" role="dialog" arialabelledby="modalLabel" aria-hidden="true">
                              <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5>Other (biasanya polycarbonate)</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    <p>Tumbly botol minuman, tas oven, packaging.</p>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </td>

                          <td>
                            <div class="pl-20">
                              <h5>Other (biasanya polycarbonate)</h5>
                              <p>Tumbly botol minuman, tas oven, packaging.</p>
                              <input type="number" id="quantity7" name="quantity7" min="0" max="100" class="form-control wid-20 result" step="1" value="0" onchange="sum()">
                            </div>
                          </td>
                        </tr>
                      </table>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="row mt-80">
                    </div>
                    <div class="row ml-plus">
                      <div class="penukaran">
                        <div id="output">
                          <div class="card btn-edit">
                            <div class="card-body">
                              <div class="card-body-icon size">
                                <i class="fas fa-coins mr-2"></i>
                              </div>
                              <div id="poin1Output"></div>
                              <div id="poin2Output"></div>
                              <div id="poin3Output"></div>
                              <div id="poin4Output"></div>
                              <div id="poin5Output"></div>
                              <div id="poin6Output"></div>
                              <div id="poin7Output"></div>
                            </div>
                          </div>
                        </div>
                        <div class="form-group mg-sm-top">
                          <select name="nama-umkm" class="form-control" id="umkm" required>
                            <option value="">Pilih UMKM</option>
                            <?php
                            foreach ($result1 as $umkm) {
                              $umkm_id = $umkm['id_umkm'];
                              $nama_umkm = $umkm['nama'];
                              echo "<option value=\"$umkm_id\">$nama_umkm</option>";
                            }
                            ?>
                          </select>
                          <small class="form-text text-muted">UMKM yang anda pilih akan mem-verifikasi kembali sampah yang
                            anda tukar.<b></b></small>
                          <br>
                        </div>

                        <div id="output2">
                          <div class="card btn-edit">
                            <div class="card-body">
                              <div class="card-body-icon size">
                                <i class="fas fa-coins mr-2"></i>
                              </div>
                              <div id="totalOutput"></div>
                            </div>
                          </div>
                        </div>
                        <!-- </form>  -->
                        <button type="submit" name="submit" id="submit" class="btn btn-edit wid " onclick="ok()">Tukar</button>
                      </div>
                    </div>
                    <!-- <div class="row pad-tambah">
                </div> -->
                  </div>
                </div>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </section>

  <script>
    document.getElementById('output').style.visibility = 'hidden';

    var poin1 = document.getElementById('quantity1').addEventListener('input', function(e) {
      document.getElementById('output').style.visibility = 'visible';

      let quantity = e.target.value;

      document.getElementById('poin1Output').innerHTML = "Menukar " + `${quantity}` + " sampah jenis PET mendapat " + quantity + " poin";
    });

    var poin2 = document.getElementById('quantity2').addEventListener('input', function(e) {

      document.getElementById('output').style.visibility = 'visible';

      let quantity = e.target.value;

      document.getElementById('poin2Output').innerHTML = "Menukar " + `${quantity}` + " sampah jenis HDPE mendapat " + quantity * 0.5 + " poin";
    });

    var poin3 = document.getElementById('quantity3').addEventListener('input', function(e) {

      document.getElementById('output').style.visibility = 'visible';

      let quantity = e.target.value;

      document.getElementById('poin3Output').innerHTML = "Menukar " + `${quantity}` + " sampah jenis PVC mendapat " + quantity * 2 + " poin";
    });

    var poin4 = document.getElementById('quantity4').addEventListener('input', function(e) {

      document.getElementById('output').style.visibility = 'visible';

      let quantity = e.target.value;

      document.getElementById('poin4Output').innerHTML = "Menukar " + `${quantity}` + " sampah jenis LDPE mendapat " + quantity * 0.5 + " poin";
    });

    var poin5 = document.getElementById('quantity5').addEventListener('input', function(e) {

      document.getElementById('output').style.visibility = 'visible';

      let quantity = e.target.value;

      document.getElementById('poin5Output').innerHTML = "Menukar " + `${quantity}` + " sampah jenis PP mendapat " + quantity + " poin";
    });

    var poin6 = document.getElementById('quantity6').addEventListener('input', function(e) {

      document.getElementById('output').style.visibility = 'visible';

      let quantity = e.target.value;

      document.getElementById('poin6Output').innerHTML = "Menukar " + `${quantity}` + " sampah jenis PS mendapat " + quantity * 0.5 + " poin";
    });

    var poin6 = document.getElementById('quantity7').addEventListener('input', function(e) {

      document.getElementById('output').style.visibility = 'visible';

      let quantity = e.target.value;

      document.getElementById('poin7Output').innerHTML = "Menukar " + `${quantity}` + " sampah jenis PET mendapat " + quantity * 3 + " poin";
    });

    document.getElementById('output2').style.visibility = 'hidden';

    function sum() {
      document.getElementById('output2').style.visibility = 'visible';

      var jenis1 = document.getElementById('quantity1').value;
      var jenis2 = document.getElementById('quantity2').value;
      var jenis3 = document.getElementById('quantity3').value;
      var jenis4 = document.getElementById('quantity4').value;
      var jenis5 = document.getElementById('quantity5').value;
      var jenis6 = document.getElementById('quantity6').value;
      var jenis7 = document.getElementById('quantity7').value;

      var sum_poin = parseFloat(jenis1) + parseFloat(jenis2) * 0.5 + parseFloat(jenis3) * 2 + parseFloat(jenis4) * 0.5 + parseFloat(jenis5) + parseFloat(jenis6) * 0.5 + parseFloat(jenis7) * 3;
      console.log(sum_poin);

      var totalQuantity = parseFloat(jenis1) + parseFloat(jenis2) + parseFloat(jenis3) + parseFloat(jenis4) + parseFloat(jenis5) + parseFloat(jenis6) + parseFloat(jenis7);


      document.getElementById('totalOutput').innerHTML = "Menukar " + `${totalQuantity}` + " sampah mendapat total " + sum_poin + "  poin";
    }

    function ok() {
      Swal.fire(
        'Terima kasih sudah menukar plastik! ',
        'Save the planet!', 'success'
      ).then((result) => {
        if (result.value) {
          window.location = 'profile-masyarakat.php';

        }
      })
    }
  </script>

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