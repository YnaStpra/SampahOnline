<?php
session_start();
include __DIR__ . '../conn.php';
$conn = $_SESSION['conn'];

if (isset($_POST['submit'])) {
  $email = $_POST['email'];
  $password = $_POST['pass'];
  $confirmPassword = $_POST['pass2'];

  $query_pelanggan = "SELECT * FROM pelanggan WHERE email = '$email'";
  $result_pelanggan = mysqli_query($conn, $query_pelanggan);
  
  $query_admin = "SELECT * FROM admin WHERE email = '$email'";
  $result_admin = mysqli_query($conn, $query_admin);
  
  $query_umkm = "SELECT * FROM umkm WHERE email = '$email'";
  $result_umkm = mysqli_query($conn, $query_umkm);
  
  if ($result_pelanggan !== false && mysqli_num_rows($result_pelanggan) > 0) {
      // Email ditemukan di tabel pelanggan
      $table_name = 'pelanggan';
      $result = $result_pelanggan;
  } elseif ($result_admin !== false && mysqli_num_rows($result_admin) > 0) {
      // Email ditemukan di tabel admin
      $table_name = 'admin';
      $result = $result_admin;
  } elseif ($result_umkm !== false && mysqli_num_rows($result_umkm) > 0) {
      // Email ditemukan di tabel umkm
      $table_name = 'umkm';
      $result = $result_umkm;
  } else {
      // Email tidak ditemukan di semua tabel
      echo "Email tidak ditemukan!";
      // Lakukan tindakan lain sesuai kebutuhan Anda
  }
 if ($result !== false && mysqli_num_rows($result) > 0) {
        // Email ditemukan, lakukan update data pelanggan
        if ($password === $confirmPassword) {
        // Update password pelanggan
            $updateQuery = "UPDATE $table_name SET password = '$confirmPassword' WHERE email = '$email'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                // Password berhasil diupdate
                header("Location: ../masuk.php");
                exit;
            } else {
                // Gagal mengupdate password
                echo "Gagal mengupdate password: " . mysqli_error($conn);
            }
        } else {
            // Password dan konfirmasi password tidak cocok
             echo "Password dan konfirmasi password tidak cocok!";
        }
  } else {
    // Email tidak ditemukan
    echo "Email tidak ditemukan!";
  }
}
?>