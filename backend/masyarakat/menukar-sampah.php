<?php
include __DIR__ . '../../conn.php';
include '../umkmBefore.php';

//$id = $_SESSION['id_pelanggan'];
if (isset($_POST['submit'])) {
    //require_once __DIR__ . "../../conn.php";
  
    $umkmtarget = $_POST['nama-umkm'];
    $id = $_POST['id_pelanggan'];
    $quantities = [
      'PETE' => $_POST['quantity1'],
      'HDPE' => $_POST['quantity2'],
      'PVC' => $_POST['quantity3'],
      'LDPE' => $_POST['quantity4'],
      'PP' => $_POST['quantity5'],
      'PS' => $_POST['quantity6'],
      'Other' => $_POST['quantity7']
    ];
  
    $conversionRates = [
      'PETE' => 1,
      'HDPE' => 0.5,
      'PVC' => 2,
      'LDPE' => 0.5,
      'PP' => 1,
      'PS' => 0.5,
      'Other' => 3
    ];
  
    $exchangeData = [];
    foreach ($quantities as $type => $quantity) {
      if ($quantity > 0) {
        $points = $quantity * $conversionRates[$type];
  
        $exchangeData[] = [
          'id_sampah' => $type,
          'jumlah_sampah' => $quantity,
          'point' => $points
        ];
      }
    }

      foreach ($exchangeData as $data) {
        $idSampah = mysqli_real_escape_string($conn, $data['id_sampah']);
        $query = "SELECT * FROM sampah WHERE jenis_sampah LIKE '%$idSampah%'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $idSampahValue = $row['id_sampah'];
                $jumlahSampah = mysqli_real_escape_string($conn, $data['jumlah_sampah']);
                $point = mysqli_real_escape_string($conn, $data['point']);
                
                $sql = "INSERT INTO transaksi_penukaran_sampah (id_sampah, jumlah_sampah, jumlah_point, id_pelanggan, id_umkm) 
                VALUES ('$idSampahValue', '$jumlahSampah', '$point', '$id', '$umkmtarget')";
                
                $insertResult = mysqli_query($conn, $sql);
                
                if (!$insertResult) {
                    echo "Error: " . mysqli_error($conn);
                    break;
                }
            }
        } else {
            echo "Error: " . mysqli_error($conn);
            break;
        }
      } 
    header("Location: ../../_masyarakat/profile-masyarakat.php");
    exit();
}
