<?php

include '../connection.php';

$query = "SELECT * FROM petugas";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_petugas = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_petugas[] = $row;
}


// ... lanjut di tampilan
