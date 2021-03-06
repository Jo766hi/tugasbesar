<?php 
  session_start();
  if (!isset($_SESSION['username'])) {
   header('Location: ../login/login.php');
   exit();
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Peminjaman</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.dataTables.min.css">
   
</head>
<style>
		@media print{
			.cetak, .excel{
				display: none;
				height: 0;
			}

		}
	</style>
<body>
<center><h3>LAPORAN DATA PEMINJAMAN PERPUSTAKAAN</h3></center>
<hr>
<?php 
	include '../includes/koneksi.php';
    include '../includes/function.php';
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
            $query = "SELECT * FROM pinjam WHERE anggota_id = $id";
            $hasil = mysqli_query($db, $query);
            
            $jlh_data = mysqli_num_rows($hasil);
        
            $query2 = "SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, user.nama, 
            (SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
            FROM pinjam
            JOIN buku ON buku.buku_id = pinjam.buku_id
            JOIN user ON user.id = pinjam.anggota_id
            WHERE anggota_id = '$id'";
    }
        
    $h = mysqli_query($db, $query2);
    mysqli_connect_error();
    // ... menampung semua data kategori
    $data_pinjam = array();
    
    // ... tiap baris dari hasil query dikumpulkan ke $data_buku
    while ($row = mysqli_fetch_assoc($h)) {
        $data_pinjam[] = $row;
    }
?>
    <?php if (empty($data_pinjam)) : ?>
            Tidak ada data.
    <?php else : ?>
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
    <?php endif ?>
<br>
<center>
<button class="cetak" type="button" onclick="cetak();" id="cetak" >Export to Pdf</button>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="excel_peminjaman.php" target="_blank" class="excel"><button>Export to Excel</button></a>
</center>


<script>
	function cetak() {
		window.print();
	}

</script>

</body>
</html>
