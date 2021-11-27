
<?php

include "anggota-list.php";

?>
<?php 
include '../header.php'?>
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
            <?php if (empty($data_anggota)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table class="data">
                <tr>
                    <th>Username</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>No Telepon</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th width="20%">Pilihan</th>
                </tr>
                <?php foreach ($data_anggota as $anggota) : ?>
                <tr>
                    <td><?php echo $anggota['anggota_usrnm'] ?></td>
                    <td><?php echo $anggota['anggota_nama'] ?></td>
                    <td><?php echo $anggota['anggota_jk'] ?></td>
                    <td><?php echo $anggota['anggota_telp'] ?></td>
                    <td><?php echo $anggota['anggota_email'] ?></td>
                    <td><?php echo $anggota['anggota_pass'] ?></td>
                    <td>
                        <a href="anggota-edit.php?id_anggota=<?php echo $anggota['anggota_id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="anggota-delete.php?id_anggota=<?php echo $anggota['anggota_id']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php  endforeach ?>
            </table>
            <?php endif ?>
            <div class="btn-tambah-div">
                <a href="anggota-tambah.php"><button class="btn btn-tambah">Tambah Data</button></a>
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
include '../footer.php';
?>
</body>
</html>