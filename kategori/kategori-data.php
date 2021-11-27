<?php
include "../header.php";
?>
<?php
include 'kategori-list.php';
?>

<div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Data Kategori</h2>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="container clearfix">
                  <div class="content">
    
            <?php if (empty($data_kategori)) : ?>
            Tidak ada data.
            <?php else : ?>
            <table class="data">
                <tr>
                    <th>Kategori</th>
                    <th width="20%">Pilihan</th>
                </tr>
                <?php foreach ($data_kategori as $kategori) : ?>
                <tr>
                    <td><?php echo $kategori['kategori_nama'] ?></td>
                    <td>
                        <a href="kategori-edit.php?id_kategori=<?php echo $kategori['kategori_id']; ?>" class="btn btn-edit">Edit</a>
                        <a href="kategori-delete.php?id_kategori=<?php echo $kategori['kategori_id']; ?>" class="btn btn-hapus" onclick="return confirm('anda yakin akan menghapus data?');">Hapus</a>
                    </td>
                </tr>
                <?php  endforeach ?>
            </table>
            <div class="btn-tambah-div">
                <a href="kategori-tambah.php"><button class="btn btn-tambah">Tambah Data</button></a>
            </div>
            <?php endif ?>
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