<?php
    session_start();
    include "conn.php";
    if(isset($_POST['submit'])) {
        // Mengambil data dari form
        $nama = $_POST['nama'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $notelp = $_POST['notelp'];
        $pass = $_POST['pass'];
        
        // Query SQL untuk menyimpan data ke dalam tabel
        $query = "INSERT INTO pelanggan (nama, username, email, no_hp, password) VALUES ('$nama', '$uname', '$email', '$notelp', '$pass')";
    
        // Eksekusi query
        if(mysqli_query($conn, $query)) {
            // Jika data berhasil disimpan, tampilkan pesan sukses
            header('Location: ../masuk.php');
           // exit();
        } else {
            // Jika terjadi kesalahan saat menyimpan data, tampilkan pesan error
            echo "Terjadi kesalahan: " . mysqli_error($conn);
        }
    }
?>