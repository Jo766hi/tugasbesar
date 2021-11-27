<?php
include "../header.php";
?>
<?php

include "anggota-list.php";

?>
      <div class="content">
        <div class="container-fluid">
          <div class="card">
            <div class="card-header card-header-primary">
              <h2 class="card-title">Tambah Data Anggota</h2>
            </div>
            <div class="card-body">
              <div class="row">
                  <div class="container clearfix">


            <div class="col-12">
            <form method="post" action="">
                <table>
                  <tr>
                  <input type="text" name="username" id="username" placeholder="Username" width="100%">
                  </tr><br/><br/>
                  <tr>
                  <input type="text" name="nama" id="nama" placeholder="nama">
                  </tr><br/><br/>
                  <tr>
                        <select name="jk" aria-placeholder="Jenis Kelamin">
                        <option value="L">Laki-laki</option>
                        <option value="P">Perempuan</option>
                        </select>
                  </tr><br/><br/>
                  <tr>
                  <input type="text" name="no_telepon" id="telp" placeholder="Telepon">
                  </tr><br/><br/>
                  <tr>
                  <input type="email" name="email" id="email" placeholder="Email">
                  </tr><br/><br/>
                  <tr>
                  <input type="password" name="password" id="password" placeholder="Password">
                  </tr><br/><br/>
                </table>
                <p>
                    <input type="submit" class="btn btn-submit" value="Simpan" name="add">
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
    if(isset($_POST["add"])){
    $user = $_POST['username'];
    $nama = $_POST['nama'];
    $jenis_kelamin = $_POST['jk'];
    $no_telepon = $_POST['no_telepon'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $query = "INSERT INTO anggota (anggota_usrnm, anggota_nama, anggota_jk, anggota_telp, anggota_email, anggota_pass) 
        VALUES ('$user', '$nama', '$jenis_kelamin', '$no_telepon', '$email', '$pass')";
    $hasil = mysqli_query($db, $query);

    if ($hasil == true) {
        echo "<script>window.alert('1 Record added')
        window.location='anggota-data.php'</script>";
    } else {
        header('Location: anggota-tambah.php');
    }
    }
    ?>

<?php
include "../footer.php";
?>