<?php
// Menginclude file koneksi.php untuk melakukan koneksi ke database
  session_start();
  include __DIR__ . '../../conn.php';
  include '../umkmBefore.php';

  //$conn = $_SESSION['conn'];
  //$id = $_SESSION['id_umkm'];

  if (isset($_POST['submit'])) {
    // Ambil data dari form
    $kd_artikel = $_POST['kd_artikel'];
    $judul = $_POST['judul-artikel'];
    $isi = $_POST['isi_artikel'];
    $gambarDefault = $_POST['gambarDefault'];

    if($_FILES['gambar']['error'] === 4){
      $gambar = $gambarDefault;
    }else{
      $folder = 'artikel';
      $gambar = upload($folder);
    }
    if (!empty($_SESSION['id_umkm'])) {
      $id_umkm = $_SESSION['id_umkm'];
    }

    // Lakukan operasi update data di sini
    $query = "UPDATE artikel SET judul = '$judul', 
                              isi = '$isi', 
                              gambar = '$gambar' WHERE kd_artikel = '$kd_artikel'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
      if (!empty($_SESSION['id_umkm'])) {
        header("Location: ../../_umkm/data-artikel.php");
      } else {
        header('Location: ../../_admin/data-artikel.php');
      }
      exit;
    } else {
      // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
      echo "Error: " . mysqli_error($conn);
    }
  }
?>
