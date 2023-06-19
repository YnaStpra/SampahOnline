<?php
// delete-data.php
session_start();
include "conn.php";
// Check if the delete button is clicked and the parameter is passed
if (isset($_GET['delete_id']) && isset($_GET['table_name'])) {
    $delete_id = $_GET['delete_id'];
    $table_name = $_GET['table_name'];
    // Perform the delete operation here, based on the table name and delete ID

    // Example code to delete data from the database using SQL
    if ($table_name === 'pelanggan') {
        $sql = "DELETE FROM pelanggan WHERE id_pelanggan = '$delete_id'";
    } elseif ($table_name === 'umkm') {
        $sql = "DELETE FROM umkm WHERE id_umkm = '$delete_id'";
    } elseif ($table_name === 'event') {
        $sql = "DELETE FROM event WHERE kd_event = '$delete_id'";
    } elseif ($table_name === 'artikel') {
        $sql = "DELETE FROM artikel WHERE kd_artikel = '$delete_id'";
    }
    
    //var_dump($_SESSION['id_umkm']);die;
    if (mysqli_query($conn, $sql)) {
        if (!empty($_SESSION['id_umkm'])) {
            if($table_name === 'artikel'){
                header("Location: ../_umkm/data-artikel.php");
            }else if($table_name ==='event'){
                header("Location: ../_umkm/data-event.php");
            }
        } else {
            if($table_name === 'pelanggan'){
                header("Location: ../_admin/data-masyarakat.php");
            }else if($table_name === 'umkm'){
                header("Location: ../_admin/data-umkm.php");
            }else if($table_name === 'artikel'){
                header("Location: ../_admin/data-artikel.php");
            }else{
                header("Location: ../_admin/data-event.php");
            }
        }
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
}
?>