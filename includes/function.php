<?php
function ambil_kategori($db)
{
    // ambil data kategori
    $query = "SELECT * FROM kategori";
    $hasil = mysqli_query($db, $query);
    $data_kategori = array();

    while ($row = mysqli_fetch_assoc($hasil)) {
        $data_kategori[] = $row;
    }

    return $data_kategori;
}

function hitung_denda($tgl_kembali, $tgl_jatuh_tempo)
{
    include '../includes/koneksi.php';

    $q = mysqli_query($db, "SELECT * FROM denda");
    $uang = mysqli_fetch_row($q);

    if (strtotime( $tgl_kembali ) > strtotime($tgl_jatuh_tempo)) {
        $kembali        = new DateTime($tgl_kembali); 
        $jatuh_tempo    = new DateTime($tgl_jatuh_tempo); 

        $selisih    = $kembali->diff($jatuh_tempo);
        echo $selisih    = $selisih->format('%a');
        $denda      = intval($uang[0]) * $selisih;

    } else {
        $denda = 0;
    }

    return $denda;
}

function cek_stok($db, $buku_id)
{
    $q = "SELECT buku_jumlah FROM buku WHERE buku_id = $buku_id";
    $hasil = mysqli_query($db, $q);
    $hasil = mysqli_fetch_assoc($hasil);
    $stok = $hasil['buku_jumlah'];

    return $stok;
}

function kurangi_stok($db, $buku_id)
{
    $q = "UPDATE buku SET buku_jumlah = buku_jumlah - 1 WHERE buku_id = $buku_id";
    mysqli_query($db, $q);
}

function tambah_stok($db, $buku_id)
{
    $q = "UPDATE buku SET buku_jumlah = buku_jumlah + 1 WHERE buku_id = $buku_id";
    mysqli_query($db, $q);
}
//pencarian anggota
function cari($keyword)
{
    include '../includes/koneksi.php';
    $query = "SELECT * FROM user 
                WHERE nama 
                LIKE '%$keyword%' OR 
                username LIKE '%$keyword%'";

    $hasil = mysqli_query($db, $query);
    $data_anggota = array();
    // ... tiap baris dari hasil query dikumpulkan ke $data_anggota
    while ($row = mysqli_fetch_assoc($hasil)) {
    $data_anggota[] = $row;
}
    return $data_anggota;
}

//pencarian untuk peminjaman
function cari2($keyword){
    include '../includes/koneksi.php';

    if($_SESSION['level'] == 'petugas') {
        $a = "SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, user.nama,
        (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
        FROM pinjam
        JOIN buku ON buku.buku_id = pinjam.buku_id
        JOIN user ON user.id = pinjam.anggota_id
        WHERE user.nama
        LIKE '%$keyword%' OR
        buku.buku_judul LIKE '%$keyword%'";
        
        }
    else if($_SESSION['level'] == 'anggota') {
        $a = "SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, user.nama, 
            (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
            FROM pinjam
            JOIN buku ON buku.buku_id = pinjam.buku_id
            JOIN user ON user.id = pinjam.anggota_id
            WHERE buku.buku_judul LIKE '%$keyword%'
            AND anggota_id = '" . $_SESSION['id'] . "'";
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
    return $data_pinjam;
}

//pencarian untuk pengembalian
function cari3($keyword){
    include '../includes/koneksi.php';

    if($_SESSION['level'] == 'petugas') {
        $query = "SELECT buku.buku_judul, pinjam.tgl_pinjam, pinjam.tgl_jatuh_tempo,kembali.kembali_id, kembali.tgl_kembali, user.nama, kembali.denda
            FROM pinjam
            JOIN buku ON buku.buku_id = pinjam.buku_id
            JOIN user ON user.id = pinjam.anggota_id
            JOIN kembali ON pinjam.pinjam_id = kembali.pinjam_id
            WHERE user.nama
            LIKE '%$keyword%' OR
            buku.buku_judul LIKE '%$keyword%'"; 
        }
        else if($_SESSION['level'] == 'anggota') {
        $query = "SELECT buku.buku_judul, pinjam.tgl_pinjam, pinjam.tgl_jatuh_tempo,kembali.kembali_id, kembali.tgl_kembali, user.nama, kembali.denda
            FROM pinjam
            JOIN buku ON buku.buku_id = pinjam.buku_id
            JOIN user ON user.id = pinjam.anggota_id
            JOIN kembali ON pinjam.pinjam_id = kembali.pinjam_id
            WHERE buku.buku_judul LIKE '%$keyword%'
            AND anggota_id = '" . $_SESSION['id'] . "'";
        }
        $h = mysqli_query($db, $query);
        mysqli_connect_error();
    // ... menampung semua data kategori
        $data_kembali = array();

    // ... tiap baris dari hasil query dikumpulkan ke $data_buku
        while ($row = mysqli_fetch_assoc($h)) {
        $data_kembali[] = $row;
    }
    // ... lanjut di tampilan
    return $data_kembali;
}

//pencarian untuk buku
function cari4($keyword) {
    
include '../includes/koneksi.php';

$query = "SELECT buku.*, kategori.kategori_nama
    FROM buku
    JOIN kategori
    ON buku.kategori_id = kategori.kategori_id
    WHERE buku_judul LIKE '%$keyword%' OR 
    kategori.kategori_nama LIKE '%$keyword%'
    ";

$hasil = mysqli_query($db, $query);
mysqli_connect_error();
// ... menampung semua data kategori
$data_buku = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_buku[] = $row;
}

return $data_buku;
}

//pencarian untuk kategori
function cari5($keyword) {
    
include '../includes/koneksi.php';

$query = "SELECT * FROM kategori
    WHERE kategori_nama LIKE '%$keyword%'

";

$hasil = mysqli_query($db, $query);

// ... menampung semua data kategori
$data_kategori = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_kategori
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_kategori[] = $row;
}
return $data_kategori;
}