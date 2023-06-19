<?php
    include __DIR__ . '../../conn.php';
    include '../umkmBefore.php';

    if ($_GET['action'] == 'terima') {
        $id_penukaranSampah = $_GET['id_penukaranSampah'];
        //var_dump($id_penukaranSampah);die;
        // Update status penukaran menjadi "Diterima"
        $sql = "UPDATE transaksi_penukaran_sampah SET status = 'diterima' WHERE id_penukaranSampah = '$id_penukaranSampah'";
        // Eksekusi query
        $updateResult = mysqli_query($conn, $sql);
        if (!$updateResult) {
            echo "Error updating status: " . mysqli_error($conn);
        } else {
            // Process the points if the exchange is accepted
            if ($_GET['action'] == 'terima') {
                $query = "SELECT * FROM transaksi_penukaran_sampah WHERE id_penukaranSampah = '$id_penukaranSampah'";
                $result = mysqli_query($conn, $query);
                
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $idPelanggan = $row['id_pelanggan'];
                    $totalPoint = calculateTotalPoint($conn, $idPelanggan);
                    $insertResult = insertTotalPoint($conn, $idPelanggan, $totalPoint);

                    if ($insertResult) {
                        header("Location: ../../_umkm/umkm-side-penukaran.php");      
                    } else {
                        echo "Error inserting total point.";
                    }
                } else {
                    echo "Error: Unable to fetch transaction details.";
                }
            }
        }
        // Lakukan tindakan lain yang diperlukan setelah penukaran diterima
        // Misalnya, menambahkan poin ke akun pelanggan yang melakukan penukaran
        // Update tabel pelanggan dengan menambahkan poin
    } elseif ($_GET['action'] == 'tolak') {
        $id_penukaranSampah = $_GET['id_penukaranSampah'];
        // Update status penukaran menjadi "Ditolak"
        $sql = "UPDATE transaksi_penukaran_sampah SET status = 'ditolak' WHERE id_penukaranSampah = '$id_penukaranSampah'";
        // Eksekusi query
        mysqli_query($conn, $sql);
        // Lakukan tindakan lain yang diperlukan setelah penukaran ditolak
        // Misalnya, memberikan notifikasi kepada pelanggan tentang penolakan penukaran
    }
    header("Location: ../../_umkm/umkm-side-penukaran.php");
?>