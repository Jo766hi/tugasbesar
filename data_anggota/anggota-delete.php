<?php

include '../includes/koneksi.php';

$id_anggota = $_GET['id_anggota'];

$query = "DELETE FROM user WHERE id = $id_anggota";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: anggota.php');
} else {
    header('location: anggota-tambah.php');
}
