<?php
  //session_start(); // Pastikan session telah dimulai
  include __DIR__ . '../../conn.php';
  //include '../umkmBefore.php';
  $id_pelanggan = $_SESSION['id_pelanggan'];

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kd_event = $_POST['kd_event'];
    //$jumlah_event = 1;

    // Query untuk memasukkan data ke tabel mengikuti_event
    $sql_mengikuti = "INSERT INTO mengikuti_event (kd_event, id_pelanggan) VALUES ('$kd_event', '$id_pelanggan')";
    $result_mengikuti = mysqli_query($conn,$sql_mengikuti);
    //var_dump($result_mengikuti);die;
    if ($result_mengikuti) {
        header("Location: rincian-event.php?kd_event=" . $kd_event);
        exit;
    } else {
      echo "Terjadi kesalahan saat mengikuti event.";
    }
  }
?>