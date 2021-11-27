<?php
include "../header.php";
?>
<?php
include '../kategori/kategori-list.php';
?>
<?php
include 'buku-list.php';

$id_buku = $_GET['id_buku'];
$query = "SELECT buku.*, kategori.kategori_id
    FROM buku
    JOIN kategori
    ON buku.kategori_id = kategori.kategori_id
    WHERE buku.buku_id = $id_buku";
$hasil = mysqli_query($db, $query);
$data_buku = mysqli_fetch_assoc($hasil);
?>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Edit Data Anggota</h2>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="container clearfix">


                  <div class="content">
            <h3>Tambah Data Buku</h3>
            <form method="post" action="" enctype="multipart/form-data">
                <input type="hidden" name="id_buku" value="<?php echo $id_buku; ?>">
                <p>Judul</p>
                <p><input type="text" name="judul" value="<?php echo $data_buku['buku_judul'] ?>"></p>

                <p>Kategori</p>
                <p>
                	<select name="kategori">
                        <?php foreach ($data_kategori as $kategori) : ?>
                            <?php
                            if ($data_buku['kategori_id'] == $kategori['kategori_id']) {
                                $selected = "selected";
                            } else {
                                $selected = null;
                            }
                            ?>
                            <option value="<?php echo $kategori['kategori_id'] ?>" <?php echo $selected ?>><?php echo $kategori['kategori_nama'] ?></option>
                        <?php endforeach ?>
                	</select>
                </p>

                <p>Deskripsi</p>
                <p><textarea name="deskripsi"><?php echo $data_buku['buku_deskripsi'] ?></textarea></p>

                <p>Jumlah</p>
                <p><input type="number" name="jumlah" value="<?php echo $data_buku['buku_jumlah'] ?>"></p>

                <p>Cover</p>
                <p><input type="file" name="cover"></p>

                <p><input type="submit" class="btn btn-submit" value="Simpan" name="update"></p>
            </form>
        </div>

  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php 
    include '../connection.php';
    
    if (isset($_POST["update"])){
    $id_buku = $_POST['id_buku'];
    $judul = $_POST['judul'];
    $kategori = $_POST['kategori'];
    $deskripsi = $_POST['deskripsi'];
    $jumlah = $_POST['jumlah'];
    
    $q = mysqli_query($db, "SELECT buku_cover FROM buku WHERE buku_id = $id_buku");
    $hasil = mysqli_fetch_assoc($q);
    $cover_lama = $hasil['buku_cover'];
    
    // ambil data file yang diupload (jika ada)
    if (!empty($_FILES['cover']['tmp_name'])) {
        $file        = $_FILES['cover']['tmp_name'];
        $nama_file   = $_FILES['cover']['name'];
        $destination = "cover/" . $nama_file;
    
        $cover_baru = $nama_file;
    } else {
        $cover_baru = $cover_lama;
    }
    
    
    $query = "UPDATE buku 
        SET buku_judul = '$judul',
            kategori_id = $kategori,
            buku_deskripsi = '$deskripsi',
            buku_jumlah = $jumlah,
            buku_cover = '$cover_baru'
        WHERE buku_id = $id_buku";
    
    $hasil = mysqli_query($db, $query);
    //var_dump(mysqli_error($db)); exit();
    if ($hasil == true) {
    
        if (!empty($_FILES['cover']['tmp_name'])) {
    
            // hapus cover lama
            unlink("cover/" . $cover_lama);
    
            // jika upload cover baru, lakukan proses upload
            move_uploaded_file($file, $destination);
        }
    
        echo "<script>window.alert('Berhasil Update')
        window.location='buku-data.php'</script>";
    } else {
      echo "<script>window.alert('Gagal Update')
      window.location='buku-data.php'</script>";
    }
}
    
    
    ?>
   

<?php
include "layout/footer.php";
?>