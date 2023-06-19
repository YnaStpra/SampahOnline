<?php
// Menginclude file koneksi.php untuk melakukan koneksi ke database
session_start();
include __DIR__ . '../../conn.php';
include '../umkmBefore.php';

//$conn = $_SESSION['conn'];

  $id = $_SESSION['id_admin'];
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $username = $_POST['uname'];
    $email = $_POST['email'];

    $gambarDefault = $_POST['gambarDefault'];

    if($_FILES['gambar']['error'] === 4){
      $gambar = $gambarDefault;
    }else{
      $folder = 'admin';
      $gambar = upload($folder);
    }

    $query = "UPDATE admin SET username = '$username', email = '$email', gambar = '$gambar' WHERE id_admin = '$id'";

      // Eksekusi query
      $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
      // Redirect pengguna ke halaman profil setelah berhasil melakukan update
      echo "Data berhasil diperbarui";
      header('Location: ../../_admin/edit-profile-admin.php');
      exit;
    } else {
      // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
      echo "Error: " . mysqli_error($conn);
    }
  }
  if (isset($_POST['submitpass'])) {
    // Ambil data dari form
    $password = $_POST['pass'];
    $newPassword = $_POST['new-pass'];
    $confirmPassword = $_POST['pass2'];
    //$username = $_POST['uname']; // Ambil username dari session
    
    //$username = $_SESSION['username'];

    // Validasi password saat ini
    $query = "SELECT password FROM admin WHERE id_admin = '$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $currentPassword = $data['password'];

      // Periksa apakah password saat ini sesuai
      if ($currentPassword !== $password) {
        echo "Password saat ini tidak sesuai";
        exit;
      }

      // Periksa apakah password baru dan konfirmasi password cocok
      if ($newPassword !== $confirmPassword) {
        echo "Password baru dan konfirmasi password tidak cocok";
        exit;
      }

    // Lakukan operasi update password
    $query = "UPDATE admin SET password = '$newPassword' WHERE id_admin = '$id'";

      // Eksekusi query
      $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
      echo "Password berhasil diperbarui";
      // Redirect pengguna ke halaman profil atau halaman lain yang diinginkan
      header('Location: ../../_admin/edit-profile-admin.php');
      exit;
    } else {
      // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
      echo "Error: " . mysqli_error($conn);
    }
  }


//$query = "SELECT * FROM admin WHERE id_admin = '$id'";
// Eksekusi query
//$result = mysqli_query($conn, $query);

  // Periksa apakah query berhasil dieksekusi
  /*if ($result) {
    // Ambil data dari hasil query
    $data = mysqli_fetch_assoc($result);

  // Masukkan data ke dalam variabel
  $id = $data['id_admin'];
  $uname = $data['username'];
  $email = $data['email'];
 // $gambar = $data['gambar'];

} else {
  // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
  echo "Error: " . mysqli_error($conn);
}*/

?>
