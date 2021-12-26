<h3>LAPORAN DATA PEMINJAMAN PERPUSTAKAAN</h3>

<?php
session_start();
if (!isset($_SESSION['username'])) {
 header('Location: ../login/login.php');
 exit();
}

include '../includes/koneksi.php';
if($_SESSION['level'] == 'petugas') { 
        $query = "SELECT * FROM pinjam";
        $result = mysqli_query($db, $query);
        
        $jlh_data = mysqli_num_rows($result);
                    
        $query2 = "SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, user.nama,
        (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
        FROM pinjam
        JOIN buku ON buku.buku_id = pinjam.buku_id
        JOIN user ON user.id = pinjam.anggota_id";
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
        $hasil = mysqli_query($db, $query);
        
        $jlh_data = mysqli_num_rows($hasil);
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

$data_pinjam = array();

while ($row = mysqli_fetch_assoc($h)) {
    $data_pinjam[] = $row;
}
  
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Peminjaman.xls");

?>
   
	<table id="table-datatables" class="Data" border="1" cellpadding="8">
    <br>
    <tr>
		<th width="1%" >No</th>
		<th>Judul Buku</th>
		<th>Nama</th>
		<th>Tgl. Pinjam</th>
		<th>Tgl. Jatuh Tempo</th>
		<th>Tgl. Kembali</th>
    <th>Status</th>
    </tr>

    <?php 
    $no = 1;
    foreach ($data_pinjam as $pinjam) :
    ?>
                  <tr>
				          	<td><?php echo $no++; ?></td>
                    <td><?php echo $pinjam['buku_judul'] ?></td>
                    <td><?php echo $pinjam['nama'] ?></td>
                    <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_pinjam'])) ?></td>
                    <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_jatuh_tempo'])) ?></td>
                    <td>
                    <?php  
                        if (empty($pinjam['tgl_kembali'])) {
                            echo "-";
                        } 
                        else {
                            echo date('d-m-Y', strtotime($pinjam['tgl_kembali']));
                        }
                    ?>
                    </td>
                    <td>
                        <?php $status = '' ?>
                        <?php if (empty($pinjam['tgl_kembali'])): ?>
                            pinjam
                        <?php $status = 'pinjam' ?>
                        <?php else: ?>
                            kembali
                        <?php $status = 'kembali' ?>  
                        <?php endif ?>
                    </td>
                </tr>
    <?php endforeach ?>
  </table>
