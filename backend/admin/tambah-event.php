<?php
include "../conn.php"; // Koneksi ke database
include '../umkmBefore.php';

session_start(); // Mulai sesi

if(isset($_POST['submit'])) {
    $nama = $_POST['judul-event'];
    $tanggal = $_POST['tanggal-event'];
    $deskripsi = $_POST['deskripsi-event'];

    if($_FILES['gambar']['error'] === 4){
        $gambar = null;
      }else{
        $folder = 'event';
        $gambar = upload($folder);
      }
    // Cek apakah session id_umkm kosong atau tidak
    if (!empty($_SESSION['id_umkm'])) {
        $id_umkm = $_SESSION['id_umkm'];
    } else {
        $id_umkm = $_POST['nama-umkm'];
    }

    // Query untuk menambahkan data event ke database
    $query = "INSERT INTO event (nama, tanggal, deskripsi, id_umkm, gambar) 
              VALUES ('$nama', '$tanggal', '$deskripsi', '$id_umkm', '$gambar')";

if (mysqli_query($conn, $query)) {
    if (!empty($_SESSION['id_umkm'])) {
        header("Location: ../../_umkm/data-event.php");
    } else {
        header("Location: ../../_admin/data-event.php");
    }
    exit();
} else {
    echo "Gagal menambahkan data event: " . mysqli_error($conn);
}
}
?>