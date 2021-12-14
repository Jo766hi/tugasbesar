<?php
include '../includes/koneksi.php';
if($_SESSION['level'] == 'petugas') { 
    if (isset($_GET['halaman']) && $_GET['halaman'] != ""){
        $halaman = $_GET['halaman'];
    } else {
        $halaman = 1;
    }
        $limit = 3;
        if ($halaman > 1){
        $offset = ($halaman * $limit) - $limit;
        } else $offset = 0;
        $sebelum = $halaman - 1;
        $sesudah = $halaman + 1;
        $query = "SELECT * FROM pinjam";
        $result = mysqli_query($db, $query);
        
        $jlh_data = mysqli_num_rows($result);
        $jlh_halaman = ceil($jlh_data/$limit);
        $hal_akhir = $jlh_halaman;
                    
        $query2 = "SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, user.nama,
        (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
        FROM pinjam
        JOIN buku ON buku.buku_id = pinjam.buku_id
        JOIN user ON user.id = pinjam.anggota_id
        LIMIT $offset,$limit";
}

else if($_SESSION['level'] == 'anggota') { 
     $id = $_SESSION['id'];
if (isset($_GET['halaman']) && $_GET['halaman'] != ""){
    $halaman = $_GET['halaman'];
  } else {
    $halaman = 1;
  }
    $limit = 3;
    if ($halaman > 1){
      $offset = ($halaman * $limit) - $limit;
    } else $offset = 0;
    $sebelum = $halaman - 1;
    $sesudah = $halaman + 1;
    $query = "SELECT * FROM pinjam WHERE anggota_id = $id";
    $result = mysqli_query($db, $query);
    
    $jlh_data = mysqli_num_rows($result);
    $jlh_halaman = ceil($jlh_data/$limit);
    $hal_akhir = $jlh_halaman;
                  
    $query2 = "SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, user.nama, 
    (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN user ON user.id = pinjam.anggota_id
    WHERE anggota_id = '$id'
    LIMIT $offset,$limit";
    }

$h = mysqli_query($db, $query2);
mysqli_connect_error();
// ... menampung semua data kategori
$data_pinjam = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($h)) {
    $data_pinjam[] = $row;
}
// ... lanjut di tampilan
