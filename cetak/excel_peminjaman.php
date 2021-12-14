<h3>LAPORAN DATA PEMINJAMAN PERPUSTAKAAN</h3>
<?php 
	include '../includes/koneksi.php';
    $a = "SELECT pinjam.*,pinjam.pinjam_id as id_pinjam, buku.buku_id ,buku.buku_judul, user.nama,
	(SELECT tgl_kembali FROM kembali JOIN pinjam ON kembali.pinjam_id=pinjam.pinjam_id WHERE kembali.pinjam_id=id_pinjam) as tgl_kembali
    FROM pinjam
    JOIN buku ON buku.buku_id = pinjam.buku_id
    JOIN user ON user.id = pinjam.anggota_id";
    $h = mysqli_query($db, $a);
    mysqli_connect_error();

    $data_pinjam = array();
    
    while ($row = mysqli_fetch_assoc($h)) {
        $data_pinjam[] = $row;
    }
?>
     <table class="data" border="1">
                <tr>
                    <th>Buku</th>
                    <th>Nama</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Jatuh Tempo</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                </tr>
                <?php foreach ($data_pinjam as $pinjam) : ?>
                <tr>
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

            <?php if (empty($data_pinjam)) : ?> Tidak ada data.
            <?php else : ?>

            <?php endif ?>

<?php
  
  header("Content-type: application/vnd-ms-excel");
  header("Content-Disposition: attachment; filename=Data Peminjaman.xls");
  
?>


   