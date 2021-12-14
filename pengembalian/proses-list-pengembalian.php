<?php
include '../includes/koneksi.php';
if($_SESSION['level'] == 'petugas') {
$query = "SELECT buku.buku_judul, pinjam.tgl_pinjam, pinjam.tgl_jatuh_tempo,kembali.kembali_id, kembali.tgl_kembali, user.nama, kembali.denda
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN user ON user.id = pinjam.anggota_id
    JOIN kembali ON pinjam.pinjam_id = kembali.pinjam_id";
}
else if($_SESSION['level'] == 'anggota') {
$query = "SELECT buku.buku_judul, pinjam.tgl_pinjam, pinjam.tgl_jatuh_tempo,kembali.kembali_id, kembali.tgl_kembali, user.nama, kembali.denda
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN user ON user.id = pinjam.anggota_id
    JOIN kembali ON pinjam.pinjam_id = kembali.pinjam_id
    WHERE anggota_id = '" . $_SESSION['id'] . "'";
}
$hasil = mysqli_query($db, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_kembali = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_kembali[] = $row;
}
// ... lanjut di tampilan

