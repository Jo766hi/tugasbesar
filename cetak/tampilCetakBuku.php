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
<center><h3>LAPORAN DATA BUKU PERPUSTAKAAN</h3></center>
<hr>
	<?php 
	include '../data_buku/buku-list.php';
	?>
	<?php if (empty($data_buku)) : ?>
            Tidak ada data.
    <?php else : ?>
			<table id="table-datatables" class="DataTabl" border="1" cellpadding="8">
				<br>
				<tr>
					<th width="1%" >No</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    
                </tr>
                <?php $no = 1;
				foreach ($data_buku as $buku) :
				?>
                <tr>
					<td><?php echo $no++; ?></td>
                    <td><?php echo $buku['buku_judul'] ?></td>
                    <td><?php echo $buku['kategori_nama'] ?></td>
                    <td><?php echo $buku['buku_deskripsi'] ?></td>
                    <td><?php echo $buku['buku_jumlah'] ?></td>
                </tr>
                <?php endforeach ?>
			</table>
			<?php endif ?>
<br>
<center>
<button class="cetak" type="button" onclick="cetak();" id="cetak" >Export to Pdf</button>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="excel_buku.php" target="_blank" class="excel"><button>Export to Excel</button></a>
</center>

<script>
	function cetak() {
		document.getElementById("cetak").innerHTML
		window.print();
	}

</script>

</body>
</html>