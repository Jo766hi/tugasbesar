<?php
include "../header.php";
?>
<?php
include '../kategori/kategori-list.php';
?>

       <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Tambah Data Buku</h2>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="container clearfix">
                  <div class="content">
            <form method="post" action="" enctype="multipart/form-data">
                <p>Judul</p>
                <p><input type="text" name="judul"></p>

                <p>Kategori</p>
                <p>
                	<select name="kategori">
                        <?php foreach ($data_kategori as $kategori) : ?>
                            <option value="<?php echo $kategori['kategori_id'] ?>"><?php echo $kategori['kategori_nama'] ?></option>
                        <?php endforeach ?>
                	</select>
                </p>

                <p>Deskripsi</p>
                <p><textarea name="deskripsi"></textarea></p>

                <p>Jumlah</p>
                <p><input type="number" name="jumlah"></p>

                <p>Cover</p>
                <p><input type="file" name="cover"></p>

                <p><input type="submit" class="btn btn-submit" value="Simpan" name="submit"></p>
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
      if (isset($_POST["submit"])){
      $judul     = $_POST['judul'];
      $kategori  = $_POST['kategori'];
      $deskripsi = $_POST['deskripsi'];
      $jumlah    = $_POST['jumlah'];

      // ambil data file yang diupload
      $file        = $_FILES['cover']['tmp_name'];
      $nama_file   = $_FILES['cover']['name'];
      $destination = "cover/" . $nama_file;

      $query = "INSERT INTO buku (buku_judul, kategori_id, buku_deskripsi, buku_jumlah, buku_cover) 
          VALUES ('$judul', $kategori, '$deskripsi', $jumlah, '$nama_file')";
      $hasil = mysqli_query($db, $query);
      if ($hasil == true) {

          // jika data berhasil diinsert, lakukan proses upload
          move_uploaded_file($file, $destination);

          echo "<script>window.alert('1 Record added')
        window.location='buku-data.php'</script>";
      } else {
          header('Location: tambah-buku.php');
      }
      }?>
      <?php
include "../footer.php";
?>