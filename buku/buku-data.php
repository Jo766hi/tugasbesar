<?php
include "../header.php";
?>
<?php 
include 'buku-list.php';
?>
       <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Data Buku</h2>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="container clearfix">
                  <div class="content">
            <?php if (empty($data_buku)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table class="data">
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Deskripsi</th>
                    <th>Jumlah</th>
                    <th>Cover</th>
                    <th width="20%">Pilihan</th>
                </tr>
                <?php foreach ($data_buku as $buku) : ?>
                <tr>
                    <td><?php echo $buku['buku_judul'] ?></td>
                    <td><?php echo $buku['kategori_nama'] ?></td>
                    <td><?php echo $buku['buku_deskripsi'] ?></td>
                    <td><?php echo $buku['buku_jumlah'] ?></td>
                    <td><img class="buku-cover" src="cover/<?php echo $buku['buku_cover'] ?>" width="50px"></td>
                    <td>
                        <a href="buku-edit.php?id_buku=<?php echo $buku['buku_id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="buku-delete.php?id_buku=<?php echo $buku['buku_id']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php endforeach ?>
            </table>
            <div class="btn-tambah-div">
                <a href="buku-tambah.php"><button class="btn btn-tambah">Tambah Data</button></a>
            </div>
            <?php endif ?>
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