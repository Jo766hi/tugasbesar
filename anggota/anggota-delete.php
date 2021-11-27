<?php

include '../connection.php';

$id_anggota = $_GET['id_anggota'];

$query = "DELETE FROM anggota WHERE anggota_id = $id_anggota";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: anggota-data.php');
} else {
    header('location: anggota-tambah.php');
}
