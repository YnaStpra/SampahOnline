<?php
session_start();
include "backend/umkmBefore.php";
$table_name = 'artikel';
$data = getSpesifikPage($table_name);
$limit = 6;
$artikel = $data['data'];
$artikels = array_slice($artikel, 0, $limit);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Artikel | BANG SAMPAH</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
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
                        <a class="nav-link" href="umkmBefore.php">UMKM</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="eventBefore.php">Event</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="penanda" href="artikelBefore.php">Artikel<span class="sr-only">(current)</span></a>
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
    <div class="jumbotron jumbotron-fluid" style="background: url('img/4.png'); background-repeat: no-repeat;">
        <div class="container">
            <h1 class="display-4">Dunia darurat sampah <span>plastik.</span><br>Yuk edukasi diri masalah<span>
                    plastik!</span></h1>
            <div class="row justify-content-center">
                <form class="form-inline input-group cari my-2 my-lg-0" autocomplete="off" method="GET">
                    <input class="form-control mr-sm-2" name="search" type="search" placeholder="Cari Artikel" aria-label="Search">
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
                    <li class="breadcrumb-item"><a href="beranda.php">Beranda</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                </ol>
            </div>
        </div>
    </nav>
    <!-- AKHUR BREADCUMBR -->

    <!-- KATEGORI -->


    <section class="event" id="event">
        <div class="container">
            <div class="row">
                <?php
                foreach ($artikels as $row) {
                    $id_umkm = $row['id_umkm'];
                    $sql_umkm = "SELECT nama FROM umkm WHERE id_umkm = $id_umkm";
                    $result_umkm = query($sql_umkm);
                    $nama_umkm = $result_umkm[0]['nama'];

                ?>
                    <div class="col-lg-4">
                        <div class="card">
                            <?php
                                $gambarArtikel = $row['gambar'] ? 'img/artikel/' . $row['gambar'] : 'img/profpic.jpg';
                            ?>
                            <img src="<?= $gambarArtikel?>" class="card-img-top" alt="artikel">
                            <div class="card-body">
                                <p class="komunitas"><?= $nama_umkm ?></p>
                                <h4 class="judul-artikel"><?= $row['judul']; ?></h4>
                                <p class="card-text"><?= implode(' ', array_slice(explode(' ', $row['isi']), 0, 12)); ?></p>
                                <hr>
                                <div class="row">
                                    <div class="mr-auto text-left pl-minus">
                                        <a class="nav-link warna" href="masuk.php"><i class="fas fa-share-alt mr-3 warna"></i></a>
                                    </div>
                                    <div class="pr-15">
                                        <a href="masuk.php" class="btn btn-edit">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php

                }
                ?>
                <div class="mx-auto wid-30 text-center"> <a href="masuk.php" class="btn btn-edit wid">Lihat Lainnya</a> </div>
            </div>
        </div>
    </section>
    <br>

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