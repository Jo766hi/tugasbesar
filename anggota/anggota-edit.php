<?php
include "../header.php";
?>
<?php

include '../connection.php';

// ambil artikel yang mau di edit
$id_anggota = $_GET['id_anggota'];
$query = "SELECT * FROM anggota WHERE anggota_id = $id_anggota";
$hasil = mysqli_query($db, $query);
$data_anggota = mysqli_fetch_assoc($hasil);

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


            <div class="col-12">
            <form method="post" action="">
                <table>
                  <input type="hidden" name="id_anggota" value="<?php echo $data_anggota['anggota_id']; ?>">
                  <tr>
                  <input type="text" name="username" id="username" placeholder="Username" value="<?php echo $data_anggota['anggota_usrnm']; ?>">
                  </tr><br/><br/>
                  <tr>
                  <input type="text" name="nama" id="nama" placeholder="nama" value="<?php echo $data_anggota['anggota_nama']; ?>">
                  </tr><br/><br/>
                  <tr>
                        <select name="jk" aria-placeholder="Jenis Kelamin">
                        <?php if ($data_anggota['anggota_jk'] == "L") : ?>
                        <option value="L" selected>Laki-laki</option>
                        <option value="P">Perempuan</option>
                        <?php else : ?>
                        <option value="L">Laki-laki</option>
                        <option value="P" selected>Perempuan</option>
                        <?php  endif ?>
                        </select>
                  </tr><br/><br/>
                  <tr>
                  <input type="text" name="no_telepon" id="telp" placeholder="Telepon" value="<?php echo $data_anggota['anggota_telp']; ?>">
                  </tr><br/><br/>
                  <tr>
                  <input type="email" name="email" id="email" placeholder="Email" value="<?php echo $data_anggota['anggota_email']; ?>">
                  </tr><br/><br/>
                  <tr>
                  <input type="password" name="password" id="password" placeholder="Password" value="<?php echo $data_anggota['anggota_pass']; ?>">
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
   $id_anggota = $_POST['id_anggota'];
   $user = $_POST['username'];
   $nama = $_POST['nama'];
   $jenis_kelamin = $_POST['jk'];
   $no_telepon = $_POST['no_telepon'];
   $email = $_POST['email'];
   $pass = $_POST['password'];

   $query = "UPDATE anggota 
       SET anggota_usrnm = '$user',
           anggota_nama = '$nama',
           anggota_jk = '$jenis_kelamin',
           anggota_telp = '$no_telepon',
           anggota_email = '$email',
           anggota_pass = '$pass'
       WHERE anggota_id = $id_anggota";

   $hasil = mysqli_query($db, $query);
   // var_dump(mysqli_error($db));
   if ($hasil == true) {
    echo "<script>window.alert('Berhasil Update')
    window.location='anggota-data.php'</script>";
   } else {
      
       echo "koneksi gagal" .mysqli_error($db);
   }
   }
    
    ?>

<?php
include "../footer.php";
?>