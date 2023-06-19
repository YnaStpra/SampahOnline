<?php
session_start();
include __DIR__ . '../../conn.php';
if (isset($_POST['point1'])) {
  $jumlahPointTukar = 500;
  $jumlahPulsa = 5000;
} elseif (isset($_POST['point2'])) {
  $jumlahPointTukar = 5000;
  $jumlahPulsa = 50000;
} elseif (isset($_POST['point3'])) {
  $jumlahPointTukar = 50000;
  $jumlahPulsa = 500000;
}


// Lakukan pengecekan ketersediaan poin yang cukup untuk ditukar
$id_pelanggan = $_SESSION['id_pelanggan']; // Ganti dengan ID pelanggan yang sesuai
$query = "SELECT total_point FROM point WHERE id_pelanggan = '$id_pelanggan' ORDER BY kd_point DESC LIMIT 1";
$result = mysqli_query($conn,$query);
if (!empty($result)) {
    $row = mysqli_fetch_assoc($result);
    $totalPoinPelanggan = $row['total_point'];
} else {
    $totalPoinPelanggan = 0;
}


if ($totalPoinPelanggan >= $jumlahPointTukar) {
    // Kurangi poin pelanggan sesuai dengan jumlah poin pulsa yang ditukar
    $totalPoinPelanggan -= $jumlahPointTukar;
    
    // Ambil nomor HP dari tabel pelanggan berdasarkan ID pelanggan
    $query_pelanggan = "SELECT no_hp FROM pelanggan WHERE id_pelanggan = '$id_pelanggan'";
    $result_pelanggan = mysqli_query($conn, $query_pelanggan);
    
    $updateQuery = "UPDATE point SET total_point = '$totalPoinPelanggan' WHERE id_pelanggan = '$id_pelanggan'";
    $updateResult = mysqli_query($conn, $updateQuery);
    
    if ($result_pelanggan) {
        $row_pelanggan = mysqli_fetch_assoc($result_pelanggan);
        $no_hp = $row_pelanggan['no_hp'];
        
        // Simpan data menukar pulsa ke tabel "menukar_pulsa"
        $tanggalWaktu = date("Y-m-d H:i:s"); // Tanggal dan waktu saat ini
        //var_dump($no_hp);die;

        // Lakukan query untuk menyimpan data ke tabel "menukar_pulsa"
        $query = "INSERT INTO menukar_pulsa (id_pelanggan, no_hp, jumlah_pointTukar, jumlah_pulsa, tanggal_waktu) VALUES ('$id_pelanggan', '$no_hp', '$jumlahPointTukar', '$jumlahPulsa', '$tanggalWaktu')";
        $result = mysqli_query($conn, $query);

        if ($result) {
        // Tampilkan pesan sukses atau arahkan pengguna ke halaman yang diinginkan
            header("Location: ../../_masyarakat/tukar-poin.php");
            exit;
        } else {
        // Tampilkan pesan error atau arahkan pengguna ke halaman yang sesuai
        echo "Gagal menyimpan data menukar pulsa: " . mysqli_error($conn);
        }
    } else {
        // Tampilkan pesan error atau arahkan pengguna ke halaman yang sesuai
        echo "Gagal mengambil data pelanggan: " . mysqli_error($conn);
    }
} else {
  // Tampilkan pesan error atau arahkan pengguna ke halaman yang sesuai
  echo "Poin tidak cukup untuk ditukar!";
}
?>