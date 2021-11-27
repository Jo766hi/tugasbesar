<?php
include "../header.php";
?>
<?php

include "petugas-list.php";

?>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Data Anggota</h2>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="container clearfix">


        <div class="content">
            <?php if (empty($data_petugas)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table class="data">
                <tr>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th width="20%">Pilihan</th>
                </tr>
                <?php foreach ($data_petugas as $ptgs) : ?>
                <tr>
                    <td><?php echo $ptgs['petugas_nama'] ?></td>
                    <td><?php echo $ptgs['username'] ?></td>
                    <td><?php echo $ptgs['password'] ?></td>
                    <td>
                        <a href="petugas-edit.php?id_petugas=<?php echo $ptgs['petugas_id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="petugas-delete.php?id_petugas=<?php echo $ptgs['petugas_id']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php  endforeach ?>
            </table>
            <?php endif ?>
            <div class="btn-tambah-div">
                <a href="petugas-tambah.php"><button class="btn btn-tambah">Tambah Data</button></a>
            </div>
        </div>

    </div>
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php
include "../footer.php";
?>