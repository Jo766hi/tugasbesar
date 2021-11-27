<?php
include "../header.php";
?>
<?php
include '../connection.php';

// ambil artikel yang mau di edit
$id_kategori = $_GET['id_kategori'];
$query = "SELECT * FROM kategori WHERE kategori_id = $id_kategori";
$hasil = mysqli_query($db, $query);
$data_kategori = mysqli_fetch_assoc($hasil);

?>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Edit Kategori</h2>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="container clearfix">


                  <div class="content">
            <h3>Edit Kategori</h3>
            <form method="post" action="">
                <input type="hidden" name="id_kategori" id="id_kategori" value="<?php echo $data_kategori['kategori_id']; ?>">
                <p>Kategori</p>
                <p><input type="text" name="kategori" value="<?php echo $data_kategori['kategori_nama'] ?>"></p>

                <p>
                    <input type="submit" class="btn btn-submit" value="Simpan" name="edit">
                    <input type="reset" class="btn btn-submit" value="Batal" onclick="self.history.back();">
                </p>
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
    if(isset($_POST["edit"])){
    $kategori = $_POST['kategori'];
    $id_kategori = $_POST['id_kategori'];

    $query = "UPDATE kategori 
        SET kategori_nama = '$kategori'
        WHERE kategori_id = $id_kategori";

    $hasil = mysqli_query($db, $query);
    if ($hasil == true) {
      echo "<script>window.alert('Berhasil Diupdate')
      window.location='kategori-data.php'</script>";
    } else {
      echo "<script>window.alert('Gagal Diupdate')
      window.location='kategori-edit.php'</script>";
    }
}
?>

<?php
include "../footer.php";
?>