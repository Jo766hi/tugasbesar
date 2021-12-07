<h3>LAPORAN DATA PEMINJAMAN PERPUSTAKAAN</h3>
	<?php 
		include '../peminjaman/proses-list-pinjam-data.php';
	?>
		<table border="1">
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


<?php
  
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Peminjaman.xls");
  
?>


   