<?php

include '../includes/koneksi.php';

$id_buku = $_GET['id_buku'];

$query = "DELETE FROM buku WHERE buku_id = $id_buku";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: buku.php');
} else {
    header('location: buku-tambah.php');
}
