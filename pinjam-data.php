<?php
// ... ambil data dari database
include '../modul_peminjaman/proses-list-pinjam-data.php';
include "layout/header.php";
?>
      <div class="content">
        <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Simple Table</h4>
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
                  Tambah
                  </button>
                  <p class="card-category"> Here is a subtitle for this table</p>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table">
                      <thead class=" text-primary">
                        <th>Buku</th>
                        <th>Nama</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Jatuh Tempo</th>
                        <th>Tgl kembali</th>
                      </thead>
                      <tbody>
                      <?php foreach ($data_pinjam as $pinjam) : ?>
                        <tr>
                          <td><?php echo $pinjam['buku_judul'] ?></td>
                          <td><?php echo $pinjam['anggota_nama'] ?></td>
                          <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_pinjam'])) ?></td>
                          <td><?php echo date('d-m-Y', strtotime($pinjam['tgl_jatuh_tempo'])) ?></td>
                          <td class="text-primary">$36,73</td>
                        </tr>
                        <?php endforeach ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php include "form-tambah-pinjam.php" ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" value="Simpan" >Save changes</button>
      </div>
    </div>
  </div>
</div>

      <?php
include "layout/footer.php";
?>