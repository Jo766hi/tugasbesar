<?php

include '../connection.php';

$id_buku = $_GET['id_buku'];

$query = "DELETE FROM buku WHERE buku_id = $id_buku";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: buku-data.php');
} else {
    header('location: buku-tambah.php');
}
