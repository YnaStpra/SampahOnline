<?php
// Menginclude file koneksi.php untuk melakukan koneksi ke database
  session_start();
  include __DIR__ . '../../conn.php';
  include '../umkmBefore.php';

  //$conn = $_SESSION['conn'];
  $id = $_SESSION['id_umkm'];

  if (isset($_POST['submit'])) {
    // Ambil data dari form
    $kd_event = $_POST['kd_event'];
    $nama = $_POST['judul-event'];
    $tanggal = $_POST['tanggal-event'];
    $lokasi = $_POST['lokasi-event'];
    $deskripsi = $_POST['deskripsi-komunitas'];
    $gambarDefault = $_POST['gambarDefault'];

    if($_FILES['gambar']['error'] === 4){
      $gambar = $gambarDefault;
    }else{
      $folder = 'event';
      $gambar = upload($folder);
    }
    if (!empty($_SESSION['id_umkm'])) {
      $id_umkm = $_SESSION['id_umkm'];
    }
    // Lakukan operasi update data di sini
    $query = "UPDATE event SET nama = '$nama', 
                              tanggal = '$tanggal', 
                              lokasi = '$lokasi',
                              deskripsi = '$deskripsi',
                              gambar = '$gambar'
                              WHERE kd_event = '$kd_event'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
      if (!empty($_SESSION['id_umkm'])) {
        header("Location: ../../_umkm/data-event.php");
        exit;
      } 
      else {
        header('Location: ../../_admin/data-event.php');
        exit;
      }
      // Redirect pengguna ke halaman profil setelah berhasil melakukan update
      exit;
    } else {
      // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
      echo "Error: " . mysqli_error($conn);
    }
  }
?>
