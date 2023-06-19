<?php
include "../conn.php"; // Koneksi ke database
include "../umkmBefore.php";
if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $nomorTelepon = $_POST['notelp'];
    $alamat = $_POST['alamat-masy'];
    $password = $_POST['pass'];
    $konfirmasiPassword = $_POST['pass2'];

    if ($_FILES['gambar']['error'] === 4) {
        $gambar = null;
    } else {
        $folder = 'masyarakat';
        $gambar = upload($folder);
    }
    if($password !== $konfirmasiPassword) {
        echo "Konfirmasi password tidak sesuai";
        exit();
    }

    // Upload foto profil
    

    // Query untuk menambahkan data masyarakat ke database
    $query = "INSERT INTO pelanggan (nama, username, email, no_hp, alamat, password, gambar) 
              VALUES ('$nama', '$username', '$email', '$nomorTelepon', '$alamat', '$password', '$gambar')";
    
    if(mysqli_query($conn, $query)) {
        header("Location: ../../_admin/data-masyarakat.php");
        exit();
    } else {
        echo "Gagal menambahkan data masyarakat: " . mysqli_error($conn);
    }
}
?>