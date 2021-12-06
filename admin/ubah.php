<?php
include "layout/header.php";

?>




<div class="container-fluid">

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">tabel akun</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <?php
                    $id = $_POST['id'];
                    $query = "SELECT * FROM akun WHERE id=$id";
                    $hasil = mysqli_query($koneksi, $query);
                    foreach ($hasil as $data) {

                    ?>
                        <form method="POST" class="my-login-validation" novalidate="">
                            <input hidden type="number" name="id" value="<?php echo $data['id']; ?>">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input value="<?php echo $data['nama']; ?>" id="name" type="text" class="form-control" name="nama" required autofocus>
                                <div class="invalid-feedback">
                                    What's your name?
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">E-Mail Address</label>
                                <input value="<?php echo $data['email']; ?>" id="email" type="email" class="form-control" name="email" required>
                                <div class="invalid-feedback">
                                    Your email is invalid
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="username">username</label>
                                <input value="<?php echo $data['username']; ?>" id="username" type="text" class="form-control" name="username" required autofocus>
                                <div class="invalid-feedback">
                                    What's your username?
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input value="<?php echo $data['password']; ?>" id="password" type="password" class="form-control" name="password" required data-eye>
                                <div class="invalid-feedback">
                                    Password is required
                                </div>
                            </div>

                            <div class="form-group m-0">
                                <button type="btnUbah" class="btn btn-primary btn-block">
                                    Update
                                </button>
                            </div>

                        </form>
                    <?php } ?>


                    <?php
                    if (isset($_POST['btnUbah'])) {
                        $no = $_POST['id'];
                        $user = $_POST['username'];
                        $pass = $_POST['password'];
                        $nama = $_POST['nama'];
                        $email = $_POST['email'];

                        if ($koneksi) {
                            $sql = "UPDATE akun SET username='$user',password='$pass', nama='$nama',email='$email' WHERE id=$no";
                            mysqli_query($koneksi, $sql);
                            echo "<p class='alert alert-success text-center'><b> Akun berhasi diubah.";
                            echo "<a href='akun.php' class='btn btn-primary'>Kembali</a></b></p>";
                        } elseif ($koneksi->connect_error) {
                            echo "<p class='alert alert-danger text-center><b>Terjadi Kesalahan: $error </b></p>";
                        }
                    }
                    ?>
                </div>
            </div>
            <?php
            include "layout/footer.php";
            ?>