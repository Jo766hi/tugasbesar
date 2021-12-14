<?php

include '../includes/koneksi.php';

$id_kembali = $_GET['id_kembali'];

$query = "DELETE FROM kembali WHERE kembali_id = $id_kembali";
$hasil = mysqli_query($db, $query);

header('location: pengembalian.php');
