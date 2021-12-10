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
    <title>Document</title>
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
	include '../peminjaman/proses-list-pinjam-data.php';
?>
    <?php if (empty($data_pinjam)) : ?>
            Tidak ada data.
    <?php else : ?>
	<table id="table-datatables" class="DataTabl" border="1" cellpadding="8">
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
                    <td><?php echo $pinjam['anggota_nama'] ?></td>
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
		document.getElementById("cetak").innerHTML
		window.print();
	}

</script>

</body>
</html>
