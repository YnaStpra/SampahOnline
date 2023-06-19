<?php
include "conn.php";

// Mendapatkan jumlah data masyarakat
$queryMasyarakat = "SELECT COUNT(*) AS total FROM pelanggan";
$resultMasyarakat = mysqli_query($conn, $queryMasyarakat);
$jumlahMasyarakat = mysqli_fetch_assoc($resultMasyarakat)['total'];

// Mendapatkan jumlah data UMKM
$queryUMKM = "SELECT COUNT(*) AS total FROM umkm";
$resultUMKM = mysqli_query($conn, $queryUMKM);
$jumlahUMKM = mysqli_fetch_assoc($resultUMKM)['total'];

// Mendapatkan jumlah data event
if(!empty($_SESSION['id_umkm'])){
    $id_umkm = $_SESSION['id_umkm'];
    $queryEvent = "SELECT COUNT(*) AS total FROM event WHERE id_umkm = $id_umkm";
    $resultEvent = mysqli_query($conn, $queryEvent);
    $jumlahEvent = mysqli_fetch_assoc($resultEvent)['total'];

    // Mendapatkan jumlah data artikel
    $queryArtikel = "SELECT COUNT(*) AS total FROM artikel WHERE id_umkm = $id_umkm";
    $resultArtikel = mysqli_query($conn, $queryArtikel);
    $jumlahArtikel = mysqli_fetch_assoc($resultArtikel)['total'];
}else{
    $queryEvent = "SELECT COUNT(*) AS total FROM event";
    $resultEvent = mysqli_query($conn, $queryEvent);
    $jumlahEvent = mysqli_fetch_assoc($resultEvent)['total'];

    // Mendapatkan jumlah data artikel
    $queryArtikel = "SELECT COUNT(*) AS total FROM artikel";
    $resultArtikel = mysqli_query($conn, $queryArtikel);
    $jumlahArtikel = mysqli_fetch_assoc($resultArtikel)['total'];
} // <-- Add this closing parenthesis
//data penukaran
$jumlahPenukaran = 0;
if(!empty($_SESSION['id_pelanggan'])){
    $id_pelanggan = $_SESSION['id_pelanggan'];
    //penukaran pelanggan
    $queryPelanggan = "SELECT DATE_FORMAT(tanggal_waktu, '%Y-%m-%d %H:%i:%s') AS tanggal_waktu, COUNT(*) AS jumlah_penukaran
                        FROM transaksi_penukaran_sampah WHERE id_pelanggan = $id_pelanggan GROUP BY tanggal_waktu";
    $result = mysqli_query($conn, $queryPelanggan);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $jumlahPenukaran++;
        } 
    }
    
}else if(!empty($_SESSION['id_umkm'])){
    $id_umkm = $_SESSION['id_umkm'];
    //penukaran umkm
    $queryPenukaranUMKM = "SELECT DATE_FORMAT(tanggal_waktu, '%Y-%m-%d %H:%i:%s') AS tanggal_waktu, COUNT(*) AS jumlah_penukaran
                            FROM transaksi_penukaran_sampah WHERE id_umkm = $id_umkm GROUP BY tanggal_waktu";
    $result = mysqli_query($conn, $queryPenukaranUMKM);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $jumlahPenukaran++;
        } 
    }
}else{
    $queryAdmin = "SELECT DATE_FORMAT(tanggal_waktu, '%Y-%m-%d %H:%i:%s') AS tanggal_waktu, COUNT(*) AS jumlah_penukaran
                    FROM transaksi_penukaran_sampah GROUP BY tanggal_waktu";
    $result = mysqli_query($conn, $queryAdmin);
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $jumlahPenukaran++;
        } 
    }
}


if (!empty($_SESSION['id_pelanggan'])){
    $id = $_SESSION['id_pelanggan'];
    $querypoint = "SELECT total_point FROM point WHERE id_pelanggan = '$id' ORDER BY kd_point DESC LIMIT 1";
    //menghitung event
    $sql_count_event = "SELECT COUNT(*) AS jumlah_event FROM mengikuti_event WHERE id_pelanggan = '$id'";
    $result = mysqli_query($conn, $querypoint); // Menggunakan variabel $querypoint
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $totalPoint = $row['total_point'];

    } else {
        $totalPoint = 0;
    }
    // Memastikan query berhasil dijalankan
    $resultJumlahEvent = mysqli_query($conn, $sql_count_event);
    if ($resultJumlahEvent) {
        $row = mysqli_fetch_assoc($resultJumlahEvent);
        $jumlah_event = $row['jumlah_event'];
    } else {
        $jumlah_event = 0; // Jika tidak ada event yang pernah diikuti, nilai default adalah 0
    }
}

?>





