<?php
// Menginclude file koneksi.php untuk melakukan koneksi ke database
  //session_start();
include __DIR__ . '../../conn.php';
include '../umkmBefore.php';

  //include '../umkmBefore.php';

  //$conn = $_SESSION['conn'];
  $id = $_SESSION['id_umkm'];

  if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id = $_POST['id_umkm'];
    $nama = $_POST['nama'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $no_hp = $_POST['notelp'];
    $alamat = $_POST['alamat-masy'];
    $penanggung_jawab = $_POST['penanggung_jawab'];

    
    $gambarDefault = $_POST['gambarDefault'];

    if($_FILES['gambar']['error'] === 4){
      $gambar = $gambarDefault;
    }else{
      $folder = 'umkm';
      $gambar = upload($folder);
    }

    // Lakukan operasi update data di sini
    $query = "UPDATE umkm SET nama = '$nama', 
                     email = '$email', 
                     no_hp = '$no_hp', 
                     alamat = '$alamat', 
                     username = '$username',
                     penanggung_jawab = '$penanggung_jawab',
                     gambar = '$gambar' WHERE id_umkm = '$id'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
      // Redirect pengguna ke halaman profil setelah berhasil melakukan update
      echo "Data berhasil diperbarui";
      header('Location: ../../_umkm/edit-profile-umkm.php');
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
    $query = "SELECT password FROM umkm WHERE id_umkm = '$id'";
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
    $query = "UPDATE umkm SET password = '$newPassword' WHERE id_umkm = '$id'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
      echo "Password berhasil diperbarui";
      // Redirect pengguna ke halaman profil atau halaman lain yang diinginkan
      header('Location: ../../_umkm/edit-profile-umkm.php');
      exit;
    } else {
      // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
      echo "Error: " . mysqli_error($conn);
    }
  }


  // $query = "SELECT * FROM umkm WHERE id_umkm = '$id'";
  // // Eksekusi query
  // $result = mysqli_query($conn, $query);

  // // Periksa apakah query berhasil dieksekusi
  // if ($result) {
  //   // Ambil data dari hasil query
  //   $data = mysqli_fetch_assoc($result);

  //   // Masukkan data ke dalam variabel
  //   $id = $data['id_umkm'];
  //   $nama = $data['nama'];
  //   $uname = $data['username'];
  //   $email = $data['email'];
  //   $no_hp = $data['no_hp'];
  //   $alamat = $data['alamat'];
  //   $penanggung_jawab = $data['penanggung_jawab'];
    //$gambar = $data['gambar'];
  // } else {
  //   // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
  //   echo "Error: " . mysqli_error($conn);
  // }
?>
