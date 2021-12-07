<h3>LAPORAN DATA BUKU PERPUSTAKAAN</h3>
	<?php 
		include '../data_buku/buku-list.php';
	?>

		<table border="1">
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


<?php
  
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Buku.xls");
  
?>


   