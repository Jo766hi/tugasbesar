<?php

include '../includes/koneksi.php';

$query = "SELECT * FROM user WHERE level ='anggota'";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_anggota = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_anggota
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_anggota[] = $row;
}


// ... lanjut di tampilan
