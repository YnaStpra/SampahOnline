<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Profile | BANG SAMPAH</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
  </head>

  <body> 

  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <!-- <div class="container"> -->
      <a class="navbar-brand" href="beranda.html"><img src="img/logo.png" width="55px" alt="logo-pw"></a>      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="beranda.html">Beranda<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="komunitas.html">Komunitas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="umkm.html">UMKM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="event.html">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="artikel.html">Artikel</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/profpic.jpg" class="img-circle" width="25px" alt="img-profile"></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="admin-dashboard.html"><i class="fas fa-cogs mr-3"></i>Kelola</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt mr-3"></i>Keluar</a>
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
              <a class="nav-link mg-btm-10" href="admin-dashboard.html"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a><hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link" href="data-masyarakat.html"><i class="fas fa-user mr-3"></i>Data Masyarakat</a><hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link active" href="data-komunitas.html"><i class="fas fa-users mr-3"></i>Data Komunitas</a><hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link " href="data-umkm.html"><i class="fas fa-house-user mr-3"></i>Data UMKM</a><hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link " href="data-plastik.html"><i class="fas fa-dumpster mr-3"></i>Data Plastik</a>
            </li>
          </ul>
          </div>
        </div>
        <div class="col-lg-9 pr-pl-minus">
          <div class="card pd-20">            
            <h1><i class="fas fa-users mr-3 warna"></i>Data Komunitas</h1>
            <hr>
            <div class="row">
              <div class="col-lg-4">
                <form class="form-inline input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  <input type="search" class="form-control" placeholder="cari komunitas" aria-label="Search" aria-describedby="btnGroupAddon">
                </form>
              </div>
              <div class="col-lg-8 text-right">
                <a href=""><i class="fas fa-plus-circle fa-3x warna"></i></a>
              </div>
            </div>
            <table class="table mg-btm mg-sm-top table-edit ukuran-font">
              <!-- <caption>List of users</caption> -->
              <thead class="thead-edit text-center">
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Gambar</th>
                  <th scope="col">No Telepon</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Penanggung Jawab</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <th scope="row">1</th>
                  <td>RENTAL_PES Peduli</td>
                  <td><img src="img/profpic.jpg" width="50px" alt="img-profile"></td>
                  <td>087771575460</td>
                  <td>ynasptra</td>
                  <td>yansaputra675@gmail.com</td>
                  <td>001, Kakalik Jaya, Sekarbela, Mataram</td>
                  <td>Yan Saputra</td>
                  <td class="text-center">
                    <a href="" class="btn btn-edit"><i class="fas fa-edit"></i></a> | <a href="" class="btn btn-edit"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">2</th>
                  <td>NO PLASTIC</td>
                  <td><img src="img/profpic.jpg" width="50px" alt="img-profile"></td>
                  <td>081234567890</td>
                  <td>Dhir</td>
                  <td>Dhira@gmail.com</td>
                  <td>002, Kakalik Jaya, Sekarbela, Mataram</td>
                  <td>Dhira Wahyu</td>
                  <td class="text-center">
                    <a href="" class="btn btn-edit"><i class="fas fa-edit"></i></a> | <a href="" class="btn btn-edit"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
                <tr>
                  <th scope="row">3</th>
                  <td>Earth Hour</td>
                  <td><img src="img/profpic.jpg" width="50px" alt="img-profile"></td>
                  <td>081234567890</td>
                  <td>prik</td>
                  <td>aldar@gmail.com</td>
                  <td>003, Udayana, Ampenan, Mataram</td>
                  <td>Aldar</td>
                  <td class="text-center">
                    <a href="" class="btn btn-edit"><i class="fas fa-edit"></i></a> | <a href="" class="btn btn-edit"><i class="fas fa-trash"></i></a>
                  </td>
                </tr>
              </tbody>
            </table>
            <nav aria-label="">
              <ul class="pagination justify-content-end">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active" aria-current="page">
                  <a class="page-link" href="#">1 <span class="sr-only">(current)</span></a>
                </li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
            </nav>           
          </div>
        </div>
      </div>
    <!-- </div> -->
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
                <li><a href="about-us-before.html">Tentang Kami</a></li>
              <li><a href="umkmBefore.html">UMKM</a></li>
              <li><a href="eventBefore.html">Event</a></li>
              <li><a href="artikelBefore.html">Artikel</a></li>
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