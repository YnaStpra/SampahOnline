<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Beranda | BANG SAMPAH</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <script type="text/javascript" src="javascript.js"></script>


    <script src="http://maps.googleapis.com/maps/api/js"></script>


    <script>
          // event jendela di-load  
      google.maps.event.addDomListener(window, 'load', initialize);
    </script>

  </head>

  <body> 

  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <!-- <div class="container"> -->
      <a class="navbar-brand" href="BerandaAfter.html"><img src="img/logo.png" width="55px" alt="logo-pw"></a>      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="beranda-umkm.html">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="umkm-dashboard.html">UMKM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="event-umkm.html">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="artikel-umkm.html">Artikel</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="img/profpic.jpg" class="img-circle" width="25px" alt="img-profile"></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="edit-profile-umkm.html"><i class="fas fa-user-edit mr-3"></i>Edit Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="umkm-dashboard.html"><i class="fas fa-cogs mr-3"></i>Kelola</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt mr-3"></i>Keluar</a>
            </div>
          </li>
        </ul>
      </div>
    <!-- </div> -->
  </nav>

  <!-- AKHIR NAV -->

  <!-- CAROUSEL -->
  <main role="main">

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100 posisi" src="img/1.png" alt="tentang-pw">
        <div class="container">
          <div class="carousel-caption text-left">
            <h1 class="display-4">Bang Sampah</h1>
            <h4 class="mg-sm-btm">Tukar <span>sampahmu</span>, no <span>waste</span> anymore.</h4>
            <p><a class="btn btn-lg btn-edit" href="about-us.html" role="button">Tentang BS</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 posisi" src="img/3.png" alt="tukar-sampahmu">
        <div class="container">
          <div class="carousel-caption">
            <h1 class="display-4">Sekarang saatnya kamu</h1>
            <h4 class="mg-sm-btm">#SaveThePlanet</h4>
            <p><a class="btn btn-lg btn-edit" href="masuk.html" role="button">Tukar sekarang</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
        <img class="d-block w-100 posisi" src="img/2.png" alt="event-seru">
        <div class="container">
          <div class="carousel-caption text-right">
            <h1 class="display-4">Keep the Sea <br> Plastic Free.</h1>
            <h4 class="mg-sm-btm"><i class="fa fa-map-marker mr-2"></i>Pantai Senggigi. <br>July, 26 2023</h4>
            <p><a class="btn btn-lg btn-edit" href="event.html" role="button">Ikut Event</a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <!-- AKHIR CAROUSEL -->
  <section class="event" id="event">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2 class="text-center">Event</h2>
          <hr class="hr-edit mg-btm">
        </div>
      </div>
      <div class="row">
        <!-- col-sm-offset-1 -->
        <div class="col-lg-4">
          <div class="card">
            <img src="img/event1.png" class="card-img-top" alt="event">
            <div class="tanggal btn-edit">Juli, 26 2023</div>
            <div class="card-body">
              <p class="komunitas">RENTAL_PES PEDULI</p>
              <h4 class="nama-event">Membersihkan Laut Senggigi</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor numquam, natus sequi blanditiis, accusamus repellendus libero.</p>
              <hr>
              <div class="row">
                <div class="mr-auto text-left pl-minus">  
                  <a class="nav-link warna" href="share.html"><i class="fas fa-share-alt mr-3 warna"></i></a>
                </div>
                <div class="pr-15">
                  <a href="rincian-event.html" class="btn btn-edit">Selengkapnya</a>              
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <img src="img/event3.png" class="card-img-top" alt="event">
            <div class="tanggal btn-edit">Mei, 28 2023</div>
            <div class="card-body">
              <p class="komunitas">EARTH HOUR</p>
              <h4 class="nama-event">Mataram Bersih</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor numquam, natus sequi blanditiis, accusamus repellendus libero.</p>
              <hr>
              <div class="row">
                <div class="mr-auto text-left pl-minus">  
                  <a class="nav-link warna" href="share.html"><i class="fas fa-share-alt mr-3 warna"></i></a>
                </div>
                <div class="pr-15">
                  <a href="rincian-event.html" class="btn btn-edit">Selengkapnya</a>              
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
           <!-- style="width: 18rem;" -->
          <div class="card">
            <img src="img/event2.png" class="card-img-top" alt="event">
            <div class="tanggal btn-edit">November, 15 2023</div>
            <div class="card-body">
              <p class="komunitas">NO PLASTIC</p>
              <h4 class="nama-event">RE Fest</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor numquam, natus sequi blanditiis, accusamus repellendus libero.</p>
              <hr>
              <div class="row">
                <div class="mr-auto text-left pl-minus">  
                  <a class="nav-link warna" href="share.html"><i class="fas fa-share-alt mr-3 warna"></i></a>
                </div>
                <div class="pr-15">
                  <a href="rincian-event.html" class="btn btn-edit">Selengkapnya</a>              
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- d-lg-none kalo pengen hilang di window gede -->
        <div class="mx-auto wid-30 text-center"> <a href="event.html" class="btn btn-edit wid">Lihat Lainnya</a> </div>
      </div>
    </div>
  </section>

  <!-- <section class="mulai workingspace mg-btm mg-top" id="mulai"> -->
    <section>
  <div class="fdb-block container-fluid partner-home p-5 mulai workingspace mg-btm mg-top">
    <div class="container">    
     <div class="row align-items-center">
        <div class="col-lg-6">
          <img src="img/recycle.png" alt="section" class="img-fluid">
        </div>
        <div class="col-lg-6 pl-70">
          <h3>Tukar plastik dapat <span>reward?</span></h3>
          <p>#SavethePlanet<br></p>
          <a href="" class="btn btn-edit">Daftar Sekarang Yuk!</a>
        </div>
      </div>      
    </div>
  </div>
  </section>
  <!-- section -->



  <section class="artikel" id="artikel">
    <div class="container">
      <div class="row">
        <div class="col">
          <h2 class="text-center">Artikel</h2>
          <hr class="hr-edit mg-btm">
        </div>
      </div>
      <div class="row">
        <!-- col-sm-offset-1 -->
        <div class="col-lg-4">
          <div class="card">
            <img src="img/artikel3.png" class="card-img-top" alt="artikel">
            <div class="card-body">
              <div class="jenis-artikel btn-edit">Desember, 21 2022</div>
              <p class="komunitas">RENTAL_PES PEDULI</p>
              <h4 class="judul-artikel">Pentingnya Mengelola Sampah Plastik</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor numquam, natus sequi blanditiis, accusamus repellendus libero.</p>
              <hr>
              <div class="row">
                <div class="mr-auto text-left pl-minus">  
                  <a class="nav-link warna" href="share.html"><i class="fas fa-share-alt mr-3 warna"></i></a>
                </div>
                <div class="pr-15">
                  <a href="rincian-artikel.html" class="btn btn-edit">Selengkapnya</a>              
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <img src="img/artikel1.png" class="card-img-top" alt="artikel">
            <div class="jenis-artikel btn-edit">Oktober, 12 2022</div>
            <div class="card-body">
              <p class="komunitas">No plastic</p>
              <h4 class="judul-artikel">Tips & Trik Mengolah Plastik</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor numquam, natus sequi blanditiis, accusamus repellendus libero.</p>
              <hr>
              <div class="row">
                <div class="mr-auto text-left pl-minus">  
                  <a class="nav-link warna" href="share.html"><i class="fas fa-share-alt mr-3 warna"></i></a>
                </div>
                <div class="pr-15">
                  <a href="rincian-artikel.html" class="btn btn-edit">Selengkapnya</a>              
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="card">
            <img src="img/artikel2.png" class="card-img-top" alt="artikel">
            <div class="jenis-artikel btn-edit">Juli, 26 2022</div>
            <div class="card-body">
              <p class="komunitas">88QQ</p>
              <h4 class="judul-artikel">Tukar Sampah Dapat Reward</h4>
              <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolor numquam, natus sequi blanditiis, accusamus repellendus libero.</p>
              <hr>
              <div class="row">
                <div class="mr-auto text-left pl-minus">  
                  <a class="nav-link warna" href="share.html"><i class="fas fa-share-alt mr-3 warna"></i></a>
                </div>
                <div class="pr-15">
                  <a href="rincian-artikel.html" class="btn btn-edit">Selengkapnya</a>              
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="mx-auto wid-30 text-center"> <a href="artikel.html" class="btn btn-edit wid">Lihat Lainnya</a> </div>

      </div>
    </div>
  </section>

  <section id="facts" class="facts mg-top mg-btm" style="background: url('img/sampah.png');">
    <!-- <div class="war"> -->
      <div class="container">
        <div class="row pd-20">
          <div class="col-lg-3 col-md-6 col-xs-12 text-center" >
            <i class="fact-icon fas fa-user"></i>
            <!-- <i class="fact-icon fa fa-user"></i> -->
            <h3 class="timer" id="websites" data-to="999" data-speed="1000">999</h3>
            <h5 class="fact-title">Penukar</h5>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12 text-center">
            <i class="fact-icon fas fa-users"></i>
            <!-- <i class="fact-icon fa fa-rocket"></i> -->
            <h3 class="timer" id="code" data-to="100" data-speed="1500">100</h3>
            <h5 class="fact-title">Komunitas</h5>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12 text-center">
            <i class="fact-icon fas fa-house-user"></i>
            <!-- <i class="fact-icon fa fa-coffee"></i> -->
            <h3 class="timer" id="coffee" data-to="190" data-speed="2000">190</h3>
            <h5 class="fact-title">UMKM</h5>
          </div>
          <div class="col-lg-3 col-md-6 col-xs-12 text-center">
            <i class="fact-icon fas fa-recycle"></i>
            <!-- <i class="fact-icon fa fa-heart"></i> -->
            <h3 class="timer" id="emails" data-to="9999" data-speed="2500">9999</h3>
            <h5 class="fact-title">Plastik ditukar</h5>
          </div>
        </div>
      </div>
    <!-- </div> -->
  </section>


   <div class="container-fluid mg-btm">
     <div class="container">
      <div class="row">
        <div class="col">
          <div id="googleMap" style="width:100%;height:380px;"></div>
        </div>
    
      </div>
    </div>
   </div> 



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


  <script src="jsh/jquery.min.js"></script>
  <script src="jsh/popper.min.js"></script>
  <script src="jsh/bootstrap.min.js"></script>
  <script src="jsh/jquery.countTo.js"></script>

  <script src="jsh/form-validator.min.js"></script>
  <script src="jsh/contact-form-script.js"></script>
  <!-- <script src="jsh/main.js"></script> -->

  <script type="text/javascript">
    $('.timer').countTo({
      refreshInterval: 60,
      formatter: function(value, options) {
        return value.toFixed(options.decimals);
      },
    });
  </script>
  
  <script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

  </body>
</html>