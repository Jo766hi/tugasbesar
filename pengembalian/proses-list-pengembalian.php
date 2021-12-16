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
        $query = "SELECT * FROM kembali";
        $result = mysqli_query($db, $query);
        
        $jlh_data = mysqli_num_rows($result);
        $jlh_halaman = ceil($jlh_data/$limit);
        $hal_akhir = $jlh_halaman;
                      
        $query2 = "SELECT buku.buku_judul, pinjam.tgl_pinjam, pinjam.tgl_jatuh_tempo,kembali.kembali_id, kembali.tgl_kembali, user.nama, kembali.denda
        FROM pinjam
        JOIN buku ON buku.buku_id = pinjam.buku_id
        JOIN user ON user.id = pinjam.anggota_id
        JOIN kembali ON pinjam.pinjam_id = kembali.pinjam_id
        LIMIT $offset,$limit";

}
else if($_SESSION['level'] == 'anggota') {
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
        $query = "SELECT * FROM kembali WHERE kembali_id = '" . $_SESSION['id'] . "'";
        $result = mysqli_query($db, $query);
        
        $jlh_data = mysqli_num_rows($result);
        $jlh_halaman = ceil($jlh_data/$limit);
        $hal_akhir = $jlh_halaman;
                      
        $query2 = "SELECT buku.buku_judul, pinjam.tgl_pinjam, pinjam.tgl_jatuh_tempo,kembali.kembali_id, kembali.tgl_kembali, user.nama, kembali.denda
        FROM pinjam
        JOIN buku ON buku.buku_id = pinjam.buku_id
        JOIN user ON user.id = pinjam.anggota_id
        JOIN kembali ON pinjam.pinjam_id = kembali.pinjam_id
        WHERE anggota_id = '" . $_SESSION['id'] . "'
        LIMIT $offset,$limit";

}
$hasil = mysqli_query($db, $query2);
mysqli_connect_error();
// ... menampung semua data kategori
$data_kembali = array();

// ... tiap baris dari hasil query dikumpulkan ke $data_buku
while ($row = mysqli_fetch_assoc($hasil)) {
    $data_kembali[] = $row;
}
// ... lanjut di tampilan

