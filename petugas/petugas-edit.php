<?php
include "../header.php";
?>
<?php

include '../connection.php';

// ambil artikel yang mau di edit
$id_petugas = $_GET['id_petugas'];
$query = "SELECT * FROM petugas WHERE petugas_id = $id_petugas";
$hasil = mysqli_query($db, $query);
$data_petugas = mysqli_fetch_assoc($hasil);

?>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Edit Data Petugas</h2>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="container clearfix">


            <div class="col-12">
            <form method="post" action="">
                <table>
                  <input type="hidden" name="id_petugas" value="<?php echo $data_petugas['petugas_id']; ?>">
                  <tr>
                  <input type="text" name="nama" id="nama" placeholder="nama" value="<?php echo $data_petugas['petugas_nama']; ?>">
                  </tr><br/><br/>
                  <tr>
                  <tr>
                  <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $data_petugas['username']; ?>">
                  </tr><br/><br/>
                  <tr>
                  <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $data_petugas['password']; ?>">
                  </tr><br/><br/>
                </table>
                <p>
                    <input type="submit" class="btn btn-submit" value="Simpan" name="save">
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
      </div>
    
    <?php
   include '../connection.php';
        
   if(isset($_POST["save"])){
   $id_petugas = $_POST['id_petugas'];
   $nama = $_POST['nama'];
   $user = $_POST['username'];
   $pass = $_POST['password'];

   $query = "UPDATE petugas
       SET petugas_nama = '$nama',
           username = '$user',
           password = '$pass'
       WHERE petugas_id = $id_petugas";

   $hasil = mysqli_query($db, $query);
   // var_dump(mysqli_error($db));
   if ($hasil == true) {
    echo "<script>window.alert('Berhasil Update')
    window.location='petugas-data.php'</script>";
   } else {
      
       echo "koneksi gagal" .mysqli_error($db);
   }
   }
    
    ?>

<?php
include "../footer.php";
?>