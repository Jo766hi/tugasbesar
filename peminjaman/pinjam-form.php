<?php
    if (!isset($_SESSION['username'])) {
        header('Location: ../login/login.php');
        exit();
        
    }
include '../data_buku/buku-list.php';
include '../includes/koneksi.php';
if($_SESSION['level'] == 'petugas') {
    $query = "SELECT * FROM user WHERE level ='anggota'";
}
else if($_SESSION['level'] == 'anggota') {
    $query = "SELECT * FROM user WHERE id = '" . $_SESSION['id'] . "'";
}
    $hasil = mysqli_query($db, $query);
    // ... menampung semua data kategori
    $data_anggota = array();
    // ... tiap baris dari hasil query dikumpulkan ke $data_anggota
    while ($row = mysqli_fetch_assoc($hasil)) {
    $data_anggota[] = $row;
    }
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pinjam</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span>&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="proses-tambah-pinjam.php" method="post">
                <p>Buku</p>
                <p>
                    <select class="form-select" name="buku">
                        <?php foreach ($data_buku as $buku): ?>
                            <option value="<?php echo $buku['buku_id'] ?> "><?php echo $buku['buku_judul'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p>Nama</p>
                <p>
                    <select name="anggota">
                        <?php foreach ($data_anggota as $anggota) : ?>
                        <option value="<?php echo $anggota['id'] ?>"><?php echo $anggota['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p>Tanggal Pinjam</p>
                <p><input type="date" name="tgl_pinjam" value="<?=date('Y-m-d');?>"</p>

                <p>Tanggal Jatuh Tempo</p>
                <p><input type="date" name="tgl_jatuh_tempo"></p>
        </div>
        
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" value="Simpan">Save</button>
            </form>
        </div>
    </div>
</div>
</div>
