<?php

include '../includes/koneksi.php';

$id_kembali = $_GET['id_kembali'];

$query = "DELETE pinjam,kembali FROM pinjam
            LEFT JOIN kembali ON pinjam.pinjam_id = kembali.pinjam_id
            WHERE kembali_id = $id_kembali";
            
$hasil = mysqli_query($db, $query);

header('location: pengembalian.php');
