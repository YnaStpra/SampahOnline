<?php
include "../conn.php"; // Koneksi ke database
include '../umkmBefore.php';

session_start(); // Mulai sesi

if(isset($_POST['submit'])) {
    $judul = $_POST['judul-artikel'];
    $isi = $_POST['isi_artikel'];

    if($_FILES['gambar']['error'] === 4){
        $gambar = null;
      }else{
        $folder = 'artikel';
        $gambar = upload($folder);
      }
    // Cek apakah session id_umkm kosong atau tidak
    if (!empty($_SESSION['id_umkm'])) {
        $id_umkm = $_SESSION['id_umkm'];
    } else {
        $id_umkm = $_POST['nama-umkm'];
    }

    // Query untuk menambahkan data event ke database
    $query = "INSERT INTO artikel (judul, isi, id_umkm, gambar) 
              VALUES ('$judul', '$isi', '$id_umkm', '$gambar')";

if (mysqli_query($conn, $query)) {
    if (!empty($_SESSION['id_umkm'])) {
        header("Location: ../../_umkm/data-artikel.php");
    } else {
        header("Location: ../../_admin/data-artikel.php");
    }
    exit();
} else {
    echo "Gagal menambahkan data artikel: " . mysqli_error($conn);
}
}
?>