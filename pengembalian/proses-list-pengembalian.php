<?php


include '../includes/koneksi.php';

$query = "SELECT buku.buku_judul, pinjam.tgl_pinjam, pinjam.tgl_jatuh_tempo,kembali.kembali_id, kembali.tgl_kembali, user.nama
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN user ON user.id = pinjam.anggota_id
    JOIN kembali ON pinjam.pinjam_id = kembali.pinjam_id";

$hasil = mysqli_query($db, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_kembali = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_kembali[] = $row;
}
// ... lanjut di tampilan

