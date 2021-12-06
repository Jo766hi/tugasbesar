<?php

include '../includes/koneksi.php';
include '../includes/function.php';

$buku     			= $_POST['buku'];
$anggota  			= $_POST['anggota'];
$tgl_pinjam 		= date('Y-m-d',strtotime($_POST['tgl_pinjam']));
$tgl_jatuh_tempo    = date('Y-m-d',strtotime($_POST['tgl_jatuh_tempo']));

// cek stok buku
$stok_buku = cek_stok($db, $buku);

if ($stok_buku < 1) {
	$_SESSION['messages'] = '<font color="red">Stok buku sudah habis, proses peminjaman gagal!</font>';
    header('Location: pinjam-form.php');
    exit();
}

$query = "INSERT INTO pinjam (buku_id, anggota_id, tgl_pinjam, tgl_jatuh_tempo) 
    VALUES ('$buku', $anggota, '$tgl_pinjam', '$tgl_jatuh_tempo')";
$hasil = mysqli_query($db, $query);
if ($hasil == true) {

    kurangi_stok($db, $buku);

    $_SESSION['messages'] = '<font color="green">Peminjaman sukses!</font>';
    
    header('Location: peminjaman.php');
}