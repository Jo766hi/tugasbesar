<?php
// ... ambil data dari database
include '../data_buku/buku-list.php';

// ... ambil data dari database
include '../data_anggota/anggota-list.php';
?>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <div class="modal-body">
            <form action="proses-tambah-pinjam.php" method="post">
                <p>Buku</p>
                <p>
                    <select name="buku">
                        <?php foreach ($data_buku as $buku): ?>
                            <option value="<?php echo $buku['buku_id'] ?>"><?php echo $buku['buku_judul'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p>Anggota</p>
                <p>
                    <select name="anggota">
                        <?php foreach ($data_anggota as $anggota) : ?>
                        <option value="<?php echo $anggota['id'] ?>"><?php echo $anggota['nama'] ?></option>
                        <?php endforeach ?>
                    </select>
                </p>

                <p>Tanggal Pinjam</p>
                <p><input type="date" name="tgl_pinjam"></p>

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
