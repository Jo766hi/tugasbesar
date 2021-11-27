<?php

include '../connection.php';

$id_petugas = $_GET['id_petugas'];

$query = "DELETE FROM petugas WHERE petugas_id = $id_petugas";
$hasil = mysqli_query($db, $query);

if ($hasil == true) {
    header('location: petugas-data.php');
} else {
    header('location: petugas-tambah.php');
}
