<?php

include '../includes/koneksi.php';
include '../includes/function.php';

$buku     			= $_POST['buku'];
$anggota  			= $_POST['anggota'];
$tgl_pinjam 		= date('Y-m-d',strtotime(date('Y-m-d')));
$tgl_jatuh_tempo    = date('Y-m-d',strtotime('+7 days',strtotime(date('Y-m-d'))));

// cek stok buku
$stok_buku = cek_stok($db, $buku);
if ($stok_buku < 1) {
    echo "<script>window.alert('Stok buku sudah habis, Peminjaman Gagal')
    window.location='peminjaman.php'</script>";
    exit();
}

$query = "INSERT INTO pinjam (buku_id, anggota_id, tgl_pinjam, tgl_jatuh_tempo) 
    VALUES ('$buku', $anggota, '$tgl_pinjam', '$tgl_jatuh_tempo')";
$hasil = mysqli_query($db, $query);
if ($hasil == true) {

    kurangi_stok($db, $buku);

    echo "<script>window.alert('Data Berhasil di Tambah')
    window.location='peminjaman.php'</script>";
    

}