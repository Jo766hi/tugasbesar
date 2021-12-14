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
    <title>Data Anggota</title>
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
<center><h3>LAPORAN DATA ANGGOTA PERPUSTAKAAN</h3></center>
<hr>
<?php
    include "../data_anggota/anggota-list.php";
?>
<?php if (empty($data_anggota)) : ?>
            Tidak ada data.
<?php else : ?>
<table id="table-datatables" class="data" border="1" cellpadding="8">
    <br>
    <tr>
		<th width="1%" >No</th>
		<th>Username</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>No. HP</th>
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
<?php endif ?>

<br>
<center>
<button class="cetak" type="button" onclick="cetak();" id="cetak" >Export to Pdf</button>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="excel_anggota.php" target="_blank" class="excel"><button>Export to Excel</button></a>
</center>

<script>
	function cetak() {
		window.print();
	}

</script>

</body>
</html>

   