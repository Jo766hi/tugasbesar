<?php
include '../includes/koneksi.php';
    if($_SESSION['level'] == 'petugas') {
        $a = "SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, user.nama,
        (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
        FROM pinjam
        JOIN buku ON buku.buku_id = pinjam.buku_id
        JOIN user ON user.id = pinjam.anggota_id";
        }
    else if($_SESSION['level'] == 'anggota') {
        $a = "SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, user.nama, 
            (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
            FROM pinjam
            JOIN buku ON buku.buku_id = pinjam.buku_id
            JOIN user ON user.id = pinjam.anggota_id
            WHERE anggota_id = '" . $_SESSION['user_id'] . "'";
            }
$h = mysqli_query($db, $a);
mysqli_connect_error();
// ... menampung semua data kategori
$data_pinjam = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($h)) {
    $data_pinjam[] = $row;
}
// ... lanjut di tampilan
