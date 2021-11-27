<?php
include "../header.php";
?>
<?php

include "petugas-list.php";

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
                  <input type="text" name="nama" id="nama" placeholder="nama">
                  </tr><br/><br/>
                  <tr>
                  <input type="text" name="username" id="username" placeholder="Username" width="100%">
                  </tr><br/><br/>
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
    $nama = $_POST['nama'];
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $query = "INSERT INTO petugas(petugas_nama, username, password) 
        VALUES ('$nama', '$user', '$pass')";
    $hasil = mysqli_query($db, $query);

    if ($hasil == true) {
        echo "<script>window.alert('1 Record added')
        window.location='petugas-data.php'</script>";
    } else {
        header('Location: petugas-tambah.php');
    }
    }
    ?>

<?php
include "../footer.php";
?>