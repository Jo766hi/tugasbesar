<?php
include "../header.php";
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
            <h3>Tambah Data Kategori</h3>
            <form method="post" action="">
                <p>Kategori</p>
                <p><input type="text" name="kategori"></p>
                <p>
                    <input type="submit" class="btn btn-submit" value="Simpan" name="tambah">
                    <input type="reset" class="btn btn-submit" value="Batal" onclick="self.history.back();">
                </p>
            </form>
        </div>

        <?php 
        include '../connection.php';

        if(isset($_POST["tambah"])){
        $kategori = $_POST['kategori'];
        
        $query = "INSERT INTO kategori (kategori_nama) 
            VALUES ('$kategori')";
        $hasil = mysqli_query($db, $query);
        
        if ($hasil == true) {
          echo "<script>window.alert('1 Record added')
          window.location='kategori-data.php'</script>";
        } else {
          echo "<script>window.alert('Gagal Ditambahkan')
          window.location='kategori-tambah.php'</script>";
        }
    }
        ?>
<?php include "../footer.php";
?>