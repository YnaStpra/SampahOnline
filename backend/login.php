<?php
session_start();
include "conn.php";

if (isset($_POST['uname']) && isset($_POST['pass'])) {
    
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['pass']);
    
    if (empty($uname)) {
        header("Location: masuk.php?error=User Name is required");
        exit();
    } else if (empty($pass)) {
        header("Location: masuk.php?error=Password is required");
        exit();
    } else {
        // Query untuk admin
        $admin_query = "SELECT * FROM admin WHERE username='$uname' AND password='$pass'";
        $admin_result = mysqli_query($conn, $admin_query);
        // Query untuk UMKM
        $umkm_query = "SELECT * FROM umkm WHERE username='$uname' AND password='$pass'";
        $umkm_result = mysqli_query($conn, $umkm_query);

        // Query untuk pelanggan
        $pelanggan_query = "SELECT * FROM pelanggan WHERE username='$uname' AND password='$pass'";
        $pelanggan_result = mysqli_query($conn, $pelanggan_query);

        if (mysqli_num_rows($admin_result) === 1) {
            // Jika login sebagai admin
            $row = mysqli_fetch_assoc($admin_result);
            $_SESSION['id_admin'] = $row['id_admin'];
            header("Location: ../_admin/admin-dashboard.php");
            exit();
        } elseif (mysqli_num_rows($umkm_result) === 1) {
            // Jika login sebagai UMKM
            $row = mysqli_fetch_assoc($umkm_result);
            $_SESSION['id_umkm'] = $row['id_umkm'];
            header("Location: ../_umkm/umkm-dashboard.php");
            exit();
        } elseif (mysqli_num_rows($pelanggan_result) === 1) {
            // Jika login sebagai pelanggan
            $row = mysqli_fetch_assoc($pelanggan_result);
            $_SESSION['id_pelanggan'] = $row['id_pelanggan'];
            header("Location: ../_masyarakat/BerandaAfter.php");
            exit();
        } else {
            header("Location: masuk.php?error=Incorrect User name or password");
            exit();
        }
    }

} else {
    header("Location: masuk.php");
    exit();
}
?>