<h3>LAPORAN DATA ANGGOTA PERPUSTAKAAN</h3>
<?php
    include "../data_anggota/anggota-list.php";
?>

<table border="1">
    <br>
    <tr>
		<th width="1%" >No</th>
		<th>Username</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>No. Telp</th>
        <th>Email</th>
    </tr>

	<?php
	$no = 1; 
	foreach ($data_anggota as $anggota) :
	?>
	
		<tr>
			<td><?php echo $no++; ?></td>
			<td><?php echo $anggota['username'] ?></td>
            <td><?php echo $anggota['nama'] ?></td>
            <td><?php echo $anggota['jk'] ?></td>
            <td><?php echo $anggota['telp'] ?></td>
            <td><?php echo $anggota['email'] ?></td>
		</tr>
		<?php endforeach ?>
</table>



<?php
  
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Anggota.xls");
  
?>


   