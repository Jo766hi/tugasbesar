<h3>LAPORAN DATA ANGGOTA PERPUSTAKAAN</h3>
<?php
    include "../data_anggota/anggota-list.php";

	header("Content-type: application/vnd-ms-excel");
  	header("Content-Disposition: attachment; filename=Data Anggota.xls");

?>

<table border="1">
    <br>
    <tr>
		<th>No</th>
		<th>Username</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>No. Telp</th>
        <th>Email</th>
		<th>Level</th>
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
			<td><?php echo $anggota['level'] ?></td>
		</tr>
		<?php endforeach ?>
</table>