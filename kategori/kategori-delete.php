<?php

include '../connection.php';

$id_kategori = $_GET['id_kategori'];

$query = "DELETE FROM kategori WHERE kategori_id = $id_kategori";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: kategori-data.php');
} else {
    header('location: kategori-tambah.php');
}
