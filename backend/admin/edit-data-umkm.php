<?php
// Menginclude file koneksi.php untuk melakukan koneksi ke database
  session_start();
  include __DIR__ . '../../conn.php';
  include '../umkmBefore.php';


  if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id = $_POST['id_umkm'];
    $nama = $_POST['nama'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $no_hp = $_POST['notelp'];
    $alamat = $_POST['alamat-masy'];
    $penanggung_jawab = $_POST['penanggung_jawab'];
    $password = $_POST['pass'];
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
                              password = '$password',
                              gambar = '$gambar',
                              penanggung_jawab = '$penanggung_jawab' WHERE id_umkm = '$id'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
      // Redirect pengguna ke halaman profil setelah berhasil melakukan update
      echo "Data berhasil diperbarui";
      header('Location: ../../_admin/data-umkm.php');
      exit;
    } else {
      // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
      echo "Error: " . mysqli_error($conn);
    }
  }
?>
